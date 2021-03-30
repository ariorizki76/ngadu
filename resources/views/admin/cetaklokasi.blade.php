<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PDF</title>
</head>
<body>
    <center>
    <h1>Laporan</h1>
    <table border=1 cellpadding=15 cellspacing=0>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal Pengaduan</th>
                <th>NIK</th>
                <th>Nama Pelapor</th>
                <th>Judul Laporan</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cetak_lokasi as $pengaduan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pengaduan->tanggal_pengaduan}}</td>
                <td>{{$pengaduan->masyarakat->nik}}</td>
                <td>{{$pengaduan->masyarakat->nama}}</td>
                <td>{{\Str::limit($pengaduan->judul_laporan,30)}}</td>
                <td>{{$pengaduan->lokasi}}</td>
                <td>{{$pengaduan->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </center>
    </body>
    <script type="text/javascript">
    window.print();
    </script>
</html>