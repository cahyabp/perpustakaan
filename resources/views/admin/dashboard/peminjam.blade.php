@extends('layouts.app', ['title' => 'Dashboard - Buku'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Data Peminjaman Buku</h1>

        <h2 class="text-2xl text-gray-500 pb-2"> Data Peminjaman</h2>

        <div>
            <form action="{{ route('adminexportPinjaman') }}" method="POST">
                @method('POST')
                @csrf
                <div date-rangepicker class="flex items-center pb-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center pl-2 ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input name="tanggal_peminjaman" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 pl-7  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="tanggal peminjaman" required autocomplete="off">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative pr-4">
                        <div class="absolute inset-y-0 start-0 flex items-center pl-2 ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input name="batas_pengembalian" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 pl-7  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="tanggal pengembalian" autocomplete="off">
                    </div>

                    <button type="submit"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cetak</button>
            </form>
        </div>
</div>


<button id="tambahPeminjaman" type="button"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path d="M7 12L12 12M12 12L17 12M12 12V7M12 12L12 17" stroke="#ffffff" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </svg>
    Tambah Peminjaman
</button>
<script>
    // Ambil elemen tombol menggunakan ID
    var tambahPeminjaman = document.getElementById('tambahPeminjaman');

    // Tambahkan event listener untuk menanggapi klik tombol
    tambahPeminjaman.addEventListener('click', function() {
        // Arahkan pengguna ke halaman tambah buku dengan Laravel URL
        window.location.href = '{{ url(' / admin / tambahpeminjaman ') }}';
    });
</script>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div
        class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 gap-2 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate
                            account</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                        User</a>
                </div>
            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center p-2 ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="search"
                class="block pl-7 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Anggota
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul Buku
                </th>
                <th scope="col" class="px-6 py-3">
                    NIS
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
                    Kode
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody id="defaultPeminjam">
            @foreach($transactions as $index => $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $index + 1 }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->book->judul }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->user->nis }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->tanggal_peminjaman}}
                </td>
                <td class="px-6 py-4">
                    {{ $item->batas_pengembalian}}
                </td>
                <td class="px-6 py-4">
                    {{ $item->tanggal_pengembalian}}
                </td>
                <td class="px-6 py-4">
                    Rp. {{ number_format($item->denda,0,0)}}
                </td>
                <td class="px-6 py-4">
                    {{ $item->book->kode_tempat }}
                </td>
                <td class="px-6 py-4">
                    @if($item->status === 'dikembalikan')
                    <span
                        class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                        <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                        DiKembalikan
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
                    <a href="/admin/editpinjaman/{{$item->id}}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tbody id="searchPeminjam"></tbody>
    </table>
    <div class="p-3" id="pagination">
        {{ $transactions->links() }}
    </div>
</div>


</main>

{{-- <footer class="w-full bg-white text-gray-600 text-left p-4">
    Copyright © Your Website 2023
</footer> --}}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $('#search').on('keyup', function() {
        $value = $(this).val();


        if ($value === '') {
            $('#defaultPeminjam').show()
            $('#searchPeminjam').hide()
            $('#pagination').show()
        } else {
            $('#defaultPeminjam').hide()
            $('#searchPeminjam').show()
            $('#pagination').hide()
        }

        $.ajax({
            type: 'GET',
            url: `{{ route('adminsearchPeminjam') }}`,
            data: {
                'search': $value
            },
            success: function(data) {
                var card = '';

                if (data.length === 0) {
                    return $('#searchPeminjam').html('<h1>Not Found</h1>');
                }

                $.each(data, function(index, item) {
                    card += `
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    ${index + 1}
                </th>
                <td class="px-6 py-4">
                    ${item.user.name}
                </td>
                <td class="px-6 py-4">
                     ${item.book.judul}
                </td>
                <td class="px-6 py-4">
                     ${item.user.nis}
                </td>
                <td class="px-6 py-4">
                     ${item.tanggal_peminjaman}
                </td>
                <td class="px-6 py-4">
                      ${item.batas_pengembalian}
                </td>
                <td class="px-6 py-4">
                     ${item.tanggal_pengembalian ? item.tanggal_pengembalian : '-'}
                </td>
                <td class="px-6 py-4">
                    Rp.   ${item.denda}
                </td>
                <td class="px-6 py-4">
                    ${item.book.kode_tempat}
                </td>
                <td class="px-6 py-4">
                    @if($item->status === 'dikembalikan')
                    <span
                        class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                        <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                        DiKembalikan
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
                    <a href="/admin/editpinjaman/${item.id}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                </td>
            </tr>`
                })

                $('#searchPeminjam').html(card);

            }
        })
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
@endsection