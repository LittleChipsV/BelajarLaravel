<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gemilang: Website Penilaian Siswa</title>
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="icon" href="{{ asset('sbadmin/img/icon.ico') }}" type="image/x-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('homepage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <!-- <link href="assethomepage/s/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> -->
  <link href="{{ asset('homepage/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('homepage/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat Datang!</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented designers making websites with Bootstrap</h2>
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

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
              <h2>Our Values</h2>
              <p>Tentang Website Ini</p>
            </header>

            <div class="d-flex justify-content-center align-items-center">
                <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, nostrum distinctio ex adipisci in explicabo, perspiciatis maxime consequuntur ratione quidem obcaecati eius earum dolor rerum eaque sunt debitis similique exercitationem?Iusto dolorem provident beatae ducimus obcaecati ab? Debitis fugit error delectus molestias eaque explicabo ut in, facilis architecto exercitationem veritatis. Omnis nisi eveniet ad velit aspernatur voluptatem repellendus consectetur mollitia.</p>
            </div>

          </div>

        </section><!-- End Values Secti
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('includes.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('homepage/assets/vendor/purecounter/purecounter_vanilla.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/aos/aos.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/glightbox/js/glightbox.min.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/swiper/swiper-bundle.min.js')}} "></script>
  <script src="{{ asset('homepage/assets/vendor/php-email-form/validate.js')}} "></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('homepage/assets/js/main.js') }}"></script>
</body>
</html>
