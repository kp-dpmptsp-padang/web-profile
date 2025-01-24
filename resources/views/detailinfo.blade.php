@extends('layouts.main')
@section('title', 'Detail Informasi | DPMPTSP Kota Padang') 
@section('content')
<div class="overflow-hidden">
    <section class="relative min-h-[600px] bg-white">
        <div class="container mx-auto px-4 lg:px-12 pt-32 pb-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <div x-data="{ 
                            currentImageIndex: 0,
                            images: {{ json_encode($post->pictures->pluck('nama_file')) }},
                            autoplayInterval: null,
                            isHovered: false,
                            
                            init() {
                                if (this.images.length > 1) {
                                    this.startAutoplay();
                                }
                            },
                            
                            startAutoplay() {
                                this.autoplayInterval = setInterval(() => {
                                    if (!this.isHovered) {
                                        this.next();
                                    }
                                }, 5000);
                            },
                            
                            stopAutoplay() {
                                clearInterval(this.autoplayInterval);
                            },
                            
                            next() {
                                this.currentImageIndex = (this.currentImageIndex + 1) % this.images.length;
                            },
                            
                            prev() {
                                this.currentImageIndex = this.currentImageIndex === 0 
                                    ? this.images.length - 1 
                                    : this.currentImageIndex - 1;
                            }
                        }" 
                        @mouseover="isHovered = true" 
                        @mouseleave="isHovered = false"
                        class="relative h-[500px] rounded-2xl overflow-hidden group mb-8">
                        
                        <div class="relative h-full">
                            @forelse($post->pictures as $index => $picture)
                                <div x-show="currentImageIndex === {{ $index }}"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-95"
                                    class="absolute inset-0 flex items-center justify-center bg-gray-100"> <!-- Tambahkan flex dan background -->
                                    <img src="{{ asset('storage/' . $picture->nama_file) }}"
                                        alt="{{ $post->judul }}"
                                        class="w-full h-full object-contain transform transition-transform duration-700 group-hover:scale-105"> <!-- Ubah object-cover menjadi object-contain -->
                                </div>
                            @empty
                                <div class="absolute inset-0 flex items-center justify-center bg-gray-100">
                                    <img src="/images/default.jpg" 
                                        alt="Default Image" 
                                        class="w-full h-full object-contain"> <!-- Ubah object-cover menjadi object-contain -->
                                </div>
                            @endforelse
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        <!-- Navigation Buttons (if more than one image) -->
                        @if($post->pictures->count() > 1)
                            <button @click="prev(); stopAutoplay(); startAutoplay();" 
                                    class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 p-4 rounded-full shadow-lg hover:bg-white transition-all duration-300 hover:scale-110 opacity-0 group-hover:opacity-100 transform -translate-x-4 group-hover:translate-x-0">
                                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button @click="next(); stopAutoplay(); startAutoplay();" 
                                    class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 p-4 rounded-full shadow-lg hover:bg-white transition-all duration-300 hover:scale-110 opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0">
                                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>

                            <!-- Image Counter -->
                            <div class="absolute top-4 right-4 bg-black/60 text-white px-6 py-2 rounded-full text-sm backdrop-blur-sm font-medium">
                                <span x-text="currentImageIndex + 1"></span> / <span x-text="images.length"></span>
                            </div>

                            <!-- Dot Indicators -->
                            <div class="absolute bottom-4 left-0 right-0">
                                <div class="flex justify-center gap-3">
                                    @foreach($post->pictures as $index => $picture)
                                        <button @click="currentImageIndex = {{ $index }}; stopAutoplay(); startAutoplay();" 
                                                :class="{
                                                    'w-16 bg-red-600 scale-110': currentImageIndex === {{ $index }},
                                                    'w-3 bg-gray-400 hover:bg-gray-600 hover:w-6': currentImageIndex !== {{ $index }}
                                                }"
                                                class="h-3 rounded-full transition-all duration-300 ease-out transform hover:scale-110">
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="animate-fade-slide-up">
                        <div class="inline-flex items-center space-x-2 text-gray-500 mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ $post->created_at->format('d F Y') }}</span>
                        </div>
                        <h1 class="text-4xl font-bold text-gray-900 tracking-tight mb-6">{{ $post->judul }}</h1>
                        <div class="prose max-w-none">
                            <p class="text-gray-600 leading-relaxed text-justify">{{ $post->konten }}</p>
                            
                            @if($post->link)
                                <div class="flex justify-end mt-6">
                                    <a href="{{ $post->link }}" 
                                       target="_blank" 
                                       class="inline-flex items-center gap-2 text-red-600 hover:text-red-700 transition-colors duration-300 group">
                                        <span class="font-semibold">Baca Selengkapnya</span>
                                        <svg class="w-5 h-5 transform transition-transform duration-300 group-hover:translate-x-1" 
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2 mt-6">
                            @foreach($post->tags as $tag)
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">
                                    {{ $tag->tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl">
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center space-x-2">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                    <span>Postingan Terkini</span>
                                </h2>
                                
                                <!-- Recent Posts List -->
                                <div class="space-y-6">
                                    @foreach($recentPosts as $recentPost)
                                        <a href="{{ $recentPost->jenis == 'informasi' ? route('detail-info', $recentPost->slug) : route('detail-berita', $recentPost->slug) }}" 
                                           class="block group">
                                            <div class="flex gap-4 items-start p-3 rounded-xl transition-all duration-300 hover:bg-gray-50">
                                                <div class="relative overflow-hidden rounded-lg">
                                                    @if($recentPost->pictures->first())
                                                        <img src="{{ asset('storage/' . $recentPost->pictures->first()->nama_file) }}" 
                                                             alt="{{ $recentPost->judul }}" 
                                                             class="w-24 h-24 object-cover transition-transform duration-500 group-hover:scale-110">
                                                    @else
                                                        <img src="/images/default.jpg" 
                                                             alt="Default Image" 
                                                             class="w-24 h-24 object-cover transition-transform duration-500 group-hover:scale-110">
                                                    @endif
                                                </div>
                                                <div class="flex-1">
                                                    <span class="text-sm text-gray-500 flex items-center space-x-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <span>{{ $recentPost->created_at->format('d F Y') }}</span>
                                                    </span>
                                                    <h3 class="font-semibold text-gray-900 line-clamp-2 group-hover:text-red-500 transition-colors duration-200">
                                                        {{ $recentPost->judul }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    @keyframes fadeSlideUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-slide-up {
        animation: fadeSlideUp 0.6s ease-out forwards;
    }
</style>
@endsection