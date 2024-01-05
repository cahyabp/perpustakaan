@extends('layouts.users', ['title' => 'Dashboard - User'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6 px-10">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
            <h1 class="text-4xl font-bold text-black pb-6">Koleksi Buku</h1>
            <div class="flex items-center gap-12 flex-column">
                <span class="">Total buku: {{ $totalBook }}</span>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div
                        class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center p-2 ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block pl-7 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for books">
                </div>
            </div>
        </div>

        @if($bukuMelewatiMasaPengembalian->count() > 0)
        @foreach($bukuMelewatiMasaPengembalian as $item)
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Peringatan!!</span> Buku <strong> {{ $item->book->judul }}</strong> Telah Melewati
            Batas
            Pengembalian
        </div>
        @endforeach
        @endif

        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($books as $book)
            <div
                class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img src="{{ $book->image }}" alt="">
                <a href="/users/detailbuku/{{ $book->id }}">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        {{ $book->judul }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Tanggal Post: {{ $book->created_at }}</p>
                <button type="button"
                    class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    {{ $book->penerbit }}
                </button>
                <button type="button"
                    class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    {{ $book->created_at->format('Y') }}
                </button>
                <button type="button"
                    class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    {{ $book->stock }}
                </button>
                {{ $book->category->nama_kategori }}
            </div>
            @endforeach
        </div>


    </main>
</div>
@endsection