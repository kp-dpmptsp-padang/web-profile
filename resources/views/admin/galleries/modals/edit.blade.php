@foreach($pictures as $picture)
<div id="editGalleryModal-{{ $picture->id }}" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Gambar
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editGalleryModal-{{ $picture->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <form id="editGalleryForm-{{ $picture->id }}" action="{{ route('gallery.update', $picture->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-6 space-y-6">
                    <div class="sm:col-span-2">
                        <label for="image-{{ $picture->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="image-{{ $picture->id }}" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                <div class="flex flex-col items-center justify-center pt-4 pb-3">
                                    <svg class="w-7 h-7 mb-3 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik untuk mengunggah</span> atau seret dan lepas</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG atau GIF (MAX. 10MB)</p>
                                </div>
                                <input type="file" name="image" id="image-{{ $picture->id }}" class="hidden" accept="image/*"/>
                            </label>
                        </div>
                        <div id="image-preview-{{ $picture->id }}" class="mt-4 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white mb-2">Gambar Lama</p>
                                <div class="relative group aspect-w-16 aspect-h-9">
                                    <img src="{{ asset('storage/' . $picture->nama_file) }}" alt="Gambar Lama" class="object-cover rounded-lg w-full h-full">
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white mb-2">Gambar Baru</p>
                                <div class="aspect-w-16 aspect-h-9" id="new-image-preview-{{ $picture->id }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="caption-{{ $picture->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                        <input type="text" name="caption" id="caption-{{ $picture->id }}" value="{{ $picture->caption }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Masukkan keterangan gambar">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="tanggal_publikasi-{{ $picture->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Rilis</label>
                        <input type="date" name="tanggal_publikasi" id="tanggal_publikasi-{{ $picture->id }}" value="{{ $picture->tanggal_publikasi }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                </div>
                <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-end space-x-2">
                        <button type="button" data-modal-toggle="editGalleryModal-{{ $picture->id }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Batal
                        </button>
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[id^="editGalleryModal-"]').forEach(modal => {
        const pictureId = modal.id.split('-')[1];
        const imageInput = document.getElementById(`image-${pictureId}`);
        const previewContainer = document.getElementById(`new-image-preview-${pictureId}`);
        const form = modal.querySelector('form');
        const dropZone = imageInput.closest('label');

        // Drag and drop functionality
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.add('border-red-500');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.remove('border-red-500');
            });
        });

        // Handle file drop
        dropZone.addEventListener('drop', function(e) {
            const file = e.dataTransfer.files[0];
            if (file) {
                handleFile(file);
            }
        });

        // Handle file input change
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                handleFile(file);
            }
        });

        function handleFile(file) {
            if (validateFile(file)) {
                previewFile(file);
            }
        }

        function validateFile(file) {
            if (!file.type.startsWith('image/')) {
                alert('Please upload an image file (PNG, JPG, or GIF).');
                return false;
            }
            if (file.size > 10 * 1024 * 1024) {
                alert('File is too large. Maximum size is 10MB.');
                return false;
            }
            return true;
        }

        function previewFile(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewContainer.innerHTML = `
                    <img src="${e.target.result}" class="object-cover rounded-lg w-full h-full" alt="Preview">
                `;
            };
            reader.readAsDataURL(file);
        }

        // Form submission handler
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Gambar berhasil diperbarui.',
                        icon: 'success',
                        confirmButtonColor: "#229CDB",
                        timer: 1500
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Kesalahan',
                    icon: 'error',
                    text: "@foreach ($errors->all() as $error){{ $error }}\n @endforeach",
                    confirmButtonColor: "#229CDB",
                });
            });
        });
    });
});
</script>
@endpush