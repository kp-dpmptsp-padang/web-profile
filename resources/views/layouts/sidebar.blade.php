<aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar navigation" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" 
                        aria-controls="dropdown-posts" 
                        data-collapse-toggle="dropdown-posts">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"/>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Postingan</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
                <ul id="dropdown-posts" class="{{ Request::is('admin/posts*') || Request::is('admin/tags*') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('posts.index', ['type' => 'berita']) }}" 
                        class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->query('type') === 'berita' ? 'bg-gray-100 text-gray-900 dark:bg-gray-700 dark:text-white' : 'text-gray-900 dark:text-white' }}">
                            Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('posts.index', ['type' => 'informasi']) }}" 
                        class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->query('type') === 'informasi' ? 'bg-gray-100 text-gray-900 dark:bg-gray-700 dark:text-white' : 'text-gray-900 dark:text-white' }}">
                            Informasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tags.index') }}" 
                        class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-gray-100 dark:hover:bg-gray-700 {{ Request::is('admin/tags*') ? 'bg-gray-100 text-gray-900 dark:bg-gray-700 dark:text-white' : 'text-gray-900 dark:text-white' }}">
                            Tag
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-media" data-collapse-toggle="dropdown-media">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Media</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
                <ul id="dropdown-media" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Slider</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Galeri</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Video</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                    <span class="ml-3">Inovasi</span>
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Pertanyaan</span>
                    <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800">4</span>
                </a>
            </li>
        </ul>

        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <li>
                <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    <span class="ml-3">Dokumen</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span class="ml-3">Fasilitas</span>
                </a>
            </li>
            @can('view-users')
            <li>
                <a href="{{ route('users.index') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm0 12c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z"/>
                    </svg>  
                    <span class="ml-3">Pengguna</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</aside>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to save dropdown state to localStorage
    function saveDropdownState(dropdownId, isOpen) {
        localStorage.setItem(dropdownId + '_state', isOpen);
    }

    // Function to get dropdown state from localStorage
    function getDropdownState(dropdownId) {
        return localStorage.getItem(dropdownId + '_state') === 'true';
    }

    // Function to check if current URL matches the section
    function isCurrentSection(sectionType) {
        const currentPath = window.location.pathname;
        const currentType = new URLSearchParams(window.location.search).get('type');
        
        return currentPath.includes('/admin/' + sectionType) || 
               (sectionType === 'posts' && (currentType === 'berita' || currentType === 'informasi' || currentPath.includes('/admin/tags')));
    }

    // Initialize all dropdowns
    const dropdowns = document.querySelectorAll('[data-collapse-toggle]');
    
    dropdowns.forEach(dropdown => {
        const targetId = dropdown.getAttribute('data-collapse-toggle');
        const targetElement = document.getElementById(targetId);
        
        // Check if this section is currently active
        const sectionType = targetId.replace('dropdown-', '');
        const isSectionActive = isCurrentSection(sectionType);
        
        // Get saved state or use section active state as default
        const savedState = localStorage.getItem(targetId + '_state');
        const shouldBeOpen = savedState !== null ? savedState === 'true' : isSectionActive;
        
        // Apply initial state
        if (shouldBeOpen) {
            targetElement.classList.remove('hidden');
            saveDropdownState(targetId, true);
        } else {
            targetElement.classList.add('hidden');
            saveDropdownState(targetId, false);
        }
        
        // Add click event
        dropdown.addEventListener('click', () => {
            const isOpen = !targetElement.classList.contains('hidden');
            targetElement.classList.toggle('hidden');
            saveDropdownState(targetId, !isOpen);
        });
    });
    
    // Handle active state for menu items
    const currentPath = window.location.pathname;
    const currentType = new URLSearchParams(window.location.search).get('type');
    
    document.querySelectorAll('a').forEach(link => {
        // Skip links without href
        if (!link.href) return;
        
        const linkUrl = new URL(link.href);
        const linkPath = linkUrl.pathname;
        const linkType = new URLSearchParams(linkUrl.search).get('type');
        
        if (linkPath === currentPath && linkType === currentType) {
            link.classList.add('bg-gray-100', 'dark:bg-gray-700');
            
            // Find and open parent dropdown
            const parentDropdown = link.closest('ul[id^="dropdown-"]');
            if (parentDropdown) {
                parentDropdown.classList.remove('hidden');
                saveDropdownState(parentDropdown.id, true);
            }
        }
    });
});
    // Fungsi untuk menyimpan state dropdown ke localStorage
    function saveDropdownState(dropdownId, isOpen) {
        localStorage.setItem(dropdownId + '_state', isOpen);
    }

    // Fungsi untuk mendapatkan state dropdown dari localStorage
    function getDropdownState(dropdownId) {
        return localStorage.getItem(dropdownId + '_state') === 'true';
    }

    // Inisialisasi semua dropdown
    const dropdowns = document.querySelectorAll('[data-collapse-toggle]');
    
    dropdowns.forEach(dropdown => {
        const targetId = dropdown.getAttribute('data-collapse-toggle');
        const targetElement = document.getElementById(targetId);
        
        // Set initial state dari localStorage atau dari class 'hidden'
        const isCurrentlyOpen = !targetElement.classList.contains('hidden');
        saveDropdownState(targetId, isCurrentlyOpen);
        
        // Add click event
        dropdown.addEventListener('click', () => {
            const isOpen = !targetElement.classList.contains('hidden');
            targetElement.classList.toggle('hidden');
            saveDropdownState(targetId, !isOpen);
        });
        
        // Restore state saat halaman dimuat
        if (getDropdownState(targetId)) {
            targetElement.classList.remove('hidden');
        }
    });
    
    // Tambahkan class aktif untuk menu yang sedang dibuka
    const currentPath = window.location.pathname;
    const currentType = new URLSearchParams(window.location.search).get('type');
    
    document.querySelectorAll('.sidebar-link').forEach(link => {
        const linkPath = new URL(link.href).pathname;
        const linkType = new URLSearchParams(new URL(link.href).search).get('type');
        
        if (linkPath === currentPath && linkType === currentType) {
            link.classList.add('bg-gray-100', 'dark:bg-gray-700');
            
            // Buka parent dropdown jika ada
            const parentDropdown = link.closest('ul[id^="dropdown-"]');
            if (parentDropdown) {
                parentDropdown.classList.remove('hidden');
                saveDropdownState(parentDropdown.id, true);
            }
        }
    });
});
</script>
@endpush