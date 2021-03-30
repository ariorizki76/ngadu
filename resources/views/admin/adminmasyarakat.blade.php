@extends('layouts.appadmin')

@section('title', 'Data Masyarakat')
@section('content')

<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data Masyarakat</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <form action="{{route('masyarakat.search')}}" method="get" class="form-inline">
                <div class="input-group rounded">
                    <input type="text" class="form-control rounded mr-sm-2" name="search" id="search"
                        placeholder="Cari Masyarakat..." value="{{old('search')}}"
                        style="outline: 0;border-width: 0 0 2px;">
                    <button type="submit" class="btn btn-pill text-white"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container mt--6">
<div class="container">
<div class="card shadow mb-4 my-2">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-users"></i>&nbsp;&nbsp;Data Masyarakat</h3>
    </div>

    <div class="card-body">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>No. </th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_masyarakat as $masyarakat)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $masyarakat->nik }}</td>
                        <td>{{ $masyarakat->nama }}</td>
                        <td>{{ $masyarakat->username }}</td>
                        <td>{{ $masyarakat->email }}</td>
                        <td>{{ $masyarakat->telp }}</td>
                        <td>
                            <form action="{{route('admin.ubahstatusmasyarakat', $masyarakat->nik)}}" method="POST">
                                @csrf
                                <select name="status" style="outline: 0;border-width: 0 0 2px;" id="status" class="btn btn-primary rounded form-control"
                                    onchange="javascript:this.form.submit()">
                                    <option value="aktif" @if($masyarakat->status == "aktif")
                                        selected @endif">Aktif</option>
                                    <option value="nonaktif" @if($masyarakat->status == "nonaktif")
                                        selected @endif>Nonaktif</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data_masyarakat->links() }}
        </div>
    </div>
</div>
</div>
</div>


@endsection
