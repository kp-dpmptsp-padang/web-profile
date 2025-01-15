<aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar navigation" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center p-2 text-base font-medium rounded-lg group hover:bg-gray-100 dark:hover:bg-gray-700 
                   {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                    <svg class="w-6 h-6 transition duration-75 {{ request()->routeIs('dashboard') ? 'text-red-600' : 'text-gray-500 group-hover:text-gray-900' }} dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button" 
                        class="flex items-center p-2 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700
                        {{ (request()->routeIs('posts.*') && in_array(request()->query('type'), ['berita', 'informasi'])) || request()->routeIs('tags.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}"
                        aria-controls="dropdown-posts" 
                        data-collapse-toggle="dropdown-posts">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75 {{ (request()->routeIs('posts.*') && in_array(request()->query('type'), ['berita', 'informasi'])) || request()->routeIs('tags.*') ? 'text-red-600' : 'text-gray-500 group-hover:text-gray-900' }} dark:text-gray-400 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"/>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Postingan</span>
                    <svg class="w-6 h-6 transition-transform duration-200 {{ (request()->routeIs('posts.*') && in_array(request()->query('type'), ['berita', 'informasi'])) || request()->routeIs('tags.*') ? 'rotate-180' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
                <ul id="dropdown-posts" class="{{ (request()->routeIs('posts.*') && in_array(request()->query('type'), ['berita', 'informasi'])) || request()->routeIs('tags.*') ? 'block' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('posts.index', ['type' => 'berita']) }}" 
                           class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 
                           {{ request()->routeIs('posts.index') && request()->query('type') === 'berita' ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                            Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('posts.index', ['type' => 'informasi']) }}" 
                           class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 
                           {{ request()->routeIs('posts.index') && request()->query('type') === 'informasi' ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                            Informasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tags.index') }}" 
                           class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 
                           {{ request()->routeIs('tags.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                            Tag
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" 
                        class="flex items-center p-2 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700
                        {{ request()->routeIs('slider.*') || request()->routeIs('gallery.*') || request()->routeIs('video.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}"
                        aria-controls="dropdown-media" 
                        data-collapse-toggle="dropdown-media">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75 {{ request()->routeIs('slider.*') || request()->routeIs('gallery.*') || request()->routeIs('video.*') ? 'text-red-600' : 'text-gray-500 group-hover:text-gray-900' }} dark:text-gray-400 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Media</span>
                    <svg class="w-6 h-6 transition-transform duration-200 {{ request()->routeIs('slider.*') || request()->routeIs('gallery.*') || request()->routeIs('video.*') ? 'rotate-180' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
                <ul id="dropdown-media" class="{{ request()->routeIs('slider.*') || request()->routeIs('gallery.*') || request()->routeIs('video.*') ? 'block' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('slider.index') }}" 
                        class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 
                        {{ request()->routeIs('slider.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                            Slider
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gallery.index') }}" 
                        class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 
                        {{ request()->routeIs('gallery.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                            Galeri
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('video.index') }}" 
                        class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 
                        {{ request()->routeIs('video.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                            Video
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('inovation.index') }}" 
                   class="flex items-center p-2 text-base font-medium rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 group
                   {{ request()->routeIs('inovation.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75 {{ request()->routeIs('inovation.*') ? 'text-red-600' : 'text-gray-500 group-hover:text-gray-900' }} dark:text-gray-400 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                    <span class="ml-3">Inovasi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('qna.index') }}" 
                   class="flex items-center p-2 text-base font-medium rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 group
                   {{ request()->routeIs('qna.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75 {{ request()->routeIs('qna.*') ? 'text-red-600' : 'text-gray-500 group-hover:text-gray-900' }} dark:text-gray-400 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Pertanyaan</span>
                    <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800">4</span>
                </a>
            </li>
        </ul>
        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
        <li>
                <button type="button" 
                        class="flex items-center p-2 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700
                        {{ request()->routeIs('document.*') || request()->routeIs('documentType.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}"
                        aria-controls="dropdown-documents" 
                        data-collapse-toggle="dropdown-documents">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75 {{ request()->routeIs('document.*') || request()->routeIs('documentType.*') ? 'text-red-600' : 'text-gray-500 group-hover:text-gray-900' }} dark:text-gray-400 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Dokumen</span>
                    <svg class="w-6 h-6 transition-transform duration-200 {{ request()->routeIs('document.*') || request()->routeIs('documentType.*') ? 'rotate-180' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
                <ul id="dropdown-documents" class="{{ request()->routeIs('document.*') || request()->routeIs('documentType.*') ? 'block' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('document.index') }}" 
                           class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 
                           {{ request()->routeIs('document.index') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                            Daftar Dokumen
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('documentType.index') }}" 
                           class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 
                           {{ request()->routeIs('documentType.index') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                            Jenis Dokumen
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('facility.index') }}" 
                   class="flex items-center p-2 text-base font-medium rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 group
                   {{ request()->routeIs('facility.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75 {{ request()->routeIs('facility.*') ? 'text-red-600' : 'text-gray-500 group-hover:text-gray-900' }} dark:text-gray-400 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span class="ml-3">Fasilitas</span>
                </a>
            </li>
            @can('view-users')
            <li>
                <a href="{{ route('users.index') }}" 
                   class="flex items-center p-2 text-base font-medium rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 group
                   {{ request()->routeIs('users.*') ? 'bg-gray-100 text-red-600 dark:bg-gray-700' : 'text-gray-900 dark:text-white' }}">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75 {{ request()->routeIs('users.*') ? 'text-red-600' : 'text-gray-500 group-hover:text-gray-900' }} dark:text-gray-400 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm0 12c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z"/>
                    </svg>  
                    <span class="ml-3">Pengguna</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</aside>