@extends('layouts.users', ['title' => 'Dashboard - User'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full min-h-screen flex-grow p-6 px-10 relative">
        @if(Session::get('sukses'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Sukses</span> Berhasil Menambahkan Buku Ke Keranjang
        </div>
        @endif
        @if($cartFull)
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
            role="alert">
            <span class="font-medium">Keranjang Buku Sudah Penuh</span> Pesan atau Hapus Buku Di Keranjang
        </div>
        @endif
        @if($bukuBelumDikembalikan->count() > 0)
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
            role="alert">
            <span class="font-medium">{{ $bukuBelumDikembalikan->count() }} Buku Belum Dikembalikan</span> Kamu Tidak
            Dapat Menambahkan Buku Ke Keranjang
        </div>
        @endif
        @if(Session::get('bukuSudahDiKeranjang'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Gagal Menambahkan</span> Buku sudah di keranjang
        </div>
        @endif
        @if($book->stock === 0)
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
            role="alert">
            <span class="font-medium">Peringatan</span> Stock Buku Kosong Tidak Dapat Dipinjam
        </div>
        @endif
        <div id="alert"></div>
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
            <h1 class="text-4xl font-bold text-black pb-6">Detail Buku</h1>
        </div>
        <div
            class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex">
            <div style="flex: 1;">
                @if(Str::contains($book->image, 'via'))
                <img src="{{ $book->image }}" width="100%" height="300" alt="">
                @else
                <img src="{{ asset('storage/' . $book->image) }}" width="100%" height="300" alt="">
                @endif
            </div>
            <div class="card-body" style="flex: 1; padding-left: 1rem;">
                <h5 class="card-title">{{ $book->judul }}</h5>
                <p class="card-text">Category: {{ $book->category->nama_kategori }}</p>
            </div>
        </div>
        <h2 class="text-2xl font-bold text-black py-3">Deskripsi Buku</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                <tbody>
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Judul Buku
                        </th>
                        <td class="px-6 py-4">
                            {{ $book->judul }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200 dark:bg-gray-900 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Penulis
                        </th>
                        <td class="px-6 py-4">
                            {{ $book->penulis }}
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Penerbit
                        </th>
                        <td class="px-6 py-4">
                            {{ $book->penerbit }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200 dark:bg-gray-900 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Tahun Terbit
                        </th>
                        <td class="px-6 py-4">
                            {{ $book->tahun_terbit }}
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Stok
                        </th>
                        <td class="px-6 py-4">
                            {{ $book->stock }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200 dark:bg-gray-900 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ISBN
                        </th>
                        <td class="px-6 py-4">
                            {{ $book->isbn }}
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Uraian
                        </th>
                        <td class="px-6 py-4">
                            {{ $book->uraian }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form id="formPinjamBuku" action="{{ route('usersaddBookToCart', ['id' => $book->id]) }}" method="POST">
            @method('POST')
            @csrf
            <div
                class="mt-5 w-full h-16 bg-gray-50 border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600 flex items-center justify-center gap-5">

                <div date-rangepicker class="flex items-center">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 ml-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input required id="tanggalPeminjaman" autocomplete="off" name="tanggal_pinjam" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 pl-10"
                            placeholder="Tanggal Peminjaman" @if($bukuBelumDikembalikan->count() > 0) disabled @endif
                        @if($cartFull) disabled @endif @if($book->stock === 0) disabled @endif>
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 ml-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input required autocomplete="off" id="batasPeminjaman" name="batas_pengembalian" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 pl-10"
                            placeholder="Batas Pengembalian" @if($bukuBelumDikembalikan->count() > 0) disabled @endif
                        @if($cartFull) disabled @endif @if($book->stock === 0) disabled @endif>
                    </div>
                </div>

                <div id="buttonSubmitPinjam" @if($bukuBelumDikembalikan->count() > 0) disabled @endif
                    @if($cartFull) disabled @elseif($pinjam2Book) disabled @endif
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none
                    focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center
                    dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Tambah
                    ke keranjang</div>
            </div>
        </form>
    </main>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#buttonSubmitPinjam").click(function() {
            console.log('test');
            validateBorrowingDates();
        });

        function validateBorrowingDates() {
            var startDate = new Date($("#tanggalPeminjaman").val());
            var endDate = new Date($("#batasPeminjaman").val());


            // Check if the dates are valid
            if (isNaN(startDate) || isNaN(endDate)) {
                alert("Invalid date format. Please use MM/DD/YYYY.");
                return;
            }

            // Calculate the difference in days
            var timeDiff = endDate - startDate;
            var dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

            // Check if the difference is greater than 10 days
            if (dayDiff > 10) {
                $('#alert').html(
                    '<div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert"> <span class="font-medium"> Peringatan </span> Maksimal meminjam buku 10 hari. </div>'
                )
            } else {
                // Perform other form submission actions here
                $('#formPinjamBuku').submit()
            }
        }
    })
</script>
@endsection