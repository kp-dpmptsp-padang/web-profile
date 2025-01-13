@extends('layouts.app')

@section('app')
<section class="bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 py-8 min-h-screen">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Header and Add Button Section -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
            <div class="mb-4 md:mb-0">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Manajemen Galeri
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Kelola koleksi gambar galeri Anda dengan mudah
                </p>
            </div>
            <button type="button" 
                    data-modal-target="createGalleryModal" 
                    data-modal-toggle="createGalleryModal" 
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-red-600 rounded-lg transition-colors duration-200 ease-in-out hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="w-5 h-5 mr-2 transition-transform duration-200 ease-in-out group-hover:scale-110" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Tambah Gambar Baru
            </button>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($pictures as $picture)
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 ease-in-out overflow-hidden">
                <div class="aspect-w-16 aspect-h-12 overflow-hidden">
                    <img src="{{ asset('storage/' . $picture->nama_file) }}" 
                         alt="Gambar Galeri" 
                         class="w-full h-48 object-cover transform transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="p-4">
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
            @endforeach
        </div>

        <!-- Empty State -->
        @if($pictures->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-200">Belum ada gambar</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Mulai dengan menambahkan gambar baru ke galeri Anda</p>
        </div>
        @endif
    </div>
</section>

@include('admin.galleries.modals.create')
@include('admin.galleries.modals.edit')
@include('admin.galleries.modals.delete')

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize modals
    const modals = document.querySelectorAll('[data-modal-toggle]');
    modals.forEach(modal => {
        modal.addEventListener('click', function() {
            const targetModal = document.getElementById(this.getAttribute('data-modal-toggle'));
            if (targetModal) {
                targetModal.classList.toggle('hidden');
            }
        });
    });

    // Handle image preview for create and edit forms
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById(`new-image-preview-${input.id.split('-')[1]}`);
            previewContainer.innerHTML = ''; // Clear the preview container

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'object-cover rounded-lg w-full h-full';
                    previewContainer.innerHTML = ''; // Clear the preview container again to ensure no duplicates
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
});
</script>
@endpush