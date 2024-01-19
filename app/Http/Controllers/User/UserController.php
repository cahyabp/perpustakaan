<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard.index');
    }

    public function video()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view('user.dashboard.video', compact('videos'));
    }
    public function buku(Request $request)
    {
        
        $totalBook = Book::count();
        $categories = Category::all();

        $transactionsWithBooks = Transaction::with('book')
            ->where('user_id', Auth::user()->id)
            ->where('status', 'dipinjam')
            ->get();


        if($request->category) {
            $books = Book::whereHas('category', function ($query) use ($request) {
                $query->where('nama_kategori', 'LIKE', '%' . $request->category . '%');
            })
                        ->with('category')
                        ->get();

        } else {
            $books = Book::orderBy('created_at', 'DESC')->get();
        }


        $bukuMelewatiMasaPengembalian = $transactionsWithBooks->filter(function ($transaction) {
            try {
                $batasPengembalian = Carbon::createFromFormat('m/d/Y', $transaction->batas_pengembalian);
        
                return $batasPengembalian->isPast();
            } catch (\Exception $e) {
                // Handle any date format exceptions here
                return false; // If there's an exception, consider the date not past
            }
        })->map(function ($transaction) {
            return $transaction->book;
        });

        $pinjam2Book = Transaction::where('user_id', Auth::user()->id)->where('status', 'dipinjam')->count() === 2;

        return view('user.dashboard.buku', compact('books', 'totalBook', 'bukuMelewatiMasaPengembalian', 'pinjam2Book', 'categories'));
    }
    public function riwayat(Request $request)
    {
        if($request->q) {
            $transactions = Transaction::where('user_id', Auth::user()->id)->whereHas('book', function ($query) use ($request) {
                $query->where('judul', 'LIKE', '%' . $request->q . '%');
            })
            ->with('book')
            ->get();

        } else {
            $transactions = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);
        }
        
        return view('user.dashboard.riwayat', compact('transactions'));
    }
    public function profil()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('user.dashboard.profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $validator = $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Example for an image upload
            'jenis_kelamin' => 'nullable|in:laki - laki,perempuan',
            'tanggal_lahir' => 'nullable|date',
            'kelas' => 'nullable|string|max:255',
            'nis' => 'nullable|string|max:255',
            'nik' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);


        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $validator['avatar'] = $path;
        }

        User::where('id', Auth::user()->id)->update($validator);
        return redirect()->back()->with('sukses', true);
    }


    public function keranjang()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('user.dashboard.keranjang', compact('carts'));
    }

    public function removeBookFromCart($id)
    {
        Cart::where('id', $id)->delete();
        return redirect()->back()->with('sukses', true);
    }
    public function addBookToCart(Request $request, $id)
    {
        $bookInCart = Cart::where('user_id', Auth::user()->id)->where('book_id', $id)->count();
        if($bookInCart > 0) {
            return redirect()->back()->with('bukuSudahDiKeranjang', true);
        }

        
        Cart::create([
         'tanggal_pinjam' => $request->tanggal_pinjam,
         'batas_pengembalian' => $request->batas_pengembalian,
         'user_id' => Auth::user()->id,
         'book_id' => $id
        ]);
        return redirect()->back()->with('sukses', true);
    }

    public function detailbuku(Book $book, $id)
    {
        $book = Book::find($id);
        $cartFull = Cart::where('user_id', Auth::user()->id)->count() === 2;
        $bukuBelumDikembalikan = Transaction::where('user_id', Auth::user()->id)
    ->where('status', 'dipinjam')
    ->where('batas_pengembalian', '<', Carbon::now()->format('d/m/Y'))
    ->get();

        $pinjam2Book = Transaction::where('user_id', Auth::user()->id)->where('status', 'dipinjam')->count() === 2;



        return view('user.dashboard.detailbuku', compact('book', 'cartFull', 'bukuBelumDikembalikan', 'pinjam2Book'));
    }

    public function checkout()
    {
        $booksInCart = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($booksInCart as $book) {
            Transaction::create([
                'user_id' => Auth::user()->id,
                'book_id' => $book->book_id,
                'tanggal_peminjaman' => $book->tanggal_pinjam,
                'batas_pengembalian' => $book->batas_pengembalian
            ]);
        }


        Cart::where('user_id', Auth::user()->id)->delete();


        return redirect()->back()->with('suksesCheckout', true);


    }

    public function searchBook(Request $request)
    {
        if($request->ajax()) {

            $books = Book::where(function ($query) use ($request) {
                $query->where('judul', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('penerbit', 'LIKE', '%' . $request->search . '%');
            })->whereHas('category')
                    ->with('category') // Eager load the category relationship
                    ->get();




            return Response()->json($books);

        }
    }

    public function searchVideo(Request $request)
    {
        if($request->ajax()) {

            $videos = Video::where(function ($query) use ($request) {
                $query->where('judul', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('penerbit', 'LIKE', '%' . $request->search . '%');
            })->whereHas('user')
                    ->with('user') // Eager load the category relationship
                    ->get();



            return Response()->json($videos);

        }

    }
}
