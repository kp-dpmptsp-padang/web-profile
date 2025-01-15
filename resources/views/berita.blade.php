@extends('layouts.main')
@section('title', 'Berita | DPMPTSP Kota Padang')

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
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/swiper/5.jpg')">
        </div>
        <h1 class="text-6xl text-white uppercase font-bold relative z-10 tracking-wider fade-in-scale">
            berita
            <div class="h-1 w-24 bg-red-500 mx-auto mt-4 rounded-full"></div>
        </h1>
    </div>

    <section class="bg-gray-50/80 px-10 relative backdrop-blur-sm">
        <div class="container mx-auto py-12">
            <div class="max-w-4xl mx-auto mb-12 slide-in-bottom">
                <form method="GET" action="{{ url()->current() }}" 
                      class="p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari informasi..."
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
                                    <option value="">Semua Tag</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->tag }}" @if(request('filter') == $tag->tag) selected @endif>
                                            {{ $tag->tag }}
                                        </option>
                                    @endforeach
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-24">
                @forelse ($posts as $post)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group fade-in-scale">
                        <div class="relative">
                            @if($post->pictures->first())
                                <img src="{{ asset('storage/' . $post->pictures->first()->nama_file) }}"
                                    alt="{{ $post->judul }}"
                                    class="w-full h-48 object-cover transition-all duration-500 group-hover:scale-105"/>
                            @else
                                <img src="/images/swiper/2.jpg"
                                    alt="Default Image"
                                    class="w-full h-48 object-cover transition-all duration-500 group-hover:scale-105"/>
                            @endif
                            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-red-600 rounded-xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-gray-500 mb-2">{{ $post->created_at->format('d F Y') }}</div>
                            <h3 class="text-xl font-semibold mb-2 line-clamp-2 hover:text-red-600 transition-colors duration-300">
                                {{ $post->judul }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">
                                {!! Str::limit(strip_tags($post->konten), 150) !!}
                            </p>
                            <div class="mb-4 flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                    <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">
                                        {{ $tag->tag }}
                                    </span>
                                @endforeach
                            </div>
                            <a href="{{ route('detail-berita', ['slug' => $post->slug]) }}"
                                class="inline-block w-full bg-red-600 text-white px-6 py-3 rounded-lg text-center
                                       transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                                       relative overflow-hidden group">
                                <span class="relative z-10">Baca Selengkapnya</span>
                                <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Tidak ada berita yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="bg-white px-10 relative pb-10">
        <div class="container mx-auto py-12">
            <h1 class="text-3xl uppercase font-bold text-center tracking-wider fade-in-scale mb-12">
                Video
                <div class="h-1 w-12 bg-red-500 mx-auto mt-4 rounded-full"></div>
            </h1>
    
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-24">
                @forelse ($videos as $video)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group fade-in-scale">
                        <div class="relative cursor-pointer" onclick="openVideoModal('{{ $video->url }}', '{{ $video->judul }}')">
                            @php
                                $videoId = '';
                                if (strpos($video->url, 'youtube.com') !== false) {
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
                            <div class="text-sm text-gray-500 mb-2">{{ $video->created_at->format('d F Y') }}</div>
                            <h3 class="text-xl font-semibold mb-2 line-clamp-2 hover:text-red-600 transition-colors duration-300">
                                {{ $video->judul }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">
                                {{ $video->deskripsi }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Tidak ada video yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <div id="videoModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/75 backdrop-blur-sm" data-modal-hide="videoModal"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
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
</div>
@push('scripts')
<script>
    function openVideoModal(url, title) {
        const modal = document.getElementById('videoModal');
        const videoFrame = document.getElementById('videoFrame');
        const videoTitle = document.getElementById('videoTitle');
        
        let videoId = '';
        if (url.includes('youtube.com')) {
            const urlParams = new URLSearchParams(new URL(url).search);
            videoId = urlParams.get('v');
        } else if (url.includes('youtu.be')) {
            videoId = url.split('/').pop();
        }
        
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

    document.getElementById('videoModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeVideoModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('videoModal').classList.contains('hidden')) {
            closeVideoModal();
        }
    });
</script>
@endpush
@endsection