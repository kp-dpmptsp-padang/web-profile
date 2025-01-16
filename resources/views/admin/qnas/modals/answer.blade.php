@foreach($questions as $question)
<div id="answerQuestionModal-{{ $question->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Jawab Pertanyaan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="answerQuestionModal-{{ $question->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="mb-4">
                    <div class="flex items-start mb-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-900 dark:text-white"><strong>Nama Penanya:</strong> {{ $question->nama_penanya }}</p>
                            <p class="text-sm text-gray-900 dark:text-white"><strong>Email Penanya:</strong> {{ $question->email_penanya }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $question->created_at->format('d M Y, H:i:s') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start mb-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                        </div>
                        <div class="ml-3 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow">
                            <p class="text-sm text-gray-900 dark:text-white"><strong>Pertanyaan:</strong> {{ $question->pertanyaan }}</p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('qna.update', $question->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <textarea name="jawaban" id="jawaban" rows="4" class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Tulis jawaban di sini..."></textarea>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="flex justify-end p-6 border-t border-gray-200 dark:border-gray-600">
                <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-hide="answerQuestionModal-{{ $question->id }}">
                    Batal
                </button>
                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center ml-2">
                    Kirim Jawaban
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach