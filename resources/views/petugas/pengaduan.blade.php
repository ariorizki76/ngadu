@extends('layouts.apppetugas')

@section('title', 'Pengaduan')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Tanggal Pengaduan</th>
                            <th>NIK</th>
                            <th>Nama Pelapor</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_pengaduan as $pengaduan)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pengaduan->tanggal_pengaduan}}</td>
                            <td>{{$pengaduan->masyarakat->nik}}</td>
                            <td>{{$pengaduan->masyarakat->nama}}</td>
                            <td>{{$pengaduan->status}}</td>
                            <td><a href="{{route('petugas.detailpengaduan', $pengaduan->id)}}" class="btn btn-info">
                                    <i class="fas fa-clipboard"></i> Detail
                                </a>
                                <a href="{{route('petugas.destroypengaduan', $pengaduan->id)}}" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection