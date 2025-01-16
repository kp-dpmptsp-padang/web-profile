@extends('layouts.main')
@section('title', 'Detail Informasi | DPMPTSP Kota Padang')
@section('content')
<div class="overflow-hidden pt-4 p-24">
    <section class="bg-white pt-32 pb-12">
        <div class="max-w-screen-2xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 mb-6 group transition-all duration-300 hover:shadow-2xl">
                        <div class="relative overflow-hidden">
                            @if($post->pictures->first())
                                <img src="{{ asset('storage/' . $post->pictures->first()->nama_file) }}" 
                                     alt="{{ $post->judul }}" 
                                     class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-105"
                                     loading="lazy">
                            @else
                                <img src="/images/default.jpg" 
                                     alt="Default Image" 
                                     class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-105"
                                     loading="lazy">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    </div>

                    <div class="mb-8 opacity-0 animate-fade-slide-up">
                        <div class="inline-flex items-center space-x-2 text-gray-500 mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ $post->created_at->format('d F Y') }}</span>
                        </div>
                        <h1 class="text-4xl font-bold text-gray-900 tracking-tight">{{ $post->judul }}</h1>
                    </div>
                    <div class="prose max-w-none opacity-0 animate-fade-in">
                        <p class="text-gray-600 leading-relaxed mb-4 text-justify">
                            {{ $post->konten }}
                        </p>
                    
                        @if($post->link)
                            <div class="flex justify-end mb-4">
                                <a href="{{ $post->link }}" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-2 text-red-600 hover:text-red-700 transition-colors duration-300 group">
                                    <span class="font-semibold">Baca Selengkapnya Disini</span>
                                    <svg class="w-5 h-5 transform transition-transform duration-300 group-hover:translate-x-1" 
                                         fill="none" 
                                         stroke="currentColor" 
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" 
                                              stroke-linejoin="round" 
                                              stroke-width="2" 
                                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mt-4">
                        @foreach ($post->tags as $tag)
                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full">{{ $tag->tag }}</span>
                        @endforeach
                    </div>
                </div>
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
                                
                                <div class="space-y-6">
                                    @foreach ($recentPosts as $recentPost)
                                    @if($recentPost->jenis == 'informasi')
                                        <a href="{{ route('detail-info', $recentPost->slug) }}" class="block group">
                                    @else
                                        <a href="{{ route('detail-berita', $recentPost->slug) }}" class="block group">
                                    @endif
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
                                                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                </div>
                                                <div class="flex-1 transition-transform duration-300 group-hover:translate-x-1">
                                                    <span class="text-sm text-gray-500 flex items-center space-x-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <span>{{ $recentPost->created_at->format('d F Y') }}</span>
                                                    </span>
                                                    <h3 class="font-semibold text-gray-900 group-hover:text-red-500 transition-colors duration-200">
                                                        {{ \Illuminate\Support\Str::words($recentPost->judul, 8) }}
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

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .animate-fade-slide-up {
        animation: fadeSlideUp 0.6s ease-out forwards;
    }

    .animate-fade-in {
        animation: fadeIn 0.8s ease-out 0.3s forwards;
    }
</style>
@endsection