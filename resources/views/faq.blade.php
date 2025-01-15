@php
$faqs = [
    [
        'question' => 'Dokumen apa yang perlu disiapkan untuk mendaftar akun perizinan?',
        'answer' => '
            <div class="space-y-4">
                <div>
                    <p class="font-medium text-gray-800">Untuk akun perusahaan/badan usaha:</p>
                    <ol class="list-decimal pl-5 space-y-2 mt-2">
                        <li>Nomor NPWP Perusahaan</li>
                        <li>Nama Perusahaan/Badan Usaha</li>
                        <li>Alamat Email Perusahaan/Pemilik</li>
                        <li>Nomor Telepon Perusahaan/Pemilik</li>
                    </ol>
                </div>
                
                <div>
                    <p class="font-medium text-gray-800">Untuk akun perorangan:</p>
                    <ol class="list-decimal pl-5 space-y-2 mt-2">
                        <li>Nomor Induk Kependudukan (NIK)</li>
                        <li>Nomor Kartu Keluarga (KK)</li>
                        <li>Nama pemohon</li>
                        <li>Alamat email pemohon</li>
                        <li>Nomor telepon pemohon</li>
                    </ol>
                </div>
            </div>'
    ],
    [
        'question' => 'Bagaimana cara mendaftar akun perizinan?',
        'answer' => '
            <div class="space-y-6">
                <p>Silakan mengakses website pelayanan terpadu satu pintu di <span class="text-red-500">http://pelayanan.padang.go.id</span></p>
                
                <div class="space-y-4">
                    <p class="font-medium text-gray-800">Langkah pendaftaran akun perusahaan:</p>
                    <ol class="list-decimal pl-5 space-y-2">
                        <li>Pilih menu "Login", kemudian "Daftar disini"</li>
                        <li>Masukkan NPWP Badan Usaha/Perusahaan</li>
                        <li>Isi nama perusahaan (contoh: PT. JAYA RAYA)</li>
                        <li>Masukkan alamat email perusahaan</li>
                        <li>Isi nomor telepon perusahaan</li>
                        <li>Klik tombol "Daftar"</li>
                        <li>Anda akan menerima email konfirmasi berisi username dan password</li>
                    </ol>
                </div>
                
                <div class="space-y-4">
                    <p class="font-medium text-gray-800">Langkah pendaftaran akun perorangan:</p>
                    <ol class="list-decimal pl-5 space-y-2">
                        <li>Pilih menu "Login", kemudian "Daftar disini"</li>
                        <li>Masukkan Nomor Induk Kependudukan (NIK)</li>
                        <li>Masukkan Nomor Kartu Keluarga (KK)</li>
                        <li>Isi nama sesuai KTP</li>
                        <li>Masukkan alamat email</li>
                        <li>Isi nomor telepon</li>
                        <li>Klik tombol "Daftar"</li>
                        <li>Anda akan menerima email konfirmasi berisi username dan password</li>
                    </ol>
                </div>
            </div>'
    ],
    [
        'question' => 'Apa bedanya akun perusahaan dengan akun perorangan?',
        'answer' => '
            <div class="space-y-4">
                <ul class="list-disc pl-5 space-y-2">
                    <li>Akun perusahaan dikhususkan untuk mengajukan dan memproses perizinan yang berhubungan dengan aktivitas perusahaan/badan usaha</li>
                    <li>Akun perorangan dikhususkan untuk mengajukan dan memproses perizinan/non perizinan yang berhubungan dengan individu pemohon atau badan usaha yang berbentuk perorangan</li>
                </ul>
            </div>'
    ],
    [
        'question' => 'Apakah boleh akun perusahaan digunakan untuk mengajukan dan memproses perizinan/perizinan perorangan?',
        'answer' => '
            <p>Akun perusahaan tidak diperbolehkan digunakan untuk mengajukan dan memproses perizinan/perizinan perorangan. Demikian juga sebaliknya, akun perorangan tidak diperbolehkan digunakan untuk mengajukan dan memproses perizinan/perizinan perusahaan. Jadi, tidak diperbolehkan, karena menyebabkan dokumen perizinan yang diterbitkan menjadi tidak valid.</p>'
    ],
    [
        'question' => 'Jenis izin apa saja yang dapat diproses secara elektronik?',
        'answer' => '
            <div class="space-y-4">
                <p>Saat ini, jenis izin yang sudah dapat diajukan dan diproses secara elektronik adalah:</p>
                <ol class="list-decimal pl-5 space-y-2">
                    <li>Surat Izin Usaha Perdagangan (SIUP) Besar (Baru, Perpanjangan dan Perubahan)</li>
                    <li>Surat Izin Usaha Perdagangan (SIUP) Menengah (Baru, Perpanjangan dan Perubahan)</li>
                    <li>Surat Izin Usaha Perdagangan (SIUP) Kecil (Baru, Perpanjangan dan Perubahan)</li>
                    <li>Tanda Daftar Perusahaan (TDP) (Baru, Perpanjangan dan Perubahan)</li>
                    <li>SIUP - TDP Simultan (Baru, Perpanjangan dan Perubahan)</li>
                    <li>Surat Keterangan Tidak Mampu (SKTM)</li>
                    <li>Surat Keterangan Pengantar Surat Keterangan Catatan Kepolisian (SKCK)</li>
                    <li>Tanda Daftar Gudang (TDG) (Baru, Perpanjangan dan Perubahan)</li>
                    <li>Surat Keterangan Domisili Perusahaan (SKDP) (Baru dan Perpanjangan)</li>
                    <li>Surat Izin Penelitian (Baru dan Perpanjangan)</li>
                    <li>Surat Izin Praktik Dokter (Baru dan Pencabutan)</li>
                    <li>Surat Izin Praktik Dokter Gigi (Baru dan Pencabutan)</li>
                    <li>Surat Izin Praktik Dokter Spesialis (Baru dan Pencabutan)</li>
                    <li>Surat Izin Praktik Dokter Gigi Spesialis (Baru dan Pencabutan)</li>
                    <li>Surat Izin Praktik Perawat (di Fasilitas Kesehatan) - Baru dan Pencabutan</li>
                    <li>Surat Izin Praktik Perawat (Perorangan) - Baru dan Pencabutan</li>
                    <li>Surat Izin Praktik Perawat Gigi (di Fasilitas Kesehatan) - Baru dan Pencabutan</li>
                    <li>Surat Izin Praktik Bidan (di Fasilitas Kesehatan) - Baru dan Pencabutan</li>
                    <li>Surat Izin Praktik Bidan (Perorangan) - Baru dan Pencabutan</li>
                    <li>TDUP Restoran/Rumah Makan/Cafe - Baru</li>
                    <li>TDUP Bar (Rumah Minum) - Baru</li>
                    <li>TDUP Pusat Penjualan Makanan (Foodcourt) - Baru</li>
                    <li>TDUP Coffee Shop/Coffee House/Kedai Kopi - Baru</li>
                    <li>TDUP Jasa Boga (Catering) - Baru</li>
                    <li>TDUP Kantin / Cafetaria - Baru</li>
                    <li>TDUP Bakery - Baru</li>
                    <li>TDUP Hiburan Kelab Malam - Baru</li>
                    <li>TDUP Diskotik - Baru</li>
                    <li>TDUP Pub - Baru</li>
                    <li>TDUP Musik Hidup - Baru</li>
                    <li>TDUP Karaoke - Baru</li>
                </ol>
                <p>Perizinan yang lainnya dalam fase penyiapan secara elektronik.</p>
            </div>'
    ],
    [
        'question' => 'Perubahan email pada akun',
        'answer' => '
            <div class="space-y-4">
                <p>SOP Perubahan email pada akun:</p>
                <p>Untuk perubahan e-mail pada akun diharapkan untuk membuat surat permohonan yang ditujukan kepada Badan PTSP Prov DKI padang, Up Kepala Bidang Sistem Teknologi Informasi dan Kearsipan Surat berisi permohonan perubahan e-mail dengan mencantumkan e-mail lama dan e-mail baru dan alasan perubahan email, menggunakan kop surat perusahaan (jika perusahaan) dan ditanda tangani Direktur/Pemilik dan di stempel Basah. Harap surat permohonan di bawa ke Outlet PTSP terdekat dengan dilengkapi:</p>
                <ol class="list-decimal pl-5 space-y-2">
                    <li>NPWP Perusahaan asli dan fotokopi</li>
                    <li>KTP Direktur (asli jika tidak dikuasakan, fotocopy jika dikuasakan)</li>
                    <li>Surat kuasa jika dikuasakan beserta KTP asli dan fotocopy penerima kuasa</li>
                </ol>
                <p>Surat permohonan perubahan email address dapat di download di http://tinyurl.com/suratperubahanemail</p>
                <p>Setelah diverikasi, petugas dapat menyampaikan melalui (pelayanan.padang.go.id/helpdesk) dengan melampirkan kelengkapan tersebut.</p>
            </div>'
    ]
];
@endphp

