@extends('layouts.main')
@section('title', 'Beranda | DPMPTSP Kota Padang')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css" />
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
    .main-swiper {
        overflow: visible !important; 
        padding: 20px 0;
        margin: 0 20px; 
    }
    @media (min-width: 768px) {
        .main-swiper {
            padding: 50px 0;
            margin: 0 70px;
        }
    }
    .main-swiper .swiper-slide {
        width: 100%;
        height: auto;
        transform: scale(0.85);
        opacity: 0.5;
        transition: all 0.3s ease;
    }
    .main-swiper .swiper-slide-active {
        transform: scale(1);
        opacity: 1;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    .main-swiper .swiper-button-next,
    .main-swiper .swiper-button-prev {
        width: 50px;
        height: 50px;
        background-color: red;
        border-radius: 50%;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .main-swiper .swiper-button-next:after,
    .main-swiper .swiper-button-prev:after {
        font-size: 20px;
        color: white;
    }
    .main-swiper .swiper-button-prev {
        left: -70px; 
    }
    .main-swiper .swiper-button-next {
        right: -70px; 
    }

    .custom-carousel {
        cursor: grab;
        user-select: none;
    }
    .custom-carousel:active {
        cursor: grabbing;
    }
    .carousel-track {
        will-change: transform;
    }
    .relative.overflow-hidden {
    overflow: hidden;
    position: relative;
    }
    #carouselTrack {
        display: flex;
        gap: 1.5rem; 
        transition: transform 0.5s ease-out;
        will-change: transform;
    }
    .flex-none {
        flex: 0 0 auto;
    }
    .news-card {
        transition: all 0.3s ease;
        backface-visibility: hidden;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
    }
    
    .news-card .image-wrapper {
        overflow: hidden;
    }
    
    .news-card .image-wrapper img {
        transition: transform 0.5s ease;
    }
    
    .news-card:hover .image-wrapper img {
        transform: scale(1.1);
    }
    
    .news-date {
        background: rgba(239, 68, 68, 0.9);
        backdrop-filter: blur(4px);
    }

    .truncate-3-lines {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    @layer utilities {
        @variants responsive {
            .line-clamp-2 {
                overflow: hidden;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 2;
            }
            .line-clamp-3 {
                overflow: hidden;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
            }
        }
    }
</style>

<div class="px-4 md:px-24 pt-8 md:pt-16 overflow-hidden relative">
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-20 left-20 w-32 h-32 bg-red-100 rounded-full floating-shape opacity-20" style="animation-delay: 0s;"></div>
        <div class="absolute top-40 right-40 w-24 h-24 bg-gray-200 rounded-full floating-shape opacity-30" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-red-50 rounded-full floating-shape opacity-25" style="animation-delay: 2s;"></div>
    </div> 
    <div class="relative mx-auto max-w-7xl px-4 md:px-16 py-4 md:py-8">
        <div class="swiper main-swiper relative">
            <div class="swiper-wrapper">
                @php
                    $slides = [];
                    foreach ($sliders as $item) {
                        foreach ($item->pictures as $index => $picture) {
                            $slides[] = $picture;
                        }
                    }

                    if (count($slides) <= 3 && count($slides) > 1) {
                        $slides = array_merge($slides, $slides);
                    }
                @endphp

                @foreach ($slides as $index => $picture)
                <div class="swiper-slide relative rounded-2xl" style="width: 70%">
                    <div class="aspect-[16/9] w-full">
                        @if ($picture->imageable && $picture->imageable->link)
                            <a href="{{ $picture->imageable->link }}" target="_blank">
                                <img src="{{ asset('storage/' . $picture->nama_file) }}" 
                                    alt="Slide {{ $index }}" 
                                    class="w-full h-full object-cover rounded-2xl cursor-pointer">
                            </a>
                        @else  
                            <img src="{{ asset('storage/' . $picture->nama_file) }}" 
                                alt="Slide {{ $index }}" 
                                class="w-full h-full object-cover rounded-2xl">
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <section class="px-4 md:px-6 relative backdrop-blur-sm">        
        <div class="container mx-auto py-12 md:py-24 relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 mb-12">
                <div class="relative animate-on-scroll group fade-in-scale" data-animation="fade-in-right">
                    <img
                        src="{{ asset('images/serti7-3.jpg') }}"
                        alt="Piagam WBK"
                        class="p-4 rounded-2xl shadow-2xl w-full h-[250px] md:h-[300px] object-contain bg-white transition-all duration-500 group-hover:scale-105 group-hover:shadow-red-200"
                    />
                    <div class="absolute -bottom-4 -left-4 w-36 h-36 bg-red-600 rounded-2xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-left-6 group-hover:rotate-6"></div>
                    <div class="absolute -left-8 top-1/2 flex gap-2">
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                    </div>
                </div>
    
                <div class="relative animate-on-scroll group fade-in-scale" data-animation="fade-in-left">
                    <img
                        src="{{ asset('images/serti6-3.jpg') }}"
                        alt="Penghargaan Ombudsman"
                        class="p-4 rounded-2xl shadow-2xl w-full h-[250px] md:h-[300px] object-contain bg-white transition-all duration-500 group-hover:scale-105 group-hover:shadow-red-200"
                    />
                    <div class="absolute -bottom-4 -right-4 w-36 h-36 bg-red-600 rounded-2xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                    <div class="absolute -right-8 top-1/2 flex flex-col gap-2">
                        <div class="w-12 h-1 bg-red-400"></div>
                        <div class="w-8 h-1 bg-red-300"></div>
                        <div class="w-4 h-1 bg-red-200"></div>
                    </div>
                </div>
            </div>
    
            <div class="md:w-1/2 mx-auto">
                <div class="relative animate-on-scroll group fade-in-scale" data-animation="fade-in-up">
                    <img
                        src="{{ asset('images/serti5.png') }}"
                        alt="Certificate Sangat Baik"
                        class="p-4 rounded-2xl shadow-2xl w-full h-[250px] md:h-[300px] object-contain bg-white transition-all duration-500 group-hover:scale-105 group-hover:shadow-red-200"
                    />
                    <div class="absolute -bottom-4 w-36 h-36 bg-red-600 rounded-2xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:rotate-3 left-1/2 -translate-x-1/2"></div>
                    <div class="absolute inset-x-0 -top-8 flex justify-center gap-4">
                        <div class="w-16 h-1 bg-red-400"></div>
                        <div class="w-16 h-1 bg-red-300"></div>
                        <div class="w-16 h-1 bg-red-200"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="relative overflow-hidden">
                <div class="flex gap-6 transition-transform duration-500 ease-in-out" id="carouselTrack">
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/akhlak.png" alt="Akhlak" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/evp.png" alt="EVP" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_5.png" alt="ZI 2" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_4.png" alt="ZI 4" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_6.png" alt="ZI 5" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_2.png" alt="ZI 6" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="px-6 relative backdrop-blur-sm">
        <div class="container mx-auto py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div class="relative">
                    <img
                        src="/images/background-dpmptsp.jpg"
                        alt="Tentang Kami"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover"
                    />
                    <div
                        class="absolute -bottom-4 -right-4 w-36 h-36 bg-red-600 rounded-2xl -z-10"
                    ></div>
                </div>
                <div data-aos="fade-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        DPMPTSP Kota Padang
                    </h2>
                    <div class="w-16 h-1 bg-red-600 mb-4"></div>
                    <p class="text-gray-600 text-base leading-relaxed mb-4 text-justify">
                        Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Padang berkomitmen untuk meningkatkan pelayanan publik yang prima melalui Pelayanan Terpadu Satu Pintu (PTSP). Masyarakat dapat menikmati layanan dengan kepastian persyaratan, biaya, dan waktu penyelesaian, guna mendukung pertumbuhan ekonomi dan investasi daerah.
                    </p>
                    <p class="text-gray-600 text-base leading-relaxed mb-6">
                        Dengan standar pelayanan yang transparan, mudah, dan akuntabel, DPMPTSP menjadi ujung tombak peningkatan kualitas pelayanan di bidang penanaman modal.
                    </p>
                    <a href="{{ route('about') }}" class="text-red-500 text-lg font-semibold hover:underline">Selengkapnya</a>
                </div>
            </div>
            <div class="my-20"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div data-aos="fade-right">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        Mal Pelayanan Publik Kota Padang
                    </h2>
                    <div class="w-16 h-1 bg-red-600 mb-4"></div>
                    <p class="text-gray-600 text-base leading-relaxed mb-4 text-justify">
                        Mal Pelayanan Publik (MPP) Kota Padang merupakan wadah bertemunya berbagai layanan pemerintah pusat dan daerah dalam satu lokasi. Tempat ini menyediakan layanan yang lebih efisien, mudah, dan nyaman bagi masyarakat dengan mengintegrasikan berbagai jenis pelayanan publik.
                    </p>
                    <p class="text-gray-600 text-base leading-relaxed mb-6">
                        MPP menghadirkan pengalaman pelayanan publik yang modern, terintegrasi, dan professional untuk memenuhi kebutuhan masyarakat Kota Padang.
                    </p>
                    <a href="{{ route('about') }}" class="text-red-500 text-lg font-semibold hover:underline">
                        Selengkapnya
                    </a>
                </div>
                <div class="relative">
                    <img
                        src="/images/mpp4.jpg"
                        alt="Mal Pelayanan Publik"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover"
                    />
                    <div
                        class="absolute -bottom-4 -left-4 w-36 h-36 bg-red-600 rounded-2xl -z-10"
                    ></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 p-4 md:p-6 my-12 md:my-24">
        <div class="container mx-auto px-4 md:px-16">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-6 md:mb-8">Layanan Perizinan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                <a href="https://oss.go.id/" target="_blank" class="bg-white p-4 rounded-lg text-center shadow hover:shadow-xl transition duration-300 flex flex-col h-full">
                    <div class="icon-wrap h-32 md:h-40 flex items-center justify-center mb-3">
                        <img class="max-w-[120px] md:max-w-[160px] h-auto object-contain" src="/images/osss.png" alt="OSS">
                    </div>
                    <h3 class="text-base md:text-lg font-semibold mb-2">OSS</h3>
                    <p class="text-gray-600 text-sm text-justify flex-grow">OSS (Online Single Submission) merupakan sistem informasi layanan perizinan berusaha yang diterbitkan oleh Lembaga OSS untuk kepada Pelaku Usaha melalui sistem elektronik yang terintegrasi.</p>
                </a>
                <a href="https://simbg.pu.go.id/" target="_blank" class="bg-white p-4 rounded-lg text-center shadow hover:shadow-xl transition duration-300 flex flex-col h-full">
                    <div class="icon-wrap h-32 md:h-40 flex items-center justify-center mb-3">
                        <img class="max-w-[120px] md:max-w-[160px] h-auto object-contain" src="/images/simbg.png" alt="SIMBG">
                    </div>
                    <h3 class="text-base md:text-lg font-semibold mb-2">SIMBG</h3>
                    <p class="text-gray-600 text-sm text-justify flex-grow">Sistem Informasi Manajemen Bangunan Gedung yang selanjutnya disingkat SIMBG adalah sistem elektronik berbasis web yang digunakan untuk melaksanakan proses penyelenggaraan PBG, SLF, SBKBG, RTB, dan Pendataan Bangunan Gedung disertai dengan informasi terkait penyelenggaraan bangunan gedung.</p>
                </a>
                <a href="{{ route('home-survey') }}" target="_blank" class="bg-white p-4 rounded-lg text-center shadow hover:shadow-xl transition duration-300 flex flex-col h-full">
                    <div class="icon-wrap h-32 md:h-40 flex items-center justify-center mb-3">
                        <img class="max-w-[120px] md:max-w-[160px] h-auto object-contain" src="/images/ikm.png" alt="IKM">
                    </div>
                    <h3 class="text-base md:text-lg font-semibold mb-2">SKM</h3>
                    <p class="text-gray-600 text-sm text-justify flex-grow">Survei Kepuasan Masyarakat (SKM) adalah layanan yang dirancang untuk mengukur tingkat kepuasan masyarakat terhadap pelayanan yang diberikan oleh instansi pemerintah, guna meningkatkan kualitas layanan secara berkelanjutan.</p>
                </a>
                <a href="https://nonperizinan.web.dpmptsp.padang.go.id/sinopen" target="_blank" class="bg-white p-4 rounded-lg text-center shadow hover:shadow-xl transition duration-300 flex flex-col h-full">
                    <div class="icon-wrap h-32 md:h-40 flex items-center justify-center mb-3">
                        <img class="max-w-[120px] md:max-w-[160px] h-auto object-contain" src="/images/sinopen.png" alt="IKM">
                    </div>
                    <h3 class="text-base md:text-lg font-semibold mb-2">SINOPEN</h3>
                    <p class="text-gray-600 text-sm text-justify flex-grow">Sistem Informasi Non Perizinan dan Perizinan Non OSS, dengan aplikasi SINOPEN yang dapat diakses oleh seluruh pemohon dan petugas di Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu dengan mudah tidak terbatas ruang dan waktu bisa di akses kapan pun dan dimana saja.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="py-10 p-6 my-32">
        <div class="container mx-auto px-4 md:px-24">
            <h2 class="text-3xl font-bold text-center mb-12">Inovasi Pelayanan</h2>
            <div class="grid md:grid-cols-2 gap-8">
                @forelse($innovations as $innovation)
                    <a href="{{ $innovation->url }}" 
                       class="bg-white p-4 rounded-lg shadow hover:shadow-xl transition duration-300 flex items-center gap-4">
                        <figure class="avatar" style="border-radius: 0px; width: 64px;">
                            @if($innovation->pictures->isNotEmpty())
                                <img src="{{ asset('storage/' . $innovation->pictures->first()->nama_file) }}" 
                                     alt="{{ $innovation->nama }}" class="w-full h-full object-contain">
                            @endif
                        </figure>
                        <div class="testimonial-info">
                            <h5 data-asw-orgfontsize="18" style="font-size: 18px; margin-bottom: 4px;">{{ $innovation->nama }}</h5>
                            <h6 class="font-weight-normal text-red-600" data-asw-orgfontsize="16" style="font-size: 16px;">{{ $innovation->deskripsi }}</h6>
                        </div>
                    </a>
                @empty
                    <div class="col-span-2 text-center py-8">
                        <p class="text-gray-500">Tidak ada inovasi yang tersedia</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-10 bg-white my-32">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Indeks Kepuasan Masyarakat</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="bg-red-50 rounded-lg p-8 mb-8">
                        <div class="flex items-center justify-between"> 
                            <div class="text-center">
                                <div class="text-4xl font-bold text-red-600 mb-1">{{ $overallPercentage }}</div> 
                                <div class="text-base text-gray-600">
                                    {{ number_format($overallScore, 2) }}/4.00
                                </div>
                            </div>
                            
                            <div class="text-right">
                                <div class="text-sm text-gray-500 italic">Tingkat Kepuasan</div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $keteranganScore }}</h3>
                            </div>
                        </div>
                        
                        <div class="mt-6"> 
                            <div class="w-full bg-gray-200 rounded-full h-4"> 
                                <div
                                    class="bg-red-600 h-4 rounded-full transition-all duration-500 ease-out progress-bar"
                                    data-width="{{ $overallPercentage }}%"
                                    style="width: 0"
                                ></div>
                            </div>
                        </div>
                    </div>
     
                    @foreach($surveyResults as $item)
                        <div class="space-y-2 hover:bg-red-50 p-4 rounded-lg transition-all duration-300"> 
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-700">
                                    {{ $item['question'] }}
                                </span>
                                <span class="text-sm font-medium text-red-600 bg-red-100 px-3 py-1 rounded-full"> 
                                    {{ round(($item['score'] / 4) * 100, 1) }}
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div
                                    class="bg-red-600 h-2.5 rounded-full transition-all duration-500 ease-out progress-bar"
                                    data-width="{{ ($item['score'] / 4) * 100 }}%"
                                    style="width: 0"
                                ></div>
                            </div>
                        </div>
                    @endforeach
                </div>
     
                <div class="hidden md:block bg-gradient-to-br from-red-50 to-white rounded-lg shadow-lg">
                    <div class="h-full min-h-[300px] w-full flex items-center justify-center">
                        <img 
                            src="{{ asset('images/skm3.png') }}" 
                            alt="Deskripsi gambar"
                            class="object-cover rounded-lg w-full h-full"
                        />
                    </div>
                </div>
            </div>
     
            <div class="text-center mt-12"> 
                <a href="{{ route('home-survey') }}"
                   class="inline-flex items-center justify-center px-10 py-4 text-lg font-semibold text-white bg-red-600
                          rounded-lg shadow-lg transition-all duration-300 hover:bg-red-700 hover:shadow-xl
                          hover:-translate-y-1 relative overflow-hidden group">
                    <span class="relative z-10 flex items-center">
                        Ayo Isi Survei
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </span>
                    <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                </a>
                <p class="text-gray-600 mt-4 text-sm">Bantu kami meningkatkan layanan dengan mengisi survei</p>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-16">
        <div class="container mx-auto px-4 md:px-24">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Berita Terkini
                </h2>
                <div class="w-20 h-1 bg-red-600 mx-auto"></div>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mb-8 md:mb-12">
                @foreach($latestNews as $news)
                    <a href="{{ route('detail-berita', $news->slug) }}" class="news-card bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300">
                        <div class="image-wrapper relative aspect-[4/3]"> <!-- Mengubah fixed height ke aspect ratio -->
                            <img
                                src="{{ asset('storage/' . $news->pictures->first()->nama_file) }}"
                                alt="{{ $news->judul }}"
                                class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-500" 
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="news-date absolute top-4 right-4 px-3 py-1 bg-black/60 backdrop-blur-sm rounded-full text-white text-sm">
                                {{ $news->created_at->format('d M Y') }}
                            </div>
                        </div>
                        <div class="p-4 md:p-6">
                            <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 line-clamp-2 group-hover:text-red-600 transition-colors duration-300">
                                {{ $news->judul }}
                            </h3>
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4"> <!-- Menggunakan line-clamp sebagai gantu truncate -->
                                {{ $news->konten }}
                            </p>
                            <div class="flex items-center text-red-600 text-sm font-medium">
                                Baca selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
    
            <div class="text-center">
                <a href="{{ route('berita') }}" 
                   class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-white bg-red-600 border border-transparent rounded-lg shadow-sm hover:bg-red-700 transition-colors duration-300">
                    Baca Berita Lainnya
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="py-8 md:py-12 bg-white">
        <div class="bg-gray-50 py-6 md:py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-6 md:mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Galeri
                    </h2>
                    <div class="w-20 h-1 bg-red-600 mx-auto"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($gallery as $picture)
                    <div class="group relative overflow-hidden rounded-xl shadow-lg">
                        <div class="aspect-[4/3] w-full">
                            <img
                                src="{{ asset('storage/' . $picture->nama_file) }}"
                                alt="{{ $picture->caption ?? 'Gallery Image' }}"
                                class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-500"
                            />
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-12">
                    <a href="{{ route('galeri') }}" 
                       class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-white bg-red-600 border border-transparent rounded-lg shadow-sm hover:bg-red-700 transition-colors duration-300">
                        Lihat Galeri Kami
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 md:px-24">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Lokasi
                </h2>
                <div class="w-20 h-1 bg-red-600 mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-4">DPMPTSP Kota Padang</h3>
                    <div class="space-y-3 text-gray-600">
                        <p class="flex items-start">
                            <svg class="w-5 h-5 mr-3 text-red-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Jalan Jenderal Sudirman No. 1, Kota Padang, Sumatera Barat</span>
                        </p>
                        <p class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-red-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <span>081374078088</span>
                        </p>
                        <p class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>dpmptsp@padang.go.id</span>
                        </p>
                    </div>
                </div>
                <div class="relative w-full h-96 rounded-lg shadow-lg overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4744.071126150383!2d100.35980039131191!3d-0.9478272579427683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b9478dac36d3%3A0xc2d9755a20e8b0e1!2sDPMPTSP%20Kota%20Padang!5e0!3m2!1sid!2sid!4v1737100130900!5m2!1sid!2sid"
                        class="absolute inset-0 w-full h-full"
                        style="border:0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <div class="my-12"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="relative w-full h-96 rounded-lg shadow-lg overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d457.2719564531419!2d100.35588419912912!3d-0.9508485009035964!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b90043bdd301%3A0x803bacc0cfedee63!2sMal%20Pelayanan%20Publik%20Kota%20Padang!5e0!3m2!1sen!2sid!4v1737609906479!5m2!1sen!2sid"
                        class="absolute inset-0 w-full h-full"
                        style="border:0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-4">Mal Pelayanan Publik Kota Padang</h3>
                    <div class="space-y-3 text-gray-600">
                        <p class="flex items-start">
                            <svg class="w-5 h-5 mr-3 text-red-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Plaza Andalas Lantai 4, Kota Padang, Sumatera Barat</span>
                        </p>
                        <p class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-red-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <span>081374078088</span>
                        </p>
                        <p class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>dpmptsp@padang.go.id</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const progressBars = document.querySelectorAll('.progress-bar');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressBar = entry.target;
                    progressBar.style.width = progressBar.getAttribute('data-width');
                    observer.unobserve(progressBar);
                }
            });
        }, {
            threshold: 0.5
        });

        progressBars.forEach(progressBar => {
            observer.observe(progressBar);
        });

        const surveyData = @json($surveyResults);
    
        new Chart(document.getElementById('surveyChart'), {
            type: 'bar',
            data: {
                labels: surveyData.map(item => item.question),
                datasets: [{
                    label: 'Nilai Rata-rata',
                    data: surveyData.map(item => item.score),
                    backgroundColor: '#3B82F6',
                    borderColor: '#2563EB',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',  
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 4, 
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        const mainSwiper = new Swiper('.main-swiper', {
            loop: true,
            autoHeight: true,
            slidesPerView: 1.5, 
            centeredSlides: true,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.main-swiper .swiper-button-next',
                prevEl: '.main-swiper .swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1.5
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const track = document.getElementById('carouselTrack');
        const slides = track.children;
        const totalSlides = slides.length;
        let currentIndex = 0;
        let isTransitioning = false;

        const firstClone = slides[0].cloneNode(true);
        const lastClone = slides[totalSlides - 1].cloneNode(true);
        track.appendChild(firstClone);
        track.insertBefore(lastClone, slides[0]);

        currentIndex = 1;
        updateSlidePosition(false);

        function updateSlidePosition(withTransition = true) {
            if (withTransition) {
                track.style.transition = 'transform 0.5s ease-out';
            } else {
                track.style.transition = 'none';
            }
            const slideWidth = slides[0].offsetWidth + 24; 
            const offset = -currentIndex * slideWidth;
            track.style.transform = `translateX(${offset}px)`;
        }

        function moveToSlide(index) {
            if (isTransitioning) return;
            isTransitioning = true;
            currentIndex = index;
            updateSlidePosition();
            
            setTimeout(() => {
                if (currentIndex === 0) { 
                    currentIndex = totalSlides;
                    updateSlidePosition(false);
                } else if (currentIndex === totalSlides + 1) { 
                    currentIndex = 1;
                    updateSlidePosition(false);
                }
                isTransitioning = false;
            }, 500);
        }

        function nextSlide() {
            moveToSlide(currentIndex + 1);
        }

        function prevSlide() {
            moveToSlide(currentIndex - 1);
        }
        const slideInterval = setInterval(nextSlide, 4000);

        let startX;
        let endX;

        track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            clearInterval(slideInterval); 
        });

        track.addEventListener('touchmove', (e) => {
            if (!startX) return;
            
            endX = e.touches[0].clientX;
            const diff = startX - endX;
            
            if (Math.abs(diff) > 5) {
                e.preventDefault();
            }
        }, { passive: false });

        track.addEventListener('touchend', () => {
            if (!startX || !endX) return;
            
            const diff = startX - endX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
            
            startX = null;
            endX = null;
        });

        window.addEventListener('resize', () => {
            updateSlidePosition(false);
        });
    });
</script>