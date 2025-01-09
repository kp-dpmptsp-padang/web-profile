@extends('layouts.app')

@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Header and Add Button Section -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Tag</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola daftar tag</p>
            </div>
            <button type="button" 
                    data-modal-target="createTagModal" 
                    data-modal-toggle="createTagModal" 
                    class="inline-flex items-center px-5 py-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Tambah Tag Baru
            </button>
        </div>

        <!-- Table Section -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <div class="overflow-x-auto">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4">No</th>
                                <th scope="col" class="px-6 py-4">Tag</th>
                                <th scope="col" class="px-6 py-4">Ditambahkan Pada</th>
                                <th scope="col" class="px-6 py-4">Postingan</th>
                                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tags as $index => $tag)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $tag->tag }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $tag->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $tag->posts->count() }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-4">
                                            <button type="button"
                                                    data-modal-target="editTagModal-{{ $tag->id }}"
                                                    data-modal-toggle="editTagModal-{{ $tag->id }}"
                                                    class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                                Ubah
                                            </button>
                                            <button type="button"
                                                    data-modal-target="deleteTagModal-{{ $tag->id }}"
                                                    data-modal-toggle="deleteTagModal-{{ $tag->id }}"
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                            <p class="text-lg font-medium">Tidak ada tag</p>
                                            <p class="mt-1 text-sm">Klik tombol "Tambah Tag Baru" untuk membuat tag baru</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@include('admin.tags.modals.create')
@include('admin.tags.modals.edit')
@include('admin.tags.modals.delete')

@push('scripts')
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            html: `<ul class="text-left">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>`,
        });
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('success') }}",
        });
    </script>
@endif
@endpush
@endsection