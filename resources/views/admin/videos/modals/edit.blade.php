@foreach($videos as $video)
<div id="editVideoModal-{{ $video->id }}" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 max-h-[90vh] overflow-y-auto">
            <!-- Modal header - Fixed position -->
            <div class="sticky top-0 z-10 bg-white dark:bg-gray-800 px-6 py-4 border-b dark:border-gray-600">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>  
                        Edit Video
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editVideoModal-{{ $video->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
            </div>
            <!-- Modal body -->
            <form id="editVideoForm-{{ $video->id }}" action="{{ route('video.update', $video->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6 space-y-6">
                    <div class="sm:col-span-2">
                        <label for="judul-{{ $video->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Video</label>
                        <input type="text" name="judul" id="judul-{{ $video->id }}" value="{{ $video->judul }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="deskripsi-{{ $video->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi (maksimal 150 karakter)</label>
                        <textarea name="deskripsi" id="deskripsi-{{ $video->id }}" maxlength="150" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">{{ $video->deskripsi }}</textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="url-{{ $video->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL Video</label>
                        <input type="text" name="url" id="url-{{ $video->id }}" value="{{ $video->url }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                </div>
                <!-- Modal footer - Fixed position -->
                <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-end space-x-2">
                        <button type="button" data-modal-toggle="editVideoModal-{{ $video->id }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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
    document.querySelectorAll('[id^="editVideoForm-"]').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            const deskripsi = formData.get('deskripsi');
            if (deskripsi.length > 150) {
                Swal.fire({
                    title: 'Kesalahan',
                    text: 'Deskripsi tidak boleh lebih dari 150 karakter.',
                    icon: 'error'
                });
                return;
            }

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
                        text: 'Video berhasil diperbarui.',
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