@extends('layouts.app')
@section('title', content: 'Manajemen Pertanyaan | Admin DPMPTSP Kota Padang')
@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Pertanyaan</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola Daftar Pertanyaan Dari Tamu</p>
            </div>
        </div>

        <!-- Tabs Container -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="mr-2">
                        <button class="inline-flex items-center px-4 py-3 text-red-600 border-b-2 border-red-600 rounded-t-lg active dark:text-red-500 dark:border-red-500 group" 
                                id="belum-terjawab-tab" 
                                data-tabs-target="#belum-terjawab" 
                                type="button" 
                                role="tab" 
                                aria-controls="belum-terjawab" 
                                aria-selected="true">
                            Belum Terjawab
                            <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                {{ $belumTerjawab->count() }}
                            </span>
                        </button>
                    </li>
                    <li class="mr-2">
                        <button class="inline-flex items-center px-4 py-3 text-gray-500 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 group"
                                id="terjawab-tab" 
                                data-tabs-target="#terjawab" 
                                type="button" 
                                role="tab" 
                                aria-controls="terjawab" 
                                aria-selected="false">
                            Terjawab
                            <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-gray-800 bg-gray-100 rounded-full">
                                {{ $terjawab->count() }}
                            </span>
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Tab Contents -->
            <div id="tabContents">
                <!-- Belum Terjawab Tab -->
                <div class="block p-4" id="belum-terjawab" role="tabpanel" aria-labelledby="belum-terjawab-tab">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-4">No</th>
                                    <th scope="col" class="px-6 py-4">Nama Penanya</th>
                                    <th scope="col" class="px-6 py-4">Email Penanya</th>
                                    <th scope="col" class="px-6 py-4">Pertanyaan</th>
                                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($belumTerjawab as $index => $question)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $belumTerjawab->firstItem() + $index }}</td>
                                    <td class="px-6 py-4">{{ $question->nama_penanya }}</td>
                                    <td class="px-6 py-4">{{ $question->email_penanya }}</td>
                                    <td class="px-6 py-4">{{ $question->pertanyaan }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <button type="button" 
                                                data-modal-target="answerQuestionModal-{{ $question->id }}" 
                                                data-modal-toggle="answerQuestionModal-{{ $question->id }}" 
                                                class="font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                            Jawab
                                        </button>
                                        <button type="button" 
                                                data-modal-target="ignoreQuestionModal-{{ $question->id }}" 
                                                data-modal-toggle="ignoreQuestionModal-{{ $question->id }}" 
                                                class="font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300 ml-2">
                                            Abaikan
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                            </svg>
                                            <p class="text-lg font-medium">Tidak ada pertanyaan</p>
                                            <p class="mt-1 text-sm">Belum ada pertanyaan yang belum terjawab</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $belumTerjawab->withQueryString()->links() }}
                    </div>
                </div>

                <!-- Terjawab Tab -->
                <div class="hidden p-4" id="terjawab" role="tabpanel" aria-labelledby="terjawab-tab">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-4">No</th>
                                    <th scope="col" class="px-6 py-4">Nama Penanya</th>
                                    <th scope="col" class="px-6 py-4">Email Penanya</th>
                                    <th scope="col" class="px-6 py-4">Pertanyaan</th>
                                    <th scope="col" class="px-6 py-4">Jawaban</th>
                                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($terjawab as $index => $question)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $terjawab->firstItem() + $index }}</td>
                                    <td class="px-6 py-4">{{ $question->nama_penanya }}</td>
                                    <td class="px-6 py-4">{{ $question->email_penanya }}</td>
                                    <td class="px-6 py-4">{{ $question->pertanyaan }}</td>
                                    <td class="px-6 py-4">{{ $question->jawaban }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <button type="button" 
                                                data-modal-target="detailQuestionModal-{{ $question->id }}" 
                                                data-modal-toggle="detailQuestionModal-{{ $question->id }}" 
                                                class="font-medium text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                            </svg>
                                            <p class="text-lg font-medium">Tidak ada pertanyaan</p>
                                            <p class="mt-1 text-sm">Belum ada pertanyaan yang terjawab</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $terjawab->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('admin.qnas.modals.answer', ['questions' => $belumTerjawab])
@include('admin.qnas.modals.detail', ['questions' => $terjawab])
@include('admin.qnas.modals.ignore', ['questions' => $belumTerjawab])

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

    document.addEventListener('DOMContentLoaded', () => {
        const defaultTab = document.querySelector('[role="tab"][aria-selected="true"]');
        if (defaultTab) {
            defaultTab.click();
        }
    });

    @if(session('success'))
    Swal.fire({
        title: 'Berhasil',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonColor: "#229CDB",
    });
    @endif
</script>
@endpush
@endsection