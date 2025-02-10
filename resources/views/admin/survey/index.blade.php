@extends('layouts.app')

@section('app')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-4">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Survei Kepuasan Masyarakat</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola Survei Kepuasan Masyarakat</p>
            </div>
            <div class="w-full md:w-auto">
                <button type="button" 
                        data-modal-target="exportModal"
                        data-modal-toggle="exportModal"
                        class="w-full md:w-auto inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Ekspor Data Survei
                </button>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4">No</th>
                            <th scope="col" class="px-6 py-4">No. HP</th>
                            <th scope="col" class="px-6 py-4">Nama</th>
                            <th scope="col" class="px-6 py-4">Alamat</th>
                            <th scope="col" class="px-6 py-4">Layanan yang Diterima</th>
                            <th scope="col" class="px-6 py-4">Saran</th>
                            <th scope="col" class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($surveyResponses as $index => $surveyResponse)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $surveyResponses->firstItem() + $index }}</td>
                            <td class="px-6 py-4">{{ $surveyResponse->noHp }}</td>
                            <td class="px-6 py-4">{{ $surveyResponse->nama }}</td>
                            <td class="px-6 py-4">{{ $surveyResponse->alamat }}</td>
                            <td class="px-6 py-4">{{ $surveyResponse->layanan }}</td>
                            <td class="px-6 py-4">{{ $surveyResponse->saran }}</td>
                            <td class="px-6 py-4">
                                <button type="button"
                                        data-modal-target="viewSurveyResponseModal-{{ $surveyResponse->id }}"
                                        data-modal-toggle="viewSurveyResponseModal-{{ $surveyResponse->id }}"
                                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 hover:-translate-y-1">
                                                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>Detail</a>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 7a2 2 0 012-2h12a2 2 0 012 2M3 7v10a2 2 0 002 2h12a2 2 0 002-2V7M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2" />
                                    </svg>
                                    <p class="text-lg font-medium">Belum ada survei</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $surveyResponses->withQueryString()->links() }}
            </div>
        </div>
    </div>
</section>

@include('admin.survey.modals.view')
@include('admin.survey.modals.export')

@endsection