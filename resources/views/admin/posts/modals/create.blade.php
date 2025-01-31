<div id="createPostModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="createPostModal"></div>
    <div class="relative p-4 w-full max-w-5xl mx-auto my-auto"> <!-- Increased max-width and centered -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-h-[90vh] overflow-y-auto"> <!-- Added max height and overflow -->
            <!-- Modal header - Fixed position -->
            <div class="sticky top-0 z-10 bg-white dark:bg-gray-800 px-6 py-4 border-b dark:border-gray-600">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        @if(request()->query('type') == 'berita')
                            Tambah Berita Baru
                        @else
                            Tambah Informasi Baru
                        @endif
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createPostModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal body - Scrollable content -->
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="createPostForm">
                @csrf
                <input type="hidden" name="type" value="{{ request()->query('type', 'berita') }}">
                <div class="p-6 space-y-6">
                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                        <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Masukkan judul postingan..." required>
                    </div>

                    <!-- Konten -->
                    <div>
                        <label for="konten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten</label>
                        <textarea name="konten" id="konten" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Tulis konten postingan..." required></textarea>
                    </div>

                    <div>
                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Sumber</label>
                        <input type="text" name="link" id="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Masukkan link sumber jika ada...">
                    </div>

                    <div>
                        <label for="tanggal_publikasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Rilis</label>
                        <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>

                    <!-- Tags -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                            <a href="{{ route('tags.index') }}" class="text-sm text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Kelola Tags
                            </a>
                        </div>
                        <div class="flex space-x-2">
                            <select id="tag-select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                                <option value="">Pilih tag...</option>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                @endforeach
                            </select>
                            <button type="button" id="add-tag" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah
                            </button>
                        </div>
                        <div id="selected-tags" class="mt-3 flex flex-wrap gap-2">
                            <!-- Selected tags will be displayed here -->
                        </div>
                    </div>



                    <!-- Images -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Images</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="images" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                <div class="flex flex-col items-center justify-center pt-4 pb-3">
                                    <svg class="w-7 h-7 mb-3 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF (MAX. 2MB per file)</p>
                                </div>
                                <input type="file" name="images[]" id="images" class="hidden" multiple accept="image/*"/>
                            </label>
                        </div>
                        <!-- Image preview container -->
                        <div id="image-preview" class="mt-4 grid grid-cols-3 md:grid-cols-4 gap-4">
                            <!-- Image previews will be displayed here -->
                        </div>
                    </div>
                </div>

                <!-- Modal footer - Fixed position -->
                <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-end space-x-2">
                        <button type="button" data-modal-toggle="createPostModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('createPostForm');
    const addTagBtn = document.getElementById('add-tag');
    const tagSelect = document.getElementById('tag-select');
    const selectedTagsContainer = document.getElementById('selected-tags');
    const imageInput = document.getElementById('images');
    const imagePreview = document.getElementById('image-preview');
    let selectedFiles = new Set();

    // Tag Management
    function isTagSelected(tagId) {
        return selectedTagsContainer.querySelector(`input[name="tags[]"][value="${tagId}"]`) !== null;
    }

    function updateTagSelectOptions() {
        Array.from(tagSelect.options).forEach(option => {
            if (option.value && isTagSelected(option.value)) {
                option.disabled = true;
            } else {
                option.disabled = false;
            }
        });
        tagSelect.value = '';
    }

    function createTagElement(tagId, tagText) {
        const tagElement = document.createElement('div');
        tagElement.className = 'inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
        tagElement.innerHTML = `
            <input type="hidden" name="tags[]" value="${tagId}">
            <span>${tagText}</span>
            <button type="button" class="remove-tag ml-2 inline-flex items-center p-0.5 text-red-400 hover:text-red-900 dark:hover:text-red-300">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        `;
        return tagElement;
    }

    // Add Tag Button Click Handler
    addTagBtn.addEventListener('click', function() {
        const selectedTagId = tagSelect.value;
        if (!selectedTagId) return;

        const selectedTagText = tagSelect.options[tagSelect.selectedIndex].text;

        if (!isTagSelected(selectedTagId)) {
            const tagElement = createTagElement(selectedTagId, selectedTagText);
            selectedTagsContainer.appendChild(tagElement);
            updateTagSelectOptions();

            // Add remove event listener
            tagElement.querySelector('.remove-tag').addEventListener('click', function() {
                tagElement.remove();
                updateTagSelectOptions();
            });
        }
    });

    // Image Management
    function createImagePreviewElement(file, index) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewContainer = document.createElement('div');
            previewContainer.className = 'relative group';
            previewContainer.dataset.fileIndex = index;
            previewContainer.innerHTML = `
                <img src="${e.target.result}" class="h-40 w-full rounded-lg object-cover" alt="Preview">
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity rounded-lg">
                    <button type="button" class="remove-image text-white hover:text-red-500 p-2 rounded-full hover:bg-white hover:bg-opacity-20 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs p-1 truncate">
                    ${file.name}
                </div>
            `;

            // Add remove button handler
            previewContainer.querySelector('.remove-image').addEventListener('click', function() {
                selectedFiles.delete(file);
                previewContainer.remove();
                updateImageInput();
            });

            imagePreview.appendChild(previewContainer);
        };
        reader.readAsDataURL(file);
    }

    function updateImageInput() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        imageInput.files = dataTransfer.files;
    }

    function validateFile(file) {
        // Check file type
        if (!file.type.startsWith('image/')) {
            showError(`File "${file.name}" bukan file gambar yang valid.`);
            return false;
        }

        // Check file size (2MB limit)
        if (file.size > 2 * 1024 * 1024) {
            showError(`File "${file.name}" terlalu besar. Maksimal ukuran file adalah 2MB.`);
            return false;
        }

        return true;
    }

    function showError(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4';
        errorDiv.role = 'alert';
        errorDiv.innerHTML = `
            <span class="block sm:inline">${message}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </span>
        `;
        form.insertBefore(errorDiv, form.firstChild);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            errorDiv.remove();
        }, 5000);
    }

    // Image Input Change Handler
    imageInput.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);

        files.forEach((file, index) => {
            if (validateFile(file)) {
                selectedFiles.add(file);
                createImagePreviewElement(file, selectedFiles.size - 1);
            }
        });

        updateImageInput();
    });

    // Drag and Drop Handling
    const dropZone = imageInput.closest('label');
    
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
        const files = Array.from(dt.files);

        files.forEach((file, index) => {
            if (validateFile(file)) {
                selectedFiles.add(file);
                createImagePreviewElement(file, selectedFiles.size - 1);
            }
        });

        updateImageInput();
    }

    // Form Validation
    form.addEventListener('submit', function(e) {
        const errors = [];

        // Validate tags
        if (selectedTagsContainer.querySelectorAll('input[name="tags[]"]').length === 0) {
            errors.push('Pilih setidaknya satu tag untuk postingan.');
        }

        // Validate images
        if (selectedFiles.size === 0) {
            errors.push('Upload setidaknya satu gambar untuk postingan.');
        }

        if (errors.length > 0) {
            e.preventDefault();
            errors.forEach(error => showError(error));
            return false;
        }
    });
});</script>