@extends('layouts.app', ['title' => 'Dashboard - Admin'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        @if(Session::get('sukses'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Sukses!!</span> Video Berhasil Di Tambahkan
        </div>
        @endif
        <h1 class="text-3xl text-black pb-6">Tambah Video</h1>

        <form action="{{ route('admincreateVideo') }}" method="POST">
            @method('POST')
            @csrf
            <div class="mb-6">
                <label for="judul_video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                    Video</label>
                <input type="text" id="judul_video"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Judul Video" required name="judul">
            </div>
            <div class="mb-6">
                <label for="penerbit"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                <input type="text" id="author"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="author" required name="author">
            </div>
            <div class="mb-6">
                <label for="penerbit"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                <input type="text" id="penerbit"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Penerbit" required name="penerbit">
            </div>
            <div class="mb-6">
                <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                    Terbit</label>
                <input type="text" id="tahun_terbit"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Tahun Terbit" required name="tahun_terbit">
            </div>
            <div class="mb-6">
                <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
                <input type="text" id="url"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="URL Video" required name="url">
            </div>
            <div class="mb-6" id="previewVideoWrapper">
                <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preview
                    Video</label>
                <iframe width="300" height="150" id="videoPreview" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
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
        $('#previewVideoWrapper').hide();

        function previewVideo() {
            let url = $('#url').val()

            var videoId = url.split('/').pop();

            var embedUrl = "https://www.youtube.com/embed/" + videoId;

            if (url.includes('?')) {
                embedUrl += '?' + url.split('?')[1];
            }

            $('#previewVideoWrapper').show();
            $('#videoPreview').attr('src', embedUrl);
        }

        $('#url').change(function() {
            previewVideo();
        });
    });
</script>
@endsection