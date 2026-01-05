<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'book'])->latest()->get();
        return view('peminjaman.index', compact('loans'));
    }

    public function create()
    {
        return view('peminjaman.create', [
            'users' => User::all(),
            'books' => Book::where('stok', '>', 0)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'book_id'   => 'required|exists:books,id',
            'loan_date' => 'required|date',
        ]);

        $book = Book::findOrFail($request->book_id);

        // 🚫 CEK STOK
        if ($book->stok < 1) {
            return back()->withErrors([
                'book_id' => 'Stok buku habis'
            ])->withInput();
        }

        DB::transaction(function () use ($request, $book) {

            Loan::create([
                'user_id'   => $request->user_id,
                'book_id'   => $book->id,
                'loan_date' => $request->loan_date,
                'status'    => 'dipinjam',
            ]);

            // ⬇️ KURANGI STOK
            $book->decrement('stok');
        });

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil dicatat');
    }

    // ✏️ FORM EDIT
    public function edit(Loan $loan)
    {
        return view('peminjaman.edit', [
            'loan'  => $loan,
            'users' => User::all(),
            'books' => Book::all(),
        ]);
    }

    // 🔄 UPDATE DATA
    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'book_id'   => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'status'    => 'required|in:dipinjam,dikembalikan',
        ]);

        $loan->update([
            'user_id'   => $request->user_id,
            'book_id'   => $request->book_id,
            'loan_date' => $request->loan_date,
            'status'    => $request->status,
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman diperbarui');
    }

    // 🔁 PENGEMBALIAN
    public function kembali(Loan $loan)
    {
        if ($loan->status === 'dikembalikan') {
            return back()->with('error', 'Buku sudah dikembalikan');
        }

        DB::transaction(function () use ($loan) {
            $loan->update([
                'status' => 'dikembalikan',
                'return_date' => now(),
            ]);

            $loan->book->increment('stok');
        });

        return back()->with('success', 'Buku berhasil dikembalikan');
    }

    // ❌ HAPUS DATA
    public function destroy(Loan $loan)
    {
        if ($loan->status === 'dipinjam') {
            $loan->book->increment('stok');
        }

        $loan->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman dihapus');
    }
}
