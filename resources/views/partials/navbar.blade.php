<nav class="bg-white fixed w-full z-20 top-0 start-0 shadow">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3">
            <img src="{{ asset('images/dpmptsp.png') }}" class="h-10" alt="Logo DPMPTSP">
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
                    <a href="{{ route('home') }}" 
                       class="block py-2 px-3 @if(request()->routeIs('home')) text-red-600 @else text-black @endif">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" 
                       class="block py-2 px-3 @if(request()->routeIs('about')) text-red-600 @else text-black @endif">
                        Tentang
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan') }}" 
                       class="block py-2 px-3 @if(request()->routeIs('layanan')) text-red-600 @else text-black @endif">
                        Layanan Kami
                    </a>
                </li>
                <li class="relative group">
                    <button class="flex items-center py-2 px-3 @if(request()->routeIs('informasi') || request()->routeIs('berita') || request()->routeIs('detail-info') || request()->routeIs('detail-berita') || request()->routeIs('faq') || request()->routeIs('video') || request()->routeIs('galeri')) text-red-600 @else text-black @endif">
                        Postingan
                    </button>
                    <div class="absolute hidden group-hover:block w-48 bg-white shadow-lg py-2 rounded-lg">
                        <a href="{{ route('informasi') }}" 
                           class="block px-4 py-2 @if(request()->routeIs('informasi') || request()->routeIs('detail-info')) text-red-600 @else text-black @endif hover:bg-gray-100">
                            Informasi
                        </a>
                        <a href="{{ route('berita') }}" 
                           class="block px-4 py-2 @if(request()->routeIs('berita') || request()->routeIs('detail-berita')) text-red-600 @else text-black @endif hover:bg-gray-100">
                            Berita
                        </a>
                        <a href="{{ route('galeri') }}" 
                           class="block px-4 py-2 @if(request()->routeIs('galeri')) text-red-600 @else text-black @endif hover:bg-gray-100">
                            Galeri
                        </a>
                        <a href="{{ route('video') }}" 
                           class="block px-4 py-2 @if(request()->routeIs('video')) text-red-600 @else text-black @endif hover:bg-gray-100">
                            Video
                        </a>
                        <a href="{{ route('faq') }}" 
                           class="block px-4 py-2 @if(request()->routeIs('faq')) text-red-600 @else text-black @endif hover:bg-gray-100">
                            FAQ
                        </a>
                    </div>
                </li>
                <li>
                    <a href="{{ route('dokumen') }}" 
                       class="block py-2 px-3 @if(request()->routeIs('dokumen')) text-red-600 @else text-black @endif">
                        Dokumen
                    </a>
                </li>
                <li>
                    <a href="{{ route('fasilitas') }}" 
                       class="block py-2 px-3 @if(request()->routeIs('fasilitas')) text-red-600 @else text-black @endif">
                        Fasilitas
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>