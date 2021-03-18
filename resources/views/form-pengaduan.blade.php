@extends('layouts.app')

@section('title', 'Form Pengaduan')
@section('content')

<!-- Form Pengaduan Masyarakat -->
    <div class="continer">
        <div class="row justify-content-center my-5">
            <div class="col-lg-12 col-md-12 col-xl-6 my-5">
                <div class="card shadow my-5">
                    <div class="card-body">
                    @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    @endif
                    <div class="card-header">
                                    <h3 class="text-center">Ngadu</h3>
                                </div>
                    </div>
                        <div class="card-body">
                            <form action="{{route('masyarakat.pengaduan')}}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                <br>
                                <div class="form-group">
                                    <input type="hidden" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control" value="{{Carbon\Carbon::now()->toDateString('Y-m-d')}}" >
                                </div> 
                                <div class="form-group">
                                    <label for="isi_laporan">Isi Laporan</label>
                                    <textarea name="isi_laporan" id="isi_laporan" rows="10" class="form-control" required>
                                    
                                    </textarea>
                                    @error('isi_laporan')
                                        <div class="alert alert-danger p-0">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div> 
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control" value="{{old('foto')}}" required>
                                    @error('foto')
                                        <div class="alert alert-danger p-0">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div> 
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary">Simpan</button>
                                <br><br>
                                <div class="form-group text-center">
                                    <p>Already have an account? <a href="/login">Login Here</a></p>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection