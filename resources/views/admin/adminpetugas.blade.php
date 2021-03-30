@extends('layouts.appadmin')

@section('title', 'Data Petugas')
@section('content')


<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data Petugas</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <form action="{{route('petugas.search')}}" method="get" class="form-inline">
                <div class="input-group rounded">
                    <input type="text" class="form-control rounded mr-sm-2" name="search" id="search"
                        placeholder="Cari Petugas..." value="{{old('search')}}"
                        style="outline: 0;border-width: 0 0 2px;">
                    <button type="submit" class="btn btn-pill text-white"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container mt--6">
    <div class="container mt--6">
        <!-- Approach -->
        <div class="row">
            <div class="col-lg-7">
                <div class="card shadow mb-4 my-2">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Data Petugas</h3>
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if(session('statuss'))
                        <div class="alert alert-success">
                            {{ session('statuss') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>No. Telepon</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_petugas as $petugas)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $petugas->nama_petugas }}</td>
                                        <td>{{ $petugas->username }}</td>
                                        <td>{{ $petugas->email }}</td>
                                        <td>{{ $petugas->telp }}</td>
                                        <td>{{ $petugas->level }}</td>
                                        <td>
                                            <a href="{{route('admin.destroypetugas', $petugas->id)}}"
                                                class="btn btn-danger p-2 rounded">
                                                <i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data_petugas->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Approach -->
            <div class="col-lg-5">
                <div class="card shadow mb-4 my-2">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Tambah Petugas</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.register')}}" method="POST">
                            @csrf
                            <div class="">
                                <div class="form-group mb-4 row">
                                    <label for="nama" class="col-sm-1 col-form-label"><i
                                            class="fas fa-user text-primary"></i></label>
                                    <div class="col-lg-11">
                                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control"
                                            value="{{old('nama_petugas')}}" placeholder="Nama"
                                            style="outline: 0;border-width: 0 0 2px;" autofocus>
                                        @error('nama_petugas')
                                        <div class="text-danger p-0">
                                            <small> {{ $message }} </small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row">
                                    <label for="email" class="col-sm-1 col-form-label"><i
                                            class="fas fa-envelope text-primary"></i></label>
                                    <div class="col-lg-11">
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{old('email')}}" placeholder="Email"
                                            style="outline: 0;border-width: 0 0 2px;" autofocus>
                                        @error('email')
                                        <div class="text-danger p-0">
                                            <small> {{ $message }} </small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-4 row">
                                            <label for="username" class="col-sm-1 col-form-label"><i
                                                    class="fas fa-user-tag text-primary"></i></label>
                                            <div class="col-lg-10">
                                                <input type="text" name="username" id="username" class="form-control"
                                                    value="{{old('username')}}" placeholder="Username"
                                                    style="outline: 0;border-width: 0 0 2px;">
                                                @error('username')
                                                <div class="text-danger p-0">
                                                    <small> {{ $message }} </small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4 row">
                                            <label for="telp" class="col-form-label"><i
                                                    class="fas fa-phone text-primary"></i></label>
                                            <div class="col-lg-11">
                                                <input type="tel" name="telp" id="telp" class="form-control"
                                                    value="{{old('telp')}}" placeholder="No. Telepon"
                                                    style="outline: 0;border-width: 0 0 2px;">
                                                @error('telp')
                                                <div class="text-danger p-0">
                                                    <small> {{ $message }} </small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-4 row">
                                            <label for="telp" class="col-sm-1 col-form-label"><i
                                                    class="fas fa-lock text-primary"></i></label>
                                            <div class="col-lg-10">
                                                <input type="password" name="password" id="password"
                                                    class="form-control" placeholder="Password"
                                                    style="outline: 0;border-width: 0 0 2px;">
                                                @error('password')
                                                <div class="text-danger p-0">
                                                    <small> {{ $message }} </small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4 row">
                                            <label for="telp" class=" col-form-label"><i
                                                    class="fas fa-lock text-primary"></i></label>
                                            <div class="col-lg-11">
                                                <input type="password" name="password_confirm" id="password_confirm"
                                                    class="form-control" placeholder="Confirm Password"
                                                    style="outline: 0;border-width: 0 0 2px;">
                                                @error('password_confirm')

                                                <div class="text-danger p-0">
                                                    <small> {{ $message }} </small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4 row">
                                    <label for="telp" class="col-sm-1 col-form-label"><i
                                            class="fas fa-level-up-alt text-primary"></i></label>
                                    <div class="col-lg-11">
                                        <select name="level" id="level" class="form-control"
                                            style="outline: 0;border-width: 0 0 2px;">
                                            <option value="" hidden>Pilih level</option>
                                            <option value="petugas">Petugas</option>
                                            <option value="admin">Administrator</option>
                                        </select>
                                        @error('level')

                                        <div class="text-danger p-0">
                                            <small> {{ $message }} </small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-pill btn btn-primary rounded btn-block">Tambah</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
