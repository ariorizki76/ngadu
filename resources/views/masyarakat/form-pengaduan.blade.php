@extends('layouts.appmasyarakat')

@section('title', 'Buat Pengaduan')
@section('content')

<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Buat Pengaduan</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Approach -->
<div class="container mt--6">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i>&nbsp;&nbsp;Buat Pengaduan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('masyarakat.pengaduan')}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <input type="text" name="judul_laporan" id="judul_laporan" placeholder="Judul Laporan"
                                    class="form-control" value="{{old('judul_laporan')}}"
                                    style="outline: 0;border-width: 0 0 2px;">
                                @error('judul_laporan')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">

                                <textarea name="isi_laporan" id="isi_laporan" rows="4" placeholder="Isi Laporan"
                                    class="form-control" value="{{old('isi_laporan')}}"
                                    style="outline: 0;border-width: 0 0 2px;"></textarea>
                                @error('isi_laporan')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <select name="lokasi" id="lokasi" class="form-control"
                                    style="outline: 0;border-width: 0 0 2px;">
                                    <option value="" hidden>Pilih Lokasi</option>
                                    @foreach($desa as $ds)
                                    <option value="{{$ds->lokasi}}">{{$ds->lokasi}}</option>
                                    @endforeach
                                </select>
                                @error('lokasi')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="file" name="foto" id="foto" class="form-control" value="{{old('foto')}}"
                                    style="outline: 0;border-width: 0 0 2px;">
                                <small style="color:gray">*Wajib disertakan foto!</small>
                                @error('foto')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="tanggal_pengaduan" id="tanggal_pengaduan"
                                    class="form-control" value="{{Carbon\Carbon::now()->toDateString('Y-m-d')}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary">Buat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-exclamation"></i>&nbsp;&nbsp;Aturan</h3>
                </div>
                <div class="card-body">
                    <p>Dilarang membuat laporan palsu.</p>
                    <hr>
                    <p>Membuat laporan dengan jelas, detail, dan disertakan foto.</p>
                    <hr>
                    <p class="m-0">Barangsiapa yang membuat laporan palsu/sembarangan, akun yang bersangkutan akan <p
                            class="text-danger font-weight-bold">dinonaktifkan.</p>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- End of Main Content -->


    @endsection
