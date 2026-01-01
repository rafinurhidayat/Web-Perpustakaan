<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'book'])->get();
        return view('peminjaman.index', compact('loans'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::where('stock', '>', 0)->get();
        return view('peminjaman.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'loan_date' => 'required|date',
        ]);

        Loan::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => $request->loan_date,
            'status' => 'dipinjam',
        ]);

        Book::where('id', $request->book_id)->decrement('stock');

        return redirect()->route('peminjaman.index');
    }

    public function destroy(Loan $peminjaman)
    {
        $peminjaman->delete();
        return back();
    }
}

