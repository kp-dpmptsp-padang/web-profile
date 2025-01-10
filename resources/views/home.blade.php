@extends('layouts.main')

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
        padding: 50px 0;
        margin: 0 70px; 
    }
    .main-swiper .swiper-slide {
        width: auto;
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
</style>

<div class="px-24 pt-16 overflow-hidden relative">
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-full dot-pattern opacity-30"></div>
        <div class="absolute top-20 left-20 w-32 h-32 bg-red-100 rounded-full floating-shape opacity-20" style="animation-delay: 0s;"></div>
        <div class="absolute top-40 right-40 w-24 h-24 bg-gray-200 rounded-full floating-shape opacity-30" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-red-50 rounded-full floating-shape opacity-25" style="animation-delay: 2s;"></div>
    </div> 
    <div class="relative mx-auto max-w-7xl px-16 py-8">
        <div class="swiper main-swiper relative">
            <div class="swiper-wrapper">
                @foreach (['1', '2', '3', '4', '5', '6'] as $index)
                <div class="swiper-slide relative rounded-2xl" style="width: 70%"> 
                    <div class="aspect-[16/9] w-full">
                        <img src="/images/swiper/{{ $index }}.jpg" alt="Slide {{ $index }}" class="w-full h-full object-cover rounded-2xl">
                    </div>
                </div> 
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div class="w-full md:w-8/12">
                        <h6 class="text-2xl font-semibold text-gray-800">
                            Wujudkan <span class="font-bold text-red-600">ZONA INTEGRITAS</span>
                        </h6>
                        <h3 class="text-3xl text-gray-700">
                            Pada <span class="font-bold text-blue-600">DPMPTSP Kota Padang</span>
                        </h3>
                        <p class="text-base lg:text-lg text-gray-600">
                            Menuju <span class="font-bold italic text-green-600">Wilayah Bebas Korupsi (WBK)</span> & 
                            <span class="font-bold italic text-green-600">Wilayah Birokrasi Bersih Melayani (WBBM)</span>
                        </p>
                    </div>
                    <div class="w-full md:w-4/12 flex justify-end pr-4">
                        <div class="relative group">
                            <img 
                                src="/images/zi/zi_5.png" 
                                alt="Logo Zona Integritas" 
                                class="w-full max-w-[100px] transition-transform duration-300 group-hover:scale-105"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="relative overflow-hidden">
                <div class="flex gap-6 transition-transform duration-500 ease-in-out" id="carouselTrack">
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/akhlak.png" alt="Akhlak" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/evp.png" alt="EVP" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_5.png" alt="ZI 2" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_4.png" alt="ZI 4" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_6.png" alt="ZI 5" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_2.png" alt="ZI 6" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-gray-50/80 px-6 relative backdrop-blur-sm">
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
        </div>
    </section>

    <section class="py-10 bg-gray-50 p-6">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Layanan Perizinan</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <a href="https://oss.go.id/" target="_blank" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300" 
                   >
                    <div class="icon-wrap">
                        <img class="w-56 h-50 object-cover mb-4 rounded-lg mx-auto" src="/images/osss.png" alt="OSS">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">OSS</h3>
                    <p class="text-gray-600 text-justify">OSS (Online Single Submission) merupakan sistem informasi layanan perizinan berusaha yang diterbitkan oleh Lembaga OSS untuk kepada Pelaku Usaha melalui sistem elektronik yang terintegrasi.</p>
                </a>
                <a href="https://simbg.pu.go.id/" target="_blank" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300">
                    <div class="icon-wrap">
                        <img class="w-50 h-50 object-cover mb-4 mt-6 rounded-lg mx-auto" src="/images/simbg.png" alt="SIMBG">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">SIMBG</h3>
                    <p class="text-gray-600 text-justify">Sistem Informasi Manajemen Bangunan Gedung yang selanjutnya disingkat SIMBG adalah sistem elektronik berbasis web yang digunakan untuk melaksanakan proses penyelenggaraan PBG, SLF, SBKBG, RTB, dan Pendataan Bangunan Gedung disertai dengan informasi terkait penyelenggaraan bangunan gedung.</p>
                </a>
                <a href="http://ikm.web.dpmptsp.padang.go.id/" target="_blank" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300">
                    <div class="icon-wrap">
                        <img class="w-32 h-32 object-cover mb-4 rounded-lg mx-auto" src="/images/ikm.png" alt="IKM">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">IKM</h3>
                    <p class="text-gray-600 text-justify">Indeks Kepuasan Masyarakat (IKM) adalah layanan yang dirancang untuk mengukur tingkat kepuasan masyarakat terhadap pelayanan yang diberikan oleh instansi pemerintah, guna meningkatkan kualitas layanan secara berkelanjutan.</p>
                </a>
                <a href="https://nonperizinan.web.dpmptsp.padang.go.id/sinopen" target="_blank" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300">
                    <div class="icon-wrap">
                        <img class="w-32 h-32 object-cover mb-4 rounded-lg mx-auto" src="/images/sinopen.png" alt="IKM">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">SINOPEN</h3>
                    <p class="text-gray-600 text-justify">Sistem Informasi Non Perizinan dan Perizinan Non OSS, dengan aplikasi SINOPEN yang dapat diakses oleh seluruh pemohon dan petugas di Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu dengan mudah tidak terbatas ruang dan waktu bisa di akses kapan pun dan dimana saja.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="py-10 bg-white">
        <div class="bg-gray-50 py-24">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">
                        Galeri
                    </h2>
                    <div class="w-20 h-1 bg-red-600 mx-auto"></div>
                </div>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                >
                    <div class="group relative overflow-hidden rounded-xl shadow-lg">
                        <img
                            src="/images/swiper/1.jpg"
                            alt="Gallery 1"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg">
                        <img
                            src="/images/swiper/2.jpg"
                            alt="Gallery 2"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg">
                        <img
                            src="/images/swiper/3.jpg"
                            alt="Gallery 3"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg">
                        <img
                            src="/images/swiper/4.jpg"
                            alt="Gallery 4"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg">
                        <img
                            src="/images/swiper/5.jpg"
                            alt="Gallery 5"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg">
                        <img
                            src="/images/swiper/6.jpg"
                            alt="Gallery 6"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainSwiper = new Swiper('.main-swiper', {
            loop: true,
            autoHeight: true,
            slidesPerView: 'auto', 
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