@extends('layouts.main')
@section('title', 'FAQ | DPMPTSP Kota Padang')
@section('content')

<div class="relative min-h-screen bg-gradient-to-br from-red-50 via-white to-red-50">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-repeat opacity-10" 
         style="background-image: url('data:image/svg+xml;charset=utf-8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' width=\'16\' height=\'16\'><path fill=\'%23000\' fill-opacity=\'.1\' d=\'M8 0h8v8H8zM0 8h8v8H0z\'/></svg>')"
        ></div>
    </div>

    <div class="relative py-24 pt-32 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-gray-900 mb-6 tracking-tight">
                    Pertanyaan yang Sering Diajukan
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Temukan jawaban untuk pertanyaan umum seputar DPMPTSP dan MPP Kota Padang
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="space-y-6">
                    @foreach($faqs as $faq)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100"
                         x-data="{ open: false }">
                        <button class="w-full px-6 py-4 text-left flex justify-between items-center gap-4"
                                @click="open = !open">
                            <span class="text-lg font-semibold text-gray-800">{{ $faq['question'] }}</span>
                            <span class="flex-shrink-0">
                                <svg class="w-6 h-6 text-red-500 transform transition-transform duration-300"
                                     :class="{'rotate-180': open}"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </span>
                        </button>
                        <div class="overflow-hidden transition-all duration-300 max-h-0"
                             x-ref="content"
                             x-bind:style="open ? 'max-height: ' + $refs.content.scrollHeight + 'px' : ''">
                            <div class="p-6 border-t border-gray-100 text-gray-600 prose prose-red max-w-none">
                                {!! $faq['answer'] !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="lg:sticky lg:top-8">
                    <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-3">Ada Pertanyaan Lain?</h2>
                            <p class="text-gray-600">Kami siap membantu menjawab pertanyaan Anda</p>
                        </div>

                        <form id="questionForm" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="nama_penanya" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" 
                                       id="nama_penanya" 
                                       name="nama_penanya" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-100 focus:border-red-400 transition-all duration-300"
                                       placeholder="Masukkan nama lengkap Anda"
                                       >
                            </div>

                            <div>
                                <label for="email_penanya" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" 
                                       id="email_penanya" 
                                       name="email_penanya" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-100 focus:border-red-400 transition-all duration-300"
                                       placeholder="contoh@email.com"
                                       >
                            </div>

                            <div>
                                <label for="pertanyaan" class="block text-sm font-medium text-gray-700 mb-2">Pertanyaan</label>
                                <textarea id="pertanyaan" 
                                          name="pertanyaan" 
                                          rows="4" 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-100 focus:border-red-400 transition-all duration-300"
                                          placeholder="Tulis pertanyaan Anda di sini..."
                                          ></textarea>
                            </div>

                            <button type="submit" 
                                    class="w-full bg-red-500 text-white py-4 px-6 rounded-xl hover:bg-red-600 transform hover:-translate-y-0.5 transition-all duration-300 font-medium">
                                Kirim Pertanyaan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('questionForm');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch('{{ route("questions.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            const data = await response.json();

            if (response.ok) {
                await Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message || 'Pertanyaan berhasil dikirim',
                    confirmButtonColor: '#ef4444',
                    confirmButtonText: 'OK'
                });
                form.reset();
            } else {
                throw new Error(data.message || 'Something went wrong');
            }
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error.message || 'Terjadi kesalahan. Silakan coba lagi.',
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'OK'
            });
            console.error('Error:', error);
        }
    });
});
</script>
@endpush

@endsection