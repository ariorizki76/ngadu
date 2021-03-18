@extends('layouts.appregister')

@section('title', 'Register Masyarakat')
@section('content')

    <!-- Form Register Masyarakat -->
<div class="content">
    <div class="container">
      <div class="row justify-content-center">
      <a href="/">
      <i class="fas fa-arrow-circle-left fa-2x text-white"></i>
      </a>
        <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3 class="text-center">Daftar</h3>
                  
                </div>
                <form action="{{route('masyarakat.register')}}" method="POST">
                @csrf 
                <div class="container-fluid">
                  <div class="form-group mb-4">
                    
                    <input type="text" name="nama" id="nama" class="form-control" value="{{old('nama')}}" placeholder="Nama" autofocus>
                    @error('nama')
                    
                    <div class="alert alert-danger p-0">
                        
                        {{ $message }}
                    </div>
                    @enderror
                  </div>  
                  <div class="form-group mb-4">
            
                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="Email" autofocus>
                    @error('email')
                    
                    <div class="alert alert-danger p-0">  
                        {{ $message }}
                    </div>
                    @enderror
                  </div>  
                  <div class="row">
                      <div class="col-lg-5">
                  <div class="form-group mb-4">
                    
                    <input type="tel" name="nik" id="nik" class="form-control" value="{{old('nik')}}" placeholder="NIK">
                    @error('nik')
                    
                    <div class="alert alert-danger p-0">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>  
                  </div>
                  <div class="col">
                  <div class="form-group mb-4">
                    
                    <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}" placeholder="Username">
                    @error('username')
                    
                    <div class="alert alert-danger p-0">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>  
                  </div>
                  </div>
                  <div class="form-group mb-4">
                    
                    <input type="tel" name="telp" id="telp" class="form-control" value="{{old('telp')}}" placeholder="No. Telepon">
                    @error('telp')
                    
                    <div class="alert alert-danger p-0">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="row">
                      <div class="col-lg-5">
                  <div class="form-group mb-5">

                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    @error('password')
                    
                    <div class="alert alert-danger p-0">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>  
                  </div>
                  <div class="col">
                  <div class="form-group mb-5">
                    
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm Password">
                    @error('password_confirm')
                    
                    <div class="alert alert-danger p-0">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>  
                  </div>
                  </div>
                 
                  <button type="submit" class="btn btn-pill text-white btn-block" style="background-color: #7142d6">Register</button>
                  </div>
                  <hr>
                  <p class="text-center">Sudah punya akun? <a href="/login">Masuk!</a></p>
                </form>
               
                  
               
              </div>
            
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
@endsection