@extends('layouts.main')

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
                                    placeholder="Cari disini..."
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
                                    <option value="">2025</option>
                                    <option value="">Dinas</option>
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
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group fade-in-scale">
                    <div class="relative">
                        <img src="/images/swiper/2.jpg"
                            class="w-full h-48 object-cover transition-all duration-500 group-hover:scale-105"/>
                        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-red-600 rounded-xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">8 Januari 2025</div>
                        <h3 class="text-xl font-semibold mb-2 line-clamp-2 hover:text-red-600 transition-colors duration-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem, cumque?</p>
                        <a href="{{ route('detail-info')}}"
                            class="inline-block w-full bg-red-600 text-white px-6 py-3 rounded-lg text-center
                                   transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                                   relative overflow-hidden group">
                            <span class="relative z-10">Baca Selengkapnya</span>
                            <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group fade-in-scale">
                    <div class="relative">
                        <img src="/images/swiper/2.jpg"
                            class="w-full h-48 object-cover transition-all duration-500 group-hover:scale-105"/>
                        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-red-600 rounded-xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">8 Januari 2025</div>
                        <h3 class="text-xl font-semibold mb-2 line-clamp-2 hover:text-red-600 transition-colors duration-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem, cumque?</p>
                        <a href="{{ route('detail-info')}}"
                            class="inline-block w-full bg-red-600 text-white px-6 py-3 rounded-lg text-center
                                   transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                                   relative overflow-hidden group">
                            <span class="relative z-10">Baca Selengkapnya</span>
                            <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group fade-in-scale">
                    <div class="relative">
                        <img src="/images/swiper/2.jpg"
                            class="w-full h-48 object-cover transition-all duration-500 group-hover:scale-105"/>
                        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-red-600 rounded-xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">8 Januari 2025</div>
                        <h3 class="text-xl font-semibold mb-2 line-clamp-2 hover:text-red-600 transition-colors duration-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem, cumque?</p>
                        <a href="{{ route('detail-info')}}"
                            class="inline-block w-full bg-red-600 text-white px-6 py-3 rounded-lg text-center
                                   transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                                   relative overflow-hidden group">
                            <span class="relative z-10">Baca Selengkapnya</span>
                            <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group fade-in-scale">
                    <div class="relative">
                        <img src="/images/swiper/2.jpg"
                            class="w-full h-48 object-cover transition-all duration-500 group-hover:scale-105"/>
                        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-red-600 rounded-xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">8 Januari 2025</div>
                        <h3 class="text-xl font-semibold mb-2 line-clamp-2 hover:text-red-600 transition-colors duration-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem, cumque?</p>
                        <a href="{{ route('detail-info')}}"
                            class="inline-block w-full bg-red-600 text-white px-6 py-3 rounded-lg text-center
                                   transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                                   relative overflow-hidden group">
                            <span class="relative z-10">Baca Selengkapnya</span>
                            <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection