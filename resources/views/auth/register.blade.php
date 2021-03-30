@extends('layouts.appregister')

@section('title', 'Register Masyarakat')
@section('content')

<!-- Form Register Masyarakat -->
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block rounded">
                            <div class="mb-4">
                                <h1 class="text-center">Daftar</h1>

                            </div>
                            <form action="{{route('masyarakat.register')}}" method="POST">
                                @csrf
                                <div>
                                    <div class="form-group mb-4 row">
                                        <label for="nama" class="col-sm-1 mt-2 col-form-label text-primary"><i
                                                class="fas fa-user"></i> </label>
                                        <div class="col-lg-11">
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                value="{{old('nama')}}" placeholder="Nama"
                                                style="outline: 0;border-width: 0 0 2px;" autofocus>
                                            @error('nama')

                                            <div class="text-danger p-0">

                                                <small> {{ $message }} </small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-4 row">
                                        <label for="nik" class="col-sm-1 mt-2 col-form-label text-primary"><i
                                                class="fas fa-coins"></i> </label>
                                        <div class="col-lg-11">
                                            <input type="tel" name="nik" id="nik" class="form-control"
                                                value="{{old('nik')}}" placeholder="NIK"
                                                style="outline: 0;border-width: 0 0 2px;">

                                            @error('nik')

                                            <div class="text-danger p-0">
                                                <small> {{ $message }} </small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group mb-4 row">
                                                <label for="username"
                                                    class="col-sm-2 mt-2 col-form-label text-primary"><i
                                                        class="fas fa-user-tag"></i> </label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="username" id="username"
                                                        class="form-control" value="{{old('username')}}"
                                                        placeholder="Username"
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
                                                <label for="email" class=" mt-2 col-form-label text-primary"><i
                                                        class="fas fa-envelope"></i> </label>&nbsp;
                                                <div class="col-lg-11">
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        value="{{old('email')}}" placeholder="Email"
                                                        style="outline: 0;border-width: 0 0 2px;">

                                                    @error('email')

                                                    <div class="text-danger p-0">
                                                        <small> {{ $message }} </small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4 row">
                                        <label for="telp" class="col-sm-1 mt-2 col-form-label text-primary"><i
                                                class="fas fa-phone"></i></label>
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
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group mb-5 row">
                                                <label for="password"
                                                    class="col-sm-1 mt-2 col-form-label text-primary"><i
                                                        class="fas fa-lock"></i> </label>
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
                                                <label for="password" class=" mt-2 col-form-label text-primary"><i
                                                        class="fas fa-lock"></i> </label>&nbsp;
                                                <div class="col-lg-11">
                                                    <input type="password" name="password_confirm" id="password_confirm" class="form-control"
                                                         placeholder="Confirm Password"
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

                                    <button type="submit" class="btn btn-pill text-white btn-block"
                                        style="background-color: #7142d6">Register</button>
                                </div>
                                <hr>
                                <p class="text-center" style="color: gray">Sudah punya akun? <a
                                        href="/login"><b>Masuk!</b></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
