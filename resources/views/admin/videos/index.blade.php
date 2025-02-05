@extends('layouts.app')

@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Video</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola Koleksi Video</p>
            </div>
            <div class="w-full md:w-auto">
                <button type="button" 
                        data-modal-target="createVideoModal" 
                        data-modal-toggle="createVideoModal" 
                        class="w-full md:w-auto inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah Video Baru
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($videos as $video)
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 ease-in-out overflow-hidden">
                <a href="{{ $video->url }}" target="_blank" class="block relative">
                    <div class="w-full relative pt-[56.25%]">
                        <img src="https://img.youtube.com/vi/{{ getYouTubeVideoId($video->url) }}/maxresdefault.jpg" 
                            onerror="this.src='https://img.youtube.com/vi/{{ getYouTubeVideoId($video->url) }}/hqdefault.jpg'"
                            alt="{{ $video->judul }}" 
                            class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-12 h-12 bg-red-600 bg-opacity-90 rounded-full flex items-center justify-center text-white opacity-90 group-hover:opacity-100 transform group-hover:scale-110 transition-all duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="p-4">
                    <h3 class="text-base font-semibold text-gray-900 dark:text-white line-clamp-1 mb-2">{{ $video->judul }}</h3>
                    <div class="space-y-2 mb-3 text-xs text-gray-500 dark:text-gray-400">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="whitespace-nowrap">Dibuat: {{ $video->created_at->locale('id')->isoFormat('D MMMM Y') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="whitespace-nowrap">Publikasi: {{ \Carbon\Carbon::parse($video->tanggal_publikasi)->locale('id')->isoFormat('D MMMM Y') }}</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-2 mb-4">
                        {{ $video->deskripsi }}
                    </p>
                    <div class="flex justify-between items-center gap-2">
                        <button class="flex-1 bg-yellow-500 text-white px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-300 dark:focus:ring-yellow-800"
                                data-modal-toggle="editVideoModal-{{ $video->id }}">
                            Ubah
                        </button>
                        <button class="flex-1 bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-red-900 focus:ring-2 focus:ring-red-300 dark:focus:ring-red-400"
                                data-modal-toggle="deleteVideoModal-{{ $video->id }}">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                <div class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-lg font-medium">Tidak ada video</p>
                        <p class="mt-1 text-sm">Klik tombol "Tambah Video Baru" untuk menambah video baru ke daftar video</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $videos->withQueryString()->links() }}
        </div>
    </div>
</section>

@include('admin.videos.modals.create')
@include('admin.videos.modals.edit')
@include('admin.videos.modals.delete')
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
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

function getYouTubeVideoId(url) {
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|shorts\/)([^#\&\?]*).*/;
    const match = url.match(regExp);
    return (match && match[2].length == 11) ? match[2] : null;
}
</script>
@endpush