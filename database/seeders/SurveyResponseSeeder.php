<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyResponseSeeder extends Seeder
{
    public function run(): void
    {
        $responses = [
            [
                'noHp' => '081234567890',
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Mawar No. 10, Jakarta',
                'umur' => 35,
                'jk' => 'L',
                'pendidikan' => 'SMA/SMK/MA',
                'pekerjaan' => 'Pelajar',
                'layanan' => 'NIB',
                'saran' => 'Pelayanan sudah baik, namun waktu tunggu masih bisa dipercepat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noHp' => '082345678901',
                'nama' => 'Siti Rahayu',
                'alamat' => 'Jl. Melati No. 15, Bandung',
                'umur' => 28,
                'jk' => 'P',
                'pendidikan' => 'D3',
                'pekerjaan' => 'Swasta',
                'layanan' => 'NIB + Sertifikat Standar',
                'saran' => 'Mohon ditambah loket pelayanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noHp' => '083456789012',
                'nama' => 'Ahmad Yusuf',
                'alamat' => 'Jl. Anggrek No. 20, Surabaya',
                'umur' => 45,
                'jk' => 'L',
                'pendidikan' => 'S2',
                'pekerjaan' => 'PNS',
                'layanan' => 'Izin + Sertifikat Standar',
                'saran' => 'Semua sudah sangat baik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noHp' => '084567890123',
                'nama' => 'Dewi Lestari',
                'alamat' => 'Jl. Dahlia No. 5, Semarang',
                'umur' => 31,
                'jk' => 'P',
                'pendidikan' => 'S1',
                'pekerjaan' => 'PNS',
                'layanan' => 'Laporan Kegiatan Penanam Modal',
                'saran' => 'Tingkatkan kecepatan pelayanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noHp' => '085678901234',
                'nama' => 'Rudi Hermawan',
                'alamat' => 'Jl. Kenanga No. 25, Yogyakarta',
                'umur' => 52,
                'jk' => 'L',
                'pendidikan' => 'SMA/SMK/MA',
                'pekerjaan' => 'TNI/POLRI',
                'layanan' => 'Pengambilan Hasil',
                'saran' => 'Ruang tunggu perlu diperluas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noHp' => '086789012345',
                'nama' => 'Nina Susanti',
                'alamat' => 'Jl. Cempaka No. 30, Malang',
                'umur' => 29,
                'jk' => 'P',
                'pendidikan' => 'D3',
                'pekerjaan' => 'PNS',
                'layanan' => 'Izin Lainnya',
                'saran' => 'Pelayanan sudah memuaskan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noHp' => '087890123456',
                'nama' => 'Eko Prasetyo',
                'alamat' => 'Jl. Bougenville No. 12, Surakarta',
                'umur' => 40,
                'jk' => 'L',
                'pendidikan' => 'S1',
                'pekerjaan' => 'PNS',
                'layanan' => 'Izin + Sertifikat Standar',
                'saran' => 'Sistem antrian perlu diperbaiki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noHp' => '088901234567',
                'nama' => 'Maya Wijaya',
                'alamat' => 'Jl. Tulip No. 8, Medan',
                'umur' => 33,
                'jk' => 'P',
                'pendidikan' => 'S2',
                'pekerjaan' => 'Lainnya',
                'layanan' => 'Laporan Kegiatan Penanam Modal',
                'saran' => 'Pertahankan kualitas pelayanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noHp' => '089012345678',
                'nama' => 'Agus Setiawan',
                'alamat' => 'Jl. Teratai No. 18, Palembang',
                'umur' => 38,
                'jk' => 'L',
                'pendidikan' => 'S1',
                'pekerjaan' => 'Swasta',
                'layanan' => 'NIB + Sertifikat Standar',
                'saran' => 'Waktu pelayanan sudah cukup baik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noHp' => '089123456789',
                'nama' => 'Lisa Permata',
                'alamat' => 'Jl. Kamboja No. 22, Makassar',
                'umur' => 27,
                'jk' => 'P',
                'pendidikan' => 'D3',
                'pekerjaan' => 'Wiraswasta',
                'layanan' => 'NIB',
                'saran' => 'Tingkatkan keramahan petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($responses as $response) {
            DB::table('survey_responses')->insert($response);
        }
    }
}