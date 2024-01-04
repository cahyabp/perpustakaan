@extends('layouts.app', ['title' => 'Dashboard - Admin'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Edit Buku</h1>
        
        <form>
            <div class="mb-6">
                <label for="judul_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                <input type="text" id="judul_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul Buku" required>
            </div>
            <div class="mb-6">
                <label for="kode_tempat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Tempat</label>
                <input type="text" id="kode_tempat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Kode Tempat" required>
            </div>
            <div class="mb-6">
                <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                <input type="text" id="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jumlah Buku" required>
            </div>
            <div class="mb-6">
                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <input type="text" id="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Kategori Buku" required>
            </div>
            <div class="mb-6">
                <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                <input type="text" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Penulis" required>
            </div>
            <div class="mb-6">
                <label for="abstrak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Abstrak</label>
                <input type="text" id="abstrak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abstrak" required>
            </div>
            <div class="mb-6">
                <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
                <input type="text" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tahun Terbit Buku" required>
            </div>
            <div class="mb-6">
                <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                <input type="text" id="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ISBN" required>
            </div>
            <div class="mb-6">
                <label for="sumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber</label>
                <input type="text" id="sumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sumber Buku" required>
            </div>
            <div class="mb-6">
                <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                <input type="text" id="penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Penulis Buku" required>
            </div>
            <div class="mb-6">
                <label for="sampul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sampul</label>
                <div class="flex items-center">
                    <img class="rounded w-36 h-36 pr-3" src="/docs/images/people/profile-picture-5.jpg" alt="Extra large avatar">
                    <div class="relative">
                        <input class="block w-2/3 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                        <button type="button" class="absolute top-0 right-0 px-2 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Upload</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
        </form>

    </main>
    
    {{-- <footer class="w-full bg-white text-gray-600 text-left p-4">
        Copyright © Your Website 2023
    </footer> --}}
</div>
@endsection