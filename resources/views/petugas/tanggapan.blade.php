@extends('layouts.apppetugas')

@section('title', 'Tanggapan')
@section('content')

<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tanggapan</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt--6">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-reply"></i>&nbsp;&nbsp;Tanggapan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('petugas.tanggapan', $detail_pengaduan->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="tanggal_tanggapan" value="{{Carbon\Carbon::today()}}">
                                <input type="hidden" name="pengaduan_id" value="{{request()->route('id')}}">
                                <textarea class="form-control " name="tanggapan" id="tanggapan" rows="5"
                                    placeholder="Tanggapan" value="{{old('tanggapan')}}"
                                    style="outline: 0;border-width: 0 0 2px;" autofocus></textarea>
                                @error('tanggapan')
                                <div class="text-danger p-0">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary form-control rounded" type="submit">Tanggapi</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-exclamation"></i>&nbsp;&nbsp;Aturan</h3>
                    </div>
                    <div class="card-body">
                        <p>Wajib menanggapi secara ramah dan sopan.</p>
                        <hr>
                        <p>Tidak boleh sembarang memberi tanggapan.</p>
                        <hr>
                        <p>Menanggapi dengan cepat dan responsif.</p>
                        <hr>
                        <p>Memberi tanggapan dengan jelas, mudah dimengerti, dan dapat dipercaya.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
