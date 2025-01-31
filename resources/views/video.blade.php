@extends('layouts.main')
@section('title', 'Video | DPMPTSP Kota Padang')

@section('content')
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
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/bg-5.jpg')">
        </div>
        <h1 class="text-6xl text-white uppercase font-bold relative z-10 tracking-wider fade-in-scale">
            Video
            <div class="h-1 w-24 bg-red-500 mx-auto mt-4 rounded-full"></div>
        </h1>
    </div>

    <section class="bg-white/80 px-10 relative backdrop-blur-sm">
        <div class="container mx-auto py-12">
            <div class="max-w-4xl mx-auto mb-12 slide-in-bottom">
                <form method="GET" action="{{ url()->current() }}" 
                      class="p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari video..."
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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8 px-4 md:px-8 lg:px-20">
                @forelse ($videos as $video)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group fade-in-scale">
                        <div class="relative cursor-pointer" onclick="openVideoModal('{{ $video->url }}', '{{ $video->judul }}')">
                            @php
                                $videoId = '';
                                $thumbnailUrl = '';

                                if (strpos($video->url, 'youtube.com/shorts') !== false) {
                                    $videoId = explode('/shorts/', $video->url)[1];
                                    $videoId = explode('?', $videoId)[0]; 
                                } elseif (strpos($video->url, 'youtube.com') !== false) {
                                    parse_str(parse_url($video->url, PHP_URL_QUERY), $params);
                                    $videoId = $params['v'] ?? '';
                                } elseif (strpos($video->url, 'youtu.be') !== false) {
                                    $videoId = substr(parse_url($video->url, PHP_URL_PATH), 1);
                                }

                                $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
                            @endphp
                            <img src="{{ $thumbnailUrl }}"
                                 alt="{{ $video->judul }}"
                                 class="w-full h-48 object-cover transition-all duration-500 group-hover:scale-105"/>
                            
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-red-600/90 rounded-full flex items-center justify-center transform transition-transform duration-300 group-hover:scale-110">
                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-red-600 rounded-xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-gray-500 mb-2">{{ \Carbon\Carbon::parse($video->tanggal_publikasi)->locale('id')->isoFormat('D MMMM Y') }}</div>
                            <h3 class="text-xl font-semibold mb-2 line-clamp-2 hover:text-red-600 transition-colors duration-300">
                                {{ $video->judul }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">
                                {{ $video->deskripsi }}
                            </p>
                            <button onclick="openVideoModal('{{ $video->url }}', '{{ $video->judul }}')"
                                    class="inline-block w-full bg-red-600 text-white px-6 py-3 rounded-lg text-center
                                           transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                                           relative overflow-hidden group">
                                <span class="relative z-10">Putar Video</span>
                                <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Tidak ada video yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="flex justify-center mt-12">
                @if(method_exists($videos, 'hasMorePages') && $videos->hasMorePages())
                    <button id="loadMore" 
                            data-page="2" 
                            class="px-6 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 flex items-center gap-2">
                        <span>Tampilkan Lebih Banyak</span>
                        <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <button id="loading" class="hidden px-6 py-2.5 bg-red-500 text-white rounded-xl flex items-center gap-2">
                        <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        <span>Memuat...</span>
                    </button>
                @endif
            </div>
        </div>
    </section>
</div>

<div id="videoModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/75 backdrop-blur-sm" onclick="closeVideoModal()"></div>
    <div class="relative min-h-screen flex items-center justify-center p-10">
        <div class="bg-white rounded-2xl w-full max-w-4xl shadow-2xl transform transition-all">
            <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-xl font-semibold" id="videoTitle"></h3>
                <button onclick="closeVideoModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="relative pt-[56.25%]">
                <iframe id="videoFrame"
                        class="absolute inset-0 w-full h-full rounded-b-2xl"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function getYouTubeVideoId(url) {
        let videoId = '';
        
        if (url.includes('youtube.com/shorts')) {
            videoId = url.split('/shorts/')[1].split('?')[0];
        } else if (url.includes('youtube.com')) {
            const urlParams = new URLSearchParams(new URL(url).search);
            videoId = urlParams.get('v');
        } else if (url.includes('youtu.be')) {
            videoId = url.split('/').pop().split('?')[0];
        }
        
        return videoId;
    }

    function openVideoModal(url, title) {
        const modal = document.getElementById('videoModal');
        const videoFrame = document.getElementById('videoFrame');
        const videoTitle = document.getElementById('videoTitle');
        
        const videoId = getYouTubeVideoId(url);
        const embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        
        videoFrame.src = embedUrl;
        videoTitle.textContent = title;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        const videoFrame = document.getElementById('videoFrame');

        videoFrame.src = '';
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('videoModal').classList.contains('hidden')) {
            closeVideoModal();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('loadMore');
        const loadingBtn = document.getElementById('loading');
        const container = document.querySelector('.grid');
        
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', async function() {
                loadMoreBtn.classList.add('hidden');
                loadingBtn.classList.remove('hidden');
                
                const nextPage = loadMoreBtn.dataset.page;
                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('page', nextPage);
                
                try {
                    const response = await fetch(currentUrl.toString(), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    
                    if (!response.ok) throw new Error('Network response was not ok');
                    
                    const html = await response.text();
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newItems = doc.querySelector('.grid').innerHTML;
                    
                    const tempContainer = document.createElement('div');
                    tempContainer.innerHTML = newItems;
                    
                    const existingIds = Array.from(container.querySelectorAll('[data-id]')).map(el => el.dataset.id);
                    const newElements = Array.from(tempContainer.children).filter(el => {
                        return !existingIds.includes(el.dataset.id);
                    });
                    
                    newElements.forEach(el => {
                        el.style.opacity = '0';
                        el.style.transform = 'translateY(20px)';
                        container.appendChild(el);
                        
                        setTimeout(() => {
                            el.style.transition = 'all 0.5s ease-out';
                            el.style.opacity = '1';
                            el.style.transform = 'translateY(0)';
                        }, 50);
                    });
                    
                    const hasMore = doc.querySelector('.grid').dataset.hasMore === 'true';
                    if (hasMore) {
                        loadMoreBtn.dataset.page = parseInt(nextPage) + 1;
                        loadMoreBtn.classList.remove('hidden');
                    }
                    
                } catch (error) {
                    console.error('Error:', error);
                } finally {
                    loadingBtn.classList.add('hidden');
                }
            });
        }
    });
</script>
@endpush
@endsection