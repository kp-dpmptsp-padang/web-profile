<div id="createTestimonyModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="createTestimonyModal"></div>
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Tambah Testimoni Baru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createTestimonyModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form action="{{ route('testimony.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-6">
                    <div>
                        <label for="service_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Pelayanan</label>
                        <select name="service_type_id" id="service_type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                            <option value="">Pilih Jenis Pelayanan</option>
                            @foreach($serviceTypes as $serviceType)
                                <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                        <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                    <div>
                        <label for="queue_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Antrian</label>
                        <input type="text" name="queue_number" id="queue_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                    <div>
                        <label for="testimony" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Testimoni</label>
                        <textarea name="testimony" id="testimony" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required></textarea>
                    </div>
                </div>
                <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-end space-x-2">
                        <button type="button" data-modal-toggle="createTestimonyModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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
@if ($errors->has('service_type_id') || $errors->has('date') || $errors->has('queue_number') || $errors->has('testimony'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan',
            text: "Terjadi kesalahan saat menambahkan testimoni. Silakan periksa kembali inputan Anda.",
            confirmButtonColor: "#229CDB",
        }).then(() => {
            document.querySelector('[data-modal-toggle="createTestimonyModal"]').click();
        });
    </script>
@endif
@endpush