<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'nama' => 'Swesti Fanloni, S.STP, M.Si',
                'nip' => '197910181998102001',
                'jabatan' => 'Kepala Dinas DPMPTSP Kota Padang'
            ],
            [
                'nama' => 'Atos, SE',
                'nip' => '197304222003121001',
                'jabatan' => 'Sekretaris'
            ],
            [
                'nama' => 'Elfi Herawati, S.Kom, ME',
                'nip' => '107103051999032004',
                'jabatan' => 'Penata Perizinan Ahli Madya'
            ],
            [
                'nama' => 'SYUHADI, S.Kom, M.Kom',
                'nip' => '197203211997011003',
                'jabatan' => 'Penata Perizinan Ahli Madya'
            ],
            [
                'nama' => 'Spero Meilyora',
                'nip' => '197005291991011002',
                'jabatan' => 'Analis Kebijakan Ahli Madya'
            ],
            [
                'nama' => 'Sapta Wardhana',
                'nip' => '196609261994011001',
                'jabatan' => 'Analis Kebijakan Ahli Madya'
            ],
            [
                'nama' => 'Wahyu Isandi Rahmatullah, S.STP., M.A.P., C.Med',
                'nip' => '199112252015071001',
                'jabatan' => 'Kasubag Umum'
            ],
            [
                'nama' => 'Said Sanrise, SH., MIDS., M.Eng',
                'nip' => '196908292000031001',
                'jabatan' => 'Fungsional Perencana Ahli Muda'
            ],
            [
                'nama' => 'Sri Hastuti',
                'nip' => '197705052006042024',
                'jabatan' => 'Penata Perizinan Ahli Muda'
            ],
            [
                'nama' => 'RIKO MARVELLA',
                'nip' => '198706192010011003',
                'jabatan' => 'Penata Perizinan Ahli Muda'
            ],
            [
                'nama' => 'Siti Dyan Harlinda Rias',
                'nip' => '197006011994032005',
                'jabatan' => 'Analis Kebijakan Ahli Muda'
            ],
            [
                'nama' => 'Wirdawati. SE',
                'nip' => '196704151991032003',
                'jabatan' => 'Fungsional Ahli Muda'
            ],
            [
                'nama' => 'Rezkia Fauzi,SE.MM',
                'nip' => '197101012007011028',
                'jabatan' => 'Analis Kebijakan Ahli Muda'
            ],
            [
                'nama' => 'Arwil Kartini, S.Pt',
                'nip' => '197604212007012008',
                'jabatan' => 'Analis Kebijakan Ahli Muda'
            ],
            [
                'nama' => 'Riri Rezki Yunanda, S.Kom',
                'nip' => '199101212015022002',
                'jabatan' => 'Penyusun Rencana Kegiatan dan Anggaran'
            ],
            [
                'nama' => 'PRIMAROSI, SE, MM',
                'nip' => '198201122010012022',
                'jabatan' => 'PENGELOLA KEPEGAWAIAN'
            ],
            [
                'nama' => 'DIAN FERA YULFITA',
                'nip' => '197707112003122002',
                'jabatan' => 'Penyusun program anggaran dan pelaporan'
            ],
            [
                'nama' => 'Emilizola',
                'nip' => '197706172011012002',
                'jabatan' => 'Pengurus barang'
            ],
            [
                'nama' => 'Mulizon',
                'nip' => '197301102006041013',
                'jabatan' => 'Staf fungsional'
            ],
            [
                'nama' => 'Muhammad Irsyad Avicenna',
                'nip' => '199412242019021001',
                'jabatan' => 'Pranata Komputer Terampil'
            ],
            [
                'nama' => 'Ratna Junita',
                'nip' => '197211061993032003',
                'jabatan' => 'Pengelola gaji'
            ],
            [
                'nama' => 'Lusi Yulia Fitri',
                'nip' => '198107282024212010',
                'jabatan' => 'Arsiparis Terampil'
            ],
            [
                'nama' => 'RINI MULYANI',
                'nip' => '198504062014042001',
                'jabatan' => 'Staf'
            ],
            [
                'nama' => 'Ibrahim',
                'nip' => '197107032008011002',
                'jabatan' => 'Pengadministrasi Umum'
            ],
            [
                'nama' => 'Afrida yenti',
                'nip' => '197206071994032004',
                'jabatan' => 'fungsional umum'
            ],
            [
                'nama' => 'Dwi Kristin Syahrial',
                'nip' => '198311282007012002',
                'jabatan' => 'fungsional umum'
            ],
            [
                'nama' => 'Seputra',
                'nip' => '1979090220021004',
                'jabatan' => 'Fungsional Umum'
            ],
            [
                'nama' => 'Nur Muhammad Haikal',
                'nip' => '199307232022031002',
                'jabatan' => 'Analis Dokumen Perizinan'
            ],
            [
                'nama' => 'Ismi Mulyani, A.Md',
                'nip' => '199605012022032005',
                'jabatan' => 'Pranata Komputer'
            ],
            [
                'nama' => 'Hj.LENDRA YUSTRI, SE',
                'nip' => '196801271990032010',
                'jabatan' => 'Fungsional Umum'
            ],
            [
                'nama' => 'AMPRIADI',
                'nip' => '196706111989031005',
                'jabatan' => 'Fungsional umum'
            ],
            [
                'nama' => 'M. ALMEPAL WANDA, S.KOM, M.KOM',
                'nip' => null,
                'jabatan' => 'TENAGA AHLI SISTEM INFORMASI'
            ],
            [
                'nama' => 'Fiyardi',
                'nip' => null,
                'jabatan' => 'Front Office'
            ],
            [
                'nama' => 'Ferby Kurniawan Putra, S.M',
                'nip' => null,
                'jabatan' => 'Front Office'
            ],
            [
                'nama' => 'Prasaja Arliando Syafri',
                'nip' => null,
                'jabatan' => 'Pendamping Teknologi Informasi'
            ],
            [
                'nama' => 'Atika Sulti',
                'nip' => null,
                'jabatan' => 'Front office'
            ],
            [
                'nama' => 'Yusrika, S.Si',
                'nip' => null,
                'jabatan' => 'Front Office'
            ],
            [
                'nama' => 'CYNTHIA FITRI MONITA',
                'nip' => null,
                'jabatan' => 'FO'
            ],
            [
                'nama' => 'SYIFA MAUDINA',
                'nip' => null,
                'jabatan' => 'Front office'
            ],
            [
                'nama' => 'Sharlla Malica Fateha',
                'nip' => null,
                'jabatan' => 'Front office'
            ],
            [
                'nama' => 'Atikah Maitri, S. Si',
                'nip' => null,
                'jabatan' => 'Helpdesk OSS'
            ],
            [
                'nama' => 'Muhammad Ikhsan Khalid',
                'nip' => null,
                'jabatan' => 'Front office'
            ],
            [
                'nama' => 'Yulmi Suari',
                'nip' => '199607082022031004',
                'jabatan' => 'Analis Investasi dan Permodalan Usaha'
            ],
            [
                'nama' => 'Henry Chandra',
                'nip' => '197406302006041003',
                'jabatan' => 'Fungsional Umum'
            ],
            [
                'nama' => 'Susi Suzanna',
                'nip' => null,
                'jabatan' => 'Staf'
            ],
            [
                'nama' => 'Esi hariati',
                'nip' => null,
                'jabatan' => 'Staf'
            ],
            [
                'nama' => 'Erfinis Rivai, SE',
                'nip' => '197308012009012003',
                'jabatan' => 'Fungsional Umum'
            ],
            [
                'nama' => 'Reni Zamri, S.Sos',
                'nip' => '197110311992032006',
                'jabatan' => 'Fungsional Umum'
            ],
            [
                'nama' => 'Rinaldi Listianto',
                'nip' => null,
                'jabatan' => 'Cleaning Service'
            ],
            [
                'nama' => 'Randi Hermaputra',
                'nip' => null,
                'jabatan' => 'Cleaning Service'
            ],
            [
                'nama' => 'Dedia Rosman',
                'nip' => null,
                'jabatan' => 'Security'
            ],
            [
                'nama' => 'Arif Feriandana',
                'nip' => null,
                'jabatan' => 'Security'
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}