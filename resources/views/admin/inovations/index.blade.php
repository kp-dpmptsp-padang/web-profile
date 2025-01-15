@extends('layouts.app')

@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Inovasi</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola koleksi inovasi Anda dengan mudah</p>
            </div>
            <button type="button" 
                    data-modal-target="createInovationModal" 
                    data-modal-toggle="createInovationModal" 
                    class="inline-flex items-center px-5 py-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Tambah Inovasi Baru
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="mr-2">
                        <button class="inline-flex items-center px-4 py-3 text-red-600 border-b-2 border-red-600 rounded-t-lg active dark:text-red-500 dark:border-red-500 group" 
                                id="publik-tab" 
                                data-tabs-target="#publik" 
                                type="button" 
                                role="tab" 
                                aria-controls="publik" 
                                aria-selected="true">
                            Publik
                            <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                {{ $publishedInovations->count() }}
                            </span>
                        </button>
                    </li>
                    <li class="mr-2">
                        <button class="inline-flex items-center px-4 py-3 text-gray-500 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 group"
                                id="tidak-publik-tab" 
                                data-tabs-target="#tidak-publik" 
                                type="button" 
                                role="tab" 
                                aria-controls="tidak-publik" 
                                aria-selected="false">
                            Tidak Publik
                            <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-gray-800 bg-gray-100 rounded-full">
                                {{ $unpublishedInovations->count() }}
                            </span>
                        </button>
                    </li>
                </ul>
            </div>

            <div id="tabContents">
                <div class="block p-4" id="publik" role="tabpanel" aria-labelledby="publik-tab">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Nama</th>
                                    <th scope="col" class="px-6 py-4">Deskripsi</th>
                                    <th scope="col" class="px-6 py-4">URL</th>
                                    <th scope="col" class="px-6 py-4">Logo</th>
                                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($publishedInovations as $inovation)
                                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $inovation->nama }}</td>
                                        <td class="px-6 py-4">{{ $inovation->deskripsi }}</td>
                                        <td class="px-6 py-4">{{ $inovation->url }}</td>
                                        <td class="px-6 py-4">
                                            @if($inovation->pictures->isNotEmpty())
                                                <div class="aspect-w-16 aspect-h-9" style="width: 150px;">
                                                    <img src="{{ asset('storage/' . $inovation->pictures->first()->nama_file) }}" 
                                                         alt="Logo Inovasi" 
                                                         class="object-cover rounded-lg w-full h-full">
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-4">
                                                <button type="button"
                                                        data-modal-target="editInovationModal-{{ $inovation->id }}"
                                                        data-modal-toggle="editInovationModal-{{ $inovation->id }}"
                                                        class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                                    Ubah
                                                </button>
                                                <button type="button"
                                                        data-modal-target="deleteInovationModal-{{ $inovation->id }}"
                                                        data-modal-toggle="deleteInovationModal-{{ $inovation->id }}"
                                                        class="font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                    Hapus
                                                </button>
                                                <button onclick="toggleInovationStatus({{ $inovation->id }}, false)"
                                                        class="font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                                                    Nonaktifkan
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                                </svg>
                                                <p class="text-lg font-medium">Tidak ada inovasi publik</p>
                                                <p class="mt-1 text-sm">Publikasikan inovasi atau tambahkan inovasi baru</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $publishedInovations->withQueryString()->links() }}
                    </div>
                </div>

                <div class="hidden p-4" id="tidak-publik" role="tabpanel" aria-labelledby="tidak-publik-tab">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Nama</th>
                                    <th scope="col" class="px-6 py-4">Deskripsi</th>
                                    <th scope="col" class="px-6 py-4">URL</th>
                                    <th scope="col" class="px-6 py-4">Logo</th>
                                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($unpublishedInovations as $inovation)
                                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $inovation->nama }}</td>
                                        <td class="px-6 py-4">{{ $inovation->deskripsi }}</td>
                                        <td class="px-6 py-4">{{ $inovation->url }}</td>
                                        <td class="px-6 py-4">
                                            @if($inovation->pictures->isNotEmpty())
                                                <div class="aspect-w-16 aspect-h-9" style="width: 150px;">
                                                    <img src="{{ asset('storage/' . $inovation->pictures->first()->nama_file) }}" 
                                                         alt="Logo Inovasi" 
                                                         class="object-cover rounded-lg w-full h-full">
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-4">
                                                <button type="button"
                                                        data-modal-target="editInovationModal-{{ $inovation->id }}"
                                                        data-modal-toggle="editInovationModal-{{ $inovation->id }}"
                                                        class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                                    Ubah
                                                </button>
                                                <button type="button"
                                                        data-modal-target="deleteInovationModal-{{ $inovation->id }}"
                                                        data-modal-toggle="deleteInovationModal-{{ $inovation->id }}"
                                                        class="font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                    Hapus
                                                </button>
                                                <button onclick="toggleInovationStatus({{ $inovation->id }}, true)"
                                                        class="font-medium text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">
                                                    Publikasikan
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                            <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                            </svg>
                                                <p class="text-lg font-medium">Tidak ada inovasi tidak publik</p>
                                                <p class="mt-1 text-sm">Semua inovasi sedang publik</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $unpublishedInovations->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('admin.inovations.modals.create')
@include('admin.inovations.modals.edit', ['inovations' => $publishedInovations->merge($unpublishedInovations)])
@include('admin.inovations.modals.delete', ['inovations' => $publishedInovations->merge($unpublishedInovations)])

@endsection

@push('scripts')
<script>
    const tabButtons = document.querySelectorAll('[role="tab"]');
    const tabPanels = document.querySelectorAll('[role="tabpanel"]');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            tabButtons.forEach(btn => {
                btn.setAttribute('aria-selected', 'false');
                btn.classList.remove('text-red-600', 'border-red-600', 'dark:text-red-500', 'dark:border-red-500');
                btn.classList.add('border-transparent');
            });

            tabPanels.forEach(panel => {
                panel.classList.add('hidden');
            });

            button.setAttribute('aria-selected', 'true');
            button.classList.remove('border-transparent');
            button.classList.add('text-red-600', 'border-red-600', 'dark:text-red-500', 'dark:border-red-500');

            const panelId = button.getAttribute('aria-controls');
            document.getElementById(panelId).classList.remove('hidden');
        });
    });

    function toggleInovationStatus(inovationId, status) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Anda akan ${status ? 'mempublikasikan' : 'menonaktifkan'} inovasi ini.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lakukan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/inovasi/${inovationId}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ is_published: status })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: `Inovasi berhasil ${status ? 'dipublikasikan' : 'dinonaktifkan'}`,
                            icon: 'success'
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
                        text: `Gagal ${status ? 'mempublikasikan' : 'menonaktifkan'} inovasi`,
                        icon: 'error'
                    });
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const defaultTab = document.querySelector('[role="tab"][aria-selected="true"]');
        if (defaultTab) {
            defaultTab.click();
        }
    });
</script>
@endpush