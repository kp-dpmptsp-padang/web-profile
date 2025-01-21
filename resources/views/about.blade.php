@extends('layouts.main')
@section('title', 'Tentang | DPMPTSP Kota Padang')
@section('content')
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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

    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    .animate-fade-in tr {
        opacity: 0;
        animation: fadeIn 0.5s ease-out forwards;
    }

    .animate-fade-in tr:nth-child(1) { animation-delay: 0.1s; }
    .animate-fade-in tr:nth-child(2) { animation-delay: 0.2s; }
    .animate-fade-in tr:nth-child(3) { animation-delay: 0.3s; }

    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    td {
        position: relative;
        overflow: hidden;
    }

    td::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: rgb(220, 38, 38);
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }

    tr:hover td::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .fade-in-scale {
        animation: fadeInScale 0.8s ease-out forwards;
    }

    .animate-on-scroll {
        opacity: 0;
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .fade-in-right {
        animation: fadeInRight 0.8s ease-out forwards;
    }

    .fade-in-left {
        animation: fadeInLeft 0.8s ease-out forwards;
    }
</style>
<div class="overflow-hidden pt-16">
    <div class="heading bg-cover bg-center py-24 flex items-center justify-center relative">
        <div class="absolute inset-0 bg-cover bg-center transform scale-105 transition-transform duration-1000" 
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/swiper/5.jpg')">
        </div>
        <h1 class="text-6xl text-white uppercase font-bold relative z-10 tracking-wider fade-in-scale">
            Tentang kami
            <div class="h-1 w-24 bg-red-500 mx-auto mt-4 rounded-full"></div>
        </h1>
    </div>

    <section class="px-6">
        <div class="container mx-auto py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div class="relative animate-on-scroll" data-animation="fade-in-right">
                    <img
                        src="/images/background-dpmptsp.jpg"
                        alt="Tentang Kami"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover"
                    />
                    <div class="absolute -bottom-4 -right-4 w-36 h-36 bg-red-600 rounded-2xl -z-10"></div>
                </div>
                <div class="animate-on-scroll" data-animation="fade-in-up">
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
            <div class="my-20"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div class="animate-on-scroll" data-animation="fade-in-up">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        Mal Pelayanan Publik Kota Padang
                    </h2>
                    <div class="w-16 h-1 bg-red-600 mb-4"></div>
                    <p class="text-gray-600 text-base leading-relaxed mb-4 text-justify">
                        Mal Pelayanan Publik (MPP) Kota Padang hadir sebagai inovasi dalam pelayanan publik yang mengintegrasikan berbagai jenis layanan pemerintah pusat dan daerah dalam satu lokasi. Dengan konsep modern dan terintegrasi, MPP memberikan kemudahan akses bagi masyarakat untuk mendapatkan berbagai layanan publik.
                    </p>
                    <p class="text-gray-600 text-base leading-relaxed mb-6">
                        Berlokasi strategis di Plaza Andalas, MPP Kota Padang menghadirkan pengalaman pelayanan publik yang efisien, nyaman, dan profesional dengan standar pelayanan yang terukur dan transparan.
                    </p>
                </div>
                <div class="relative animate-on-scroll" data-animation="fade-in-left">
                    <img
                        src="/images/mpp4.jpg"
                        alt="Mal Pelayanan Publik"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover"
                    />
                    <div
                        class="absolute -bottom-4 -left-4 w-36 h-36 bg-red-600 rounded-2xl -z-10"
                    ></div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-10 p-6">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 animate-on-scroll" data-animation="fade-in-up">Profil DPMPTSP</h2>
            <div class="max-w-5xl mx-auto space-y-4 animate-on-scroll" data-animation="fade-in-up">
                <div class="border border-gray-200 rounded-lg transition-all duration-300">
                    <button onclick="toggleAccordion('struktur')" class="w-full flex justify-between items-center p-4 bg-white hover:bg-gray-50 transition-colors">
                        <h3 class="text-lg font-semibold" id="text-struktur">Struktur Organisasi</h3>
                        <svg id="icon-struktur" class="transform transition-transform duration-300 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="content-struktur" class="overflow-hidden transition-all duration-300 max-h-0 opacity-0">
                        <div class="p-4 bg-white border-t">
                            <div class="max-w-5xl mx-auto">
                                <div class="relative p-4 bg-white rounded-lg shadow-lg">
                                    <div class="absolute inset-0 border-2 border-red-600/20 rounded-lg m-4"></div>
                                    <div class="absolute top-4 left-4 w-6 h-6 border-t-2 border-l-2 border-red-600"></div>
                                    <div class="absolute top-4 right-4 w-6 h-6 border-t-2 border-r-2 border-red-600"></div>
                                    <div class="absolute bottom-4 left-4 w-6 h-6 border-b-2 border-l-2 border-red-600"></div>
                                    <div class="absolute bottom-4 right-4 w-6 h-6 border-b-2 border-r-2 border-red-600"></div>
                                    <img 
                                        src="/images/struktur.png"
                                        alt="Foto Bersama DPMPTSP" 
                                        class="w-full h-[500px] object-cover rounded-lg shadow-inner"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="border border-gray-200 rounded-lg transition-all duration-300">
                    <button onclick="toggleAccordion('sdm')" class="w-full flex justify-between items-center p-4 bg-white hover:bg-gray-50 transition-colors">
                        <h3 class="text-lg font-semibold" id="text-sdm">Daftar Pegawai DPMPTSP</h3>
                        <svg id="icon-sdm" class="transform transition-transform duration-300 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="content-sdm" class="overflow-hidden transition-all duration-300 max-h-0 opacity-0">
                        <div class="p-4 bg-white border-t">
                            <div class="w-full px-4 py-8">
                                <div class="w-full overflow-x-auto">
                                    <table class="min-w-full bg-white border border-gray-300">
                                        <thead>
                                            <tr class="bg-red-200">
                                                <th class="py-3 px-6 text-left font-semibold border-b">No</th>
                                                <th class="py-3 px-6 text-left font-semibold border-b">Nama</th>
                                                <th class="py-3 px-6 text-left font-semibold border-b">NIP</th>
                                                <th class="py-3 px-6 text-left font-semibold border-b">Jabatan</th>
                                                <th class="py-3 px-6 text-left font-semibold border-b">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 lowercase capitalize animate-fade-in">
                                            @forelse($employees as $index => $employee)
                                            <tr class="hover:bg-gray-50 transition-all duration-300 ease-in-out hover:shadow-md">
                                                <td class="py-3 px-6 border-b">{{ $index + 1 }}</td>
                                                <td class="py-3 px-6 border-b">{{ $employee->nama }}</td>
                                                @if($employee->nip)
                                                    <td class="py-3 px-6 border-b">{{ $employee->nip }}</td>
                                                @else
                                                    <td class="py-3 px-6 border-b">-</td>
                                                @endif
                                                <td class="py-3 px-6 border-b">{{ $employee->jabatan }}</td>
                                                <td class="py-3 px-6 border-b">
                                                    @if($employee->document)
                                                        <a href="{{ asset('storage/' . $employee->document->nama_file) }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 hover:-translate-y-1">
                                                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>Lihat</a>
                                                    @else
                                                        <span class="text-gray-500">Tidak ada dokumen</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="py-3 px-6 text-center border-b">
                                                    Tidak ada data pegawai
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-10 p-6">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 animate-on-scroll" data-animation="fade-in-up">Jam Pelayanan</h2>
            <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 rounded-xl p-6 shadow transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl animate-on-scroll" data-animation="fade-in-right">
                    <div class="flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-4">Hari Operasional</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center p-2 bg-white rounded-lg">
                            <span class="font-medium">Senin</span>
                            <span class="text-green-600">Buka</span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-white rounded-lg">
                            <span class="font-medium">Selasa</span>
                            <span class="text-green-600">Buka</span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-white rounded-lg">
                            <span class="font-medium">Rabu</span>
                            <span class="text-green-600">Buka</span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-white rounded-lg">
                            <span class="font-medium">Kamis</span>
                            <span class="text-green-600">Buka</span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-white rounded-lg">
                            <span class="font-medium">Jumat</span>
                            <span class="text-green-600">Buka</span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-white rounded-lg">
                            <span class="font-medium">Sabtu</span>
                            <span class="text-red-600">Tutup</span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-white rounded-lg">
                            <span class="font-medium">Minggu</span>
                            <span class="text-red-600">Tutup</span>
                        </div>
                    </div>
                </div>
    
                <div class="bg-gray-50 rounded-xl p-6 shadow transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl animate-on-scroll" data-animation="fade-in-up">
                    <div class="flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-6">Waktu Pelayanan</h3>
                    <div class="flex flex-col items-center space-y-6">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-red-600 mb-2" id="currentTime">08:00</div>
                            <p class="text-gray-600">Jam Buka</p>
                        </div>
                        <div class="h-16 flex items-center">
                            <div class="w-1 h-full bg-red-600 rounded-full"></div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-red-600 mb-2">16:00</div>
                            <p class="text-gray-600">Jam Tutup</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
    <section class="py-10 px-6">
        <div class="container mx-auto">
            <div class="max-w-5xl mx-auto">
                <div class="relative p-4 bg-white rounded-lg shadow-xl">
                    <div class="absolute inset-0 border-2 border-red-600/20 rounded-lg m-4"></div>
                    <div class="absolute top-4 left-4 w-6 h-6 border-t-2 border-l-2 border-red-600"></div>
                    <div class="absolute top-4 right-4 w-6 h-6 border-t-2 border-r-2 border-red-600"></div>
                    <div class="absolute bottom-4 left-4 w-6 h-6 border-b-2 border-l-2 border-red-600"></div>
                    <div class="absolute bottom-4 right-4 w-6 h-6 border-b-2 border-r-2 border-red-600"></div>
                    <img 
                        src="/images/fotbar.jpg"
                        alt="Foto Bersama DPMPTSP" 
                        class="w-full h-[500px] object-cover rounded-lg shadow-inner"
                    />
                </div>
            </div>
        </div>
     </section>
    
    <script>
        function toggleAccordion(id) {
            const content = document.getElementById(`content-${id}`);
            const icon = document.getElementById(`icon-${id}`);
            const text = document.getElementById(`text-${id}`);
            
            content.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
            icon.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                content.style.transform = 'translateY(-10px)';
                content.classList.remove('opacity-100');
                content.classList.add('opacity-0');
                icon.style.transform = 'rotate(0deg)';
                icon.classList.remove('text-red-500');
                text.classList.remove('text-red-500');
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                content.style.transform = 'translateY(0)';
                content.classList.remove('opacity-0');
                content.classList.add('opacity-100');
                icon.style.transform = 'rotate(180deg)';
                icon.classList.add('text-red-500');
                text.classList.add('text-red-500');
            }

            const allContents = document.querySelectorAll('[id^="content-"]');
            const allIcons = document.querySelectorAll('[id^="icon-"]');
            const allTexts = document.querySelectorAll('[id^="text-"]');
            
            allContents.forEach((item) => {
                if (item.id !== `content-${id}` && item.style.maxHeight) {
                    item.style.maxHeight = null;
                    item.style.transform = 'translateY(-10px)';
                    item.classList.remove('opacity-100');
                    item.classList.add('opacity-0');
                }
            });

            allIcons.forEach((item) => {
                if (item.id !== `icon-${id}`) {
                    item.style.transform = 'rotate(0deg)';
                    item.classList.remove('text-red-500');
                }
            });

            allTexts.forEach((item) => {
                if (item.id !== `text-${id}`) {
                    item.classList.remove('text-red-500');
                }
            });
        }

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add(entry.target.dataset.animation);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.animate-on-scroll');
            elements.forEach(el => observer.observe(el));
        });
    </script>
</div>
  

@endsection