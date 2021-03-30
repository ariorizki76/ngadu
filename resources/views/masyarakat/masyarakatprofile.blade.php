@extends('layouts.appmasyarakat')

@section('title', 'Profile')
@section('content')

<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Profile</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile mt-0">
                <div class="row justify-content-center">
                    <div class="card-header">
                        <h1 class="mt-2 font-weight-bold">Profile</h1>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4 rounded">

            
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">

                            </div>
                        </div>
                    </div>
                    <div class="text-center mt--5">
                        <h5 class="h3">
                            {{$masyarakat->nama}}
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{$masyarakat->email}}
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Approach -->
        <div class="col-lg-8">
            <div class="card shadow mb-4 mt--0">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Edit Profile</h3>
                </div>
                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{route('masyarakat.update')}}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="container">
                            <div class="form-group mb-4 row">
                            <label for="nama" class="col-sm-1 col-form-label"><i
                                            class="fas fa-user text-primary"></i></label>
                                    <div class="col-lg-11">
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{$masyarakat->nama}}" placeholder="Nama"
                                    style="outline: 0;border-width: 0 0 2px;" autofocus>
                                @error('nama_petugas')
                                <div class="text-danger p-0">
                                    <small> {{ $message }} </small>
                                </div>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group mb-4 row">
                            <label for="nik" class="col-sm-1 col-form-label"><i
                                            class="fas fa-coins text-primary"></i></label>
                                    <div class="col-lg-11">
                                <input type="text" name="nik" id="nik" class="form-control" value="{{$masyarakat->nik}}"
                                    placeholder="NIK" style="outline: 0;border-width: 0 0 2px;" autofocus>
                                @error('nik')
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
                                    value="{{$masyarakat->email}}" placeholder="Email"
                                    style="outline: 0;border-width: 0 0 2px;" autofocus>
                                @error('email')
                                <div class="text-danger p-0">
                                    <small> {{ $message }} </small>
                                </div>
                                @enderror
                            </div>
                            </div>

                            <div class="form-group mb-4 row">
                            <label for="username" class="col-sm-1 col-form-label"><i
                                            class="fas fa-user-tag text-primary"></i></label>
                                    <div class="col-lg-11">
                                <input type="text" name="username" id="username" class="form-control"
                                    value="{{$masyarakat->username}}" placeholder="Username"
                                    style="outline: 0;border-width: 0 0 2px;">
                                @error('username')
                                <div class="text-danger p-0">
                                    <small> {{ $message }} </small>
                                </div>
                                @enderror

                            </div>
                            </div>

                            <div class="form-group mb-4 row">
                            <label for="telp" class="col-sm-1 col-form-label"><i
                                            class="fas fa-phone text-primary"></i></label>
                                    <div class="col-lg-11">
                                <input type="tel" name="telp" id="telp" class="form-control"
                                    value="{{$masyarakat->telp}}" placeholder="No. Telepon"
                                    style="outline: 0;border-width: 0 0 2px;">
                                @error('telp')
                                <div class="text-danger p-0">
                                    <small> {{ $message }} </small>
                                </div>
                                @enderror
                            </div>
                            </div>

                            <button type="submit" class="btn btn-pill btn btn-primary rounded btn-block">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
