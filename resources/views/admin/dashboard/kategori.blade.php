@extends('layouts.app', ['title' => 'Dashboard - Buku'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Kategori Buku</h1>

        <h2 class="text-2xl text-gray-500 pb-2"> Data Kategori Buku</h2>
        <button id="tambahKategoriBtn" type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M7 12L12 12M12 12L17 12M12 12V7M12 12L12 17" stroke="#ffffff" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
            Tambah Kategori
        </button>
        <script>
            // Ambil elemen tombol menggunakan ID
            var tambahKategoriBtn = document.getElementById('tambahKategoriBtn');

            // Tambahkan event listener untuk menanggapi klik tombol
            tambahKategoriBtn.addEventListener('click', function() {
                // Arahkan pengguna ke halaman tambah buku dengan Laravel URL
                window.location.href = '/admin/tambahkategori';
            });
        </script>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div
                class="flex items-center justify-end flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
                <form role="search" id="form" class="flex items-center relative">
                    <input type="search" id="query" name="q" placeholder="Search member"
                        aria-label="Search through site content"
                        class="block pl-12 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button class="absolute left-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 17L21 21" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M3 11C3 15.4183 6.58172 19 11 19C13.213 19 15.2161 18.1015 16.6644 16.6493C18.1077 15.2022 19 13.2053 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11Z"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </button>
                </form>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $index => $category)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $category->nama_kategori }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="/admin/editkategori/{{ $category->id }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <button
                                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>
                            Category Not Found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            @if($data->count() > 10)
            <div class="p-3">
                {{ $data->links() }}
            </div>
            @endif
        </div>
    </main>
</div>
@endsection