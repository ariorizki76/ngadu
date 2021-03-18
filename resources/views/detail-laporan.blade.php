@extends('layouts.app')

@section('title', 'Detail Laporan')
@section('content')

<div class="container mt-2">
    <h2 class="text-center">Detail Laporan</h2>
        <div class="row">
            <div class="card card-body shadow mt-3">      
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                    <a href="/laporanku">
                         <i class="fas fa-arrow-circle-left fa-2x"></i>
                    </a>
                        <h4>Tanggapan</h4>
                </div>
            </div>
                <div class="card-body">
                    <p>{{@$data_tanggapan->tanggapan}}</p>
                </div> 
            </div> 
        </div>
     
            <div class="row mt-4">
                <div class="card card-body shadow mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="font-weight-bold text-white bg-success p-1">
                                @if($detail_laporan->status == "proses")
                                    <i class="fas fa-check"></i> Proses
                                @elseif($detail_laporan->status == "selesai")
                                    <i class="fas fa-check-circle"></i> Selesai
                                @else
                                    Belum Diproses
                                @endif
                            </h4>
                        </div>
                    </div>
            
                <div class="card-body">
                    <p>{{$detail_laporan->tanggal_pengaduan}}</p>
                    <h5>{{$detail_laporan->isi_laporan}}</h5>
                    <img src="/img/{{$detail_laporan->foto}}" alt="foto">
                </div>
            </div>
        </div> 
    </div>

@endsection