<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard.index');
    }

    public function video()
    {
        return view('user.dashboard.video');
    }
    public function buku()
    {
        $books = Book::all();
        $totalBook = Book::count();
        return view('user.dashboard.buku', compact('books', 'totalBook'));
    }
    public function riwayat()
    {
        return view('user.dashboard.riwayat');
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
