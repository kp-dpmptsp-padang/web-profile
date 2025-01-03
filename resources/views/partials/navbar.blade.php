<nav class="bg-white fixed w-full z-20 top-0 start-0 shadow">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3">
            <img src="{{ asset('images/dpmptsp.png') }}" class="h-20" alt="Logo DPMPTSP">
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg md:hidden hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-300" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0">
                <li>
                    <a href="/" class="block py-2 px-3 text-black" aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="/tentang" class="block py-2 px-3 text-black">Tentang</a>
                </li>
                <li>
                    <a href="/layanan" class="block py-2 px-3 text-black">Layanan Kami</a>
                </li>
                <li>
                    <a href="/informasi" class="block py-2 px-3 text-black">Informasi</a>
                </li>
                <li>
                    <a href="/dokumen" class="block py-2 px-3 text-black">Dokumen</a>
                </li>
                <li>
                    <a href="/fasilitas" class="block py-2 px-3 text-black">Fasilitas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>