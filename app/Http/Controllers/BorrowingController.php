<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'details.book'])->latest()->paginate(5);
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::where('stock', '>', 0)->get();
        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'due_date'  => 'required|date|after:today',
            'items'     => 'required|array|min:1',
        ]);

        $filteredItems = collect($request->items)->filter(function ($item) {
            return !empty($item['book_id']);
        });

        if ($filteredItems->isEmpty()) {
            return response()->json([
                'message' => 'Anda harus memilih minimal satu buku yang valid!'
            ], 422);
        }

        try {
            DB::beginTransaction();

            // Simpan data peminjaman
            $borrowing = Borrowing::create([
                'member_id'   => $request->member_id,
                'borrow_date' => now(),
                'due_date'    => $request->due_date,
                'status'      => 'borrowed'
            ]);

            // 2. Simpan detail peminjaman dan kurangi stok buku
            foreach ($request->items as $item) {
                $book = Book::find($item['book_id']);
                
                if ($book->stock < $item['qty']) {
                    return response()->json(['message' => "Stok buku {$book->title} tidak mencukupi!"], 422);
                }

                BorrowingDetail::create([
                    'borrowing_id' => $borrowing->id,
                    'book_id'      => $item['book_id'],
                    'qty'          => $item['qty']
                ]);

                // Kurangi stok buku
                $book->decrement('stock', $item['qty']);
            }

            DB::commit();
            return response()->json(['message' => 'Transaksi peminjaman berhasil disimpan!']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $borrowing = Borrowing::with(['member', 'details.book'])->findOrFail($id);
        return view('borrowings.show', compact('borrowing'));
    }

    public function returnBook($id)
    {
        $borrowing = Borrowing::findOrFail($id);

        if ($borrowing->status !== 'returned') {
            $borrowing->update([
                'status' => 'returned',
                'return_date' => now()
            ]);

            foreach ($borrowing->details as $detail) {
                $detail->book->increment('stock', $detail->qty);
            }

            return back()->with('success', 'Buku berhasil dikembalikan!');
        }

        return back()->with('error', 'Buku sudah dikembalikan.');
    }
}
