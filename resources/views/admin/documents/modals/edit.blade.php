@foreach($documents as $document)
<div id="editDocumentModal-{{ $document->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="editDocumentModal-{{ $document->id }}"></div>
    <div class="relative p-4 w-full max-w-2xl mx-auto my-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-h-[90vh] overflow-y-auto">
            <!-- Modal header - Fixed position -->
            <div class="sticky top-0 z-10 bg-white dark:bg-gray-800 px-6 py-4 border-b dark:border-gray-600">
                <div class="flex justify-between items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                        Edit Dokumen
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editDocumentModal-{{ $document->id }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <form id="editDocumentForm-{{ $document->id }}" action="{{ route('document.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-6 space-y-6">
                    <div class="sm:col-span-2">
                        <label for="nama_dokumen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" value="{{ $document->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="document_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Dokumen</label>
                        <div class="flex items-center space-x-4">
                            <select name="document_type_id" id="document_type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                                <option value="">Pilih Jenis Dokumen</option>
                                @foreach($documentTypes as $documentType)
                                <option value="{{ $documentType->id }}" {{ $document->id_jenis == $documentType->id ? 'selected' : '' }}>{{ $documentType->jenis_dokumen }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                        <select name="tahun" id="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                            <option value="">Pilih Tahun</option>
                            @for($i = date('Y'); $i >= 2010; $i--)
                            <option value="{{ $i }}" {{ $document->tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Dokumen</label>
                        <div id="dropzone-{{ $document->id }}" class="flex items-center justify-center w-full h-32 bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer dark:bg-gray-700 dark:border-gray-600">
                            <input type="file" name="file" id="file-{{ $document->id }}" class="hidden">
                            <div class="text-center">
                                <svg class="w-10 h-10 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-4 4h-4a1 1 0 01-1-1v-4h6v4a1 1 0 01-1 1z"></path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Drag & drop file disini atau klik untuk mengunggah</p>
                            </div>
                        </div>
                        <div id="filePreview-{{ $document->id }}" class="mt-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">File yang dipilih:</p>
                            <p id="fileName-{{ $document->id }}" class="text-sm font-medium text-gray-900 dark:text-white">{{ $document->nama_file }}</p>
                            @php
                                $temporaryUrl = Storage::temporaryUrl($document->nama_file, now()->addMinutes(5));
                            @endphp
                            @if(pathinfo($document->nama_file, PATHINFO_EXTENSION) == 'pdf')
                            <iframe id="filePreviewFrame-{{ $document->id }}" src="{{ $temporaryUrl }}" class="w-full h-64 mt-2 border border-gray-300 rounded-lg dark:border-gray-600"></iframe>
                            @else
                            <a id="filePreviewLink-{{ $document->id }}" href="{{ $temporaryUrl }}" target="_blank" class="text-blue-600 dark:text-blue-400 underline">{{ $document->nama_file }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-end space-x-2">
                        <button type="button" data-modal-toggle="editDocumentModal-{{ $document->id }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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
    const toggleModalButtons = document.querySelectorAll('[data-modal-toggle]');
    toggleModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetModal = document.getElementById(this.getAttribute('data-modal-toggle'));
            if (targetModal) {
                targetModal.classList.toggle('hidden');
            }
        });
    });

    @foreach($documents as $document)
    const dropzone{{ $document->id }} = document.getElementById('dropzone-{{ $document->id }}');
    const fileInput{{ $document->id }} = document.getElementById('file-{{ $document->id }}');
    const filePreview{{ $document->id }} = document.getElementById('filePreview-{{ $document->id }}');
    const fileName{{ $document->id }} = document.getElementById('fileName-{{ $document->id }}');
    const filePreviewFrame{{ $document->id }} = document.getElementById('filePreviewFrame-{{ $document->id }}');
    const filePreviewLink{{ $document->id }} = document.getElementById('filePreviewLink-{{ $document->id }}');

    dropzone{{ $document->id }}.addEventListener('click', () => fileInput{{ $document->id }}.click());

    dropzone{{ $document->id }}.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone{{ $document->id }}.classList.add('border-red-600');
    });

    dropzone{{ $document->id }}.addEventListener('dragleave', () => {
        dropzone{{ $document->id }}.classList.remove('border-red-600');
    });

    dropzone{{ $document->id }}.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone{{ $document->id }}.classList.remove('border-red-600');
        const files = e.dataTransfer.files;
        if (files.length) {
            fileInput{{ $document->id }}.files = files;
            showFilePreview{{ $document->id }}(files[0]);
        }
    });

    fileInput{{ $document->id }}.addEventListener('change', (e) => {
        const files = e.target.files;
        if (files.length) {
            showFilePreview{{ $document->id }}(files[0]);
        }
    });

    function showFilePreview{{ $document->id }}(file) {
        filePreview{{ $document->id }}.classList.remove('hidden');
        fileName{{ $document->id }}.textContent = file.name;
        const fileURL = URL.createObjectURL(file);
        if (file.type === 'application/pdf') {
            filePreviewFrame{{ $document->id }}.src = fileURL;
            filePreviewFrame{{ $document->id }}.classList.remove('hidden');
            filePreviewLink{{ $document->id }}.classList.add('hidden');
        } else {
            filePreviewLink{{ $document->id }}.href = fileURL;
            filePreviewLink{{ $document->id }}.classList.remove('hidden');
            filePreviewFrame{{ $document->id }}.classList.add('hidden');
        }
    }

    const editDocumentForm{{ $document->id }} = document.getElementById('editDocumentForm-{{ $document->id }}');
    editDocumentForm{{ $document->id }}.addEventListener('submit', function(event) {
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
                    text: 'Dokumen berhasil diperbarui.',
                    icon: 'success',
                    confirmButtonColor: "#229CDB",
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Gagal memperbarui dokumen.',
                    icon: 'error',
                    confirmButtonColor: "#229CDB",
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Gagal',
                text: 'Gagal memperbarui dokumen.',
                icon: 'error',
                confirmButtonColor: "#229CDB",
            });
        });
    });
    @endforeach
});
</script>
@endpush