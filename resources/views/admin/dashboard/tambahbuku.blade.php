@extends('layouts.app', ['title' => 'Dashboard - Admin'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col mb-5">

    <main class="w-full h-screen flex-grow p-6">
        @if(Session::get('sukses'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Sukses!!</span> Buku Berhasil Di Tambahkan
        </div>
        @endif
        <h1 class="text-3xl text-black pb-6">Tambah Buku</h1>

        <form method="POST" action="{{ route('admincreateBook') }}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="mb-6">
                <label for="judul_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                    Buku</label>
                <input type="text" id="judul_buku"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Judul Buku" required name="judul">
            </div>
            <div class="mb-6">
                <label for="kode_tempat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                    Tempat</label>
                <input type="text" id="kode_tempat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Kode Tempat" required name="kode_tempat">
            </div>
            <div class="mb-6">
                <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                <input type="text" id="stok"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Jumlah Buku" required name="stock">
            </div>
            <div class="mb-6">
                <label for="kategori"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select id="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="category_id">
                    <option selected>Pilih Kategori</option>
                    @foreach($categories as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama_kategori }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="penulis"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                <input type="text" id="penulis"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama Penulis" required name="penulis">
            </div>
            <div class="mb-6">

                <label for="uraian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uraian</label>
                <textarea id="uraian" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..." name="uraian"></textarea>

            </div>
            <div class="mb-6">
                <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                    Terbit</label>
                <input type="number" max4 id="tahun_terbit"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Tahun Terbit Buku" required name="tahun_terbit">
            </div>
            <div class="mb-6">
                <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                <input type="text" id="isbn"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="ISBN" required name="isbn">
            </div>
            <div class="mb-6">
                <label for="sumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber</label>
                <input type="text" id="sumber"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Sumber Buku" required name="sumber">
            </div>
            <div class="mb-6">
                <label for="penerbit"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                <input type="text" id="penerbit"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Penulis Buku" required name="penerbit">
            </div>
            <div class="mb-6 flex flex-col ">
                <label for="sampul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sampul</label>
                <div class="flex items-start flex-col " style="width: 300px;">
                    <img class="rounded w-36 h-36 pr-3" id="imagePreview" alt="Sampul Buku">
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mt-3"
                        id="imageInput" type="file" name="image" accept="image/*" required>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
        </form>

    </main>

    {{-- <footer class="w-full bg-white text-gray-600 text-left p-4">
        Copyright © Your Website 2023
    </footer> --}}
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#imagePreview').hide();
        // Function to handle image preview
        function previewImage(input) {
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagePreview').show()
                    $('#imagePreview').attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            }
        }

        // Attach change event listener to the file input
        $('#imageInput').change(function() {
            previewImage(this);
        });
    });
</script>
@endsection