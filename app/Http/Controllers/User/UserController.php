<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\Video;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard.index');
    }

    public function video()
    {
        $videos = Video::all();
        return view('user.dashboard.video', compact('videos'));
    }
    public function buku()
    {
        $books = Book::all();
        $totalBook = Book::count();

        $transactionsWithBooks = Transaction::with('book')
            ->where('user_id', Auth::user()->id)
            ->get();

        $bukuMelewatiMasaPengembalian = $transactionsWithBooks->filter(function ($transaction) {
            return $transaction->batas_pengembalian < Carbon::now();
        });

        return view('user.dashboard.buku', compact('books', 'totalBook', 'bukuMelewatiMasaPengembalian'));
    }
    public function riwayat()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('user.dashboard.riwayat', compact('transactions'));
    }
    public function profil()
    {
        return view('user.dashboard.profil');
    }
    public function keranjang()
    {
        return view('user.dashboard.keranjang');
    }
    public function detailbuku(Book $book, $id)
    {
        $book = Book::find($id);
        return view('user.dashboard.detailbuku', compact('book'));
    }
}
