<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|unique:books',
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|numeric|min:0'
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|numeric|min:0'
        ]);

        $book->update([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
