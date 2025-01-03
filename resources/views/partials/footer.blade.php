<footer class="bg-[#DF0700] text-white">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" class="h-16 me-3" alt="Logo DPMPTSP" />
                </a>
                <p class="mt-4 max-w-md">
                    Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Padang
                </p>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase">Kontak</h2>
                    <ul class="text-gray-200 font-medium">
                        <li class="mb-4">
                            <p>Jl. Bypass, Kota Padang</p>
                        </li>
                        <li>
                            <p>Email: dpmptsp@padang.go.id</p>
                        </li>
                        <li>
                            <p>Telp: (0751) 123456</p>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase">Link Terkait</h2>
                    <ul class="text-gray-200 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Portal Padang</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">OSS RBA</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase">Jam Operasional</h2>
                    <ul class="text-gray-200 font-medium">
                        <li class="mb-4">
                            <p>Senin - Jumat</p>
                            <p>08:00 - 16:00 WIB</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-200 sm:text-center">
                © {{ date('Y') }} DPMPTSP Kota Padang. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>