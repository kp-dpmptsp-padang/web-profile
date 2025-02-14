@extends('layouts.app')
@section('title', content: 'Manajemen Sliders | Admin DPMPTSP Kota Padang')
@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Slider</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola Slider Halaman Utama</p>
            </div>
            <div class="w-full md:w-auto">
                <button type="button" 
                        data-modal-target="createSliderModal" 
                        data-modal-toggle="createSliderModal" 
                        class="w-full md:w-auto inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah Slider Baru
                </button>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="mr-2">
                        <button class="inline-flex items-center px-4 py-3 text-red-600 border-b-2 border-red-600 rounded-t-lg active dark:text-red-500 dark:border-red-500 group" 
                                id="active-tab" 
                                data-tabs-target="#active" 
                                type="button" 
                                role="tab" 
                                aria-controls="active" 
                                aria-selected="true">
                            Slider Aktif
                            <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                {{ $activeSliders->count() }}
                            </span>
                        </button>
                    </li>
                    <li class="mr-2">
                        <button class="inline-flex items-center px-4 py-3 text-gray-500 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 group"
                                id="inactive-tab" 
                                data-tabs-target="#inactive" 
                                type="button" 
                                role="tab" 
                                aria-controls="inactive" 
                                aria-selected="false">
                            Slider Tidak Aktif
                            <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-gray-800 bg-gray-100 rounded-full">
                                {{ $inactiveSliders->count() }}
                            </span>
                        </button>
                    </li>
                </ul>
            </div>

            <div id="tabContents">
                <div class="block p-4" id="active" role="tabpanel" aria-labelledby="active-tab">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Urutan</th>
                                    <th scope="col" class="px-6 py-4">Gambar</th>
                                    <th scope="col" class="px-6 py-4">Nama</th>
                                    <th scope="col" class="px-6 py-4">Link</th>
                                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activeSliders as $slider)
                                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $slider->order }}</td>
                                        <td class="px-6 py-4">
                                            @if($slider->pictures->isNotEmpty())
                                                <div class="aspect-w-16 aspect-h-9" style="width: 150px;">
                                                    <img src="{{ asset('storage/' . $slider->pictures->first()->nama_file) }}" 
                                                         alt="Gambar Slider" 
                                                         class="object-cover rounded-lg w-full h-full">
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $slider->nama }}</td>
                                        <td class="px-6 py-4">{{ $slider->link }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-4">
                                                <button type="button"
                                                        data-modal-target="editSliderModal-{{ $slider->id }}"
                                                        data-modal-toggle="editSliderModal-{{ $slider->id }}"
                                                        class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                                    Ubah
                                                </button>
                                                <button type="button"
                                                        data-modal-target="deleteSliderModal-{{ $slider->id }}"
                                                        data-modal-toggle="deleteSliderModal-{{ $slider->id }}"
                                                        class="font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                    Hapus
                                                </button>
                                                <button onclick="toggleSliderStatus({{ $slider->id }}, false)"
                                                        class="font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                                                    Nonaktifkan
                                                </button>
                                                @if(!$loop->first)
                                                    <button onclick="changeOrder({{ $slider->id }}, 'up')"
                                                            class="font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                        ↑
                                                    </button>
                                                @endif
                                                @if(!$loop->last)
                                                    <button onclick="changeOrder({{ $slider->id }}, 'down')"
                                                            class="font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                        ↓
                                                    </button>
                                                @endif
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
                                                <p class="text-lg font-medium">Tidak ada slider aktif</p>
                                                <p class="mt-1 text-sm">Aktifkan slider atau tambahkan slider baru</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="hidden p-4" id="inactive" role="tabpanel" aria-labelledby="inactive-tab">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-4">No</th>
                                    <th scope="col" class="px-6 py-4">Gambar</th>
                                    <th scope="col" class="px-6 py-4">Nama</th>
                                    <th scope="col" class="px-6 py-4">Link</th>
                                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($inactiveSliders as $index => $slider)
                                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4">
                                            @if($slider->pictures->isNotEmpty())
                                                <div class="aspect-w-16 aspect-h-9" style="width: 150px;">
                                                    <img src="{{ asset('storage/' . $slider->pictures->first()->nama_file) }}" 
                                                         alt="Gambar Slider" 
                                                         class="object-cover rounded-lg w-full h-full">
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $slider->nama }}</td>
                                        <td class="px-6 py-4">{{ $slider->link }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-4">
                                                <button type="button"
                                                        data-modal-target="editSliderModal-{{ $slider->id }}"
                                                        data-modal-toggle="editSliderModal-{{ $slider->id }}"
                                                        class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                                    Ubah
                                                </button>
                                                <button type="button"
                                                        data-modal-target="deleteSliderModal-{{ $slider->id }}"
                                                        data-modal-toggle="deleteSliderModal-{{ $slider->id }}"
                                                        class="font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                    Hapus
                                                </button>
                                                <button onclick="toggleSliderStatus({{ $slider->id }}, true)"
                                                        class="font-medium text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">
                                                    Aktifkan
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
                                                <p class="text-lg font-medium">Tidak ada slider tidak aktif</p>
                                                <p class="mt-1 text-sm">Semua slider sedang aktif</p>
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
    </div>
</section>

@include('admin.sliders.modals.create')
@include('admin.sliders.modals.edit', ['sliders' => $activeSliders->merge($inactiveSliders)])
@include('admin.sliders.modals.delete', ['sliders' => $activeSliders->merge($inactiveSliders)])

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

    function toggleSliderStatus(sliderId, status) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Anda akan ${status ? 'mengaktifkan' : 'menonaktifkan'} slider ini.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lakukan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/slider/${sliderId}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ is_active: status })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: `Slider berhasil ${status ? 'diaktifkan' : 'dinonaktifkan'}`,
                            icon: 'success',
                            confirmButtonColor: "#229CDB",
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
                        text: `Gagal ${status ? 'mengaktifkan' : 'menonaktifkan'} slider`,
                        icon: 'error',
                        confirmButtonColor: "#229CDB",
                    });
                });
            }
        });
    }

    function changeOrder(sliderId, direction) {
        fetch(`/admin/slider/${sliderId}/order`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ direction: direction })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Urutan slider berhasil diperbarui',
                    icon: 'success',
                    confirmButtonColor: "#229CDB",
                    timer: 1500
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
                text: 'Gagal memperbarui urutan slider',
                icon: 'error',
                confirmButtonColor: "#229CDB",
            });
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
@endsection