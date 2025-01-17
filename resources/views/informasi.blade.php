@extends('layouts.main')
@section('title', 'Informasi | DPMPTSP Kota Padang')

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
    <div class="heading bg-cover bg-center py-32 flex items-center justify-center relative">
        <div class="absolute inset-0 bg-cover bg-center transform scale-105 transition-transform duration-1000" 
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/swiper/5.jpg')">
        </div>
        <h1 class="text-6xl text-white uppercase font-bold relative z-10 tracking-wider fade-in-scale">
            Informasi
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
                                {{ $post->konten }}
                            </p>
                            <div class="mb-4 flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                    <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">
                                        {{ $tag->tag }}
                                    </span>
                                @endforeach
                            </div>
                            <a href="{{ route('detail-info', ['slug' => $post->slug]) }}"
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
                        <p class="text-gray-500 text-lg">Tidak ada informasi yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
            <div class="flex justify-center mt-12">
                @if($posts->hasMorePages())
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
@push('scripts')
<script>

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