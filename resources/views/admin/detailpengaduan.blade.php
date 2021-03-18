@extends('layouts.appadmin')

@section('title', 'Detail Pengaduan')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
        <a href="{{route('admin.detailpdf', $data_pengaduan->id)}}" class="btn btn-primary mb-4"><i class="fas fa-download"></i> Unduh Laporan</a>
            <div class="card card-body shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <a href="/admin/pengaduan">
                                <i class="fas fa-arrow-circle-left fa-2x"></i>
                            </a>
                            <h4>{{$data_pengaduan->status}}</h4>
                        </div>
                </div>
                    <div class="card-body">
                        <p>{{$data_pengaduan->tanggal_pengaduan}}</p>
                        <h5>{{$data_pengaduan->isi_laporan}}</h5>
                        <img src="/img/{{$data_pengaduan->foto}}" alt="foto">
                        <hr>
                    <div>
                            <p class="small">Nama Pelapor: {{$data_pengaduan->masyarakat->nama}}</p>
                            <p class="small">NIK: {{$data_pengaduan->masyarakat->nik}}</p>
                    </div>
                    </div>
                </div>
            <div class="card card-body shadow mt-3">
                <div class="card-header">
                    <h4>Tanggapan</h4>
                </div>
                <div class="card-body">
                    <p>{{@$data_tanggapan->tanggapan}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection