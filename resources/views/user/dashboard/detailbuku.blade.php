@extends('layouts.users', ['title' => 'Dashboard - User'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6 px-10">
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
            <h1 class="text-4xl font-bold text-black pb-6">Detail Buku</h1>
        </div>
    {{ $book->judul }}
    <h1>
        Category: {{ $book->category->nama_kategori }}
    </h1>
    <img src="{{ $book->image }}" alt="">
    </main>
</div>
@endsection

