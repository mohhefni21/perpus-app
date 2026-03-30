<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_books'   => Book::count(),
            'total_members' => Member::count(),
            'active_borrow' => Borrowing::where('status', 'borrowed')->count(),
            'overdue_count' => Borrowing::where('status', 'borrowed')
                                        ->where('due_date', '<', now())
                                        ->count(),
        ];

        return view('dashboard', $data);
    }
}
