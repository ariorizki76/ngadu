<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=L, initial-scale=1.0">
    <title>Laporan PDF</title>
</head>
<body>
    <center>
        <h1>Laporan</h1>
        <h3>Oleh: {{$data_pengaduan->masyarakat->nama}}</h3>
        <h3>{{$data_pengaduan->tanggal_pengaduan}}</h3>
        <h5>{{$data_pengaduan->isi_laporan}}</h5>
    <hr>
        <h5>{{$data_tanggapan->tanggapan}}</h5>
    </center>
</body>
</html>