<!-- Create Slider Modal -->
<div id="createSliderModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="createSliderModal"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tambah Slider</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createSliderModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form id="createSliderForm" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                               placeholder="Masukkan nama slider" 
                               required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link</label>
                        <input type="url" name="link" id="link" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                               placeholder="Masukkan link slider">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="is_active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aktif</label>
                        <select name="is_active" id="is_active" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                required>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2" id="order-container">
                        <label for="order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Urutan</label>
                        <input type="number" name="order" id="order" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                               placeholder="Masukkan urutan slider" 
                               required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                <div class="flex flex-col items-center justify-center pt-4 pb-3">
                                    <svg class="w-7 h-7 mb-3 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF (MAX. 10MB)</p>
                                </div>
                                <input type="file" name="image" id="image" class="hidden" accept="image/*" required/>
                            </label>
                        </div>
                        <div id="image-preview" class="mt-4 grid grid-cols-1 gap-4">
                            <!-- Image previews will be displayed here -->
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Simpan
                    </button>
                    <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                            data-modal-toggle="createSliderModal">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('createSliderForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = this;
        const formData = new FormData(form);

        // Validate image size
        const imageFile = formData.get('image');
        if (imageFile.size > 10 * 1024 * 1024) {
            Swal.fire({
                title: 'Kesalahan',
                text: 'Ukuran gambar terlalu besar. Maksimal ukuran adalah 10MB.',
                icon: 'error'
            });
            return;
        }

        fetch(form.action, {
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
                    text: 'Slider berhasil ditambahkan.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.reload();
                });
            } else {
                if (data.errors && data.errors.order) {
                    document.getElementById('order').value = '';
                }
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Kesalahan',
                text: 'Gagal menambahkan slider.',
                icon: 'error'
            });
        });
    });

    // Image preview
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = '';

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-auto rounded-lg';
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });

    // Drag and Drop Handling
    const dropZone = document.querySelector('label[for="image"]');
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        dropZone.classList.add('border-red-500');
    }

    function unhighlight(e) {
        dropZone.classList.remove('border-red-500');
    }

    dropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        document.getElementById('image').files = files;

        const event = new Event('change');
        document.getElementById('image').dispatchEvent(event);
    }

    // Hide order input if slider is inactive
    document.getElementById('is_active').addEventListener('change', function(event) {
        const orderContainer = document.getElementById('order-container');
        if (event.target.value == '0') {
            orderContainer.style.display = 'none';
            document.getElementById('order').value = '';
        } else {
            orderContainer.style.display = 'block';
            // Set the order input to the next available order number
            fetch('{{ route('slider.nextOrder') }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('order').value = data.nextOrder;
                });
        }
    });

    // Initialize order input visibility
    document.getElementById('is_active').dispatchEvent(new Event('change'));
</script>
@endpush