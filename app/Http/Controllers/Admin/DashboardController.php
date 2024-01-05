<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // method untuk halaman index
    public function index()
    {
        if(Auth::user()->role === 'admin') {
            
            $totalBook = Book::count();
            $totalUser= User::where('role', 'user')->count();
            $totalPinjam = Transaction::where('status', 'dipinjam')->count();
            $totalDikembalikan =Transaction::where('status', 'dikembalikan')->count();

            return view("admin.dashboard.index", compact('totalBook', 'totalUser', 'totalPinjam', 'totalDikembalikan'));
        } else {
            return redirect('users/beranda');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with(['msg_body' => 'You signed out!']);
    }
    public function show()
    {
        $books = Book::all();
        return view('admin.dashboard.books', compact('books'));
    }
    public function video()
    {
        $videos = Video::all();
        return view('admin.dashboard.video', compact('videos'));
    }
    public function keanggotaan()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.dashboard.keanggotaan', compact('users'));
    }
    public function peminjam()
    {
        $transactions = Transaction::all();
        return view('admin.dashboard.peminjam', compact('transactions'));
    }
    public function pelaporan()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $monthsArray = Carbon::now()->startOfYear()->monthsUntil(Carbon::now()->endOfYear())->toArray();


        $popularBooks = collect($monthsArray)->map(function ($date) {
            return Transaction::select('books.judul', 'books.id as book_id', DB::raw('COUNT(*) as total_transactions'))
                    ->join('books', 'transactions.book_id', '=', 'books.id')
                    ->whereMonth('transactions.created_at', $date)
                    ->groupBy('books.id')
                    ->orderBy('total_transactions', 'DESC')
                    ->limit(3)
                    ->get();

        });



        return view('admin.dashboard.pelaporan');
    }

    public function getDataChartAdmin()
    {
        $monthsArray = Carbon::now()->startOfYear()->monthsUntil(Carbon::now()->endOfYear())->toArray();


        $bukuBelumDikembalikan = collect($monthsArray)->map(function ($date) {
    return Transaction::join('books', 'transactions.book_id', '=', 'books.id')
        ->whereMonth('transactions.created_at', $date)
        ->where('transactions.status', 'dipinjam')
        ->whereDate('transactions.batas_pengembalian', '<', now())
        ->count();
});
        $popularBooks = Transaction::select('books.judul', 'books.id as book_id', DB::raw('COUNT(*) as total_pinjam'))
                    ->join('books', 'transactions.book_id', '=', 'books.id')
                    ->whereMonth('transactions.created_at', Carbon::now()->month)
                    ->groupBy('books.id')
                    ->orderBy('total_pinjam', 'DESC')
                    ->limit(3)
                    ->get();

        return response()->json([
            'popularBook' => $popularBooks,
            'bukuBelumDikembalikan' => $bukuBelumDikembalikan
        ]);
    }

    public function tambahbuku()
    {
        return view('admin.dashboard.tambahbuku');
    }
    public function tambahvideo()
    {
        return view('admin.dashboard.tambahvideo');
    }
    public function editbuku(Book $book, $id)
    {
        $book = Book::find($id);
        return view('admin.dashboard.editbuku', compact('book'));
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
