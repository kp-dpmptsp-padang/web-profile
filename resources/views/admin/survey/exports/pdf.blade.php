<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Survei Kepuasan Masyarakat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 20px;
        }
        .main-title {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
            min-height: 80px;
        }
        .logo-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 70px; 
        }
        .logo-container img {
            max-width: 100%;
            height: auto;
        }
        .title-text {
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 20px;
            font-weight: bold;
            padding-top: 10px;
        }
        .header {
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .unit-info {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
            width: 100%;
            text-align: left;
        }
        .divider {
            border-top: 2px solid #000;
            margin: 20px 0;
            clear: both;
        }
        .ikm-title {
            font-family: Arial, sans-serif;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin: 20px 0 10px;
        }
        .period {
            font-family: Arial, sans-serif;
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 13px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 14px;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .notes {
            display: flex;
            flex-wrap: nowrap; 
            gap: 20px; 
        }

        .notes-title{
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .notes-section {
            flex: 1; 
        }

        .notes-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            line-height: 1.4;
        }

        .notes-item {
            white-space: normal; 
        }

        .notes-section:last-child .notes-items {
            grid-template-columns: repeat(2, 1fr);
        }

        .mutu-pelayanan {
            margin-top: 20px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="main-title">
        <div class="logo-container">
            <img src="{{ public_path('images/Logo_Padang.png') }}" alt="Logo">
        </div>
        <div class="title-text">
            PENGOLAHAN SURVEY KEPUASAN MASYARAKAT PER RESPONDEN<br>
            DAN PER UNSUR PELAYANAN
        </div>
    </div>
    
    <div class="header clearfix">
        <div class="unit-info">
            <div>UNIT PELAYANAN : DPMPTSP KOTA PADANG</div>
            <div>ALAMAT : JL. SUDIRMAN NO. 1, PADANG</div>
            <div>WA/Web : 081374078088 / https://dpmptsp.padang.go.id</div>
        </div>
    </div>

    <div class="divider"></div>

    <div class="ikm-title">LAPORAN IKM DPMPTSP KOTA PADANG</div>
    <div class="period">Periode : {{ $period }}</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. HP</th>
                <th>Nama</th>
                <th>U1</th>
                <th>U2</th>
                <th>U3</th>
                <th>U4</th>
                <th>U5</th>
                <th>U6</th>
                <th>U7</th>
                <th>U8</th>
                <th>U9</th>
                <th>NILAI AKHIR</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surveys as $index => $survey)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $survey->noHp }}</td>
                <td>{{ $survey->nama }}</td>
                <td>{{ $survey->u1 }}</td>
                <td>{{ $survey->u2 }}</td>
                <td>{{ $survey->u3 }}</td>
                <td>{{ $survey->u4 }}</td>
                <td>{{ $survey->u5 }}</td>
                <td>{{ $survey->u6 }}</td>
                <td>{{ $survey->u7 }}</td>
                <td>{{ $survey->u8 }}</td>
                <td>{{ $survey->u9 }}</td>
                <td>{{ $survey->nilai_akhir }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">Nilai/Unsur</td>
                <td>{{ $totalU1 }}</td>
                <td>{{ $totalU2 }}</td>
                <td>{{ $totalU3 }}</td>
                <td>{{ $totalU4 }}</td>
                <td>{{ $totalU5 }}</td>
                <td>{{ $totalU6 }}</td>
                <td>{{ $totalU7 }}</td>
                <td>{{ $totalU8 }}</td>
                <td>{{ $totalU9 }}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">NRR/Unsur</td>
                <td>{{ number_format($nrrU1, 3) }}</td>
                <td>{{ number_format($nrrU2, 3) }}</td>
                <td>{{ number_format($nrrU3, 3) }}</td>
                <td>{{ number_format($nrrU4, 3) }}</td>
                <td>{{ number_format($nrrU5, 3) }}</td>
                <td>{{ number_format($nrrU6, 3) }}</td>
                <td>{{ number_format($nrrU7, 3) }}</td>
                <td>{{ number_format($nrrU8, 3) }}</td>
                <td>{{ number_format($nrrU9, 3) }}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">NRR Tertimbang/Unsur</td>
                <td>{{ number_format($nrrTertimbangU1, 3) }}</td>
                <td>{{ number_format($nrrTertimbangU2, 3) }}</td>
                <td>{{ number_format($nrrTertimbangU3, 3) }}</td>
                <td>{{ number_format($nrrTertimbangU4, 3) }}</td>
                <td>{{ number_format($nrrTertimbangU5, 3) }}</td>
                <td>{{ number_format($nrrTertimbangU6, 3) }}</td>
                <td>{{ number_format($nrrTertimbangU7, 3) }}</td>
                <td>{{ number_format($nrrTertimbangU8, 3) }}</td>
                <td>{{ number_format($nrrTertimbangU9, 3) }}</td>
                <td>{{ number_format($totalNRRTertimbang, 3) }}</td>
            </tr>
            <tr>
                <td colspan="12">UKM Unit Pelayanan</td>
                <td>{{ number_format($ukmUnit, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Padang, {{ now()->locale('id')->isoFormat('D MMMM Y') }}<br>
        Kadis DPMPTSP Kota Padang,<br><br><br><br><br><br><br><br><br>
        
        Swesti Fanloni, S.STP, M.Si<br>
        NIP. 197910181998102001
    </div>

    <div class="notes">
        <div class="notes-section">
            <div class="notes-title">Unsur Pelayanan:</div>
            <div class="notes-items">
                <div class="notes-item">U1 = Persyaratan</div>
                <div class="notes-item">U2 = Sistem, mekanisme dan prosedur</div>
                <div class="notes-item">U3 = Waktu penyelesaian</div>
                <div class="notes-item">U4 = Biaya/Tarif</div>
                <div class="notes-item">U5 = Produk Spesifikasi Jenis Pelayanan</div>
                <div class="notes-item">U6 = Kompetensi Pelaksana</div>
                <div class="notes-item">U7 = Perilaku Pelaksana</div>
                <div class="notes-item">U8 = Penanganan pengaduan</div>
                <div class="notes-item">U9 = Sarana Prasarana</div>
            </div>
        </div>

        <div class="notes-section">
            <div class="notes-title">Keterangan:</div>
            <div class="notes-items">
                <div class="notes-item">U1 S.d U9 = Unsur-Unsur pelayanan</div>
                <div class="notes-item">NRR = NILAI RATA-RATA</div>
                <div class="notes-item">IKM = Indek Kepuasan Masyarakat</div>
                <div class="notes-item">*) = Jumlah NRR IKM tertimbang</div>
                <div class="notes-item">**) = Jumlah NRR Tertimbang X 25</div>
                <div class="notes-item">NRR Perunsur = Jumlah nilai unsur/jumlah kuesioner</div>
                <div class="notes-item">NRR tertimbang = NRR per unsur X 0,111 per unsur</div>
            </div>
        </div>

        <div class="notes-section">
            <div class="notes-title">Mutu Pelayanan:</div>
            <div style="font-weight: bold;">IKM UNIT PELAYANAN: {{ number_format($ukmUnit, 2) }} {{ $mutuPelayanan }}</div>
            <div class="notes-items">
                <div class="notes-item"><span style="font-weight: bold;">A</span> (Sangat Baik) = 88,31 - 100,00</div>
                <div class="notes-item"><span style="font-weight: bold;">B</span> (Baik) = 76,61 - 88,30</div>
                <div class="notes-item"><span style="font-weight: bold;">C</span> (Kurang Baik) = 65,00 - 76,60</div>
                <div class="notes-item"><span style="font-weight: bold;">D</span> (Tidak Baik) = 25,00 - 64,99</div>
            </div>
        </div>
    </div>
</body>
</html>