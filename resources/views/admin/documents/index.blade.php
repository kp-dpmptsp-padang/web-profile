@extends('layouts.app')

@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Dokumen</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola daftar dokumen</p>
            </div>
        </div>

        <div class="mb-6">
            <form id="searchDocumentForm" action="{{ route('document.index') }}" method="GET">
                <div class="flex flex-col md:flex-row gap-3">
                    <div class="w-full md:w-2/5 lg:w-1/3">
                        <input 
                            type="text" 
                            name="search" 
                            id="search" 
                            placeholder="Cari Dokumen" 
                            value="{{ request('search') }}" 
                            class="w-full h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                        >
                    </div>
                    
                    <div class="w-full md:w-1/5 lg:w-1/6">
                        <select 
                            name="document_type" 
                            id="document_type" 
                            class="w-full h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                        >
                            <option value="">Semua Jenis</option>
                            @foreach($documentTypes as $documentType)
                            <option value="{{ $documentType->id }}" {{ request('document_type') == $documentType->id ? 'selected' : '' }}>{{ $documentType->jenis_dokumen }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="w-full md:w-1/5 lg:w-1/6">
                        <select 
                            name="year" 
                            id="year" 
                            class="w-full h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                        >
                            <option value="">Semua Tahun</option>
                            @for($i = date('Y'); $i >= 2000; $i--)
                            <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    
                    <div class="w-full md:w-1/5 lg:w-1/6">
                        <button 
                            type="submit" 
                            class="w-full h-10 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                        >
                            Cari
                        </button>
                    </div>

                    <div class="w-full md:w-1/5 lg:w-1/6 md:ml-auto">
                        <button 
                            type="button" 
                            data-modal-target="createDocumentModal" 
                            data-modal-toggle="createDocumentModal" 
                            class="w-full h-10 inline-flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mt-3 md:mt-0"
                        >
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Tambah Dokumen
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4">No</th>
                            <th scope="col" class="px-6 py-4">Nama Dokumen</th>
                            <th scope="col" class="px-6 py-4">Jenis Dokumen</th>
                            <th scope="col" class="px-6 py-4">Tahun</th>
                            <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($documents as $index => $document)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $documents->firstItem() + $index }}</td>
                            <td class="px-6 py-4">{{ $document->nama }}</td>
                            <td class="px-6 py-4">{{ $document->jenis->jenis_dokumen ?? 'Tidak ada jenis' }}</td>
                            <td class="px-6 py-4">{{ $document->tahun }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-4">
                                    <button type="button" 
                                            data-modal-target="editDocumentModal-{{ $document->id }}" 
                                            data-modal-toggle="editDocumentModal-{{ $document->id }}" 
                                            class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                        Ubah
                                    </button>
                                    <button type="button" 
                                            data-modal-target="deleteDocumentModal-{{ $document->id }}" 
                                            data-modal-toggle="deleteDocumentModal-{{ $document->id }}" 
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
                                <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                                    <p class="text-lg font-medium">Tidak ada dokumen</p>
                                    <p class="mt-1 text-sm">Tambahkan dokumen baru untuk memulai</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $documents->withQueryString()->links() }}
            </div>
        </div>
    </div>
</section>

@include('admin.documents.modals.create')
@include('admin.documents.modals.delete')
@include('admin.documents.modals.edit')

@if(session('success'))
<script>
    Swal.fire({
        title: 'Berhasil',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
@endsection