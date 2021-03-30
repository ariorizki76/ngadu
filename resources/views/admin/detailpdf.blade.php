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
        </center>
        <h2>{{$data_pengaduan->judul_laporan}}</h2>
        <h4>{{$data_pengaduan->isi_laporan}}</h4>

        <h5>Oleh: {{$data_pengaduan->masyarakat->nama}}</h5>
        <h5>{{$data_pengaduan->tanggal_pengaduan}}</h5>

    <hr>
        <h4>{{$data_tanggapan->tanggapan}}</h4>

</body>
</html>