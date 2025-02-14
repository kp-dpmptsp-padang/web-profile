@extends('layouts.app')
@section('title', content: 'Manajemen Postingan | Admin DPMPTSP Kota Padang')
@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Header and Add Button Section -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    @if(request()->query('type') == 'berita')
                        Manajemen Konten Berita
                    @else
                        Manajemen Konten Informasi
                    @endif
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola Daftar Konten</p>
            </div>
            <div class="w-full md:w-auto">
                <button type="button" 
                        data-modal-target="createPostModal" 
                        data-modal-toggle="createPostModal" 
                        class="w-full md:w-auto inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah {{ request()->query('type') == 'berita' ? 'Berita' : 'Informasi' }} Baru
                </button>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <div class="overflow-x-auto">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4">No</th>
                                <th scope="col" class="px-6 py-4">Judul</th>
                                <th scope="col" class="px-6 py-4">Penulis</th>
                                <th scope="col" class="px-6 py-4">Tanggal Terbit</th>
                                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $index => $post)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ \Illuminate\Support\Str::words($post->judul, 7, '...') }}
                                     </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->penulis->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($post->tanggal_publikasi)->locale('id')->isoFormat('D MMMM Y') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-4">
                                            <button type="button"
                                                    data-modal-target="viewPostModal-{{ $post->id }}"
                                                    data-modal-toggle="viewPostModal-{{ $post->id }}"
                                                    class="font-medium text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                Lihat
                                            </button>
                                            <button type="button"
                                                    data-modal-target="editPostModal-{{ $post->id }}"
                                                    data-modal-toggle="editPostModal-{{ $post->id }}"
                                                    class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                                Ubah
                                            </button>
                                            <button type="button"
                                                    data-modal-target="deletePostModal-{{ $post->id }}"
                                                    data-modal-toggle="deletePostModal-{{ $post->id }}"
                                                    class="font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 9h4"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h4"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17h4"/>
                                        </svg>
                                            <p class="text-lg font-medium">Tidak ada {{ request()->query('type') == 'berita' ? 'berita' : 'informasi' }}</p>
                                            <p class="mt-1 text-sm">Klik tombol "Tambah {{ request()->query('type') == 'berita' ? 'Berita' : 'Informasi' }} Baru" untuk membuat {{ request()->query('type') == 'berita' ? 'berita' : 'informasi' }} baru</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $posts->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@include('admin.posts.modals.create')
@include('admin.posts.modals.edit')
@include('admin.posts.modals.delete')
@include('admin.posts.modals.view')

@push('scripts')
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: "@foreach ($errors->all() as $error){{ $error }}\n @endforeach",
            confirmButtonColor: "#229CDB",
        });
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('success') }}",
            confirmButtonColor: "#229CDB",
        });
    </script>
@endif
@endpush
@endsection