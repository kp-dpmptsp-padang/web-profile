<div id="createDocumentModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="createDocumentModal"></div>
    <div class="relative p-4 w-full max-w-2xl mx-auto my-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-h-[90vh] overflow-y-auto">
            <!-- Modal header - Fixed position -->
            <div class="sticky top-0 z-10 bg-white dark:bg-gray-800 px-6 py-4 border-b dark:border-gray-600">
                <div class="flex justify-between items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                        Tambah Dokumen
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createDocumentModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <form id="createDocumentForm" action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-6 space-y-6">
                    <div class="sm:col-span-2">
                        <label for="nama_dokumen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="document_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Dokumen</label>
                        <div class="flex items-center space-x-4">
                            <select name="document_type_id" id="document_type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                                <option value="">Pilih Jenis Dokumen</option>
                                @foreach($documentTypes as $documentType)
                                <option value="{{ $documentType->id }}">{{ $documentType->jenis_dokumen }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                        <select name="tahun" id="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                            <option value="">Pilih Tahun</option>
                            @for($i = date('Y'); $i >= 2010; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Dokumen</label>
                        <div id="dropzone" class="flex items-center justify-center w-full h-32 bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer dark:bg-gray-700 dark:border-gray-600">
                            <input type="file" name="file" id="file" class="hidden" required>
                            <div class="text-center">
                                <svg class="w-10 h-10 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-4 4h-4a1 1 0 01-1-1v-4h6v4a1 1 0 01-1 1z"></path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Drag & drop file disini atau klik untuk mengunggah</p>
                            </div>
                        </div>
                        <div id="filePreview" class="mt-4 hidden">
                            <p class="text-sm text-gray-500 dark:text-gray-400">File yang dipilih:</p>
                            <p id="fileName" class="text-sm font-medium text-gray-900 dark:text-white"></p>
                            <iframe id="filePreviewFrame" class="w-full h-64 mt-2 border border-gray-300 rounded-lg dark:border-gray-600"></iframe>
                        </div>
                    </div>
                </div>
                <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-end space-x-2">
                        <button type="button" data-modal-toggle="createDocumentModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleModalButtons = document.querySelectorAll('[data-modal-toggle]');
    toggleModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetModal = document.getElementById(this.getAttribute('data-modal-toggle'));
            if (targetModal) {
                targetModal.classList.toggle('hidden');
            }
        });
    });

    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('file');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const filePreviewFrame = document.getElementById('filePreviewFrame');

    dropzone.addEventListener('click', () => fileInput.click());

    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('border-red-600');
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('border-red-600');
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('border-red-600');
        const files = e.dataTransfer.files;
        if (files.length) {
            fileInput.files = files;
            showFilePreview(files[0]);
        }
    });

    fileInput.addEventListener('change', (e) => {
        const files = e.target.files;
        if (files.length) {
            showFilePreview(files[0]);
        }
    });

    function showFilePreview(file) {
        filePreview.classList.remove('hidden');
        fileName.textContent = file.name;
        const fileURL = URL.createObjectURL(file);
        filePreviewFrame.src = fileURL;
    }

    const createDocumentForm = document.getElementById('createDocumentForm');
    createDocumentForm.addEventListener('submit', function(event) {
        event.preventDefault();
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
                    text: 'Dokumen berhasil ditambahkan.',
                    icon: 'success',
                    confirmButtonColor: "#229CDB",
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Gagal menambahkan dokumen.',
                    icon: 'error',
                    confirmButtonColor: "#229CDB",
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Gagal',
                text: 'Gagal menambahkan dokumen.',
                icon: 'error',
                confirmButtonColor: "#229CDB",
            });
        });
    });
});
</script>
@endpush    