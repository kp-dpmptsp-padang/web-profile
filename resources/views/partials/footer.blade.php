<footer class="bg-gradient-to-b from-white to-gray-50 border-t border-red-100">
    <div class="mx-auto w-full max-w-screen-xl p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12">
            <div class="md:col-span-3">
                <a href="/" class="inline-block group">
                    <div class="flex items-center gap-3 hover:opacity-90 transition-opacity">
                        <img src="{{ asset('images/dpmptsp.png') }}" class="h-16 object-contain transform group-hover:scale-105 transition-transform duration-300" alt="Logo DPMPTSP" />
                    </div>
                </a>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Padang Sumatera Barat
                </p>
                <div class="mt-6 space-y-3">
                    <a href="https://maps.app.goo.gl/YyQdGocwwccfSqQX9" target="_blank" 
                       class="flex items-center gap-3 text-gray-600 hover:text-red-500 transition-colors group">
                        <span class="bg-red-50 p-2 rounded-lg group-hover:bg-red-100 transition-colors">
                            <i class="fas fa-location-dot text-red-500"></i>
                        </span>
                        <span>Jalan Jenderal Sudirman No. 1, Padang</span>
                    </a>
                    <a href="mailto:dpmptsp@padang.go.id" 
                       class="flex items-center gap-3 text-gray-600 hover:text-blue-500 transition-colors group">
                        <span class="bg-blue-50 p-2 rounded-lg group-hover:bg-blue-100 transition-colors">
                            <i class="fas fa-envelope text-blue-500"></i>
                        </span>
                        <span>dpmptsp@padang.go.id</span>
                    </a>
                </div>
            </div>
            <div class="md:col-span-3">
                <a href="{{ route('home') }}" class="inline-block group">
                    <div class="flex items-center gap-3 hover:opacity-90 transition-opacity">
                        <img src="{{ asset('images/mpp-logo.png') }}" class="h-16 object-contain transform group-hover:scale-105 transition-transform duration-300" alt="Logo MPP" />
                    </div>
                </a>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Mal Pelayanan Publik Kota Padang
                </p>
                <div class="mt-6 space-y-3">
                    <a href="https://maps.app.goo.gl/wHWjyNKvmhTQe9hM7" target="_blank" 
                       class="flex items-center gap-3 text-gray-600 hover:text-red-500 transition-colors group">
                        <span class="bg-red-50 p-2 rounded-lg group-hover:bg-red-100 transition-colors">
                            <i class="fas fa-location-dot text-red-500"></i>
                        </span>
                        <span>Plaza Andalas Lantai 4, Kota Padang, Sumatera Barat</span>
                    </a>
                    <a href="mailto:mpp@padang.go.id" 
                       class="flex items-center gap-3 text-gray-600 hover:text-blue-500 transition-colors group">
                        <span class="bg-blue-50 p-2 rounded-lg group-hover:bg-blue-100 transition-colors">
                            <i class="fas fa-envelope text-blue-500"></i>
                        </span>
                        <span>dpmptsp@padang.go.id</span>
                    </a>
                </div>
            </div>

            <div class="md:col-span-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-sm font-semibold tracking-wider text-gray-900 uppercase mb-4">Menu Utama</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-600 hover:text-red-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-red-50 p-1.5 rounded group-hover:bg-red-100 transition-colors">
                                    <i class="fas fa-home text-red-500 text-sm"></i>
                                </span>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="text-gray-600 hover:text-red-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-red-50 p-1.5 rounded group-hover:bg-red-100 transition-colors">
                                    <i class="fas fa-info-circle text-orange-500 text-sm"></i>
                                </span>
                                <span>Tentang</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('layanan') }}" class="text-gray-600 hover:text-violet-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-violet-50 p-1.5 rounded group-hover:bg-violet-100 transition-colors">
                                    <i class="fas fa-handshake text-violet-500 text-sm"></i>
                                </span>
                                <span>Layanan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dokumen') }}" class="text-gray-600 hover:text-teal-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-teal-50 p-1.5 rounded group-hover:bg-teal-100 transition-colors">
                                    <i class="fas fa-file-alt text-teal-500 text-sm"></i>
                                </span>
                                <span>Dokumen</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('fasilitas') }}" class="text-gray-600 hover:text-orange-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-orange-50 p-1.5 rounded group-hover:bg-orange-100 transition-colors">
                                    <i class="fas fa-building-user text-orange-500 text-sm"></i>
                                </span>
                                <span>Fasilitas</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold tracking-wider text-gray-900 uppercase mb-4">Layanan Online</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="https://oss.go.id/" target="_blank" class="text-gray-600 hover:text-emerald-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-emerald-50 p-1.5 rounded group-hover:bg-emerald-100 transition-colors">
                                    <i class="fas fa-globe text-emerald-500 text-sm"></i>
                                </span>
                                <span>OSS</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://nonperizinan.web.dpmptsp.padang.go.id/sinopen" target="_blank" class="text-gray-600 hover:text-blue-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-blue-50 p-1.5 rounded group-hover:bg-blue-100 transition-colors">
                                    <i class="fas fa-file-lines text-blue-500 text-sm"></i>
                                </span>
                                <span>SINOPEN</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://simbg.pu.go.id/" target="_blank" class="text-gray-600 hover:text-amber-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-amber-50 p-1.5 rounded group-hover:bg-amber-100 transition-colors">
                                    <i class="fas fa-building text-amber-500 text-sm"></i>
                                </span>
                                <span>SIMBG</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home-survey') }}" class="text-gray-600 hover:text-cyan-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-cyan-50 p-1.5 rounded group-hover:bg-cyan-100 transition-colors">
                                    <i class="fas fa-chart-simple text-cyan-500 text-sm"></i>
                                </span>
                                <span>SKM</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold tracking-wider text-gray-900 uppercase mb-4">Postingan</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('informasi') }}" class="text-gray-600 hover:text-rose-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-rose-50 p-1.5 rounded group-hover:bg-rose-100 transition-colors">
                                    <i class="fas fa-info-circle text-rose-500 text-sm"></i>
                                </span>
                                <span>Informasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('berita') }}" class="text-gray-600 hover:text-indigo-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-indigo-50 p-1.5 rounded group-hover:bg-indigo-100 transition-colors">
                                    <i class="fas fa-newspaper text-indigo-500 text-sm"></i>
                                </span>
                                <span>Berita</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('galeri') }}" class="text-gray-600 hover:text-sky-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-sky-50 p-1.5 rounded group-hover:bg-sky-100 transition-colors">
                                    <i class="fas fa-images text-sky-500 text-sm"></i>
                                </span>
                                <span>Galeri</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('video') }}" class="text-gray-600 hover:text-purple-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-purple-50 p-1.5 rounded group-hover:bg-purple-100 transition-colors">
                                    <i class="fas fa-play text-purple-500 text-sm"></i>
                                </span>
                                <span>Video</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}" class="text-gray-600 hover:text-purple-500 transition-colors flex items-center gap-2 group">
                                <span class="bg-purple-50 p-1.5 rounded group-hover:bg-purple-100 transition-colors">
                                    <i class="fas fa-question-circle text-red-500 text-sm"></i>
                                </span>
                                <span>FAQ</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-600 text-center md:text-left">
                    © {{ date('Y') }} <span class="font-medium">DPMPTSP Kota Padang</span>. All Rights Reserved.
                </p>
                <div class="flex items-center gap-4">
                    <a href="https://instagram.com/dpmptsppadang" target="_blank" 
                       class="bg-gradient-to-br from-pink-500 to-rose-500 p-2 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="https://www.youtube.com/@dpmptspkotapadang8461" target="_blank" 
                       class="bg-gradient-to-br from-red-500 to-red-600 p-2 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                        <i class="fab fa-youtube text-lg"></i>
                    </a>
                    <a href="https://www.tiktok.com/@dpmptsppadang" target="_blank" 
                       class="bg-gradient-to-br from-gray-800 to-black p-2 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                        <i class="fab fa-tiktok text-lg"></i>
                    </a>
                    <a href="https://wa.me/6281374078088" target="_blank" 
                       class="bg-gradient-to-br from-green-500 to-emerald-500 p-2 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                        <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                    <a href="mailto:dpmptsp@padang.go.id" 
                       class="bg-gradient-to-br from-blue-500 to-sky-500 p-2 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                        <i class="fas fa-envelope text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>