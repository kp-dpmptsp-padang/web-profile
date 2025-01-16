@foreach($posts as $post)
<div id="deletePostModal-{{ $post->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="deletePostModal-{{ $post->id }}"></div>
    <div class="relative p-4 w-full max-w-xl mx-auto my-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-6 h-6 mr-2 text-red-600 dark:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Konfirmasi Hapus Postingan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deletePostModal-{{ $post->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="delete-post-form">
                @csrf
                @method('DELETE')
                <div class="p-4 md:p-5 space-y-4">
                    <div class="flex items-center p-4 mb-4 text-red-800 bg-red-50 rounded-lg dark:bg-gray-700 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <div class="ml-3 text-sm">
                            Tindakan ini tidak dapat dibatalkan. Postingan yang dihapus tidak dapat dikembalikan.
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-700">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Judul Postingan</label>
                            <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $post->judul }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Tanggal Publikasi</label>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $post->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Tags</label>
                            <div class="flex flex-wrap gap-2">
                                @forelse($post->tags as $tag)
                                    <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                        {{ $tag->tag }}
                                    </span>
                                @empty
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Tidak ada tag</span>
                                @endforelse
                            </div>
                        </div>
                        @if($post->pictures && $post->pictures->count() > 0)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Gambar yang Akan Dihapus</label>
                                <p class="text-sm text-red-600 dark:text-red-400">{{ $post->pictures->count() }} gambar akan dihapus</p>
                            </div>
                        @endif
                    </div>

                    <p class="text-sm text-gray-500 dark:text-gray-300">
                        Ketik <span class="font-medium text-red-600">HAPUS</span> untuk mengkonfirmasi penghapusan postingan ini.
                    </p>
                    <input type="text" name="confirm_delete" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="HAPUS" required>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 space-x-3">
                    <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-toggle="deletePostModal-{{ $post->id }}">
                        Batal
                    </button>
                    <button type="submit" id="confirm-delete-{{ $post->id }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" disabled>
                        Hapus Postingan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize delete confirmation for each post modal
    document.querySelectorAll('[id^="deletePostModal-"]').forEach(modal => {
        const postId = modal.id.split('-')[1];
        const form = modal.querySelector('form');
        const confirmInput = form.querySelector('input[name="confirm_delete"]');
        const deleteButton = document.getElementById(`confirm-delete-${postId}`);

        confirmInput.addEventListener('input', function(e) {
            deleteButton.disabled = e.target.value !== 'HAPUS';
        });

        form.addEventListener('submit', function(e) {
            if (confirmInput.value !== 'HAPUS') {
                e.preventDefault();
                return false;
            }
        });
    });
});
</script>