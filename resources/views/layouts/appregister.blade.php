<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('loginres/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('loginres/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('loginres/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('loginres/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">

    <title>@yield('title') - Ngadu</title>
  </head>

  <body style="background-image: url('{{asset('img/counts-bg.png')}}')">
    @yield('content')
</body>
<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
<script src="{{asset('loginres/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('loginres/js/popper.min.js')}}"></script>
<script src="{{asset('loginres/js/bootstrap.min.js')}}"></script>
<script src="{{asset('loginres/js/main.js')}}"></script>
</html>