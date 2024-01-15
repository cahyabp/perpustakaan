@extends('layouts.app', ['title' => 'Dashboard - Buku'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        @if(Session::get('sukses'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Success </span> Anggota Berhasil Dihapus
        </div>
        @endif
        <h1 class="text-3xl text-black pb-6">Keanggotaan</h1>

        <h2 class="text-2xl text-gray-500 pb-2"> Data Anggota</h2>

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
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody id="defaultUser">
                    @foreach($users as $index => $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $item->avatar) }}" class="w-36" alt="">
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->role }} </td>
                        <td class="flex items-center px-6 py-4">
                            <form action="{{ route('admindeleteAnggota', ['id' => $item->id]) }}" method="POST">
                                @method('POST')
                                @csrf
                                <button
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tbody id="searchUser"></tbody>
            </table>
            <div class="p-3" id="pagination">
                {{ $users->links() }}
            </div>
        </div>


    </main>

    {{-- <footer class="w-full bg-white text-gray-600 text-left p-4">
        Copyright © Your Website 2023
    </footer> --}}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var currentHost = window.location.origin;
    $('#search').on('keyup', function() {
        $value = $(this).val();


        if ($value === '') {
            $('#defaultUser').show()
            $('#searchUser').hide()
            $('#pagination').show()
        } else {
            $('#defaultUser').hide()
            $('#searchUser').show()
            $('#pagination').hide()
        }

        $.ajax({
            type: 'GET',
            url: `{{ route('adminsearchUser') }}`,
            data: {
                'search': $value
            },
            success: function(data) {
                var card = '';

                if (data.length === 0) {
                    return $('#searchUser').html('<h1>Not Found</h1>');
                }

                $.each(data, function(index, item) {
                    card += `
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ${index + 1}
                        </th>
                        <td class="px-6 py-4">
                            <img src="${currentHost}/storage/${item.avatar}" class="w-36" alt="">
                        </td>
                        <td class="px-6 py-4">
                        ${item.name}  
                        </td>
                        <td class="px-6 py-4">
                         ${item.role}  
                             </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="#"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                        </td>
                    </tr>`
                })

                $('#searchUser').html(card);

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