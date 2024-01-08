@extends('layouts.users', ['title' => 'Dashboard - User'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6 px-10">
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
            <h1 class="text-4xl font-bold text-black pb-6">Detail Buku</h1>
        </div>
        <div class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex">
            <div style="flex: 1;">
                <img class="card-img-top" src="{{ $book->image }}" alt="{{ $book->judul }}">
            </div>
            <div class="card-body" style="flex: 1; padding-left: 1rem;">
                <h5 class="card-title">{{ $book->judul }}</h5>
                <p class="card-text">Category: {{ $book->category->nama_kategori }}</p>
            </div>
        </div>
    {{-- {{ $book->judul }}
    <h1>
        Category: {{ $book->category->nama_kategori }}
    </h1>
    <img class="" src="{{ $book->image }}" alt=""> --}}
        
        <h2 class="text-2xl font-bold text-black py-3">Deskripsi Buku</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                <tbody>
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Judul Buku
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                    </tr>
                    <tr class="bg-gray-200 dark:bg-gray-900 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Penulis
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Penerbit
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                    </tr>
                    <tr class="bg-gray-200 dark:bg-gray-900 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Tahun Terbit
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Stok
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                    </tr>
                    <tr class="bg-gray-200 dark:bg-gray-900 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ISBN
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Uraian
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="fixed bottom-0 left-0 z-50 w-full h-16 bg-gray-50 border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600">
            <div class="grid h-full max-w-lg grid-cols-2 mx-auto font-medium items-center">                
                <div date-rangepicker class="flex items-center pr-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                    </div>
                </div>
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah ke keranjang</button>
            </div>
        </div>
    </main>
</div>
@endsection
