<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{ asset('build/assets/particles.css') }}">
    
    {{-- <link rel="stylesheet" href="{{asset('build/assets/app.b21c011a.css')}}">
    <script src="{{asset('build/assets/app.d225c007.js')}}"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<style>
    .background-animate {
        background-size: 400%;

        -webkit-animation: AnimationName 3s ease infinite;
        -moz-animation: AnimationName 3s ease infinite;
        animation: AnimationName 3s ease infinite;
    }

    @keyframes AnimationName {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }
</style>

<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">

    <!-- Section 1 -->
    <section class="w-full px-6 pb-12 antialiased bg-white" data-tails-scripts="//unpkg.com/alpinejs">
        <div class="mx-auto max-w-7xl">

            <nav class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
                <div
                    class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0">
                    <div class="flex items-center justify-start w-1/4 h-full pr-4">
                        <a href="#_" class="inline-block py-4 md:py-0">
                            <img src="{{ asset('images/diesnats.png') }}" class=" inline-block py-4 md:py-0" width="100px;" alt="Diesnatalis 6th">
                            <!-- <span class="p-1 text-xl font-black leading-none text-gray-900">ID SEVENT</span> -->
                        </a>
                    </div>
                    <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                        :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
                        <div
                            class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                            <a href="#_"
                                class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">ID
                                SEVENT<span class="text-indigo-600">.</span></a>
                            <div
                                class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                                <a href="#_"
                                    class="inline-block w-full py-2 mx-0 ml-6 font-medium text-left text-[#001C99] md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Home</a>
                                <a href="#about_us"
                                    class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-[#001C99] lg:mx-3 md:text-center">Tentang
                                    Kami</a>
                                <a href="#event"
                                    class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-[#001C99] lg:mx-3 md:text-center">Acara
                                    Kami</a>
                                <a href="#contact"
                                    class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-[#001C99] lg:mx-3 md:text-center">Kontak
                                    Kami</a>
                            </div>
                                    <div
                                        class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                                        
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('competition.index') }}" class="w-full px-3 py-2 mr-0 text-gray-700 md:mr-2 lg:mr-3 md:w-auto">Competition</a>
                                @else
                                        <a href="{{ route('login') }}" class="w-full px-3 py-2 mr-0 text-gray-700 md:mr-2 lg:mr-3 md:w-auto">Sign In</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-[#001C99] md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-indigo-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600">Sign Up</a>
                                    @endif
                                @endauth
                            @endif
                                    </div>
                        </div>
                    </div>
                    <div @click="showMenu = !showMenu"
                        class="fixed right-5 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </nav>

            <div id="particles-js" class="absolute top-0 left-0">
            </div>
            <!-- Main Hero Content -->
            <div class="h-[80vh] flex items-center justify-center text-center">
                <div>
                    <h1
                        class="text-5xl font-extrabold leading-10 tracking-tight text-left text-[#DF5E08] md:text-center sm:leading-none md:text-6xl lg:text-8xl">
                        <span
                            class="relative mt-2 text-transparent py-5 bg-clip-text bg-gradient-to-br from-[#001C99] to-[#DF5E08] md:inline-block background-animate">ID
                            SEVENT</span>
                    </h1>
                    <h1
                        class="text-xl font-extrabold leading-10 tracking-tight text-left text-[#DF5E08] md:text-center sm:leading-none md:text-3xl lg:text-4xl">
                        <span
                            class="relative mt-2 text-transparent py-5 bg-clip-text bg-gradient-to-br from-[#001C99] to-[#DF5E08] md:inline-block background-animate">"Integration
                            in Dynamic of Software Engineering Event"</span>
                    </h1>
                    <div class="flex flex-col items-center mt-12 text-center">
                        <span class="relative inline-flex w-full md:w-auto">
                            <a href="#about_us" type="button"
                                class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-bold leading-6 text-white bg-indigo-600 border border-transparent rounded-full md:w-auto hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                Tentang Kami
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <!-- End Main Hero Content -->

        </div>
    </section>

    <!-- Tentang kami -->
    <section class="px-2 py-32 bg-white md:px-0" id="about_us">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-1/2 md:px-3">
                    <div
                        class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                        <h1
                            class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                            <span
                                class="block text-[#001C99] xl:inline text-transparent py-5 bg-clip-text bg-gradient-to-br from-[#001C99] to-[#DF5E08] md:inline-block background-animate">Tentang
                                Kami</span>
                        </h1>
                        <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">Sevent merupakan
                            Software Engineering Event, yang dimana terdapat berbagai rangkaian Event Software
                            Engineering seperti Diesnatalis, dalam kegiatan diesnatalis ini Software Engineering
                            memiliki beberapa macam kegiatan diantaranya terdapat kompetisi, seminar serta rangkaian
                            event lainnya yang diperuntukan untuk seluruh mahasiswa dan siswa-siswi umum di seluruh
                            indonesia khususnya Program Study Software Engineering Institut Teknologi Telkom Purwokerto.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden shadow-xl rounded-3xl">
                        <img src="https://cdn.devdojo.com/images/november2020/hero-image.jpeg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Acara kami -->
    <section class="h-auto bg-white pb-32" x-data="{ acara1: false, acara2: true, acara3: false }" id="event">
        <div class="max-w-7xl mx-auto pt-16 px-10 sm:pt-24 sm:px-6 lg:px-8 sm:text-center">
            <p
                class="mt-1 text-4xl font-extrabold text-[#001C99] sm:text-5xl sm:tracking-tight lg:text-6xl text-transparent py-5 bg-clip-text bg-gradient-to-br from-[#001C99] to-[#DF5E08] md:inline-block background-animate">
                Acara kami
            </p>
            <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-500">Diesnatalis 6th Software Engineering Institut
                Teknologi Telkom Purwokerto terdapat berbagai kompetisi dan event lainnya, diantaranya seperti kompetisi
                UI/UX, Web, kegiatan seminar nasional serta rangkaian acara lainnya yang dapat anda lihat melalui
                instagram <a href="https://instagram.com/sevent.ig" class="text-[#001C99]">sevent.ig</a>.</p>
            <div class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0">
                <button @click="acara1 = false, acara2 = true, acara3 = false, location.href = '#ui_ux_competition'"
                    class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 rounded-3xl">
                    <div class="p-3 text-white bg-[#DF5E08] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 8a3 3 0 0 1 0 6"></path>
                            <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5"></path>
                            <path
                                d="M12 8h0l4.524 -3.77a0.9 .9 0 0 1 1.476 .692v12.156a0.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-[#001C99]">UI/UX Competition</h4>
                    <p class="text-base text-center text-gray-500">Klik untuk melihat deskripsi dan cara mendaftarnya
                    </p>
                </button>

                <button @click="acara1 = false, acara2 = false, acara3 = true, location.href = '#web_competition'"
                    class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 rounded-3xl">
                    <div class="p-3 text-white bg-[#DF5E08] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                            <line x1="12" y1="12" x2="20" y2="7.5"></line>
                            <line x1="12" y1="12" x2="12" y2="21"></line>
                            <line x1="12" y1="12" x2="4" y2="7.5"></line>
                            <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-[#001C99]">Web Competition</h4>
                    <p class="text-base text-center text-gray-500">Klik untuk melihat deskripsi dan cara mendaftarnya
                    </p>
                </button>
                
                <button @click="acara1 = true, acara2 = false, acara3 = false, location.href = '#webinar'"
                    class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-100 rounded-3xl">
                    <div class="p-3 text-white bg-[#DF5E08] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5"></path>
                            <circle cx="6" cy="14" r="3"></circle>
                            <path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-[#001C99]">Seminar Hybrid</h4>
                    <p class="text-base text-center text-gray-500">Klik untuk melihat deskripsi dan cara mendaftarnya
                    </p>
                </button>
            </div>

        </div>
        <div x-show="acara1" id="webinar"
            class="box-border flex flex-col pt-12 sm:pt-24 items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">

            <!-- Image -->
            <div
                class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
                <img src="{{ asset('images/webinar.png') }}" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20 ">
            </div>

            <!-- Content -->
            <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
                <h2
                    class="text-[#001C99] m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                    Seminar Hybrid</h2>
                <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Seminar dengan tema: <br> <b class="text-[#DF5E08]">"Software Engineering for Distruptive
                        Innovation"</b></p>
                        <span class="font-bold text-xl">Coming Soon!</span>
                <p class="pt-4 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Cara pendaftaran:</p>
                    
                <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Mendaftar <a href="https://sevent.id/register"
                            class="text-[#001C99]"><b>disini</b></a> atau klik daftar pada bagian atas
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Selanjutnya kamu isi form Daftar Seminar Hybrid
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Selamat kamu berhasil mendaftarkan diri sebagai partisipan di Seminar Hybrid
                    </li>
                </ul>
            </div>
            <!-- End  Content -->
        </div>

        <div x-show="acara2" id="ui_ux_competition"
            class="box-border flex flex-col pt-12 sm:pt-24 items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">

            <!-- Image -->
            <div
                class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
                <img src="{{ asset('images/ui.png') }}" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20 ">
            </div>

            <!-- Content -->
            <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
                <h2
                    class="text-[#001C99] m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                    UI/UX Competition</h2>
                <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Tema: <br> <b class="text-[#DF5E08]">"Impact your UI/UX Desing for the Software Engineering
                        Future"</b></p>
                <p class="pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Ketentuan Peserta: <br> <b class="text-[#DF5E08]">Mahasiswa dan siswa-siswi umum di seluruh
                        Indonesia</b></p>
                <p class="pt-4 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Cara pendaftaran:</p>
                <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Mendaftar <a href="https://sevent.id/register"
                            class="text-[#001C99]"><b>disini</b></a> atau klik daftar pada bagian atas
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Mengisi formulir pendaftaran
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Membuat tim
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Melakukan pembayaran
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Menambahkan anggota tim
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Menambahkan submission lomba
                    </li>
                </ul>
            </div>
            <!-- End  Content -->
        </div>

        <div x-show="acara3" id="web_competition"
            class="box-border flex flex-col pt-12 sm:pt-24 items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">

            <!-- Image -->
            <div
                class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
                <img src="{{ asset('images/web.png') }}" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20 ">
            </div>

            <!-- Content -->
            <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
                <h2
                    class="text-[#001C99] m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                    Web Competition</h2>
                <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Tema: <br> <b class="text-[#DF5E08]">"SIDE (Software Innovative Development Engineering)"</b></p>
                <p class="pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Ketentuan Peserta: <br> <b class="text-[#DF5E08]">Mahasiswa dan siswa-siswi umum di seluruh
                        Indonesia</b></p>
                    <span class="font-bold text-xl">Pendaftaran Lomba Web Competition akan dibuka pada tanggal 1 September 2022!</span>
                <p class="pt-4 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                    Cara pendaftaran:</p>
                <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Mendaftar <a href="https://sevent.id/register"
                            class="text-[#001C99]"><b>disini</b></a> atau klik daftar pada bagian atas
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Mengisi formulir pendaftaran
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Membuat tim
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Melakukan pembayaran
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Menambahkan anggota tim
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-[#DF5E08] rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Menambahkan submission lomba
                    </li>
                </ul>
            </div>
            <!-- End  Content -->
        </div>
    </section>

    <!-- Timeline -->
    <section class="container items-center max-w-xl px-8 mx-auto xl:px-5" id="timeline">
        <div class="max-w-7xl mx-auto py-16 px-10 sm:py-24 sm:px-6 lg:px-8 sm:text-center">
            <p
                class="mt-1 text-4xl font-extrabold text-[#001C99] sm:text-5xl sm:tracking-tight lg:text-6xl text-transparent py-5 bg-clip-text bg-gradient-to-br from-[#001C99] to-[#DF5E08] md:inline-block background-animate">
                Timeline
            </p>
        </div>
        <ol class="relative border-l border-gray-200 dark:border-gray-700">
            <li class="mb-10 ml-10">
                <span
                    class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                    <svg aria-hidden="true" class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <h3 class="flex items-center mb-1 text-lg font-semibold text-[#DF5E08]">UI/UX Competition
                </h3>
                <ul>
                    <li>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Pendaftaran Lomba : 
                        15 Agustus 2022 - 5 September 2022</time>
                    </li>
                    <li>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Pengumpulan Karya : 
                        6 - 7 September 2022</time>
                    </li>
                    <li>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Presentasi Karya : 
                        8 September 2022</time>
                    </li>
                    <li>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Pengumuman Pemenang : 
                        10 September 2022</time>
                    </li>
                </ul>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">"Impact your UI/UX Desing for the
                    Software Engineering
                    Future"</p>
                {{-- <a href=""
                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                        class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                            clip-rule="evenodd"></path>
                    </svg> Download Guide Book </a> --}}
            </li>
            <li class="mb-10 ml-10">
                <span
                    class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                    <svg aria-hidden="true" class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <h3 class="flex items-center mb-1 text-lg font-semibold text-[#DF5E08]">Web Competition
                </h3>
                <ul>
                    <li>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Pendaftaran Lomba : 
                        1 September 2022 - 20 Oktober 2022</time>
                    </li>
                    <li>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Pengumpulan Karya : 
                            21 - 22 Oktober 2022</time>
                    </li>
                    <li>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Presentasi Karya : 
                        23 Oktober 2022</time>
                    </li>
                    <li>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Pengumuman Pemenang : 
                        25 Oktober 2022</time>
                    </li>
                </ul>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">"SIDE (Software Innovative
                    Development Engineering)"</p>
                {{-- <a href=""
                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                        class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                            clip-rule="evenodd"></path>
                    </svg> Download Guide Book</a> --}}
            </li>
            <li class="mb-10 ml-10">
                <span
                    class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                    <svg aria-hidden="true" class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <h3 class="flex items-center mb-1 text-lg font-semibold text-[#DF5E08]">Seminar
                </h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Dilaksanakan pada 8 Oktober 2022</time>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">"Software Engineering for
                    Distruptive Innovation"</p>
                {{-- <a href=""
                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                        class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                            clip-rule="evenodd"></path>
                    </svg> Download Virtual Background</a> --}}
            </li>
            <li class="mb-10 ml-10">
                <span
                    class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                    <svg aria-hidden="true" class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <h3 class="flex items-center mb-1 text-lg font-semibold text-[#DF5E08]">Malam Puncak
                </h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Coming Soon</time>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Malam puncak merupakan malam
                    puncak</p>
                {{-- <a href=""
                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                        class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                            clip-rule="evenodd"></path>
                    </svg> Download Poster</a> --}}
            </li>
        </ol>

    </section>

    <!-- Q&A -->
    <section class="relative py-16 bg-white min-w-screen animation-fade animation-delay">
        <div x-data="{ qa: 0 }" class="container px-0 px-8 mx-auto sm:px-12 xl:px-5 px-5">
            <p
                class="text-xs font-bold text-left text-[#DF5E08] uppercase sm:mx-6 sm:text-center sm:text-normal sm:font-bold">
                Mempunyai pertanyaan? Kami mempunyai jawabannya
            </p>
            <h3
                class="mt-1 text-2xl font-bold text-left text-[#001C99] sm:mx-6 sm:text-3xl md:text-4xl lg:text-5xl sm:text-center sm:mx-0 text-transparent py-5 bg-clip-text bg-gradient-to-br from-[#001C99] to-[#DF5E08] background-animate">
                Pertanyaan yang sering di tanyakan
            </h3>
            <div
                class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3 rounded-3xl">
                <button @click="qa = 0" class="text-lg font-bold text-[#001C99] sm:text-xl md:text-2xl">Bagaimana cara
                    mendaftar lomba?</button>
                <p x-show="qa == 0" class="whitespace-pre-line mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    1. Pastikan kamu sudah mendaftarkan akun pada halaman https://sevent.id/register
                    2. Setelah kamu sudah mempunyai akun, kamu akan di arahkan ke halaman https://sevent.id/competition
                    3. Pada halaman Competition, kamu diharuskan membuat tim kamu
                    4. Selanjutnya kamu isi form Buat Tim
                    5. Selamat kamu berhasil membuat Tim</p>
            </div>
            <div
                class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3 rounded-3xl">
                <button @click="qa = 1" class="text-lg font-bold text-[#001C99] sm:text-xl md:text-2xl">Bagaimana cara
                    melakukan pembayaran
                    lomba?</button>
                <p x-show="qa == 1" class="whitespace-pre-line mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    1. Pastikan kamu sudah melakukan registrasi akun
                    2. Pastikan kamu sudah mendaftarkan lomba
                    3. Pastikan kamu sudah membuat Tim
                    4. Klik Detail Tim pada halaman https://sevent.id/competition
                    5. Pada halaman Detail Tim, di bagian Status Pembayaran kamu dapat Klik disini untuk melakukan
                    pembayaran.
                    6. Jika kamu sudah melakukan pembayaran, maka pembayaran kamu sudah otomatis terkonfirmasi.
                </p>
            </div>
            <div
                class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3 rounded-3xl">
                <button @click="qa = 2" class="text-lg font-bold text-[#001C99] sm:text-xl md:text-2xl">Bagaimana cara
                    menambahkan Anggota
                    Tim?</button>
                <p x-show="qa == 2" class="whitespace-pre-line mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    1. Pastikan kamu sudah melakukan registrasi akun
                    2. Pastikan kamu sudah mendaftarkan lomba
                    3. Pastikan kamu sudah membuat Tim
                    4. Pastikan kamu sudah melakukan pembayaran lomba
                    5. Klik Detail Tim pada halaman https://sevent.id/competition
                    6. Pada halaman Detail Tim, klik Tambah Anggota
                    7. Selanjutnya kamu isi form Tambah Anggota
                    8. Pastikan anggota tim kamu terdiri dari 3 orang.
                    9. Selamat kamu berhasil menambah Anggota Tim.</p>
            </div>
            <div
                class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3 rounded-3xl">
                <button @click="qa = 3" class="text-lg font-bold text-[#001C99] sm:text-xl md:text-2xl">Bagaimana cara
                    menambahkan
                    Submission Lomba?</button>
                <p x-show="qa == 3" class="whitespace-pre-line mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    1. Pastikan kamu sudah melakukan registrasi akun
                    2. Pastikan kamu sudah mendaftarkan lomba
                    3. Pastikan kamu sudah membuat Tim
                    4. Pastikan kamu sudah melakukan pembayaran lomba
                    5. Klik Detail Tim pada halaman https://sevent.id/competition
                    6. Pada halaman Detail Tim, pastikan kamu sudah menambahkan Anggota Tim
                    6. Pada halaman Detail Tim, scroll kebawah lalu isi form Submission Lomba
                    7. Selamat kamu berhasil menambahkan Submission Lomba.</p>
            </div>
            <div
                class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3 rounded-3xl">
                <button @click="qa = 4" class="text-lg font-bold text-[#001C99] sm:text-xl md:text-2xl">Bagaimana cara
                    mendaftarkan diri
                    sebagai partisipan di Seminar Hybrid?</button>
                <p x-show="qa == 4" class="whitespace-pre-line mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    1. Pastikan kamu sudah melakukan registrasi akun
                    2. Klik pada halaman Daftar Seminar Hybrid atau pada halaman https://sevent.id/seminar
                    3. Selanjutnya kamu isi form Daftar Seminar Hybrid
                    4. Selamat kamu berhasil mendaftarkan diri sebagai partisipan di Seminar Hybrid</p>
            </div>
            <div
                class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3 rounded-3xl">
                <button @click="qa = 5" class="text-lg font-bold text-[#001C99] sm:text-xl md:text-2xl">Bagaimana cara
                    membeli Ticket Live
                    Concert?</button>
                <p x-show="qa == 5" class="whitespace-pre-line mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    1. Pastikan kamu sudah melakukan registrasi akun
                    2. Klik pada halaman Ticket Live Concert atau pada halaman https://sevent.id/concert
                    3. Masukkan jumlah tiket yang mau kamu beli
                    4. Selanjutnya kamu akan diarahkan untuk membayar tiket
                    5. Jika kamu sudah melakukan pembayaran, maka pembayaran kamu sudah otomatis terkonfirmasi.
                    6. Jika pembayaran kamu sudah terkonfirmasi, selanjutnya kamu akan mendapatkan E-Ticket pada halaman
                    https://sevent.id/ticket</p>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section class="w-full px-8 py-16 bg-gray-100 xl:px-8" id="contact">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                    <h2
                        class="text-2xl font-extrabold leading-none text-[#001C99] sm:text-3xl md:text-5xl text-transparent py-5 bg-clip-text bg-gradient-to-br from-[#001C99] to-[#DF5E08] background-animate">
                        Kontak kami
                    </h2>
                    <p class="text-xl text-gray-600 md:pr-16">Learn how to engage with your visitors and teach them
                        about your mission. We're revolutionizing the way customers and businesses interact.</p>
                </div>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <div
                        class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 shadow-2xl px-7 rounded-3xl">
                        <h3 class="mb-6 text-2xl font-medium text-center">Kalian dapat menghubungi kontak berikut</h3>
                        <div class="space-y-5">
                            <a href="wa.me/082223111091"
                                class="items-center flex border border-[#001C99] rounded-full p-3 space-x-3 text-md text-[#001C99]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <p>082223111091 - Dewi</p>
                            </a>
                            <a href="wa.me/085156113164"
                                class="items-center flex border border-[#001C99] rounded-full p-3 space-x-3 text-md text-[#001C99]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <p>085156113164 - Wahyu</p>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Sponsorship -->
    <section class="bg-white pt-7 pb-14">
        <div class="container px-8 mx-auto sm:px-12 lg:px-20">
            <h3
                class="mt-1 text-2xl pb-10 font-bold text-left text-[#001C99] sm:mx-6 sm:text-3xl md:text-4xl lg:text-3xl sm:text-center sm:mx-0 text-transparent py-5 bg-clip-text bg-gradient-to-br from-[#001C99] to-[#DF5E08] background-animate">
                Sponsorship
            </h3>
            <div class="flex items-center justify-center">
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/sponsor/puny.png" alt="Puny Store" class="block object-contain h-12">
                </div>
            </div>
        </div>
    </section>

    <!-- Media partner -->
    <section class="bg-white pt-7 pb-14">
        <div class="container px-8 mx-auto sm:px-12 lg:px-20">
            <h3
                class="mt-1 text-2xl pb-10 font-bold text-left text-[#001C99] sm:mx-6 sm:text-3xl md:text-4xl lg:text-3xl sm:text-center sm:mx-0 text-transparent py-5 bg-clip-text bg-gradient-to-br from-[#001C99] to-[#DF5E08] background-animate">
                Media Partner
            </h3>
            <div class="flex grid items-center justify-center grid-cols-4 grid-cols-12 gap-y-8">
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/bem-fakultas.jpeg" alt="Bem Fakultas" class="block object-contain h-12">
                </div>
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/dmf.png" alt="DMF" class="block object-contain h-12">
                </div>
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/dpm.jpg" alt="DPM" class="block object-contain h-12">
                </div>
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/hmdp.PNG" alt="HMDP" class="block object-contain h-12">
                </div>
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/hmdt.png" alt="HMDT" class="block object-contain h-12">
                </div>
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/hmif.png" alt="HMIF" class="block object-contain h-12">
                </div>
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/hmsd.jpeg" alt="HMSD" class="block object-contain h-12">
                </div>
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/hmsi.png" alt="HMSI" class="block object-contain h-12">
                </div>
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/hmte.PNG" alt="HMTE" class="block object-contain h-12">
                </div>
                <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-3 xl:col-span-2">
                    <img src="/medpart/hmtl.jpg" alt="HMTL" class="block object-contain h-12">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section class="bg-white">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <div class="px-5 py-2">
                    <a href="#about_us" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Tentang Kami
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#event" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Acara Kami
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#contact" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Kontak Kami
                    </a>
                </div>
            </nav>
            <div class="flex justify-center mt-8 space-x-6">
                <a href="https://instagram.com/sevent.ig" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Instagram</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-base leading-6 text-center text-gray-400">
                &copy; 2022 SEVENT.ID All rights reserved.
            </p>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $(document).on("scroll", onScroll);
            $(document).on('click', 'a[href^="#"]', function (event) {
                event.preventDefault();
                $('a').each(function () {
                    $(this).removeClass('active');
                })
                $(this).addClass('active');
                window.location.hash = "";
                $('html, body').stop().animate({
                    scrollTop: $($.attr(this, 'href')).offset().top
                }, 100, 'swing', function () {
                    $(document).on("scroll", onScroll);
                });
            });
        });
        function onScroll(){
            console.clear();
            history.replaceState('', document.title, window.location.origin + window.location.pathname + window.location.search);
            var scrollPos = $(this).scrollTop() + 90;
        }
    </script>

    <!-- AlpineJS Library -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> --}}
    <script src="{{ asset('particles.js') }}"></script>

</body>

</html>