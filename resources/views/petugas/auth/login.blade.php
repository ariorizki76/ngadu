@extends('layouts.applogin')

@section('title', 'Login Petugas')


@section('content')
  
<!-- Form Login Masyarakat -->

<div class="content">
    <div class="container" >
      <div class="row justify-content-center">
        <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
        <div class="col-md-6 contents">
          
          <div class="row justify-content-center">
            <div class="col-md-12">
              
              <div class="form-block rounded">
                
                  <div class="mb-4" >
                  <h1 class="text-center">Masuk</h1>
                  @if(session('status'))
                  <div class="alert alert-danger">
                    {{ session('status') }}
                  </div>
                  @endif
                </div>
                <form action="{{route('petugas.login')}}" method="POST">
                @csrf 
                  <div class="form-group first mb-4 row">
                  <label for="username" class="col-sm-1 mt-2 col-form-label text-primary"><i class="fas fa-user-tag"></i> </label>
                  <div class="col-lg-11">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="{{old('username')}}" style="outline: 0;border-width: 0 0 2px;" autofocus>
                    @error('username')
                    
                    <div class="text-danger p-0">
                        
                        <small> {{ $message }} </small>
                    </div>
                    @enderror
                  </div>  
                  </div>  
                  <div class="form-group last mb-4 row">
                  <label for="password" class="col-sm-1 mt-2 col-form-label text-primary"><i class="fas fa-lock"></i> </label>
                  <div class="col-lg-11">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" style="outline: 0;border-width: 0 0 2px;">
                    @error('password')
                    
                    <div class="text-danger p-0">
                        
                        <small> {{ $message }} </small>
                    </div>
                    @enderror
                  </div>
                  </div>
                  <!-- <div class="d-flex mb-5 align-items-center">
                    <span class="ml-auto"><a href="#" class="forgot-pass">Lupa Password?</a></span> 
                  </div> -->
    <br>

                  <button type="submit" class="btn btn-pill btn btn-primary btn-block">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
@endsection

