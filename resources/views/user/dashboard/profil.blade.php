@extends('layouts.users', ['title' => 'Dashboard - User'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full min-h-screen flex-grow p-6 px-10">
        @if(Session::get('sukses'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Sukses</span> Berhasil Update Profile
        </div>
        @endif
        <div
            class="flex items-center justify-between flex-column md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
            <h1 class="text-4xl font-bold text-black pb-6">Profil Saya</h1>
        </div>

        <!-- Bagian Kanan: Tabel Data Diri -->
        <div class="flex-grow md:ml-4">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-md p-6">
                <h3 class="text-4xl font-bold text-black pb-6">Profil Settings</h3>
                <!-- Tampilkan informasi profil dalam tabel -->
                <form method="POST" action="{{ route('usersupdateProfile') }}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="mb-6">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile</label>

                        @if($user->avatar)
                        <img class="rounded-full w-44 h-44 object-cover" id='imagePreview'
                            src="{{ asset('storage/' . $user->avatar) }}" alt="image description">
                        @else
                        <img class="rounded-full w-44 h-44 object-cover" id='imagePreview'
                            src="https://picsum.photos/200" alt="image description">
                        @endif

                        <input type="file" id="imageInput" name="avatar" accept="image/*" class="mb-2 mt-3">
                    </div>
                    <div class="mb-6">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" id="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama" readonly value="{{ $user->name }}">
                    </div>
                    <div class="mb-6">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Email" required readonly value="{{ $user->email }}">
                    </div>
                    <div class="mb-6">
                        <label for="nis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                        <input type="text" id="nis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="NIS" name="nis" required value="{{ $user->nis }}">
                    </div>
                    <div class="mb-6">
                        <label for="jenis_kelamin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Jenis
                            Kelamin</label>
                        <select id="jenis_kelamin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if($user->jenis_kelamin)
                            <option selected value="{{$user->jenis_kelamin}}">{{ $user->jenis_kelamin }}</option>
                            @endif
                            <option value="laki - laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input type="text" id="alamat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Alamat" name="alamat" required value="{{ $user->alamat }}">
                    </div>
                    <div class="mb-6">
                        <label for="tanggal_lahir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Lahir</label>

                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 ml-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 pl-10"
                                name="tanggal_lahir" value="{{ $user->tanggal_lahir }}" placeholder="Select date">
                        </div>

                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>
            </div>
        </div>
</div>
</main>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to handle image preview
        function previewImage(input) {
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
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

{{-- action="{{ route('upload-photo') }}" --}}