<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
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
    public function buku()
    {
        $books = Book::orderBy('created_at', 'DESC')->get();
        $totalBook = Book::count();

        $transactionsWithBooks = Transaction::with('book')
            ->where('user_id', Auth::user()->id)
            ->where('status', 'dipinjam')
            ->get();


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

        return view('user.dashboard.buku', compact('books', 'totalBook', 'bukuMelewatiMasaPengembalian'));
    }
    public function riwayat()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);
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


        return view('user.dashboard.detailbuku', compact('book', 'cartFull', 'bukuBelumDikembalikan'));
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

    public function searchRiwayat(Request $request)
    {
        if($request->ajax()) {

            $riwayat = Transaction::whereHas('book', function ($query) use ($request) {
                $query->where('judul', 'LIKE', '%' . $request->search . '%');
            })
                ->with('book') // Eager load the book relationship
                ->get();



            return Response()->json($riwayat);

        }

    }



}
