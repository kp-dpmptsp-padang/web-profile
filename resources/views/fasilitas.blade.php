@extends('layouts.main')
@section('title', 'Fasilitas | DPMPTSP Kota Padang')

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

    .floating-shape {
        animation: float 6s ease-in-out infinite;
    }

    .fade-in-scale {
        animation: fadeInScale 0.8s ease-out forwards;
    }

    .slide-in-bottom {
        animation: slideInBottom 0.6s ease-out;
    }

    .dot-pattern {
        background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
        background-size: 20px 20px;
    }
</style>

<div class="overflow-hidden pt-16 relative">
    <div class="heading bg-cover bg-center py-24 flex items-center justify-center relative">
        <div class="absolute inset-0 bg-cover bg-center transform scale-105 transition-transform duration-1000" 
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/bg-8.jpg')">
        </div>
        <h1 class="text-6xl text-white uppercase font-bold relative z-10 tracking-wider fade-in-scale">
            Fasilitas
            <div class="h-1 w-24 bg-red-500 mx-auto mt-4 rounded-full"></div>
        </h1>
    </div>

    <section class="bg-white/80 px-10 relative backdrop-blur-sm">
        <div class="container mx-auto py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-24">
                @forelse($facilities as $facility)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group fade-in-scale">
                        <div class="relative">
                            @if($facility->pictures->isNotEmpty())
                                <div 
                                    class="cursor-pointer"
                                    onclick="showImage('{{ asset('storage/' . $facility->pictures->first()->nama_file) }}', '{{ $facility->nama }}')"
                                >
                                    <img 
                                        src="{{ asset('storage/' . $facility->pictures->first()->nama_file) }}"
                                        alt="{{ $facility->pictures->first()->alt_text }}"
                                        class="w-full h-48 object-cover transition-all duration-500 group-hover:scale-105"
                                    >
                                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <span class="text-white text-lg font-medium">Lihat Detail</span>
                                    </div>
                                </div>
                            @endif
                            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-red-600 rounded-xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-red-600 transition-colors duration-300">
                                {{ $facility->nama }}
                            </h3>
                            <p class="text-gray-600 mb-4">
                                {{ $facility->deskripsi }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Tidak ada fasilitas yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
<div id="imageModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/75 backdrop-blur-sm" id="modalBackground"></div>
    <div class="relative min-h-screen flex items-center justify-center p-10">
        <div class="bg-white rounded-2xl w-full max-w-4xl shadow-2xl transform transition-all scale-95 opacity-0" id="modalContent">
            <div class="relative">
                <img id="modalImage" src="" alt="" class="w-full rounded-t-2xl">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 to-transparent p-8">
                    <p id="modalCaption" class="text-white text-xl font-medium text-center"></p>
                </div>
            </div>
            <div class="p-4 flex justify-end">
                <button onclick="closeModal()" 
                        class="text-gray-500 hover:text-red-600 transform hover:rotate-90 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function showImage(src, caption) {
        const modal = document.getElementById('imageModal');
        const modalContent = document.getElementById('modalContent');
        const modalImage = document.getElementById('modalImage');
        const modalCaption = document.getElementById('modalCaption');
        
        modalImage.src = src;
        modalCaption.textContent = caption;
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.style.opacity = '1';
            modalContent.style.transform = 'scale(1)';
        }, 10);
        
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        const modalContent = document.getElementById('modalContent');
        
        modalContent.style.opacity = '0';
        modalContent.style.transform = 'scale(0.95)';
        
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 300);
    }
    document.getElementById('modalBackground').addEventListener('click', closeModal);

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('imageModal').classList.contains('hidden')) {
            closeModal();
        }
    });    
</script>
@endsection