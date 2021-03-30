@extends('layouts.appregister')

@section('title', 'Register Admin')
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
                        <div class="form-block">
                            <div class="mb-4">
                                <h3 class="text-center">Register to <strong>Ngadu</strong></h3>

                            </div>
                            <form action="{{route('admin.register')}}" method="POST">
                                @csrf
                                <div class="container-fluid">
                                    <div class="form-group mb-4">
                                        <label for="nama_petugas"><i class="fas fa-user"
                                                style="color: #7142d6"></i>&nbsp;&nbsp;&nbsp;Nama</label>
                                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control"
                                            required autofocus>
                                        @error('nama')
                                        <br>
                                        <div class="alert alert-danger p-0">
                                            <br>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="email"><i class="fas fa-envelope"
                                                style="color: #7142d6"></i>&nbsp;&nbsp;&nbsp;Email</label>
                                        <input type="text" name="email" id="email" class="form-control" required
                                            autofocus>
                                        @error('nama')
                                        <br>
                                        <div class="alert alert-danger p-0">
                                            <br>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="username"><i class="fas fa-user-tag"
                                                style="color: #7142d6"></i>&nbsp;&nbsp;&nbsp;Username</label>
                                        <input type="text" name="username" id="username" class="form-control" required>
                                        @error('username')
                                        <br>
                                        <div class="alert alert-danger p-0">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="telp"><i class="fas fa-phone"
                                            style="color: #7142d6"></i>&nbsp;&nbsp;&nbsp;No. Telepon</label>
                                    <input type="tel" name="telp" id="telp" class="form-control" required>
                                    @error('telp')
                                    <br>
                                    <div class="alert alert-danger p-0">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group mb-5">
                                            <label for="password"><i class="fas fa-lock"
                                                    style="color: #7142d6"></i>&nbsp;&nbsp;&nbsp;Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                required>
                                            @error('password')
                                            <br>
                                            <div class="alert alert-danger p-0">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-5">
                                            <label for="password_confirm"><i class="fas fa-lock"
                                                    style="color: #7142d6"></i>&nbsp;&nbsp;&nbsp;Confirm
                                                Password</label>
                                            <input type="password" name="password_confirm" id="password_confirm"
                                                class="form-control" required>
                                            @error('password_confirm')
                                            <br>
                                            <div class="alert alert-danger p-0">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" id="level" class="form-control" required>
                                        <option value="admin">Administrator</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-pill text-white btn-block"
                                    style="background-color: #7142d6">Register</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<br><br>
<div class="form-group text-center">
    <p>Already have an account? <a href="/login">Login Here</a></p>
