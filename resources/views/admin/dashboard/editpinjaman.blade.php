@extends('layouts.app', ['title' => 'Dashboard - Admin'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        @if(Session::get('sukses'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Sukses</span> Berhasil Update Pinjaman
        </div>
        @endif
        <h1 class="text-3xl text-black pb-6">Edit Pinjaman</h1>
        <form method="POST" action="{{ route('adminupdatePinjaman', ['id' => $data->id]) }}">
            @method('POST')
            @csrf
            <div class="mb-6">
                <label for="nama_peminjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Peminjam</label>
                <input type="text" id="nama_peminjam"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama Peminjam" readonly value="{{ $data->user->name }}">
            </div>
            <div class="mb-6">
                <label for="nama_peminjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Buku</label>
                <input type="text" id="nama_peminjam"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama Peminjam" readonly value="{{ $data->book->judul }}">
            </div>
            <div class="mb-6">
                <label for="batas_pengembalian"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas Pengembalian</label>
                <input type="text" id="batas_pengembalian"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Tanggal Kembali" readonly value="{{ $data->batas_pengembalian }}">
            </div>
            <div class="mb-6">
                <label for="denda" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Denda</label>
                <input type="text" id="denda"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="denda" readonly value="{{ $data->denda }}">
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Pengembalian</label>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 ml-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker type="text" name="tanggal_pengembalian"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 pl-10"
                        placeholder="Pilih Tanggal Pengembalian" value="{{ $data->tanggal_pengembalian }}">
                </div>

            </div>
            <div class="mb-6">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Status Peminjaman
                </label>
                <select name="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>
                        {{ $data->status }}
                    </option>
                    <option value="dipinjam">
                        DiPinjam
                    </option>
                    <option value="dikembalikan">Dikembalikan</option>
                </select>
            </div>

            <button type="submit" @if($data->status === 'dikembalikan') disabled @endif
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600
                dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
        </form>

    </main>

    {{-- <footer class="w-full bg-white text-gray-600 text-left p-4">
        Copyright © Your Website 2023
    </footer> --}}
</div>
@endsection