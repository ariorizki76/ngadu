@extends('layouts.app')
@section('title', 'Home')
@section('content')
    
<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Layanan penyampaian informasi berupa keluhan dari masyarakat</h1>
          <h2>Sampaikan keluhan anda sekarang juga!</h2>

          @if(Auth()->guard('masyarakat')->check())
          <div><a href="/masyarakat/pengaduan" class="btn-get-started scrollto">Buat Pengaduan!</a></div>
          @else
          <div><a href="/register" class="btn-get-started scrollto">Daftar Sekarang!</a></div>
          @endif
<br><br>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{asset('img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
            <img src="{{asset('img/about.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>Tentang Kami </h3>
            <p class="font-italic">
              Ngadu adalah sebuah aplikasi pengaduan masyarakat yang mempunyai layanan untuk membantu masyarakat agar mempermudah membuat pengaduan/laporan yang akan tersampaikan kepada pihak yang berwenang.  
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i>Buat.</li>
              <li><i class="icofont-check-circled"></i>Lihat.</li>
              <li><i class="icofont-check-circled"></i>Tanggapi.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Layanan</h2>
          <p>Fitur-fitur layanan kami sangat praktis, aman, tersampaikan, dan cepat. Oleh karena itu, kami memiliki 3 fitur penting yang akan memudahkan masyarakat dalam membuat pengaduan/laporan.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bx-book-open"></i>
              </div>
              <h4>Buat</h4>
              <p>Masyarakat dapat membuat pengaduan/laporan yang berisi keluhan/ketidakpuasan mereka kepada pemerintah yang berwenang.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bx bx-show"></i>
              </div>
              <h4>Lihat</h4>
              <p>Masyarakat dapat melihat hasil pengaduan/laporan mereka, untuk mengecek apakah masih diproses atau sudah diverifikasi.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-pink">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bx bx-conversation"></i>
              </div>
              <h4>Tanggapi</h4>
              <p>Pengaduan/laporan dari masyarakat akan diproses serta ditanggapi oleh petugas kami.</p>
            </div>
          </div>
    </section><!-- End Services Section -->

<div class="section-title section-bg"></div>
<div class="section-title section-bg"></div>
    <div id="counts" class="section-title section-bg"><h2>Data</h2></div>
    

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$data_pengaduan}}</span>
            <p><i class="fas fa-chart-bar"></i>&nbsp;&nbsp;Total Pengaduan</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$pengaduan_terverifikasi}}(</span>
            <p><i class="fas fa-check"></i>&nbsp;&nbsp;Pengaduan Terverifikasi</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$data_masyarakat}}</span>
            <p><i class="fas fa-user"></i>&nbsp;&nbsp;Data Masyarakat</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$data_petugas}}</span>
            <p><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Data Petugas</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Orang-orang hebat yang membangun dan mengembangkan aplikasi pengaduan masyarakat ini.</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bxs-crown"></i>
              <h4>Owner</h4>
              <p>-Ario Rizki Alfariz-</p>
              <p>Saya membangun aplikasi ini supaya memudahkan masyarakat untuk membuat pengaduan kepada pemerintahan yang berwenang.</p><hr>
            </div>  
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bxl-dev-to"></i>
              <h4>Developer 1</h4>
              <p>-Ario Rizki Alfariz-</p>
              <p>Saya juga mengembangkan aplikasi tersebut dengan memperhatikan segala kebutuhan dan persyaratan-persyaratannya.</p>
              <hr>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bx bxl-dev-to"></i>
              <h4>Developer 2</h4>
              <p>-Ario Rizki Alfariz-</p>
              <p>Kemudian saya juga menganalisis tujuan dan alur aplikasi yang akan saya kembangkan.</p>
              <hr>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="400">
              <i class="bx bxl-dev-to"></i>
              <h4>Developer 3</h4>
              <p>-Ario Rizki Alfariz-</p>
              <p>Dan yang terakhir saya menyusun kerangka, desain, dan fungsi fitur-fitur yang akan digunakan kedepannya agar memudahkan masyarakat.</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/features.svg" alt="" class="img-fluid">
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimoni</h2>
          <p>Beberapa testimoni dari masyarakat yang telah membuat pengaduan dan merasakan proses terselesaikannya pengaduan tersebut.</p>
        </div>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <p>
              Awalnya saya tidak mengerti menggunakan aplikasi ini, tapi setelah saya mencobanya ternyata tidak terlalu sulit. Dan laporan saya langsung diproses.
            </p>
            <h3>Agus</h3>
            <h4>Masyarakat.</h4>
          </div>

          <div class="testimonial-item">
            <p>
              Didaerah saya banyak sekali jalanan yang berlubang, pada akhirnya saya harus membuat pengaduan dan kebetulan saya menemukan aplikasi ini. Sangat terpercaya dan mudah digunakan.
            </p>
            <h3>Mulyono</h3>
            <h4>Pedagang.</h4>
          </div>

          <div class="testimonial-item">
            <p>
              Laporan saya langsung ditanggapi dan akan diproses, keren sekali!
            </p>
            <h3>Rani</h3>
            <h4>Mahasiswi.</h4>
          </div>

          <div class="testimonial-item">
            <p>
              Tampilan aplikasinya sangat <i>useable</i> sekali sehingga membuat saya nyaman.
            </p>
            <h3>Rayi</h3>
            <h4>Designer.</h4>
          </div>

          <div class="testimonial-item">
            <p>
              Sangat membantu sekali aplikasi ini, membuat masyarakat mudah untuk membuat pengaduan tentang keluh kesah mereka.
            </p>
            <h3>Jefri</h3>
            <h4>Pengusaha.</h4>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pertanyaan Yang Sering Diajukan</h2>
          <p>Beberapa pertanyaan yang sering ditanyakan oleh masyarakat.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Apakah aplikasi ini terpercaya?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                  Ya, aplikasi ini cukup aman. Pengaduan anda akan segera diproses dan ditanggapi oleh petugas kami.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Bagaimana cara saya membuat aplikasi? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                  Jika anda belum pernah daftar, silahkan daftar terlebih dahulu. Kemudian masuk, dan anda akan menemukan tombol "Buat Pengaduan".
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Apakah prosesnya cepat?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                  Sebisa mungkin kami akan memproses pengaduan anda secara cepat dan maksimal.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Sudah berapa banyak pengaduan yang terselesaikan?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                  Bisa dicek di bagian "Data" diatas ini, disana sudah tertera keseluruhan data-data pengaduan. 
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Apakah data-data tersebut valid? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                  Tentu saja, data-data kami 100% valid, hasil dari pengaduan masyarakat sampai terverifikasi.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
          <p>Jika membutuhkan info lebih lanjut, anda bisa menghubungi kami melewati cara-cara dibawah ini.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p>Jl. Subang, Jawa Barat, Indonesia.</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>ngadu@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Telepon</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>

        </div>

        <!-- <div class="row">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">



    <div class="container ">

      <div class="py-4 ">
        <div class="text-center">
          <div class="copyright" style="opacity:80%">
            Copyright  &copy;2021 | Ario Rizki Alfariz
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->

          </div>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  
</body>
@endsection