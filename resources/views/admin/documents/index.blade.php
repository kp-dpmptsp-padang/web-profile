@extends('layouts.app')

@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Header Section -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Dokumen</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola daftar dokumen</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="mb-6">
            <form id="searchDocumentForm" action="{{ route('document.index') }}" method="GET">
                <div class="flex gap-3">
                    <!-- Search Bar -->
                    <div class="w-[40%]">
                        <input 
                            type="text" 
                            name="search" 
                            id="search" 
                            placeholder="Cari Dokumen" 
                            value="{{ request('search') }}" 
                            class="w-full h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                        >
                    </div>
                    
                    <!-- Document Type Dropdown -->
                    <div class="w-[15%]">
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
                    
                    <!-- Year Dropdown -->
                    <div class="w-[15%]">
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
                    
                    <!-- Search Button -->
                    <div class="w-[15%]">
                        <button 
                            type="submit" 
                            class="w-full h-10 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                        >
                            Cari
                        </button>
                    </div>
                    
                    <!-- Add Document Button -->
                    <div class="w-[15%]">
                        <button 
                            type="button" 
                            data-modal-target="createDocumentModal" 
                            data-modal-toggle="createDocumentModal" 
                            class="w-full h-10 inline-flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 dark:bg-red-600 dark:hover:bg-red-700"
                        >
                            Tambah Dokumen
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Table Section -->
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
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $document->nama }}</td>
                            <td class="px-6 py-4">{{ $document->jenis->jenis_dokumen }}</td>
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
                                    <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
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