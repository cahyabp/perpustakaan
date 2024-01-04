<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="description" content="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: Karla; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla">
    <nav class="bg-white w-screen border-gray-200 dark:bg-gray-900">
        <div class="w-full flex flex-wrap items-center justify-between mx-auto p-4">
            <a class="flex items-center pl-3 space-x-3 rtl:space-x-reverse">
                <img src="https://static.schoolmedia.id/assets/socmed/NI/photo/profil-smkn1tanon.png" class="h-8" alt="SMKN1Tanon Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SMK N 1 Tanon</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full pr-5 md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="/users/beranda" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="/users/video" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Video</a>
                    </li>
                    <li>
                        <a href="/users/buku" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Buku</a>
                    </li>
                    <li>
                        <a href="/users/riwayat" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Riwayat</a>
                    </li>
                    <li>
                        <a href="/users/profil" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profil Saya</a>
                    </li>
                    <li>
                        <a href="/users/profil" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            <svg viewBox="0 0 24 24" width='24' height='24' fill="#000" xmlns="http://www.w3.org/2000/svg" stroke="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier"> 
                                    <path d="M17.7778 16.4066C18.1725 16.2808 18.3904 15.8588 18.2646 15.4642C18.1388 15.0696 17.7168 14.8516 17.3222 14.9774L17.7778 16.4066ZM11.6797 15.9343C11.2657 15.9455 10.9391 16.2902 10.9503 16.7043C10.9615 17.1183 11.3062 17.4449 11.7203 17.4337L11.6797 15.9343ZM16.876 16.0131C17.0578 16.3853 17.5068 16.5397 17.8791 16.358C18.2513 16.1762 18.4057 15.7272 18.224 15.3549L16.876 16.0131ZM16.9104 14.374L16.2225 14.6728C16.2269 14.683 16.2316 14.6931 16.2364 14.7031L16.9104 14.374ZM15.9422 10.806L16.6868 10.7157C16.6855 10.7048 16.6839 10.694 16.6821 10.6832L15.9422 10.806ZM11.7068 5.941C11.2926 5.941 10.9568 6.27679 10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441V5.941ZM11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691C12.4568 6.27679 12.121 5.941 11.7068 5.941V7.441ZM7.45778 10.807L6.71795 10.6839C6.71614 10.6948 6.71457 10.7057 6.71325 10.7166L7.45778 10.807ZM6.48961 14.374L7.16357 14.7031C7.16843 14.6931 7.17308 14.683 7.1775 14.6728L6.48961 14.374ZM5.17605 15.3549C4.99431 15.7272 5.14873 16.1762 5.52095 16.358C5.89317 16.5397 6.34223 16.3853 6.52397 16.0131L5.17605 15.3549ZM10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691H10.9568ZM12.4568 5C12.4568 4.58579 12.121 4.25 11.7068 4.25C11.2926 4.25 10.9568 4.58579 10.9568 5H12.4568ZM10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691H10.9568ZM12.4568 5C12.4568 4.58579 12.121 4.25 11.7068 4.25C11.2926 4.25 10.9568 4.58579 10.9568 5H12.4568ZM6.07781 14.9774C5.68317 14.8516 5.26125 15.0696 5.13544 15.4642C5.00963 15.8588 5.22756 16.2808 5.6222 16.4066L6.07781 14.9774ZM11.6797 17.4337C12.0938 17.4449 12.4385 17.1183 12.4497 16.7043C12.4609 16.2902 12.1343 15.9455 11.7203 15.9343L11.6797 17.4337ZM10.5 16.523C10.5 16.1088 10.1642 15.773 9.75001 15.773C9.33579 15.773 9.00001 16.1088 9.00001 16.523H10.5ZM14.4049 16.523C14.4049 16.1088 14.0691 15.773 13.6549 15.773C13.2407 15.773 12.9049 16.1088 12.9049 16.523H14.4049ZM17.3222 14.9774C15.4929 15.5606 13.5943 15.8825 11.6797 15.9343L11.7203 17.4337C13.7761 17.3782 15.8144 17.0325 17.7778 16.4066L17.3222 14.9774ZM18.224 15.3549L17.5844 14.0449L16.2364 14.7031L16.876 16.0131L18.224 15.3549ZM17.5983 14.0752C17.1347 13.008 16.8275 11.8759 16.6868 10.7157L15.1977 10.8963C15.3558 12.1997 15.701 13.4723 16.2225 14.6728L17.5983 14.0752ZM16.6821 10.6832C16.4696 9.40313 16.017 8.21501 15.1948 7.33897C14.3526 6.44171 13.1869 5.941 11.7068 5.941V7.441C12.8193 7.441 13.5729 7.80279 14.1011 8.36553C14.6492 8.94949 15.0181 9.81887 15.2024 10.9288L16.6821 10.6832ZM11.7068 5.941C10.2266 5.941 9.05835 6.44146 8.21321 7.33789C7.38755 8.21366 6.93123 9.40201 6.71795 10.6839L8.19761 10.9301C8.38214 9.82099 8.75359 8.95134 9.30463 8.36686C9.83619 7.80304 10.5936 7.441 11.7068 7.441V5.941ZM6.71325 10.7166C6.57244 11.8765 6.26519 13.0083 5.80171 14.0752L7.1775 14.6728C7.69888 13.4727 8.04413 12.2004 8.20232 10.8974L6.71325 10.7166ZM5.81565 14.0449L5.17605 15.3549L6.52397 16.0131L7.16357 14.7031L5.81565 14.0449ZM12.4568 6.691V5H10.9568V6.691H12.4568ZM12.4568 6.691V5H10.9568V6.691H12.4568ZM5.6222 16.4066C7.58558 17.0325 9.62394 17.3782 11.6797 17.4337L11.7203 15.9343C9.80576 15.8825 7.90713 15.5606 6.07781 14.9774L5.6222 16.4066ZM9.00001 16.523V17.023H10.5V16.523H9.00001ZM9.00001 17.023C9.00001 18.5252 10.1921 19.7755 11.7024 19.7755V18.2755C11.0561 18.2755 10.5 17.7327 10.5 17.023H9.00001ZM11.7024 19.7755C13.2127 19.7755 14.4049 18.5252 14.4049 17.023H12.9049C12.9049 17.7327 12.3487 18.2755 11.7024 18.2755V19.7755ZM14.4049 17.023V16.523H12.9049V17.023H14.4049Z" fill="#000000"></path> </g>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="/users/keranjang" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            <svg viewBox="0 0 24 24" width='24' height='24' fill="#000" xmlns="http://www.w3.org/2000/svg" stroke="#b8b8b8">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier"> 
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C10.4508 4 9.0799 5.00309 8.61115 6.47966L7.81104 9H8.49995H15.5H16.1889L15.3888 6.47966C14.92 5.00309 13.5491 4 12 4ZM18.2872 9L17.295 5.8745C16.5626 3.56734 14.4206 2 12 2C9.57933 2 7.43733 3.56734 6.7049 5.8745L5.71268 9H3.34789C2.00585 9 1.04464 10.2956 1.43384 11.58L2.55808 15.29L3.94596 19.87C4.32928 21.135 5.49529 22 6.81704 22H9.99995H14H17.1829C18.5046 22 19.6706 21.135 20.0539 19.87L21.4418 15.29L22.5661 11.58C22.9553 10.2956 21.9941 9 20.652 9H18.2872ZM6.4444 11H3.34789L4.25698 14H8.03615L7.62706 11H6.4444ZM9.64557 11L10.0547 14H13.9452L14.3543 11H9.64557ZM16.3728 11L15.9638 14H19.7429L20.652 11H17.5555H16.3728ZM19.1369 16H15.691L15.1456 20H17.1829C17.6235 20 18.0121 19.7117 18.1399 19.29L19.1369 16ZM13.1271 20L13.6725 16H10.3274L10.8728 20H13.1271ZM8.85434 20L8.30888 16H4.86304L5.86001 19.29C5.98778 19.7117 6.37646 20 6.81704 20H8.85434Z" fill="#000000"></path> </g>
                            </svg>
                        </a>
                    </li>
                    <div class="flex items-center nav-item">
                        <i class="fas fa-sign-out-alt"></i>
                        <form method="POST" action='/admin/logout'>
                            @method('POST')
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm focus:outline-none items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg text-sm px-3 py-2 me-2 mb-2 ml-auto dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Logout</button>
                        </form>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    

    {{-- <section class="bg-center bg-no-repeat bg-[url('https://smkn1tanon.sch.id/storage/smkn1tanon.sch.id/slide/usyhx1613965161.png')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Selamat Datang di E-Perpustakaan</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
        </div>
    </section> --}}


    <footer class="bg-white w-full text-center shadow dark:bg-gray-900">
        <div class="mx-auto p-2 md:py-8">
            <span class="block text-sm text-gray-500 dark:text-gray-400">© 2023 <a href="https://smkn1tanon.sch.id/" class="hover:underline">SMKN1Tanon™</a>. All Rights Reserved.</span>
        </div>
    </footer>
  
</body>
</html>