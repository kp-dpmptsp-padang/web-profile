@foreach($posts as $post)
<div id="viewPostModal-{{ $post->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="viewPostModal-{{ $post->id }}"></div>
    <div class="relative p-4 w-full max-w-5xl mx-auto my-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-h-[90vh] overflow-y-auto">
            <!-- Modal header - Fixed position -->
            <div class="sticky top-0 z-10 bg-white dark:bg-gray-800 px-6 py-4 border-b dark:border-gray-600">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Detail Postingan
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="viewPostModal-{{ $post->id }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <!-- Main Content -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Left Column - Images -->
                    <div class="md:col-span-1">
                        @if($post->pictures && $post->pictures->count() > 0)
                            <div class="space-y-4">
                                <label class="block text-sm font-medium text-gray-900 dark:text-white">Gambar Postingan</label>
                                <div class="grid gap-4">
                                    @foreach($post->pictures as $picture)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $picture->nama_file) }}" alt="Post image" class="h-auto max-w-full rounded-lg">
                                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-opacity rounded-lg flex items-center justify-center">
                                                <a href="{{ asset('storage/' . $picture->nama_file) }}" target="_blank" class="text-white opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Right Column - Details -->
                    <div class="md:col-span-2 space-y-6">
                        <!-- Header Info -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 flex justify-between items-start">
                            <div>
                                <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $post->judul }}</h4>
                                <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        {{ $post->penulis->name }}
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $post->created_at->format('d M Y, H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten</label>
                            <div class="bg-gray-50 border border-gray-300 rounded-lg p-4 dark:bg-gray-700 dark:border-gray-600">
                                <p class="text-gray-900 dark:text-white whitespace-pre-line">{{ $post->konten }}</p>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                            <div class="flex flex-wrap gap-2">
                                @forelse($post->tags as $tag)
                                    <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full dark:bg-red-900 dark:text-red-300">
                                        {{ $tag->tag }}
                                    </span>
                                @empty
                                    <span class="text-gray-500 dark:text-gray-400 text-sm">Tidak ada tag</span>
                                @endforelse
                            </div>
                        </div>

                        <!-- Additional Info -->
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t dark:border-gray-600">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Created At</label>
                                <p class="text-sm text-gray-900 dark:text-white">{{ $post->created_at->format('d M Y, H:i:s') }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Updated At</label>
                                <p class="text-sm text-gray-900 dark:text-white">{{ $post->updated_at->format('d M Y, H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                <div class="flex justify-end">
                    <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-toggle="viewPostModal-{{ $post->id }}">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach