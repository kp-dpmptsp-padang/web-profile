@extends('layouts.app')
@section('title', content: 'Manajemen Galeri | Admin DPMPTSP Kota Padang')
@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Galeri</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola Koleksi Gambar Galeri</p>
            </div>
            <div class="w-full md:w-auto">
                <button type="button" 
                        data-modal-target="createGalleryModal" 
                        data-modal-toggle="createGalleryModal" 
                        class="w-full md:w-auto inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah Gambar Baru
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse($pictures as $picture)
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 ease-in-out overflow-hidden">
                <div class="relative pb-[75%]">
                    <img src="{{ asset('storage/' . $picture->nama_file) }}" 
                        alt="Gambar Galeri" 
                        class="absolute inset-0 w-full h-full object-contain bg-gray-100 dark:bg-gray-900">
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-3 text-xs text-gray-500 dark:text-gray-400">
                        <div class="flex items-center shrink-0">
                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="whitespace-nowrap">Dibuat: {{ $picture->created_at->locale('id')->isoFormat('D MMMM Y') }}</span>
                        </div>
                        <div class="flex items-center shrink-0">
                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="whitespace-nowrap">Publikasi: {{ \Carbon\Carbon::parse($picture->tanggal_publikasi)->locale('id')->isoFormat('D MMMM Y') }}</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-2 mb-4">
                        {{ $picture->caption }}
                    </p>
                    <div class="flex justify-between items-center gap-2">
                        <button class="flex-1 bg-yellow-500 text-white px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-300 dark:focus:ring-yellow-800"
                                data-modal-toggle="editGalleryModal-{{ $picture->id }}">
                            Ubah
                        </button>
                        <button class="flex-1 bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-red-900 focus:ring-2 focus:ring-red-300 dark:focus:ring-red-400"
                                data-modal-toggle="deleteGalleryModal-{{ $picture->id }}">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-lg font-medium">Tidak ada gambar untuk galeri</p>
                        <p class="mt-1 text-sm">Klik tombol "Tambah Gambar Baru" untuk menambah gambar baru ke galeri</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $pictures->withQueryString()->links() }}
        </div>
    </div>
</section>

@include('admin.galleries.modals.create')
@include('admin.galleries.modals.edit')
@include('admin.galleries.modals.delete')

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

    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById(`new-image-preview-${input.id.split('-')[1]}`);
            previewContainer.innerHTML = ''; 

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'object-cover rounded-lg w-full h-full';
                    previewContainer.innerHTML = ''; 
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
});
</script>
@endpush