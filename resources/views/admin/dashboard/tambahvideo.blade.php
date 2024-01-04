@extends('layouts.app', ['title' => 'Dashboard - Admin'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Tambah Video</h1>
        
        <form>
            <div class="mb-6">
                <label for="judul_video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Video</label>
                <input type="text" id="judul_video" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul Video" required>
            </div>
            <div class="mb-6">
                <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                <input type="text" id="penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Penerbit" required>
            </div>
            <div class="mb-6">
                <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
                <input type="text" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tahun Terbit" required>
            </div>
            <div class="mb-6">
                <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
                <input type="text" id="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="URL Video" required>
            </div>
            <div class="mb-6">
                <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Video</label>
                <div class="flex items-center">
                    <img class="rounded w-36 h-36 pr-3" src="/docs/images/people/profile-picture-5.jpg" alt="Extra large avatar">
                    <div class="relative">
                        <input class="block w-2/3 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                        <button type="button" class="absolute top-0 right-0 px-2 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Upload</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
        </form>

    </main>
    
    {{-- <footer class="w-full bg-white text-gray-600 text-left p-4">
        Copyright © Your Website 2023
    </footer> --}}
</div>
@endsection