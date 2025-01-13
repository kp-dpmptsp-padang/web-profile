@extends('layouts.app')

@section('app')
<section class="bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 py-8 min-h-screen">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Header and Add Button Section sama seperti sebelumnya -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
            <div class="mb-4 md:mb-0">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Manajemen Video
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Kelola koleksi video galeri Anda dengan mudah
                </p>
            </div>
            <button type="button" 
                    data-modal-target="createVideoModal" 
                    data-modal-toggle="createVideoModal" 
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-red-600 rounded-lg transition-colors duration-200 ease-in-out hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                </svg>
                Tambah Video Baru
            </button>
        </div>

        <!-- Video Grid dengan thumbnail yang diperbaiki -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($videos as $video)
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 ease-in-out overflow-hidden">
                <div class="relative">
                    <a href="{{ $video->url }}" target="_blank" class="block relative overflow-hidden">
                        <!-- Container untuk thumbnail dengan rasio 16:9 yang presisi -->
                        <div class="relative pb-[56.25%] bg-gray-100 dark:bg-gray-700">
                            <!-- Overlay gradient untuk membuat thumbnail lebih menarik -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- Thumbnail video dengan object-fit: cover -->
                            <img 
                                src="https://img.youtube.com/vi/{{ getYouTubeVideoId($video->url) }}/maxresdefault.jpg" 
                                onerror="this.src='https://img.youtube.com/vi/{{ getYouTubeVideoId($video->url) }}/hqdefault.jpg'"
                                alt="{{ $video->judul }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                            >
                            
                            <!-- Play button overlay -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white line-clamp-1">
                        {{ $video->judul }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 line-clamp-2 mb-4">
                        {{ $video->deskripsi }}
                    </p>
                    <div class="flex justify-between items-center gap-2">
                        <button class="flex-1 bg-yellow-500 text-white px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-300 dark:focus:ring-yellow-800"
                                data-modal-toggle="editVideoModal-{{ $video->id }}">
                            Ubah
                        </button>
                        <button class="flex-1 bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-red-700 focus:ring-2 focus:ring-red-300 dark:focus:ring-red-800"
                                data-modal-toggle="deleteVideoModal-{{ $video->id }}">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Empty state sama seperti sebelumnya -->
        @if($videos->isEmpty())
        <div class="text-center py-12">
            <!-- ... kode empty state ... -->
        </div>
        @endif
    </div>
</section>

@include('admin.videos.modals.create')
@include('admin.videos.modals.edit')
@include('admin.videos.modals.delete')

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Kode JavaScript yang sudah ada
    const modals = document.querySelectorAll('[data-modal-toggle]');
    modals.forEach(modal => {
        modal.addEventListener('click', function() {
            const targetModal = document.getElementById(this.getAttribute('data-modal-toggle'));
            if (targetModal) {
                targetModal.classList.toggle('hidden');
            }
        });
    });
});

// Function untuk mendapatkan YouTube video ID
function getYouTubeVideoId(url) {
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|shorts\/)([^#\&\?]*).*/;
    const match = url.match(regExp);
    return (match && match[2].length == 11) ? match[2] : null;
}
</script>
@endpush