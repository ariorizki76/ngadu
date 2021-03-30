@extends('layouts.appmasyarakat')
@section('title', 'Laporanku')
@section('content')

<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Laporanku</h6>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>

</div>

@foreach($data_pengaduan as $pengaduan)
<div class="container mt--6">
    <div class="container">

        <div class="row">
            <div class="col-lg-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div>
                            <div>

                                <h3 class="m-0 font-weight-bold text-primary">{{$pengaduan->judul_laporan}}</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="/img/{{$pengaduan->foto}}" alt="foto">
                        <p class="my-4">{{$pengaduan->isi_laporan}}</p>
                        <hr>

                        <div class="d-flex justify-content-between">
                            @if($pengaduan->status == "selesai")
                            <div class="badge badge-pill badge-success p-3 m-0"><i class="fas fa-check"></i>&nbsp;&nbsp;Laporan
                                terverifikasi.
                            </div>
                            @elseif($pengaduan->status == "proses")
                            <div class="badge badge-pill badge-warning p-3 m-0"><i
                                    class="fas fa-hourglass-half"></i>&nbsp;&nbsp;Laporan
                                sedang
                                diproses.</div>
                            @else
                            <div class="badge badge-pill badge-danger p-3 m-0"><i
                                    class="fas fa-hourglass-start"></i>&nbsp;&nbsp;Laporan
                                masih
                                tertunda.</div>
                            @endif
                            <a href="/masyarakat/detaillaporan/{{$pengaduan->id}}" class="btn btn-primary p-2 rounded"><i
                                    class="fas fa-clipboard"></i> Detail</a>
                        </div>

                    </div>
                    <div class="card-footer text-center py-3">
                        <i>
                            <small class="text-center m-0">{{$pengaduan->tanggal_pengaduan}}</small>
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>
<br>
<br>
@endforeach
<div class="container-fluid mt--5">
{{ $data_pengaduan->links() }}
</div>
@endsection
