@extends('layouts.applogin')

@section('title', 'Login Masyarakat')


@section('content')
  
<!-- Form Login Masyarakat -->
<div class="content">
    <div class="container" >
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
                
                  <div class="mb-4" >
                  <h3 class="text-center">Masuk</h3>
                  
                </div>
                <form action="{{route('masyarakat.login')}}" method="POST">
                @csrf 
                  <div class="form-group first mb-4">
                    
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
                  </div>  
                  <div class="form-group last mb-4">
                    
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="d-flex mb-5 align-items-center">
                    <span class="ml-auto"><a href="#" class="forgot-pass">Lupa Password?</a></span> 
                  </div>
    

                  <button type="submit" class="btn btn-pill text-white btn-block" style="background-color: #7142d6">Login</button>
                </form>
                <hr>
                <p class="text-center">Belum punya akun?<a href="/register"> Daftar!</a></p>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
@endsection
