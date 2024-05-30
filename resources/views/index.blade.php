<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gemilang: Website Penilaian Siswa</title>

  <link href="assets/img/favicon.png" rel="icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="icon" href="{{ asset('sbadmin/img/icon.ico') }}" type="image/x-icon">

  <link href="{{ asset('homepage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <link href="{{ asset('homepage/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('sbadmin/img/icon.ico') }}" alt="logo website">
        <span>Gemilang</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="getstarted scrollto" href="/login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat Datang!</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Selamat datang di website Gemilang: website penilaian siswa. Raih masa depan cemerlangmu dengan Gemilang!</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="/login" class="py-4 btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">Login</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('homepage/assets/img/hero-img.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <section id="about" class="about">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
              <h2>Deskripsi</h2>
              <p>Tentang Website Ini</p>
            </header>

            <div class="d-flex justify-content-center align-items-center">
                <p style="max-width: 700px;" class="text-center">Gemilang adalah aplikasi pengolahan nilai siswa yang canggih dan intuitif, dirancang untuk membantu sekolah dan guru mengelola data nilai siswa dengan efisien. Dengan antarmuka yang user-friendly, aplikasi ini memungkinkan pengguna untuk dengan mudah memasukkan, menyimpan, dan mengelola nilai siswa secara terorganisasi. Fitur-fitur unggulannya termasuk kemampuan untuk membuat kelas, menetapkan tugas/topik, mengolah nilai dengan metode statistik, seperti mencari rata-rata atau jumlah, dan menghasilkan laporan nilai secara otomatis. Dengan Gemilang, proses pengolahan nilai siswa menjadi lebih cepat, mudah, dan efektif, memungkinkan fokus yang lebih besar pada pembelajaran dan perkembangan siswa.</p>
            </div>
        </div>
    </section>
    <section id="features" class="features">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Keunggulan</h2>
                <p>Mengapa pilih Gemilang</p>
            </header>

          <div class="row">

            <div class="col-lg-6">
              <img src="{{asset('homepage/assets/img/features-1.png')}}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
              <div class="row align-self-center gy-4">

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Praktis</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Efektif</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Intuitif</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>User-friendly</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Aman</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Fleksibel</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </main>

  @include('includes.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="{{ asset('homepage/assets/vendor/purecounter/purecounter_vanilla.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/aos/aos.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/glightbox/js/glightbox.min.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/swiper/swiper-bundle.min.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/php-email-form/validate.js')}} "></script>

  <script src="{{ asset('homepage/assets/js/main.js') }}"></script>
</body>
</html>
