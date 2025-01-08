@extends('layouts.main')

@section('content')
<div class="overflow-hidden pt-4 p-24">
    <section class="bg-white pt-32 pb-12">
        <div class="max-w-screen-2xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 mb-6 group transition-all duration-300 hover:shadow-2xl">
                        <div class="relative overflow-hidden">
                            <img src="/images/swiper/1.jpg"
                                 alt="Gambar Berita" 
                                 class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-105"
                                 loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    </div>

                    <div class="mb-8 opacity-0 animate-fade-slide-up">
                        <div class="inline-flex items-center space-x-2 text-gray-500 mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>8 Januari 2025</span>
                        </div>
                        <h1 class="text-4xl font-bold text-gray-900 tracking-tight">Berita Dummy</h1>
                    </div>
                    <div class="prose max-w-none opacity-0 animate-fade-in">
                        <p class="text-gray-600 leading-relaxed mb-4 text-justify">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum atque commodi blanditiis vero perspiciatis sint reiciendis neque omnis facere, mollitia et quo necessitatibus tempora sunt, fuga placeat nobis. Placeat accusantium nesciunt, nam, neque quasi inventore expedita labore corporis quos soluta accusamus magni atque asperiores quisquam. Nisi minus facere, assumenda obcaecati distinctio nemo optio itaque omnis, sed ipsam numquam iste mollitia! Veritatis, nam architecto. Aliquid quibusdam, suscipit est harum dolore obcaecati doloremque amet quia tempore, iure sunt velit labore sapiente. Maxime iusto, cupiditate minus eum nulla expedita distinctio, quisquam quasi reprehenderit voluptatem explicabo harum dolorum, quia neque. Quas dolore possimus libero. Reiciendis optio ipsum dolorem veritatis adipisci accusantium suscipit odit inventore laborum asperiores tempore ipsam, expedita architecto qui exercitationem culpa obcaecati laudantium ea. Fuga, illum? Eum expedita delectus assumenda sapiente minus nobis eligendi, impedit exercitationem, quos voluptatem dolorem? Voluptate illo consequatur dignissimos. Incidunt blanditiis distinctio quia neque quo nostrum molestiae, possimus quibusdam impedit, doloribus eaque perferendis labore voluptatem. Deleniti doloribus nulla nemo pariatur reiciendis quisquam voluptatum nostrum nesciunt? Laborum, veniam dignissimos eaque libero pariatur quas? Quo fuga voluptatibus ad quisquam veniam ducimus ratione nemo itaque esse mollitia iste pariatur quos autem optio dolorem modi dolore, explicabo vitae fugit molestias? Reprehenderit ex alias suscipit aspernatur id quis debitis, esse at perspiciatis impedit, quisquam quae, magni voluptatibus nesciunt aperiam maxime. Dolorem totam quibusdam laborum quo alias praesentium qui expedita amet, exercitationem accusamus illum molestiae ipsa laudantium, ducimus minus libero dicta ipsum eos numquam ipsam sequi sed eum sit. Quis accusamus reprehenderit impedit ex.
                        </p>
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
                                    <span>Berita Terkini</span>
                                </h2>
                                
                                <div class="space-y-6">
                                    <a href="#" class="block group">
                                        <div class="flex gap-4 items-start p-3 rounded-xl transition-all duration-300 hover:bg-gray-50">
                                            <div class="relative overflow-hidden rounded-lg">
                                                <img src="/images/swiper/1.jpg" 
                                                     alt="Thumbnail" 
                                                     class="w-24 h-24 object-cover transition-transform duration-500 group-hover:scale-110">
                                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                            </div>
                                            <div class="flex-1 transition-transform duration-300 group-hover:translate-x-1">
                                                <span class="text-sm text-gray-500 flex items-center space-x-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span>7 Januari 2025</span>
                                                </span>
                                                <h3 class="font-semibold text-gray-900 group-hover:text-red-500 transition-colors duration-200">
                                                    Judul Berita Terkini 1
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="block group">
                                        <div class="flex gap-4 items-start p-3 rounded-xl transition-all duration-300 hover:bg-gray-50">
                                            <div class="relative overflow-hidden rounded-lg">
                                                <img src="/images/swiper/1.jpg" 
                                                     alt="Thumbnail" 
                                                     class="w-24 h-24 object-cover transition-transform duration-500 group-hover:scale-110">
                                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                            </div>
                                            <div class="flex-1 transition-transform duration-300 group-hover:translate-x-1">
                                                <span class="text-sm text-gray-500 flex items-center space-x-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span>7 Januari 2025</span>
                                                </span>
                                                <h3 class="font-semibold text-gray-900 group-hover:text-red-500 transition-colors duration-200">
                                                    Judul Berita Terkini 1
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="block group">
                                        <div class="flex gap-4 items-start p-3 rounded-xl transition-all duration-300 hover:bg-gray-50">
                                            <div class="relative overflow-hidden rounded-lg">
                                                <img src="/images/swiper/1.jpg" 
                                                     alt="Thumbnail" 
                                                     class="w-24 h-24 object-cover transition-transform duration-500 group-hover:scale-110">
                                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                            </div>
                                            <div class="flex-1 transition-transform duration-300 group-hover:translate-x-1">
                                                <span class="text-sm text-gray-500 flex items-center space-x-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span>7 Januari 2025</span>
                                                </span>
                                                <h3 class="font-semibold text-gray-900 group-hover:text-red-500 transition-colors duration-200">
                                                    Judul Berita Terkini 1
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
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