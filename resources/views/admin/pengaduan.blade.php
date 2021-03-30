@extends('layouts.appadmin')

@section('title', 'Data Pengaduan')
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

    
    <div class="col-lg-6">
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-print"></i>&nbsp;&nbsp;Buat laporan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#cetak">
                                Cetak Pertanggal
                            </button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#cetaklokasi">
                                Cetak Perlokasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




<!-- Approach -->
<div class="container mt--6">
    <div class="container">
        <div class="card shadow mb-4">
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

                                <td><a href="{{route('admin.detailpengaduan', $pengaduan->id)}}"
                                        class="btn btn-pill btn-primary p-2 rounded">
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



<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Pertanggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group row">
                        <label for="tglawal" class="col-sm-2 col-form-label">Dari:</label>
                        <div class="col-sm-10">
                            <input type="date" value="2021-03-01" class="form-control" name="tglawal " id="tglawal"
                                style="outline: 0;border-width: 0 0 2px;">
                                
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tglakhir"  class="col-sm-2 col-form-label">Sampai:</label>
                        <div class="col-sm-10">
                            <input type="date" value="2021-03-02" class="form-control" name="tglakhir" id="tglakhir"
                                style="outline: 0;border-width: 0 0 2px;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Batal</button>
                <a type="button" onclick="this.href='/admin/pengaduan/cetak/'+ document.getElementById('tglawal').value + '/'+ document.getElementById('tglakhir').value"
                 class="btn btn-primary rounded text-white">Cetak</a>
            </div>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="cetaklokasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Perlokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group row">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi:</label>
                        <div class="col-sm-10">
                            <select name="lokasi" id="lokasi" class="form-control"
                                style="outline: 0;border-width: 0 0 2px;">
                                @foreach($desa as $ds)
                                <option value="{{$ds->lokasi}}">{{$ds->lokasi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Batal</button>
                <a type="button" onclick="this.href='/admin/pengaduan/cetak/'+ document.getElementById('lokasi').value"
                    class="btn btn-primary rounded text-white">Cetak</a>
            </div>
        </div>
    </div>
</div>





@endsection
