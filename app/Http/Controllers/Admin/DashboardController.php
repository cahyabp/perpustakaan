<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // method untuk halaman index
    public function index()
    {
        if(Auth::user()->role === 'admin'){
            
            return view("admin.dashboard.index");
        } else {
            return redirect('users/beranda');
        }
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login')->with(['msg_body' => 'You signed out!']);
    }
    public function show()
    {
        return view('admin.dashboard.books');
    }
    public function video()
    {
        return view('admin.dashboard.video');
    }
    public function keanggotaan()
    {
        return view('admin.dashboard.keanggotaan');
    }
    public function peminjam()
    {
        return view('admin.dashboard.peminjam');
    }
    public function pelaporan()
    {
        return view('admin.dashboard.pelaporan');
    }
    public function tambahbuku()
    {
        return view('admin.dashboard.tambahbuku');
    }
    public function tambahvideo()
    {
        return view('admin.dashboard.tambahvideo');
    }
    public function editbuku()
    {
        return view('admin.dashboard.editbuku');
    }
    public function editvideo()
    {
        return view('admin.dashboard.editvideo');
    }
    public function tambahpeminjaman()
    {
        return view('admin.dashboard.tambahpeminjaman');
    }
    public function editpinjaman()
    {
        return view('admin.dashboard.editpinjaman');
    }
}
