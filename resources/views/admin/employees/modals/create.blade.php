<div id="createEmployeeModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="createEmployeeModal"></div>
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Tambah Pegawai
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createEmployeeModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form id="createEmployeeForm" action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-6 space-y-6">
                    <div class="sm:col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                        <input type="text" name="nip" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                    <div class="sm:col-span-2 space-y-4">
                        <label for="file" class="block text-sm font-medium text-gray-900 dark:text-white">Dokumen</label>
                        
                        <!-- Custom file input -->
                        <div class="flex items-center justify-center w-full">
                            <label for="file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:bg-gray-700 dark:bg-gray-700 dark:border-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PDF, DOC, DOCX (MAX. 10MB)</p>
                                </div>
                                <input type="file" name="file" id="file" class="hidden" accept=".pdf,.doc,.docx" required />
                            </label>
                        </div>
                    
                        <!-- Preview container -->
                        <div id="filePreviewContainer" class="hidden">
                            <!-- PDF Preview -->
                            <div id="pdfPreview" class="hidden">
                                <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                    <div class="flex items-center space-x-4">
                                        <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="flex-1 min-w-0">
                                            <p id="fileName" class="text-sm font-medium text-gray-900 truncate dark:text-white"></p>
                                            <p id="fileSize" class="text-sm text-gray-500 truncate dark:text-gray-400"></p>
                                        </div>
                                        <button type="button" id="removeFile" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Simpan</button>
                    <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-toggle="createEmployeeModal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const createEmployeeForm = document.getElementById('createEmployeeForm');
    createEmployeeForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Pegawai berhasil ditambahkan.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#10b981'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Gagal',
                    text: data.message || 'Gagal menambahkan pegawai.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#dc2626'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Gagal',
                text: error.message || 'Gagal menambahkan pegawai.',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#dc2626'
            });
        });
    });
    const fileInput = document.getElementById('file');
    const filePreviewContainer = document.getElementById('filePreviewContainer');
    const pdfPreview = document.getElementById('pdfPreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const removeFile = document.getElementById('removeFile');

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) {
            filePreviewContainer.classList.add('hidden');
            return;
        }

        // Validate file size (10MB max)
        if (file.size > 10 * 1024 * 1024) {
            Swal.fire({
                title: 'Error',
                text: 'Ukuran file tidak boleh lebih dari 10MB',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#dc2626'
            });
            fileInput.value = '';
            return;
        }

        // Show preview container
        filePreviewContainer.classList.remove('hidden');
        pdfPreview.classList.remove('hidden');

        // Update file info
        fileName.textContent = file.name;
        fileSize.textContent = formatFileSize(file.size);
    });

    removeFile.addEventListener('click', function() {
        fileInput.value = '';
        filePreviewContainer.classList.add('hidden');
        pdfPreview.classList.add('hidden');
    });

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
});
</script>
@endpush