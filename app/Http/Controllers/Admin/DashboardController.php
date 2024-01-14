<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Video;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{

    private $data = [];

    // method untuk halaman index
    public function index()
    {
        if(Auth::user()->role === 'admin') {
            
            $totalBook = Book::count();
            $totalUser= User::where('role', 'user')->count();
            $totalPinjam = Transaction::where('status', 'dipinjam')->count();
            $totalDikembalikan =Transaction::where('status', 'dikembalikan')->count();

            $transactions = Transaction::all();

            foreach($transactions as $transaction) {
                $batasPengembalian = Carbon::createFromFormat('d/m/Y', $transaction->batas_pengembalian);

                if ($batasPengembalian->isPast()) {
                    Transaction::where('id', $transaction->id)->update([
                     'denda' => 5000
                    ]);
                }

            }

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
        $books = Book::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.dashboard.books', compact('books'));
    }
    public function video()
    {
        $videos = Video::orderBy('created_at', 'DESC')->paginate(5);
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
        $users = User::where('role', 'user')->paginate(5);
        return view('admin.dashboard.keanggotaan', compact('users'));
    }
    public function peminjam()
    {
        $transactions = Transaction::orderBy('created_at')->paginate(5);
        return view('admin.dashboard.peminjam', compact('transactions'));
    }
    public function pelaporan()
    {
        return view('admin.dashboard.pelaporan');
    }

    public function getDataChartAdmin()
    {
        $monthsArray = Carbon::now()->startOfYear()->monthsUntil(Carbon::now()->endOfYear())->toArray();

        $bukuBelumDikembalikan = collect($monthsArray)->map(function ($date) {
            return Transaction::where('status', 'dipinjam')
                ->whereMonth('created_at', $date)
                ->where('batas_pengembalian', '<', now()->format('m/d/Y'))
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
    public function editpinjaman($id)
    {
        $data = Transaction::find($id);
        return view('admin.dashboard.editpinjaman', compact('data'));
    }

    public function updatePinjaman(Request $request, $id)
    {
        $validateData = $request->validate([
            'status' => 'string',
            'tanggal_pengembalian' => 'nullable|string'
        ]);


        Transaction::where('id', $id)->update($validateData);
        

        $transaction = Transaction::where('id', $id)->first();
        if($validateData['status'] === 'dipinjam') {
            $newStock = $transaction->book->stock - 1;
            Book::where('id', $transaction->book->id)->update([
                'stock' => $newStock
            ]);
        }

        if($validateData['status'] === 'dikembalikan') {
            $newStock = $transaction->book->stock + 1;
            Book::where('id', $transaction->book->id)->update([
                'stock' => $newStock
            ]);
        }


        return redirect()->back()->with('sukses', true);

    }

    public function generatePDFPinjaman(Request $request)
    {

        $transactions = Transaction::whereBetween('batas_pengembalian', [$request->tanggal_peminjaman, $request->batas_pengembalian])->get();
        $total_denda = $transactions->sum('denda');

        $data = [
           'pinjaman' => $transactions,
           'total_denda' => $total_denda
        ];


        $pdf = Pdf::loadView('admin.dashboard.template-pinjaman', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('pinjaman.pdf');
    }

    public function searchBook(Request $request)
    {
        if($request->ajax()) {

            $books = Book::where('judul', 'LIKE', '%' . $request->search . '%')
                   ->whereHas('category')
                   ->with('category') // Eager load the category relationship
                   ->get();


            return Response()->json($books);

        }

    }

    public function searchVideo(Request $request)
    {
        if($request->ajax()) {

            $videos = Video::where('judul', 'LIKE', '%' . $request->search . '%')
                   ->whereHas('user')
                   ->with('user') // Eager load the category relationship
                   ->get();


            return Response()->json($videos);

        }

    }

    public function searchPeminjam(Request $request)
    {
        if($request->ajax()) {

            $peminjam = Transaction::whereHas('user', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            })
                ->with(['user', 'book']) // Eager load both user and book relationships
                ->get();
                
            return Response()->json($peminjam);

        }

    }

    public function searchUser(Request $request)
    {
        if($request->ajax()) {

            $users = User::where('role', 'user')->where('name', 'LIKE', '%' . $request->search . '%')
                   ->get();


            return Response()->json($users);

        }

    }

}
