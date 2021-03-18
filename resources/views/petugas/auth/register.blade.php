@extends('layouts.appregister')

@section('content')
    <div class="continer">
        <div class="row justify-content-center my-5">
            <div class="col-lg-12 col-md-12 col-xl-6 my-5">
                <div class="card shadow my-5">
                    <div class="card-body">
                    @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    @endif
                    </div>
                        <div class="card-body">
                            <form action="{{route('masyarakat.register')}}" method="POST">
                                @csrf 
                                <h3 class="text-center">Register</h3>
                                <br><br>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" id="nik" class="form-control" required autofocus>
                                </div> 
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label for="telp">No. Telepon</label>
                                    <input type="text" name="telp" id="telp" class="form-control" required>
                                </div> 
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary">Register</button>
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