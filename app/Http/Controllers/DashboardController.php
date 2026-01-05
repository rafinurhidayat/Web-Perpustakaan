<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Anggota;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Book::count();
        $totalAnggota = Anggota::count();
        $totalPeminjaman = Loan::count();

        return view('dashboard', compact(
            'totalBuku',
            'totalAnggota',
            'totalPeminjaman'
        ));
    }
}
