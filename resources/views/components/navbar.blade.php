  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="/">Ngadu</a></h1>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="#hero">HOME</a></li>
              <li><a href="#about">TENTANG KAMI</a></li>
              <li><a href="#services">LAYANAN</a></li>
              <li><a href="#counts">DATA</a></li>
              
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <!-- Pengkondisian Masyarakat -->
             <hr>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             @if(Auth()->guard('masyarakat')->check())
                  <li class="drop-down"><a href="#"><i class="far fa-user"></i>&nbsp;
                  {{Auth()->guard('masyarakat')->user()->nama}}
                  </a>
                    <ul>
                      <li><a href="{{route('masyarakat.logout')}}"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
                    </ul>
                  </li>
                  @else
                  <li><a href="/login"><b>MASUK</b></a></li>
                  <li><a href="/register"><b>DAFTAR</b></a></li>
                  @endif

                </ul>
              </li>

            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </div>


  </header><!-- End Header -->
  
  <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>