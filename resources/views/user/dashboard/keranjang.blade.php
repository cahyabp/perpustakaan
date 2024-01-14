@extends('layouts.users', ['title' => 'Dashboard - User'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6 px-10">
        @if(Session::get('sukses'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Sukses</span> Berhasil Menghapus Buku dari Keranjang
        </div>
        @endif
        @if(Session::get('suksesCheckout'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Sukses</span> Berhasil Pesan Buku
        </div>
        @endif
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
            <h1 class="text-4xl font-bold text-black pb-6">Keranjang Saya</h1>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $index => $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->book->judul }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->tanggal_pinjam }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->batas_pengembalian }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('usersremoveBookFromCart', ['id' => $item->id]) }}" method="POST">
                                @method('POST')
                                @csrf
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div
            class="flex items-center justify-between flex-column flex-wrap pt-4 md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
            <a href="{{ route('userscheckout') }}"
                class="bg-yellow-400 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <div class="flex gap-4 py-2 px-3 rounded-md text-white">
                    <svg viewBox="0 0 24 24" width='24' height='24' fill="#ffffff" xmlns="http://www.w3.org/2000/svg"
                        stroke="#b8b8b8">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4C10.4508 4 9.0799 5.00309 8.61115 6.47966L7.81104 9H8.49995H15.5H16.1889L15.3888 6.47966C14.92 5.00309 13.5491 4 12 4ZM18.2872 9L17.295 5.8745C16.5626 3.56734 14.4206 2 12 2C9.57933 2 7.43733 3.56734 6.7049 5.8745L5.71268 9H3.34789C2.00585 9 1.04464 10.2956 1.43384 11.58L2.55808 15.29L3.94596 19.87C4.32928 21.135 5.49529 22 6.81704 22H9.99995H14H17.1829C18.5046 22 19.6706 21.135 20.0539 19.87L21.4418 15.29L22.5661 11.58C22.9553 10.2956 21.9941 9 20.652 9H18.2872ZM6.4444 11H3.34789L4.25698 14H8.03615L7.62706 11H6.4444ZM9.64557 11L10.0547 14H13.9452L14.3543 11H9.64557ZM16.3728 11L15.9638 14H19.7429L20.652 11H17.5555H16.3728ZM19.1369 16H15.691L15.1456 20H17.1829C17.6235 20 18.0121 19.7117 18.1399 19.29L19.1369 16ZM13.1271 20L13.6725 16H10.3274L10.8728 20H13.1271ZM8.85434 20L8.30888 16H4.86304L5.86001 19.29C5.98778 19.7117 6.37646 20 6.81704 20H8.85434Z"
                                fill="#000000"></path>
                        </g>
                    </svg>
                    <p class="font-semibold">Pesan</p>
                </div>
            </a>
        </div>



    </main>
</div>
@endsection