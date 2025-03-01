@extends('layouts.app')
@section('title', content: 'Manajemen Fasilitas | Admin DPMPTSP Kota Padang')
@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Fasilitas</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola Daftar Fasilitas</p>
            </div>
            <div class="w-full md:w-auto">
                <button type="button" 
                        data-modal-target="createFacilityModal" 
                        data-modal-toggle="createFacilityModal" 
                        class="w-full md:w-auto inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah Fasilitas Baru
                </button>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4">No</th>
                            <th scope="col" class="px-6 py-4">Nama</th>
                            <th scope="col" class="px-6 py-4">Deskripsi</th>
                            <th scope="col" class="px-6 py-4">Gambar</th>
                            <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($facilities as $index => $facility)
                            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $facilities->firstItem() + $index }}</td>
                                <td class="px-6 py-4">{{ $facility->nama }}</td>
                                <td class="px-6 py-4">{{ $facility->deskripsi }}</td>
                                <td class="px-6 py-4">
                                    @if($facility->pictures->isNotEmpty())
                                        <div class="aspect-w-16 aspect-h-9" style="width: 150px;">
                                            <img src="{{ asset('storage/' . $facility->pictures->first()->nama_file) }}" 
                                                 alt="Gambar Fasilitas" 
                                                 class="object-cover rounded-lg w-full h-full">
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-4">
                                        <button type="button"
                                                data-modal-target="editFacilityModal-{{ $facility->id }}"
                                                data-modal-toggle="editFacilityModal-{{ $facility->id }}"
                                                class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                            Ubah
                                        </button>
                                        <button type="button"
                                                data-modal-target="deleteFacilityModal-{{ $facility->id }}"
                                                data-modal-toggle="deleteFacilityModal-{{ $facility->id }}"
                                                class="font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                        <p class="text-lg font-medium">Tidak ada fasilitas</p>
                                        <p class="mt-1 text-sm">Klik tombol "Tambah Fasilitas" untuk membuat fasilitas baru</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $facilities->withQueryString()->links() }}
            </div>
        </div>
    </div>
</section>

@include('admin.facilities.modals.create')
@include('admin.facilities.modals.delete')
@include('admin.facilities.modals.edit')

@endsection