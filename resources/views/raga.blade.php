@extends('layouts.main')

@section('title', 'Raga MPP | DPMPTSP Kota Padang')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

@section('content')
<div class="overflow-hidden">
    <div x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset" class="relative min-h-screen text-white">
        <div class="absolute inset-0 bg-cover bg-center transform scale-110 transition-transform duration-1000"
            style="background-image: url('/images/raga-1.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
        </div>
        
        <div class="relative container mx-auto px-12 py-24 min-h-screen flex items-center">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8" data-aos="fade-right">
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                        Raga MPP
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-200 leading-relaxed">
                        Inovasi Perwira Jaga untuk Monitoring dan Memastikan Kenyamanan Pengunjung di Mal Pelayanan Publik Kota Padang
                    </p>
                </div>
                <div class="relative h-96" data-aos="fade-left">
                    <img src="/images/raga-3.jpg" alt="Raga MPP" 
                        class="rounded-2xl shadow-2xl object-cover w-full h-full hover:shadow-red-500/20 transition-all duration-500 hover:scale-[1.02]">
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-red-600 rounded-full animate-pulse opacity-50"></div>
                    <div class="absolute -top-6 -left-6 w-32 h-32 bg-red-600 rounded-full animate-pulse opacity-30"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="detail" class="py-16 md:py-24 bg-white relative px-4 md:px-12">
        <div class="absolute top-0 left-0 w-96 h-96 bg-red-50 rounded-full filter blur-3xl opacity-50 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-50 rounded-full filter blur-3xl opacity-50 translate-x-1/2 translate-y-1/2"></div>
        
        <div class="container mx-auto px-2 md:px-6 relative">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Keunggulan Raga MPP</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Memastikan kualitas pelayanan dan kenyamanan pengunjung di Mal Pelayanan Publik</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ([
                    ['icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'title' => 'Monitoring Aktif', 'desc' => 'Pemantauan langsung proses pelayanan oleh 2 PNS yang bertugas setiap hari'],
                    ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Petugas Profesional', 'desc' => 'Dilaksanakan oleh PNS yang ditugaskan langsung melalui Surat Perintah Tugas'],
                    ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Jaminan Kualitas', 'desc' => 'Memastikan standar pelayanan terpenuhi dan pengunjung mendapat pelayanan optimal']
                ] as $index => $feature)
                <div class="group relative bg-white p-8 rounded-2xl border border-gray-100 hover:border-red-100 transition-all duration-500"
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}"
                    @mouseover="$el.style.transform = 'translateY(-8px)'"
                    @mouseleave="$el.style.transform = 'translateY(0)'">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold mb-4 text-gray-900">{{ $feature['title'] }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $feature['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-24 relative">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16" data-aos="fade-up">
                Dokumentasi Raga MPP
            </h2>
            
            <div x-data="{ 
                images: [
                    '/images/raga-1.jpg',
                    '/images/raga-2.jpg',
                    '/images/raga-3.jpg',
                    '/images/raga-4.jpg',
                    '/images/raga-5.jpg'
                ],
                currentIndex: 0,
                autoplayInterval: null,
                isHovered: false,
                isTransitioning: false,

                init() {
                    this.startAutoplay();
                },

                startAutoplay() {
                    this.autoplayInterval = setInterval(() => {
                        if (!this.isHovered && !this.isTransitioning) {
                            this.next();
                        }
                    }, 5000);
                },

                stopAutoplay() {
                    clearInterval(this.autoplayInterval);
                },

                next() {
                    if (this.isTransitioning) return;
                    this.transition(() => {
                        this.currentIndex = (this.currentIndex + 1) % this.images.length;
                    });
                },

                prev() {
                    if (this.isTransitioning) return;
                    this.transition(() => {
                        this.currentIndex = this.currentIndex === 0 ? this.images.length - 1 : this.currentIndex - 1;
                    });
                },

                transition(callback) {
                    this.isTransitioning = true;
                    callback();
                    setTimeout(() => {
                        this.isTransitioning = false;
                    }, 500);
                }
            }" 
            x-init="init()"
            @mouseover="isHovered = true" 
            @mouseleave="isHovered = false"
            class="relative max-w-5xl mx-auto"
            data-aos="fade-up">
                
                <div class="relative h-[600px] rounded-2xl overflow-hidden group">
                    <div class="absolute inset-0 flex transition-transform duration-500 ease-out"
                        :style="`transform: translateX(-${currentIndex * 100}%)`">
                        <template x-for="(image, index) in images" :key="index">
                            <div class="flex-shrink-0 w-full h-full">
                                <div class="w-full h-full transform transition-transform duration-700 hover:scale-105">
                                    <img :src="image" 
                                        class="w-full h-full object-cover"
                                        alt="MPP Mobile Documentation"
                                        loading="lazy">
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <button @click="prev(); stopAutoplay(); startAutoplay();" 
                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 p-4 rounded-full shadow-lg hover:bg-white transition-all duration-300 hover:scale-110 opacity-0 group-hover:opacity-100 transform -translate-x-4 group-hover:translate-x-0"
                            :disabled="isTransitioning">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button @click="next(); stopAutoplay(); startAutoplay();" 
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 p-4 rounded-full shadow-lg hover:bg-white transition-all duration-300 hover:scale-110 opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0"
                            :disabled="isTransitioning">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <div class="absolute top-4 right-4 bg-black/60 text-white px-6 py-2 rounded-full text-sm backdrop-blur-sm font-medium">
                        <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
                    </div>
                </div>

                <div class="flex justify-center mt-8 gap-3">
                    <template x-for="(image, index) in images" :key="index">
                        <button @click="if (!isTransitioning) { currentIndex = index; stopAutoplay(); startAutoplay(); }" 
                                :class="{
                                    'w-16 bg-red-600 scale-110': currentIndex === index,
                                    'w-3 bg-gray-400 hover:bg-gray-600 hover:w-6': currentIndex !== index
                                }"
                                class="h-3 rounded-full transition-all duration-300 ease-out transform hover:scale-110"
                                :disabled="isTransitioning">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <button 
        x-data="{ show: false }"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-8"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-8"
        @scroll.window="show = window.pageYOffset > 500"
        @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="fixed bottom-8 right-8 p-4 bg-red-600 text-white rounded-full shadow-lg hover:bg-red-700 hover:shadow-red-500/20 transition-all duration-300 transform hover:scale-110 z-50"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>
</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out forwards;
    }

    ::-webkit-scrollbar {
        width: 12px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #ef4444;
        border-radius: 6px;
        border: 3px solid #f1f1f1;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #dc2626;
    }

    html {
        scroll-behavior: smooth;
    }

    ::selection {
        background: rgba(239, 68, 68, 0.2);
        color: #111827;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: 'ease-out'
        });
    });
</script>
@endsection