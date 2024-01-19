@extends('layouts.app', ['title' => 'Dashboard - Admin'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        @if(Session::get('sukses'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Sukses!!</span> Kategori Berhasil Di Update
        </div>
        @endif
        <h1 class="text-3xl text-black pb-6">Edit Kategori</h1>

        <form method="POST" action="{{ route('adminupdateCategory', ['id' => $data->id]) }}">
            @method('POST')
            @csrf
            <div class="mb-6">
                <label for="judul_video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Kategori Buku</label>
                <input type="text" id="kategori_buku"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Kategori Buku" required value="{{ $data->nama_kategori }}" name="nama_kategori">
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
        </form>

    </main>
</div>
@endsection