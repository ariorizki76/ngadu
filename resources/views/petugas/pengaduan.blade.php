@extends('layouts.apppetugas')

@section('title', 'Pengaduan')
@section('content')

<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data Pengaduan</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Approach -->
<div class="container">
    <div class="container">
        <div class="card shadow mb-4 mt--6">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i>&nbsp;&nbsp;Data Pengaduan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tanggal Pengaduan</th>
                                <th>NIK</th>
                                <th>Nama Pelapor</th>
                                <th>Judul Laporan</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($data_pengaduan as $pengaduan)
                            @if($pengaduan->masyarakat['nik'] != null)
                            <tr class="text-center">

                                <td>{{$loop->iteration}}</td>
                                <td>{{$pengaduan->tanggal_pengaduan}}</td>
                                <td>{{$pengaduan->masyarakat->nik}}</td>
                                <td>{{$pengaduan->masyarakat->nama}}</td>
                                <td>{{$pengaduan->judul_laporan}}</td>
                                <td>{{$pengaduan->lokasi}}</td>

                                @if($pengaduan->status == 'tertunda')
                                <td>
                                    <p class="badge badge-pill badge-danger p-2"><i
                                            class="fas fa-hourglass-start"></i>&nbsp;&nbsp;{{$pengaduan->status}}</p>
                                </td>
                                @elseif($pengaduan->status == 'selesai')
                                <td>
                                    <p class="badge badge-pill badge-success p-2"><i
                                            class="fas fa-check"></i>&nbsp;&nbsp;{{$pengaduan->status}}</p>
                                </td>
                                @else
                                <td>
                                    <p class="badge badge-pill badge-warning p-2"><i
                                            class="fas fa-hourglass-half"></i>&nbsp;&nbsp;{{$pengaduan->status}}</p>
                                </td>
                                @endif

                                <td><a href="{{route('petugas.detailpengaduan', $pengaduan->id)}}"
                                        class="btn btn-pill rounded btn-primary p-2">
                                        <i class="fas fa-clipboard"></i>&nbsp;&nbsp;Detail
                                    </a>

                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data_pengaduan->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



<!-- /.container-fluid -->

<!-- End of Main Content -->







@endsection
