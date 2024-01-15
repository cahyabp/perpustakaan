@extends('layouts.app', ['title' => 'Dashboard - Buku'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        @if(Session::get('sukses'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Success </span> Video Berhasil Dihapus
        </div>
        @endif
        <h1 class="text-3xl text-black pb-6">Video</h1>

        <h2 class="text-2xl text-gray-500 pb-2"> Data Video</h2>
        <button id="tambahVideoBtn" type="button"
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
            Tambah Video
        </button>
        <script>
            // Ambil elemen tombol menggunakan ID
            var tambahVideoBtn = document.getElementById('tambahVideoBtn');

            // Tambahkan event listener untuk menanggapi klik tombol
            tambahVideoBtn.addEventListener('click', function() {
                // Arahkan pengguna ke halaman tambah buku dengan Laravel URL
                window.location.href = '/admin/tambahvideo';
            });
        </script>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div
                class="flex items-center justify-end flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
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
                    <input type="text" id="search"
                        class="block pl-7 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for videos">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Video
                        </th>
                        <th scope="col" class="px-6 py-3">
                            URL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judul Video
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Penerbit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tahun Terbit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody id="defaultVideo">
                    @foreach($videos as $index => $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            <iframe width="300" height="150" src=" {{ $item->url }}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->url }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->judul }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->penerbit }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->tahun_terbit }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="/admin/editvideo/{{$item->id}}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('admindeleteVideo', ['id' => $item->id]) }}" method="POST">
                                @method('POST')
                                @csrf
                                <button
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tbody id="searchVideo"></tbody>
            </table>
            <div class="p-3" id="pagination">
                {{ $videos->links() }}
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
            $('#defaultVideo').show()
            $('#searchVideo').hide()
            $('#pagination').show()
        } else {
            $('#defaultVideo').hide()
            $('#searchVideo').show()
            $('#pagination').hide()
        }

        $.ajax({
            type: 'GET',
            url: `{{ route('userssearchVideo') }}`,
            data: {
                'search': $value
            },
            success: function(data) {
                var card = '';

                if (data.length === 0) {
                    return $('#searchVideo').html('<h1>Not Found</h1>');
                }

                $.each(data, function(index, item) {
                    card += `
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ${index + 1}
                        </th>
                        <td class="px-6 py-4">
                            <iframe width="300" height="150" src="${item.url}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </td>
                        <td class="px-6 py-4">
                            ${item.url}
                        </td>
                        <td class="px-6 py-4">
                           ${item.judul}
                        </td>
                        <td class="px-6 py-4">
                           ${item.penerbit}
                        </td>
                        <td class="px-6 py-4">
                            ${item.tahun_terbit}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="/admin/editvideo/${item.id}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="#"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                        </td>
                    </tr>`
                })

                $('#searchVideo').html(card);

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