@foreach($inovations as $inovation)
<div id="deleteInovationModal-{{ $inovation->id }}" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Hapus Inovasi
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteInovationModal-{{ $inovation->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <form id="deleteInovationForm-{{ $inovation->id }}" action="{{ route('inovation.destroy', $inovation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="p-6 space-y-6 text-center">
                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Apakah Anda yakin ingin menghapus inovasi ini?</p>
                </div>
                <div class="flex items-center space-x-4 p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Ya, Hapus
                    </button>
                    <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-toggle="deleteInovationModal-{{ $inovation->id }}">
                        Tidak, Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@push('scripts')
<script>
    @foreach($inovations as $inovation)
    document.getElementById('deleteInovationForm-{{ $inovation->id }}').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = this;

        fetch(form.action, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: new FormData(form)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Delete response:', data); // Log the response for debugging
            if (data.success) {
                Swal.fire({
                    title: 'Dihapus!',
                    text: 'Inovasi telah dihapus.',
                    icon: 'success',
                    showConfirmButton: false,
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
                text: 'Gagal menghapus inovasi.',
                icon: 'error'
            });
        });
    });
    @endforeach
</script>
@endpush