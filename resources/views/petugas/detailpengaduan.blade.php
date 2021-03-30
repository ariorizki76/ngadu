@extends('layouts.apppetugas')

@section('title', 'Detail Pengaduan')
@section('content')

<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Detail Pengaduan</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt--6">
    <div class="container">
        @if(session('statuss'))
        <div class="alert alert-success">
            {{ session('statuss') }}
        </div>
        @endif
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="row">

            <div class="col-lg-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Info Status</h3>
                    </div>
                    <div class="card-body">
                        @if($data_pengaduan->status == "selesai")
                        <div class="badge badge-pill badge-success p-2"><i class="fas fa-check"></i>&nbsp;&nbsp;Laporan
                            terverifikasi.
                        </div>
                        @elseif($data_pengaduan->status == "proses")
                        <div class="badge badge-pill badge-warning p-2"><i
                                class="fas fa-hourglass-half"></i>&nbsp;&nbsp;Laporan
                            sedang
                            diproses.</div>
                        @else
                        <div class="badge badge-pill badge-danger p-2"><i
                                class="fas fa-hourglass-start"></i>&nbsp;&nbsp;Laporan
                            masih
                            tertunda.</div>
                        @endif
                       
                        <form action="{{route('petugas.statusonchange', $data_pengaduan->id)}}" method="POST">
                            @csrf
                            <hr>
                            <select name="status" style="outline: 0;border-width: 0 0 2px;" id="status"
                                class=" form-control col-lg-6 btn btn-primary rounded" onchange="javascript:this.form.submit()">
                                <option value="tertunda" @if($data_pengaduan->status == "tertunda")
                                    selected @endif">Tertunda</option>
                                <option value="proses" @if($data_pengaduan->status == "proses")
                                    selected @endif>Proses</option>
                                <option value="selesai" @if($data_pengaduan->status == "selesai")
                                    selected @endif>Selesai</option>
                            </select>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-lg-8">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-reply"></i>&nbsp;&nbsp;Tanggapan</h3>
                    </div>
                    <div class="card-body">

                        @if(empty($data_tanggapan))
                        <p>Belum ada tanggapan.</p>
                        @elseif($data_tanggapan->petugas['nama_petugas'] != null)
                        <p>{{$data_tanggapan->tanggapan}}</p>

                    </div>
                    <div class="card-footer py-2">
                        <p class="text-center m-0"><i>Ditanggapi oleh:
                                <b>{{$data_tanggapan->petugas->nama_petugas}}</b></p>
                        <p class="small text-center mt--3 mb--1"><br>({{$data_tanggapan->tanggal_tanggapan}})</i></p>
                        @else
                        <p>{{$data_tanggapan->tanggapan}}</p>
                        @endif
                        <div>
                            @if(empty($data_tanggapan))
                            <hr>
                            <a href="/petugas/detailpengaduan/{{$data_pengaduan->id}}/tanggapan"
                                class="btn btn-primary rounded">Tanggapi</a>
                            @else
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <div>

                        <h3 class="m-0 font-weight-bold text-primary">{{$data_pengaduan->judul_laporan}}</h3>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="/img/{{$data_pengaduan->foto}}"
                    alt="foto">
                <p class="my-4">{{$data_pengaduan->isi_laporan}}</p>
                <hr>

                <div>
                    <p class="small">Atas nama: <b>{{$data_pengaduan->masyarakat->nama}}</b></p>
                    <p class="small mt--2">Lokasi: <b>{{$data_pengaduan->lokasi}}</b></p>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <i>
                    <small class="text-center m-0">{{$data_pengaduan->tanggal_pengaduan}}</small>
                </i>
            </div>
        </div>

    </div>
</div>
<!-- End of Main Content -->


<!-- Approach -->


<!-- End of Main Content -->


@endsection
