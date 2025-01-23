@extends('layouts.main')
@section('title', 'IKM | DPMPTSP Kota Padang')
@section('content')

<div class="relative min-h-[600px] overflow-hidden">
    <div class="absolute inset-0 transform scale-105"
         x-data="{ scroll: 0 }"
         x-init="window.addEventListener('scroll', () => scroll = window.pageYOffset)"
         :style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="{{ asset('/images/bg-survei.jpg') }}" alt="DPMPTSP Background"
             class="w-full h-full object-cover filter brightness-75">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 via-red-900/60 to-red-800/80"></div>
    </div>
    <div class="relative min-h-[600px] flex items-center justify-center flex-col text-white px-4">
        <div class="animate-fadeIn text-center"> 
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                Survey Kepuasan <span class="text-red-400">Masyarakat</span>
            </h1>
            <p class="text-xl mb-10 max-w-2xl text-gray-200 mx-auto"> 
                Suara Anda adalah Komitmen Kami dalam Meningkatkan Kualitas Pelayanan Publik
            </p>
            <div class="flex justify-center"> 
                <a href="{{ route('survey') }}"
                   class="group relative inline-flex items-center px-8 py-3 overflow-hidden rounded-full bg-white text-red-600 transition duration-300 ease-out hover:bg-red-600 hover:text-white">
                    <span class="absolute right-0 flex h-full w-10 translate-x-full transform items-center justify-start duration-300 group-hover:-translate-x-full">
                    </span>
                    <span class="font-bold">Mulai Survei</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-32 relative -mt-16 md:-mt-32 z-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="group bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
            <div class="flex items-center mb-6">
                <div class="p-4 bg-red-100 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="ml-4 text-xl font-bold text-gray-800">Efisiensi Waktu</h3>
            </div>
            <p class="text-gray-600 group-hover:text-gray-700">Proses survei yang cepat dan mudah, hanya membutuhkan waktu ± 3 menit</p>
        </div>

        <div class="group bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
            <div class="flex items-center mb-6">
                <div class="p-4 bg-red-100 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="ml-4 text-xl font-bold text-gray-800">Data Transparan</h3>
            </div>
            <p class="text-gray-600 group-hover:text-gray-700">Hasil survei dapat diakses secara real-time dan terbuka untuk publik</p>
        </div>

        <div class="group bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
            <div class="flex items-center mb-6">
                <div class="p-4 bg-red-100 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <h3 class="ml-4 text-xl font-bold text-gray-800">Insight Akurat</h3>
            </div>
            <p class="text-gray-600 group-hover:text-gray-700">Analisis data yang mendalam untuk peningkatan layanan berkelanjutan</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 lg:px-24 py-16">
    <div class="bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-xl p-8 mb-12 max-w-lg mx-auto transform transition-all hover:shadow-2xl">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-4">Nilai IKM</h2>
        <div class="flex items-center justify-center">
            <div class="relative w-48 h-48">
                <svg class="transform -rotate-90 w-full h-full" viewBox="0 0 100 100">
                    <circle class="text-gray-200" stroke-width="10" stroke="currentColor" fill="transparent" r="40" cx="50" cy="50"/>
                    <circle class="text-red-600 progress-ring" stroke-width="10" stroke="currentColor" fill="transparent" r="40" cx="50" cy="50"
                            stroke-dasharray="251.2"
                            stroke-dashoffset="{{ 251.2 - (251.2 * substr($overallPercentage, 0, -1) / 100) }}"/>
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-4xl font-bold text-gray-800">{{ $overallPercentage }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <div class="bg-white rounded-3xl shadow-xl p-8 transform transition-all hover:shadow-2xl">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Demografi Usia</h3>
            <div class="w-3/4 mx-auto">
                <canvas id="demografiChart"></canvas>
            </div>
        </div>
        <div class="bg-white rounded-3xl shadow-xl p-8 transform transition-all hover:shadow-2xl">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Demografi Pendidikan</h3>
            <div class="w-3/4 mx-auto">
                <canvas id="pendidikanChart"></canvas>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-3xl shadow-xl p-8 transform transition-all hover:shadow-2xl">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Distribusi Layanan</h3>
        <div class="w-4/5 mx-auto">
            <canvas id="layananChart"></canvas>
        </div>
    </div>
</div>

@push('styles')
<style>
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
        animation: fadeIn 1s ease-out;
    }
    .progress-ring {
        transition: stroke-dashoffset 1s ease-out;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chartColors = [
            '#FF6384',
            '#36A2EB',
            '#FFCE56',
            '#4BC0C0',
            '#9966FF',
            '#FF9F40'
        ];
    
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 1.2, 
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15, 
                        font: {
                            size: 11 
                        }
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            }
        };
    
        const demografiData = @json($demografiUmur);
        new Chart(document.getElementById('demografiChart'), {
            type: 'doughnut',
            data: {
                labels: demografiData.map(item => item.kelompok_umur),
                datasets: [{
                    data: demografiData.map(item => item.total),
                    backgroundColor: chartColors,
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                ...chartOptions,
                cutout: '60%',
            }
        });
    
        const pendidikanData = @json($pendidikanData);
        new Chart(document.getElementById('pendidikanChart'), {
            type: 'doughnut',
            data: {
                labels: pendidikanData.map(item => item.pendidikan),
                datasets: [{
                    data: pendidikanData.map(item => item.total),
                    backgroundColor: chartColors,
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                ...chartOptions,
                cutout: '60%',
            }
        });
    
        const layananData = @json($layananData);
        new Chart(document.getElementById('layananChart'), {
            type: 'bar',
            data: {
                labels: layananData.map(item => item.layanan),
                datasets: [{
                    label: 'Jumlah Responden',
                    data: layananData.map(item => item.total),
                    backgroundColor: chartColors,
                    borderRadius: 8,
                    barThickness: 20,
                }]
            },
            options: {
                ...chartOptions,
                aspectRatio: 1.8,
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        },
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: 11 
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 11
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
@endsection