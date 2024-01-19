@extends('layouts.users', ['title' => 'Dashboard - User'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6 px-10">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
            <h1 class="text-4xl font-bold text-black pb-6">Koleksi Buku</h1>
            <div class="flex flex-col md:flex-row items-center gap-3 md:gap-12 flex-column">
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
                    <input type="text" id="search"
                        class="block pl-7 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for books">
                </div>
            </div>
        </div>
        <div class="pb-4 flex flex-wrap">
            <a href="/users/buku"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                Semua Kategori
            </a>
            @foreach($categories as $category)
            <form>
                <input type="hidden" name="category" value="{{ $category->nama_kategori }}">
                <button type="submit"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                    {{ $category->nama_kategori }}
                </button>
            </form>
            @endforeach
        </div>

        @if(!empty($bukuMelewatiMasaPengembalian))
        @foreach($bukuMelewatiMasaPengembalian as $item)
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Peringatan!!</span> Buku <strong> {{ $item->judul }}</strong> Telah Melewati
            Batas
            Pengembalian
        </div>
        @endforeach
        @endif
        @if($pinjam2Book)
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Peringatan!!</span> Kamu Sudah Meminjam 2 Buku dan Belum Dikembalikan
        </div>
        @endif

        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5" id="defaultBook">
            @forelse($books as $book)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @if(Str::contains($book->image, 'via'))
                <img src="{{ $book->image }}" width="100%" height="300" alt="">
                @else
                <img src="{{ asset('storage/' . $book->image) }}" width="100%" height="300" alt="">
                @endif
                <div class="p-5">
                    <a href="/users/detailbuku/{{ $book->id }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $book->judul }}
                        </h5>
                    </a>
                    <table class="w-full">
                        <tr>
                            <td class="" width='30%'>
                                <p>Penerbit</p>
                            </td>
                            <td class="font-bold">
                                {{ $book->penerbit }}
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <p>Stock</p>
                            </td>
                            <td class=" font-bold">
                                {{ $book->stock }}
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <p>Kategori</p>
                            </td>
                            <td class=" font-bold">
                                {{ $book->category->nama_kategori }}
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
            @empty
            <h1>Tidak ada buku di kategori ini</h1>
            @endforelse
        </div>

        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="searchBook">
        </div>
    </main>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var currentHost = window.location.origin;
    $('#search').on('keyup', function() {
        $value = $(this).val();


        if ($value === '') {
            $('#defaultBook').show()
            $('#searchBook').hide()
        } else {
            $('#defaultBook').hide()
            $('#searchBook').show()
        }

        $.ajax({
            type: 'GET',
            url: `{{ route('userssearchBook') }}`,
            data: {
                'search': $value
            },
            success: function(data) {
                var card = '';

                if (data.length === 0) {
                    return $('#searchBook').html('<h1>Not Found</h1>');
                }

                $.each(data, function(index, item) {
                    card += `
                      <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img src="${currentHost}/storage/${item.image}" width="100%" height="300" alt="">
                <div class="p-5">
                    <a href="/users/detailbuku/${item.id}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                           ${item.judul}
                        </h5>
                    </a>
                    <table class="w-full">
                        <tr>
                            <td class="" width='30%'>
                                <p>Penerbit</p>
                            </td>
                            <td class="font-bold">
                                 ${item.penerbit}
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <p>Stock</p>
                            </td>
                            <td class=" font-bold">
                                ${item.stock}
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <p>Kategori</p>
                            </td>
                            <td class=" font-bold">
                               ${item.category.nama_kategori}
                            </td>
                        </tr>
                    </table>

                </div>
            </div>`
                })

                $('#searchBook').html(card);

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