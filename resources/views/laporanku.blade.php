@extends('layouts.app')
@section('title', 'Laporanku')
@section('content')

<!-- Laporanku -->
<div class="container">
<h1 class="text-center">Laporanku</h1>
    <div class="row mt-4">
            <div class="col-md-9 col-xl-12">
                @foreach($data_pengaduan as $pengaduan)
                    <div class="card border-left-primary shadow mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p>{{$pengaduan->tanggal_pengaduan}}</p>
                                <p class="font-weight-bold text-white bg-success p-1">
                                @if($pengaduan->status == "proses")
                                    <i class="fas fa-check"></i> Proses
                                @elseif($pengaduan->status == "selesai")
                                    <i class="fas fa-check-circle"></i> Selesai
                                @else
                                    Belum Diproses
                                @endif
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                    <h5>{{$pengaduan->isi_laporan}}</h5>
                                <a href="/laporanku/detaillaporan/{{$pengaduan->id}}" class="btn btn-info">
                                    <i class="fas fa-clipboard"></i> Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection