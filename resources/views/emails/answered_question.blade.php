<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jawaban untuk Pertanyaan Anda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid #dddddd;
        }
        .header h1 {
            margin: 0;
            color: #333333;
        }
        .content {
            padding: 20px;
        }
        .content p {
            line-height: 1.6;
            color: #333333;
        }
        .content p strong {
            color: #000000;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #dddddd;
            margin-top: 20px;
        }
        .footer p {
            margin: 0;
            color: #777777;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Jawaban untuk Pertanyaan Anda</h1>
        </div>
        <div class="content">
            <p>Halo, {{ $question->nama_penanya }}</p>
            <p>Terima kasih telah mengajukan pertanyaan kepada kami. Berikut adalah jawaban untuk pertanyaan Anda:</p>
            <p><strong>Pertanyaan:</strong> {{ $question->pertanyaan }}</p>
            <p><strong>Jawaban:</strong> {{ $question->jawaban }}</p>
            <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>
            <p><strong>WhatsApp: 0813-7407-8088</strong></p>
            <p>Salam Hormat,</p>
            <p><strong>DPMPTSP Kota Padang</strong></p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>