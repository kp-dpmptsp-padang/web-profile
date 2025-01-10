<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | DPMPTSP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        .bounce {
            animation: bounce 2s ease-in-out infinite;
        }
        
        .dot-pattern {
            background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen relative overflow-hidden flex items-center justify-center">
        <div class="fixed inset-0 pointer-events-none">
            <div class="absolute top-0 left-0 w-full h-full dot-pattern opacity-30"></div>
            <div class="absolute top-20 left-20 w-32 h-32 bg-red-100 rounded-full floating opacity-20"></div>
            <div class="absolute bottom-20 right-20 w-24 h-24 bg-gray-200 rounded-full floating opacity-30" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-40 left-1/4 w-40 h-40 bg-red-50 rounded-full floating opacity-25" style="animation-delay: 2s;"></div>
        </div>
        <div class="relative z-10 text-center px-4 py-20">
            <div class="mb-8 bounce">
                <img src="/images/404.png" alt="404 Error" class="w-64 h-64 mx-auto object-contain"/>
            </div>
            
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-4">Halaman Tidak Ditemukan</h1>
            <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                Maaf, halaman yang Anda cari tidak dapat ditemukan. Silakan kembali ke halaman utama atau hubungi kami jika Anda memerlukan bantuan.
            </p>
            
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="/" 
                   class="inline-block bg-red-600 text-white px-8 py-4 rounded-lg shadow-lg font-semibold 
                          transition-all duration-300 hover:bg-red-700 hover:shadow-xl hover:-translate-y-1
                          relative overflow-hidden group">
                    <span class="relative z-10">Kembali ke Beranda</span>
                    <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                </a>
                
                <a href="/contact" 
                   class="inline-block bg-white text-red-600 px-8 py-4 rounded-lg shadow-lg font-semibold 
                          border-2 border-red-600 transition-all duration-300 hover:bg-red-50 
                          hover:shadow-xl hover:-translate-y-1">
                    Hubungi Kami
                </a>
            </div>
        </div>
        <div class="absolute -bottom-4 -right-4 w-36 h-36 bg-red-600 rounded-2xl -z-10 opacity-20 transform rotate-12"></div>
        <div class="absolute -top-4 -left-4 w-36 h-36 bg-red-600 rounded-2xl -z-10 opacity-20 transform -rotate-12"></div>
    </div>
</body>
</html>