@foreach($posts as $post)
<div id="editPostModal-{{ $post->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="editPostModal-{{ $post->id }}"></div>
    <div class="relative p-4 w-full max-w-5xl mx-auto my-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-h-[90vh] overflow-y-auto">
            <!-- Modal header - Fixed position -->
            <div class="sticky top-0 z-10 bg-white dark:bg-gray-800 px-6 py-4 border-b dark:border-gray-600">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Postingan
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editPostModal-{{ $post->id }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal Form -->
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="edit-post-form">
                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <ul class="list-disc pl-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                @method('PUT')
                <input type="hidden" name="jenis" value="{{ $post->jenis }}">
                <div class="p-6 space-y-6">
                    <!-- Grid Layout untuk Form -->
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Judul Input -->
                        <div>
                            <label for="judul-{{ $post->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                            <input type="text" name="judul" id="judul-{{ $post->id }}" value="{{ $post->judul }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                        </div>

                        <!-- Konten Input -->
                        <div>
                            <label for="konten-{{ $post->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten</label>
                            <textarea name="konten" id="konten-{{ $post->id }}" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>{{ $post->konten }}</textarea>
                        </div>

                        <!-- Tags Section -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                <a href="{{ route('tags.index') }}" class="text-sm text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Kelola Tags
                                </a>
                            </div>
                            <div class="flex space-x-2">
                                <select id="tag-select-{{ $post->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                                    <option value="">Pilih tag...</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                    @endforeach
                                </select>
                                <button type="button" id="add-tag-{{ $post->id }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add
                                </button>
                            </div>
                            <div id="selected-tags-{{ $post->id }}" class="mt-3 flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                    <div class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                        <input type="hidden" name="tags[]" value="{{ $tag->id }}">
                                        <span>{{ $tag->tag }}</span>
                                        <button type="button" class="remove-tag ml-2 text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Images Section -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Images</label>
                            <!-- Drag & Drop Zone -->
                            <div class="flex items-center justify-center w-full">
                                <label for="images-{{ $post->id }}" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                    <div class="flex flex-col items-center justify-center pt-4 pb-3">
                                        <svg class="w-7 h-7 mb-3 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF (MAX. 2MB per file)</p>
                                    </div>
                                    <input type="file" name="images[]" id="images-{{ $post->id }}" class="hidden" multiple accept="image/*"/>
                                </label>
                            </div>

                            <!-- Image Preview Grid -->
                            <div class="mt-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Existing Images</label>
                                <div id="image-preview-{{ $post->id }}" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @if($post->pictures)
                                        @foreach($post->pictures as $picture)
                                            <div class="relative group" data-image-id="{{ $picture->id }}">
                                                <img src="{{ asset('storage/' . $picture->nama_file) }}" class="h-40 w-full rounded-lg object-cover" alt="Preview">
                                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity rounded-lg">
                                                    <button type="button" class="text-white hover:text-red-500 p-2 rounded-full hover:bg-white hover:bg-opacity-20 transition-colors remove-image">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs p-1 truncate rounded-b-lg">
                                                    {{ basename($picture->nama_file) }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Lanjutan Modal Footer -->
                <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-end space-x-2">
                        <button type="button" data-modal-toggle="editPostModal-{{ $post->id }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Batal
                        </button>
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- JavaScript for Edit Post Modal -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tag management for each post modal
    document.querySelectorAll('[id^="editPostModal-"]').forEach(modal => {
        const postId = modal.id.split('-')[1];
        const addTagBtn = document.getElementById(`add-tag-${postId}`);
        const tagSelect = document.getElementById(`tag-select-${postId}`);
        const selectedTagsContainer = document.getElementById(`selected-tags-${postId}`);
        const imageInput = document.getElementById(`images-${postId}`);
        const imagePreview = document.getElementById(`image-preview-${postId}`);
        const form = modal.querySelector('form');
        
        // Fungsi untuk memeriksa apakah tag sudah dipilih
        function isTagSelected(tagId) {
            return selectedTagsContainer.querySelector(`input[name="tags[]"][value="${tagId}"]`) !== null;
        }
        
        // Fungsi untuk memperbarui status option di select
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
        
        // Initial update of select options
        updateTagSelectOptions();
        
        // Event listener untuk tombol Add tag
        addTagBtn.addEventListener('click', function() {
            const selectedTagId = tagSelect.value;
            if (!selectedTagId) return;
            
            const selectedTagText = tagSelect.options[tagSelect.selectedIndex].text;
            
            if (!isTagSelected(selectedTagId)) {
                const tagElement = document.createElement('div');
                tagElement.className = 'inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                tagElement.innerHTML = `
                    <input type="hidden" name="tags[]" value="${selectedTagId}">
                    <span>${selectedTagText}</span>
                    <button type="button" class="remove-tag ml-2 text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                `;
                
                selectedTagsContainer.appendChild(tagElement);
                updateTagSelectOptions();
            }
        });
        
        // Event delegation untuk tombol remove tag
        selectedTagsContainer.addEventListener('click', function(e) {
            const removeBtn = e.target.closest('.remove-tag');
            if (removeBtn) {
                const tagElement = removeBtn.closest('.inline-flex');
                if (tagElement) {
                    tagElement.remove();
                    updateTagSelectOptions();
                }
            }
        });
        
        // Form validation
        form.addEventListener('submit', function(e) {
            const selectedTags = selectedTagsContainer.querySelectorAll('input[name="tags[]"]');
            if (selectedTags.length === 0) {
                e.preventDefault();
                alert('Pilih setidaknya satu tag untuk postingan.');
                return false;
            }
        });

        // Drag and Drop functionality
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
            handleFiles(files);
        }

        // Image handling
        function handleFiles(files) {
            files.forEach(file => {
                if (validateFile(file)) {
                    previewFile(file);
                }
            });
        }

        function validateFile(file) {
            if (!file.type.startsWith('image/')) {
                alert(`File "${file.name}" bukan file gambar yang valid.`);
                return false;
            }
            if (file.size > 2 * 1024 * 1024) {
                alert(`File "${file.name}" terlalu besar. Maksimal ukuran file adalah 2MB.`);
                return false;
            }
            return true;
        }

        function previewFile(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.className = 'relative group';
                imgContainer.innerHTML = `
                    <img src="${e.target.result}" class="h-40 w-full rounded-lg object-cover" alt="Preview">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity rounded-lg">
                        <button type="button" class="text-white hover:text-red-500 p-2 rounded-full hover:bg-white hover:bg-opacity-20 transition-colors remove-image">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs p-1 truncate rounded-b-lg">
                        ${file.name}
                    </div>
                `;
                
                imagePreview.appendChild(imgContainer);
            };
            reader.readAsDataURL(file);
        }

        // File input change handler
        imageInput.addEventListener('change', function(e) {
            handleFiles(Array.from(this.files));
        });

        // Handle image removal
        imagePreview.addEventListener('click', function(e) {
            const removeBtn = e.target.closest('.remove-image');
            if (removeBtn) {
                const imgContainer = removeBtn.closest('.relative');
                if (imgContainer) {
                    const imageId = imgContainer.dataset.imageId;
                    if (imageId) {
                        // Create hidden input for tracking deleted images
                        const deletedInput = document.createElement('input');
                        deletedInput.type = 'hidden';
                        deletedInput.name = 'deleted_images[]';
                        deletedInput.value = imageId;
                        form.appendChild(deletedInput);
                    }
                    imgContainer.remove();
                }
            }
        });
    });
});
</script>