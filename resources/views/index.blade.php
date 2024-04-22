<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gemilang: Website Penilaian Siswa</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  @include('includes.style')

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">Gemilang</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="getstarted scrollto" href="#about">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Website Penilaian Siswa</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Website untuk menilai siswa</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Masuk</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="{{ asset('sbadmin/img/indraw_profile_3') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Tentang Website Ini</h2>
        </div>

        <div class="row">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
            <img src="assets/img/counts-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio molestiae voluptatibus aut expedita eius sint reiciendis beatae ex numquam alias! Tenetur consequatur voluptatum nisi autem deleniti recusandae odio, quam eveniet!
            Provident nobis tempora voluptate natus minus mollitia et! Nemo, dolorum? Iste maxime deserunt quibusdam obcaecati! Dolore consequuntur labore esse provident distinctio. Ullam nostrum sunt, quibusdam necessitatibus porro facilis ipsam odio.
            Temporibus maxime error quam iure ipsum iusto, optio praesentium. Et odio molestiae perspiciatis modi? Aliquid provident eius eligendi incidunt voluptate distinctio consequatur temporibus esse. Eaque rerum illo natus quaerat consequatur!
            Obcaecati ametlaceat perspiciatis veritatis nemo assumenda sunt? Odio ratione quis asperiores autem animi quia accusamus! Excepturi, voluptate impedit! Corporis, cumque.
            Quaerat quam eius non eligendi mollitia autem tempora minus a! Dolorem ex soluta maiores facilis explicabo enim amet architecto. Nobis sint nisi soluta accusantium quibusdam quos aperiam nam. Cumque, voluptatibus?</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Vesperr</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>