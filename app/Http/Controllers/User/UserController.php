<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view('user.dashboard.buku');
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
    public function detailbuku()
    {
        return view('user.dashboard.detailbuku');
    }
}
