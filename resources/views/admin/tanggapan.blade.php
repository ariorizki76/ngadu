@extends('layouts.appadmin')

@section('title', 'Tanggapan')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card card-body shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <a href="/admin/pengaduan">
                            <i class="fas fa-arrow-circle-left fa-2x"></i>
                        </a>
                        <h4>Tanggapan</h4>
                    </div>
                </div>
                    <div class="card-body">
                        <form action="{{route('admin.tanggapan', $detail_pengaduan->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="tanggal_tanggapan" value="{{Carbon\Carbon::today()}}">
                                <input type="hidden" name="pengaduan_id" value="{{request()->route('id')}}">
                                <label for="tanggapan">Tanggapan</label>
                                <textarea class="form-control "name="tanggapan" id="tanggapan" rows="10" required autofocus></textarea>
                            </div>
                            <button class="btn btn-primary form-control" type="submit">Tanggapi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection