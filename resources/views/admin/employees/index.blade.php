@extends('layouts.app')

@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Pegawai</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola daftar pegawai</p>
            </div>
            <div>
                <button 
                    type="button" 
                    data-modal-target="createEmployeeModal" 
                    data-modal-toggle="createEmployeeModal" 
                    class="inline-flex items-center px-5 py-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700"
                >
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah Pegawai
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
                            <th scope="col" class="px-6 py-4">NIP</th>
                            <th scope="col" class="px-6 py-4">Jabatan</th>
                            <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $index => $employee)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $employees->firstItem() + $index }}</td>
                            <td class="px-6 py-4">{{ $employee->nama }}</td>
                            <td class="px-6 py-4">{{ $employee->nip }}</td>
                            <td class="px-6 py-4">{{ $employee->jabatan }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-4">
                                    <button type="button" 
                                            data-modal-target="editEmployeeModal-{{ $employee->id }}" 
                                            data-modal-toggle="editEmployeeModal-{{ $employee->id }}" 
                                            class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                        Ubah
                                    </button>
                                    <button type="button" 
                                            data-modal-target="deleteEmployeeModal-{{ $employee->id }}" 
                                            data-modal-toggle="deleteEmployeeModal-{{ $employee->id }}" 
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 7a2 2 0 012-2h12a2 2 0 012 2M3 7v10a2 2 0 002 2h12a2 2 0 002-2V7M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2" />
                                    </svg>
                                    <p class="text-lg font-medium">Tidak ada pegawai</p>
                                    <p class="mt-1 text-sm">Tambahkan pegawai baru untuk memulai</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $employees->withQueryString()->links() }}
            </div>
        </div>
    </div>
</section>

@include('admin.employees.modals.create')
@include('admin.employees.modals.edit')
@include('admin.employees.modals.delete')

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