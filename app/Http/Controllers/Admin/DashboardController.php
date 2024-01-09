<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
        $books = Book::orderBy('created_at', 'DESC')->get();
        return view('admin.dashboard.books', compact('books'));
    }
    public function video()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view('admin.dashboard.video', compact('videos'));
    }

    public function createVideo(Request $request)
    {

        $validateData = $request->validate([
            'judul'        => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'author'       => 'required|string|max:255',
            'tahun_terbit' => 'required|string|max:4',
            'url'          => 'required|url|max:255',
        ]);

        $videoId = trim(parse_url($validateData['url'], PHP_URL_PATH), '/');
        $embedUrl = "https://www.youtube.com/embed/{$videoId}";

        if ($query = parse_url($validateData['url'], PHP_URL_QUERY)) {
            $embedUrl .= '?' . $query;
        }

        $validateData['user_id'] = Auth::user()->id;
        $validateData['url'] = $embedUrl;

        Video::create($validateData);

        return redirect()->back()->with('sukses', true);


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
        $categories = Category::all();
        return view('admin.dashboard.tambahbuku', compact('categories'));
    }

    public function createBook(Request $request)
    {
        $validateData = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:255',
            'penerbit'      => 'required|string|max:255',
            'uraian'        => 'required|string',
            'isbn'          => 'required|string|max:20',
            'stock'         => 'required|integer|min:0',
            'sumber'        => 'required|string|max:255',
            'tahun_terbit'  => 'required|string|max:4',
            'kode_tempat'   => 'required|string|max:255',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('images', 'public');
        }

        Book::create($validateData);

        return redirect()->back()->with('sukses', true);
    }

    public function tambahvideo()
    {
        return view('admin.dashboard.tambahvideo');
    }
    public function editbuku(Book $book, $id)
    {
        $book = Book::find($id);
        $categories = Category::all();

        return view('admin.dashboard.editbuku', compact('book', 'categories'));
    }

    public function editBook(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'category_id'   => 'required|exists:categories,id',
                'judul'         => 'string|max:255',
                'penulis'       => 'string|max:255',
                'penerbit'      => 'string|max:255',
                'uraian'        => 'string',
                'isbn'          => 'string|max:20',
                'stock'         => 'integer|min:0',
                'sumber'        => 'string|max:255',
                'tahun_terbit'  => 'integer',
                'kode_tempat'   => 'string|max:255',
                'image'         => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $book = Book::find($id);

            if($request->file('image')) {
                Storage::disk('public')->delete($book->image);
                $validateData['image'] = $request->file('image')->store('images', 'public');
            }

            Book::where('id', $id)->update($validateData);

            return redirect()->back()->with('sukses', true);


        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    }

    public function editvideo($id)
    {
        $video = Video::find($id);
        return view('admin.dashboard.editvideo', compact('video'));
    }

    public function edit_video(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
              'judul'        => 'required|string|max:255',
              'penerbit'     => 'required|string|max:255',
              'author'       => 'required|string|max:255',
              'tahun_terbit' => 'required|string|max:4',
              'url'          => 'required|url|max:255',
          ]);

            $videoId = trim(parse_url($validateData['url'], PHP_URL_PATH), '/');
            $embedUrl = "https://www.youtube.com/embed/{$videoId}";

            if ($query = parse_url($validateData['url'], PHP_URL_QUERY)) {
                $embedUrl .= '?' . $query;
            }

            $validateData['user_id'] = Auth::user()->id;
            $validateData['url'] = $embedUrl;

            Video::where('id', $id)->update($validateData);

            return redirect()->back()->with('sukses', true);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
   
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
