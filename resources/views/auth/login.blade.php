<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin Login - DPMPTSP Kota Padang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    backgroundImage: {
                        'login-bg': "url('/images/background-dpmptsp.jpg')"
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-login-bg bg-cover bg-center bg-no-repeat min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-4 bg-black/40">
        <div class="w-full max-w-md bg-white/95 backdrop-blur-lg rounded-2xl shadow-2xl overflow-hidden">
            <div class="p-8">
                <!-- Logo and Header -->
                <div class="flex flex-col items-center mb-8">
                    <img src="/images/dpmptsp.png" alt="DPMPTSP Logo" class="h-20 mb-4">
                    <h3 class="text-2xl font-bold text-gray-800">Admin Login</h3>
                    <p class="text-gray-600 text-sm mt-2">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors"
                                placeholder="Masukkan email anda"
                                required
                            >
                        </div>
        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors"
                                placeholder="Masukkan password anda"
                                required
                            >
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('password.request') }}" class="text-sm text-red-600 hover:text-red-800 transition-colors">
                            Lupa password?
                        </a>
                    </div>

                    <button 
                        type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 hover:scale-[1.02] shadow-lg"
                    >
                        Sign in
                    </button>
                </form>

                <!-- Footer -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500">© {{ date('Y') }} DPMPTSP Kota Padang</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>