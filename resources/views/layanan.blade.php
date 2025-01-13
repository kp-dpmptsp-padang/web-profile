@extends('layouts.main')
<style>
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    
    @keyframes fadeInScale {
        0% { 
            opacity: 0;
            transform: scale(0.8);
        }
        100% { 
            opacity: 1;
            transform: scale(1);
        }
    }

    .floating-shape {
        animation: float 6s ease-in-out infinite;
    }

    .fade-in-scale {
        animation: fadeInScale 0.8s ease-out forwards;
    }

    .dot-pattern {
        background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
        background-size: 20px 20px;
    }
</style>
@section('title', 'Layanan | DPMPTSP Kota Padang')

@section('content')
<div class="overflow-hidden pt-16 relative">
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-full dot-pattern opacity-30"></div>
        <div class="absolute top-20 left-20 w-32 h-32 bg-red-100 rounded-full floating-shape opacity-20" style="animation-delay: 0s;"></div>
        <div class="absolute top-40 right-40 w-24 h-24 bg-gray-200 rounded-full floating-shape opacity-30" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-red-50 rounded-full floating-shape opacity-25" style="animation-delay: 2s;"></div>
    </div>

    <section class="bg-gray-50/80 px-6 relative backdrop-blur-sm">
        <div class="absolute top-0 left-0 w-32 h-32 bg-red-100 opacity-40 transform -translate-x-16 -translate-y-16 rotate-45"></div>
        <div class="absolute top-0 right-0 w-24 h-24 bg-gray-200 opacity-30 transform translate-x-12 -translate-y-12 rotate-12"></div>
        
        <div class="container mx-auto py-24 relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div class="relative animate-on-scroll group fade-in-scale" data-animation="fade-in-right">
                    <img
                        src="/images/sinopen2.png"
                        alt="SINOPEN"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover transition-all duration-500 group-hover:scale-105 group-hover:shadow-red-200"
                    />
                    <div class="absolute -bottom-4 -right-4 w-36 h-36 bg-red-600 rounded-2xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                    <div class="absolute -right-8 top-1/2 flex gap-2">
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                    </div>
                </div>
                <div class="animate-on-scroll fade-in-scale" data-animation="fade-in-up">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4 hover:text-red-600 transition-colors duration-300">
                        SINOPEN
                    </h2>
                    <div class="w-20 h-1 bg-red-600 mb-6 transition-all duration-300 hover:w-32"></div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6 text-justify">
                        Sistem Informasi Non Perizinan dan Perizinan Non OSS, dengan aplikasi SINOPEN yang dapat diakses oleh seluruh pemohon dan petugas di Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu dengan mudah tidak terbatas ruang dan waktu bisa di akses kapan pun dan dimana saja.
                    </p>
                    <a href="https://nonperizinan.web.dpmptsp.padang.go.id/sinopen" target="_blank" 
                       class="inline-block bg-red-600 text-white px-8 py-4 rounded-lg shadow-lg font-semibold 
                              transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                              relative overflow-hidden group">
                        <span class="relative z-10">Lihat Layanan</span>
                        <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white/90 px-6 relative backdrop-blur-sm">
        <div class="absolute inset-0 opacity-10">
            <svg viewBox="0 0 1000 100" preserveAspectRatio="none" class="h-full w-full">
                <path d="M0,0 C300,300 400,0 500,100 C600,200 700,0 1000,100 L1000,00 L0,0 Z" fill="rgb(239 68 68)"></path>
            </svg>
        </div>

        <div class="container mx-auto py-24 relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div class="animate-on-scroll order-2 md:order-1 fade-in-scale" data-animation="fade-in-up">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4 hover:text-red-600 transition-colors duration-300">
                        OSS
                    </h2>
                    <div class="w-20 h-1 bg-red-600 mb-6 transition-all duration-300 hover:w-32"></div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6 text-justify">
                        OSS (Online Single Submission) merupakan sistem informasi layanan perizinan berusaha yang diterbitkan oleh Lembaga OSS untuk kepada Pelaku Usaha melalui sistem elektronik yang terintegrasi.
                    </p>
                    <a href="https://oss.go.id/" target="_blank" 
                       class="inline-block bg-red-600 text-white px-8 py-4 rounded-lg shadow-lg font-semibold 
                              transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                              relative overflow-hidden group">
                        <span class="relative z-10">Lihat Layanan</span>
                        <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                    </a>
                </div>
                <div class="relative animate-on-scroll order-1 md:order-2 group fade-in-scale" data-animation="fade-in-left">
                    <img
                        src="/images/oss2.png"
                        alt="OSS"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover transition-all duration-500 group-hover:scale-105 group-hover:shadow-red-200"
                    />
                    <div class="absolute -bottom-4 -left-4 w-36 h-36 bg-red-600 rounded-2xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-left-6 group-hover:rotate-6"></div>
                    <div class="absolute -left-8 top-1/2 flex flex-col gap-2">
                        <div class="w-12 h-1 bg-red-400"></div>
                        <div class="w-8 h-1 bg-red-300"></div>
                        <div class="w-4 h-1 bg-red-200"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50/80 px-6 relative backdrop-blur-sm">
        <div class="absolute top-0 right-0 w-72 h-72 bg-red-100 rounded-full opacity-20 transform translate-x-1/2 -translate-y-1/2"></div>
        <div class="container mx-auto py-24 relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div class="relative animate-on-scroll group fade-in-scale" data-animation="fade-in-right">
                    <img
                        src="/images/simbg2.png"
                        alt="SIMBG"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover transition-all duration-500 group-hover:scale-105 group-hover:shadow-red-200"
                    />
                    <div class="absolute -bottom-4 -right-4 w-36 h-36 bg-red-600 rounded-2xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                    <div class="absolute -left-8 top-1/2 flex gap-2">
                        <div class="w-4 h-4 bg-red-400 rounded-sm transform rotate-45"></div>
                        <div class="w-4 h-4 bg-red-300 rounded-sm transform rotate-45"></div>
                        <div class="w-4 h-4 bg-red-200 rounded-sm transform rotate-45"></div>
                    </div>
                </div>
                <div class="animate-on-scroll fade-in-scale" data-animation="fade-in-up">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4 hover:text-red-600 transition-colors duration-300">
                        SIMBG
                    </h2>
                    <div class="w-20 h-1 bg-red-600 mb-6 transition-all duration-300 hover:w-32"></div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6 text-justify">
                        Sistem Informasi Manajemen Bangunan Gedung yang selanjutnya disingkat SIMBG adalah sistem elektronik berbasis web yang digunakan untuk melaksanakan proses penyelenggaraan PBG, SLF, SBKBG, RTB, dan Pendataan Bangunan Gedung disertai dengan informasi terkait penyelenggaraan bangunan gedung.
                    </p>
                    <a href="https://simbg.pu.go.id/" target="_blank" 
                       class="inline-block bg-red-600 text-white px-8 py-4 rounded-lg shadow-lg font-semibold 
                              transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                              relative overflow-hidden group">
                        <span class="relative z-10">Lihat Layanan</span>
                        <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection