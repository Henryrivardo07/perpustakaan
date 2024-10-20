<?php

namespace App\Http\Controllers;

use App\Models\Books; // Impor model Book yang benar
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    // Menyimpan data peminjaman
    public function store(Request $request, Books $book)
    {
        $request->validate([
            'tanggal_peminjaman' => 'required|date',
        ]);

        // Buat data peminjaman baru
        Loan::create([
            'user_id' => Auth::check() ? Auth::id() : null, // null jika guest
            'book_id' => $book->id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam!');
    }

    // Menampilkan daftar peminjaman buku
    public function index(Books $book)
    {
        $loans = Loan::where('book_id', $book->id)->get();

        return view('books.show', compact('book', 'loans'));
    }
}
