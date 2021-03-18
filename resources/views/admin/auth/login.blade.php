@extends('layouts.applogin ')

@section('title', 'Login Admin')
@section('content')

<!-- Form Login Masyarakat -->
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
                  <h3 class="text-center">Login to <strong>Ngadu</strong></h3>
                  
                </div>
                <form action="{{route('admin.login')}}" method="POST">
                @csrf 
                  <div class="form-group first mb-4">
                    <label for="email"><i class="fas fa-envelope" style="color: #7142d6"></i>&nbsp;&nbsp;&nbsp;Email</label>
                    <input type="email" name="email" id="email" class="form-control" required autofocus>
                  </div>  
                  <div class="form-group last mb-4">
                    <label for="password"><i class="fas fa-lock" style="color: #7142d6"></i>&nbsp;&nbsp;&nbsp;Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                  </div>
                  <div class="d-flex mb-5 align-items-center">
                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                  </div>
    

                  <button type="submit" class="btn btn-pill text-white btn-block" style="background-color: #7142d6">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
</body>
@endsection