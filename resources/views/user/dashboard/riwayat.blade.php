@extends('layouts.users', ['title' => 'Dashboard - User'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6 px-10">
        <h1 class="text-4xl font-bold text-black pb-6">Riwayat Saya</h1>

        <div class="relative overflow-x-auto pt-2">
            <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
                <button type="button"
                    class="bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <div class="flex gap-4 py-2 px-3 rounded-md text-white">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 16">
                            <path
                                d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                            <path
                                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                        </svg>
                        <p class="font-semibold">Pesan</p>
                    </div>
                </button>
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
                        placeholder="Search for users">
                </div>
            </div>
            <table
                class="w-full text-sm text-left shadow-md rounded-lg rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judul Buku
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Peminjaman
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Batas Pengembalian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Pengembalian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Denda
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $index => $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->book->judul }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->tanggal_peminjaman }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->batas_pengembalian }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->tanggal_pengembalian }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->denda }}
                        </td>
                        <td class="px-6 py-4">
                            @if($item->status === 'dikembalikan')
                            <span
                                class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                Dikembalikan
                            </span>
                            @elseif($item->status === 'dipinjam')
                            <span
                                class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                Dipinjam
                            </span>
                            @else
                            <span
                                class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                Menunggu Konfirmasi
                            </span>
                            @endif
                        </td>
                        <td class="flex items-center px-6 py-4">
                            Generate
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5">
                {{ $transactions->links() }}
            </div>
        </div>

    </main>
</div>
@endsection