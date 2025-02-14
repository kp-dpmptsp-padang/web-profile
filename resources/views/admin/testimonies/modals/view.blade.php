@foreach($testimonies as $testimony)
<div id="viewTestimonyModal-{{ $testimony->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen">
    <div class="fixed inset-0 bg-gradient-to-br from-gray-900/50 to-black/70 backdrop-blur-sm transition-opacity" data-modal-hide="viewTestimonyModal-{{ $testimony->id }}"></div>
    
    <div class="relative p-4 w-full max-w-5xl mx-auto my-auto">
        <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-2xl transform transition-all duration-300 ease-in-out">
            <div class="bg-gradient-to-r from-red-600 to-red-800 rounded-t-xl px-4 py-3">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col">
                        <h3 class="text-xl font-bold text-white flex items-center space-x-2">
                            <svg class="w-6 h-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <span class="border-l-2 border-white/30 pl-2">Detail Testimoni</span>
                        </h3>
                        <p class="text-white/80 text-sm mt-1">Diberikan pada: {{ \Carbon\Carbon::parse($testimony->date)->locale('id')->isoFormat('D MMMM Y') }}</p>
                    </div>
                    <button type="button" class="text-white/80 hover:text-white bg-white/10 hover:bg-white/20 rounded-lg p-1.5 transition-all duration-200" data-modal-toggle="viewTestimonyModal-{{ $testimony->id }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg space-y-3">
                        <h4 class="text-base font-semibold text-gray-900 dark:text-white flex items-center space-x-1 mb-2">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Informasi Testimoni</span>
                        </h4>
                        
                        <div class="space-y-2">
                            <div class="group hover:bg-white dark:hover:bg-gray-700 p-2 rounded-lg transition-all duration-200">
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Jenis Pelayanan</label>
                                <p class="text-gray-900 dark:text-white">{{ $testimony->serviceType->name }}</p>
                            </div>
                            
                            <div class="group hover:bg-white dark:hover:bg-gray-700 p-2 rounded-lg transition-all duration-200">
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor Antrian</label>
                                <p class="text-gray-900 dark:text-white">{{ $testimony->queue_number }}</p>
                            </div>
                            
                            <div class="group hover:bg-white dark:hover:bg-gray-700 p-2 rounded-lg transition-all duration-200">
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal</label>
                                <p class="text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($testimony->date)->locale('id')->isoFormat('D MMMM Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg space-y-3">
                        <h4 class="text-base font-semibold text-gray-900 dark:text-white flex items-center space-x-1 mb-2">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Testimoni</span>
                        </h4>
                        
                        <div class="group hover:bg-white dark:hover:bg-gray-700 p-2 rounded-lg transition-all duration-200">
                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Isi Testimoni</label>
                            <p class="text-gray-900 dark:text-white whitespace-pre-line">{{ $testimony->testimony }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 rounded-b-xl border-t border-gray-200 dark:border-gray-700">
                <div class="flex justify-end">
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white text-sm font-medium rounded-lg transition-all duration-200" data-modal-toggle="viewTestimonyModal-{{ $testimony->id }}">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach