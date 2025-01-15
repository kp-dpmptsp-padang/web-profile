<footer class="bg-white border-t border-red-200">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-4 md:mb-0">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/dpmptsp.png') }}" class="h-16 me-3" alt="Logo DPMPTSP" />
                </a>
                <p class="mt-2 max-w-md text-gray-600">
                    Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Padang Sumatera Barat
                </p>
            </div>  
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-4 text-sm font-semibold uppercase text-red-600">DPMPTSP</h2>
                    <ul class="text-gray-600 font-medium">
                        <li class="mb-2">
                            <a href="{{ route('home') }}" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-home text-red-400 group-hover:text-red-500 transform group-hover:scale-110 transition-all duration-200"></i>
                                Beranda
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('about') }}" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-info-circle text-indigo-400 group-hover:text-indigo-500 transform group-hover:scale-110 transition-all duration-200"></i>
                                Tentang
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('layanan') }}" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-hands-helping text-sky-400 group-hover:text-sky-500 transform group-hover:scale-110 transition-all duration-200"></i>
                                Layanan
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('informasi') }}" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-info text-cyan-400 group-hover:text-cyan-500 transform group-hover:scale-110 transition-all duration-200"></i>
                                Informasi
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('dokumen') }}" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-file-alt text-teal-400 group-hover:text-teal-500 transform group-hover:scale-110 transition-all duration-200"></i>
                                Dokumen
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('fasilitas') }}" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-building text-red-400 group-hover:text-red-500 transform group-hover:scale-110 transition-all duration-200"></i>
                                Fasilitas
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold uppercase text-red-600">Layanan Kami</h2>
                    <ul class="text-gray-600 font-medium">
                        <li class="mb-2">
                            <a href="https://oss.go.id/" target="_blank" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-globe text-purple-400 group-hover:text-purple-500 transform group-hover:scale-110 transition-all duration-200"></i>OSS
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="https://nonperizinan.web.dpmptsp.padang.go.id/sinopen" target="_blank" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-file-signature text-indigo-400 group-hover:text-indigo-500 transform group-hover:scale-110 transition-all duration-200"></i>SINOPEN
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="https://simbg.pu.go.id/" target="_blank" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-building text-red-400 group-hover:text-red-500 transform group-hover:scale-110 transition-all duration-200"></i>SIMBG
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home-survey') }}" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-chart-bar text-cyan-400 group-hover:text-cyan-500 transform group-hover:scale-110 transition-all duration-200"></i>IKM
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold uppercase text-red-600">LOKASI</h2>
                    <ul class="text-gray-600 font-medium">
                        <li class="mb-3">
                            <a href="https://maps.app.goo.gl/YyQdGocwwccfSqQX9" target="_blank" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-map-marker-alt text-red-400 group-hover:text-red-500 transform group-hover:scale-110 transition-all duration-200"></i>
                                Jalan Sudirman No. 1, Padang
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="tel:0751890719" class="hover:text-red-500 transition-colors duration-200 flex items-center gap-2 group">
                                <i class="fas fa-phone text-green-400 group-hover:text-green-500 transform group-hover:scale-110 transition-all duration-200"></i>
                                (0751) 890719
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-red-200 sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-600 sm:text-center">
                © {{ date('Y') }} DPMPTSP Kota Padang. All Rights Reserved.
            </span>
            <div class="flex mt-4 sm:mt-0 space-x-5">
                <a href="https://instagram.com/dpmptsppadang" target="_blank" class="text-pink-400 hover:text-pink-500 transform hover:scale-110 transition-all duration-200">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
                <a href="https://wa.me/6281374078088" target="_blank" class="text-green-400 hover:text-green-500 transform hover:scale-110 transition-all duration-200">
                    <i class="fab fa-whatsapp text-xl"></i>
                </a>
                <a href="mailto:dpmptsp@padang.go.id" class="text-orange-400 hover:text-orange-500 transform hover:scale-110 transition-all duration-200">
                    <i class="fas fa-envelope text-xl"></i>
                </a>
            </div>
        </div>
    </div>
</footer>