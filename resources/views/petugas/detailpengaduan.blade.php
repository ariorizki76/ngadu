@extends('layouts.apppetugas')

@section('title', 'Detail Pengaduan')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card card-body shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <a href="/petugas/pengaduan">
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
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <form action="{{route('petugas.statusonchange', $data_pengaduan->id)}}" method="POST">
                            @csrf
                            <select name="status" id="status" class="form-control" onchange="javascript:this.form.submit()">
                                <option value=0 @if($data_pengaduan->status == "belum diproses")
                                               selected @endif">Belum diproses</option>
                                <option value="proses" @if($data_pengaduan->status == "proses")
                                               selected @endif>Proses</option>
                                <option value="selesai" @if($data_pengaduan->status == "selesai")
                                               selected @endif>Selesai</option>
                            </select>
                            </form>
                            <a href="/petugas/detailpengaduan/{{$data_pengaduan->id}}/tanggapan" class="btn btn-primary">Tanggapi</a>
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