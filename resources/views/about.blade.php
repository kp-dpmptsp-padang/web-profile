@extends('layouts.main')

@section('content')
<div class="overflow-hidden pt-16">
    <div class="heading bg-cover bg-center py-20 flex items-center justify-center" style="background-image: url('/images/1.jpg');">
        <h1 class="text-5xl text-white uppercase font-bold">Tentang Kami</h1>
    </div>

    <section class="bg-gray-50 px-6">
        <div class="container mx-auto py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div class="relative">
                    <img
                        src="/images/2.jpg"
                        alt="Tentang Kami"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover"
                    />
                    <div class="absolute -bottom-4 -right-4 w-36 h-36 bg-red-600 rounded-2xl -z-10"></div>
                </div>
                <div>
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
                </div>
            </div>
        </div>
    </section>
    <section class="py-10 bg-gray-50 p-6">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Profil DPMPTSP</h2>
            
        </div>
    </section>

</div>
  

@endsection