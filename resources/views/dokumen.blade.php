@extends('layouts.main')
@section('title', 'Dokumen | DPMPTSP Kota Padang')

@section('content')
<style>
    .fade-in-scale {
        animation: fadeInScale 0.5s ease-out;
    }
    
    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .slide-in-bottom {
        animation: slideInBottom 0.6s ease-out;
    }
    
    @keyframes slideInBottom {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hover-float {
        transition: transform 0.3s ease;
    }
    
    .hover-float:hover {
        transform: translateY(-5px);
    }
</style>

<div class="overflow-hidden pt-16 relative">
    <div class="heading bg-cover bg-center py-24 flex items-center justify-center relative">
        <div class="absolute inset-0 bg-cover bg-center transform scale-105 transition-transform duration-1000" 
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/swiper/5.jpg')">
        </div>
        <h1 class="text-6xl text-white uppercase font-bold relative z-10 tracking-wider fade-in-scale">
            Dokumen
            <div class="h-1 w-24 bg-red-500 mx-auto mt-4 rounded-full"></div>
        </h1>
    </div>

    <section class="bg-gray-50/80 px-52 relative backdrop-blur-sm">
        <div class="container mx-auto py-12">
            <div class="max-w-4xl mx-auto mb-12 slide-in-bottom">
                <form method="GET" action="{{ url()->current() }}" 
                      class="p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari dokumen..."
                                    class="w-full h-12 pl-12 pr-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 group-hover:border-red-300">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-red-500 transition-colors duration-200" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="relative">
                                <select name="filter" 
                                        class="w-full h-12 pl-4 pr-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 bg-gray-50 text-gray-900 hover:border-red-300 appearance-none">
                                    <option value="">Semua Dokumen</option>
                                    <optgroup label="Jenis Dokumen">
                                        <option value="dummy">Dummy</option>
                                        <option value="dummy">Dummy</option>
                                        <option value="dummy">Dummy</option>
                                    </optgroup>
                                    <optgroup label="Tahun">
                                        <option value="tahun">2025</option>
                                        <option value="tahun">2024</option>
                                        <option value="tahun">2023</option>
                                    </optgroup>
                                </select>
                                <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="h-12 px-8 text-white bg-red-500 hover:bg-red-600 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Cari
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden slide-in-bottom" 
                 style="animation-delay: 0.2s;">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Dokumen
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php
                                $dummyData = [
                                    [
                                        'id' => 1,
                                        'nama' => 'Dokumen Pedoman Kerja 2024.pdf',
                                        'url' => '/documents/pedoman-kerja-2024.pdf',
                                        'icon' => 'pdf'
                                    ],
                                    [
                                        'id' => 2,
                                        'nama' => 'Struktur Organisasi.jpg',
                                        'url' => '/documents/struktur-organisasi.jpg',
                                        'icon' => 'image'
                                    ],
                                    [
                                        'id' => 3,
                                        'nama' => 'Laporan Tahunan 2023.pdf',
                                        'url' => '/documents/laporan-2023.pdf',
                                        'icon' => 'pdf'
                                    ],
                                    [
                                        'id' => 4,
                                        'nama' => 'SOP Pelayanan.pdf',
                                        'url' => '/documents/sop-pelayanan.pdf',
                                        'icon' => 'pdf'
                                    ],
                                    [
                                        'id' => 5,
                                        'nama' => 'Dokumentasi Kegiatan 2024.jpg',
                                        'url' => '/documents/dokumentasi-2024.jpg',
                                        'icon' => 'image'
                                    ],
                                ];
                            @endphp

                            @foreach($dummyData as $item)
                                <tr class="hover:bg-red-50/30 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="bg-gray-100 text-gray-700 py-1 px-3 rounded-full font-medium">
                                            {{ $item['id'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $item['nama'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ $item['url'] }}" 
                                           target="_blank"
                                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 hover-float">
                                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection