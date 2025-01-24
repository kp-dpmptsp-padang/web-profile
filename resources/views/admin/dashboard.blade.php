@extends('layouts.app')

@section('app')
<section class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
        <!-- Welcome Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600 dark:text-gray-300">Dashboard - {{ now()->format('l, d F Y') }}</p>
        </div>

        <!-- Main Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Berita</h3>
                        <span class="p-2 bg-red-100 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-red-600">{{ $totalBerita }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Artikel berita yang telah dipublikasikan</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Informasi</h3>
                        <span class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-blue-600">{{ $totalInformasi }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Informasi penting tersedia</p>
                </div>
            </div>
        </div>

        <!-- Media Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Slider</h3>
                        <span class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-purple-600">{{ $totalSliders }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Banner slider aktif</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Gallery</h3>
                        <span class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-green-600">{{ $totalGalleries }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Foto dalam galeri</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Video</h3>
                        <span class="p-2 bg-yellow-100 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-yellow-600">{{ $totalVideos }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Video telah diunggah</p>
                </div>
            </div>
        </div>

        <!-- Question Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pertanyaan Belum Terjawab</h3>
                        <span class="p-2 bg-orange-100 rounded-lg">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-orange-600">{{ $totalUnansweredQuestions }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Memerlukan tindak lanjut</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pertanyaan Terjawab</h3>
                        <span class="p-2 bg-teal-100 rounded-lg">
                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-teal-600">{{ $totalAnsweredQuestions }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Pertanyaan telah dijawab</p>
                </div>
            </div>
        </div>

        <!-- Additional Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Inovasi</h3>
                        <span class="p-2 bg-indigo-100 rounded-lg">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-indigo-600">{{ $totalInovations }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Program inovasi</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Dokumen</h3>
                        <span class="p-2 bg-pink-100 rounded-lg">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-pink-600">{{ $totalDocuments }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Dokumen tersedia</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Fasilitas</h3>
                        <span class="p-2 bg-rose-100 rounded-lg">
                            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-rose-600">{{ $totalFacilities }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Fasilitas tersedia</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:scale-[1.02] duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pegawai</h3>
                        <span class="p-2 bg-emerald-100 rounded-lg">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-emerald-600">{{ $totalEmployees }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Total pegawai aktif</p>
                </div>
            </div>
        </div>
    </div>
        <!-- Suggestions Section -->
    <div class="mt-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Saran Masuk</h3>
                    <span class="p-2 bg-cyan-100 rounded-lg">
                        <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                    </span>
                </div>

                <div class="overflow-y-auto max-h-96 pr-2 space-y-3">
                    @forelse($suggestions as $suggestion)
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 transition-all hover:bg-gray-100 dark:hover:bg-gray-600">
                            <div class="flex flex-col">
                                <p class="text-sm text-gray-700 dark:text-gray-300">
                                    {{ $suggestion->saran }}
                                </p>
                                <span class="text-xs text-gray-400 dark:text-gray-500 mt-2 self-end">
                                    {{ $suggestion->created_at->format('d M Y, H:i') }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <p class="text-gray-500 dark:text-gray-400">Belum ada saran yang diberikan</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection