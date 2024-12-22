<?php
    include_once('../Backend/services/authservice.php');
    $usr = new AuthService();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MindCareHub - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    h1 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 2rem;
    }
    .grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 2rem;
      margin-bottom: 2rem;
    }
    @media (min-width: 640px) {
      .grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (min-width: 1024px) {
      .grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    .card {
      background-color: #ffffff;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .card img {
      width: 100%;
      height: 12rem;
      object-fit: cover;
    }
    .card-content {
      padding: 1rem;
    }
    .card-title {
      font-size: 1.125rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
    }
    .card-text {
      color: #4b5563;
      margin-bottom: 1rem;
    }
    .collapse-content {
      display: none;
      margin-top: 1rem;
    }
    input[type="checkbox"] {
      display: none;
    }
    input[type="checkbox"]:checked ~ .collapse-content {
      display: block;
    }
    .doctors .member .pic {
      overflow: hidden;
      width: 180px;
      border-radius: 50%;
    }

    .doctors .member .pic img {
      transition: ease-in-out 0.3s;
    }

    .doctors .member:hover img {
      transform: scale(1.1);
    }
  </style>
</head>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">MindCareHub</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Blog</a></li>
          <li><a class="nav-link scrollto" href="#konselor">Konselor</a></li>
          <li><a class="nav-link scrollto" href="#registrasi">Pemesanan</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="../Forum/login.php">Forum</a></li>
          <li>
          <form>
            <input type="search" placeholder="Search" class="mt-2">
            <button class="btn btn-primary mb-1" type="submit" style="border-radius: 5px;">
            <i class="fas fa-search"></i>
            </button>
          </form>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../Backend/login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline text-white">Login</span></a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center text-aligns-end">
    <div class="container">
      <h1>Welcome to</h1>
      <h1> MindCareHub</h1>
      <h2>Your Mind, Our Care</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

      <?php
        $hsl = $usr->bacaTabelAll('home');
        if(mysqli_num_rows($hsl) > 0) {
      ?>

        <?php
          while($row = mysqli_fetch_array($hsl)) {
        ?>
        <div class="container">
          <div class="d-flex align-items-stretch">
            <div class="container content text-center">
              <h3 class="text-white"><?php echo $row['judul']; ?></h3>
              <p class="collapse text-white" id="whychoose">
                <?php echo $row['deskripsi']; ?>
              </p>
              <div class="text-center">
                <a data-bs-toggle="collapse" data-bs-target="#whychoose" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
        ?>
        <?php
            }
        ?> 

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=EKEWk4oWmjY" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>MindCareHub</h3>
            <p>MindCareHub adalah sebuah platform yang berfokus pada kesehatan mental dan kesejahteraan emosional. MindCareHub menyediakan layanan, sumber daya, dan komunitas yang mendukung individu dalam mengelola stres, meningkatkan keseimbangan hidup, dan memperkuat kesehatan mental mereka.</p>

            <div class="icon-box">
              <div class="icon"><i class="fas fa-users"></i></div>
              <h4 class="title"><a href="../Forum/login.php">Forum Komunitas</a></h4>
              <p class="description">Forum komunitas adalah ruang online yang dirancang untuk memberikan dukungan, berbagi pengalaman, dan informasi seputar kesehatan mental.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="fas fa-hospital"></i></div>
              <h4 class="title"><a href="#services">Blog Kesehatan</a></h4>
              <p class="description">Blog kesehatan adalah platform online yang menyediakan informasi, panduan, dan tips seputar berbagai aspek kesehatan, baik fisik maupun mental.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="fas fa-gamepad"></i></div>
              <h4 class="title"><a href="#about">Stress Buster Games</a></h4>
              <p class="description">Stress buster games adalah jenis permainan yang dirancang untuk membantu mengurangi stres dan kecemasan melalui aktivitas yang santai, menyenangkan, atau memicu perasaan positif.</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

      <div class="section-title">
        <h2 class="text-center">
        Artikel Terbaru
        </h2>
        </div>
        <div class="grid">
          <div class="card">
          <?php
            $hsl = $usr->bacaTabelAll('blog');
            if(mysqli_num_rows($hsl) > 0) {
          ?>
            <?php
              while($row = mysqli_fetch_array($hsl)) {
            ?>
            <img alt="Overhead view of people walking" src="../Backend/assets/<?php echo  $row['foto'] ?>"/>
            <div class="card-content">
              <h2 class="card-title text-center">
              <?php echo $row['judul']; ?>
              </h2><br>
              <a class="btn btn-primary text-white" href="Artikel/blog-single.php" style="text-align: center;">
                Baca Selengkapnya
              </a>
            </div>
            <?php
              }
            ?>
            <?php
              }
            ?> 
          </div>

          <div class="card">
          <?php
            $hsl = $usr->bacaTabelAll('artikel2');
            if(mysqli_num_rows($hsl) > 0) {
          ?>

          <?php
            while($row = mysqli_fetch_array($hsl)) {
          ?>
            <img alt="Interior of a modern building" src="../Backend/assets/<?php echo  $row['foto'] ?>"/>
            <div class="card-content">
              <h2 class="card-title text-center">
              <?php echo $row['judul']; ?>
              </h2><br>
              <a class="btn btn-primary" href="Artikel/artikel2.php">
                Baca Selengkapnya
              </a>
            </div>
            <?php
              }
            ?>
            <?php
              }
            ?> 
          </div>

          <div class="card">
          <?php
            $hsl = $usr->bacaTabelAll('artikel3');
            if(mysqli_num_rows($hsl) > 0) {
          ?>

          <?php
            while($row = mysqli_fetch_array($hsl)) {
          ?>
            <img alt="Cozy seating area in a cafe" src="../Backend/assets/<?php echo  $row['foto'] ?>"/>
            <div class="card-content">
              <h2 class="card-title text-center">
              <?php echo $row['judul']; ?>
              </h2><br>
              <a class="btn btn-primary" href="Artikel/artikel3.php">
                Baca Selengkapnya
              </a>
            </div>
            <?php
              }
            ?>
            <?php
              }
            ?> 
          </div>

          <div class="card">
            <img alt="People having a meeting" src="assets/img/artikel4.jpg"/>
            <div class="card-content">
            <h2 class="card-title text-center">
              Lorem ipsum dolor sit amet
            </h2><br>
            <label class="btn btn-primary">
              Baca Selengkapnya
            </label>
            </div>
          </div>
          <div class="card">
            <img alt="Book titled 'Success' on a table" src="assets/img/artikel5.jpg"/>
            <div class="card-content">
            <h2 class="card-title text-center">
              Lorem ipsum dolor sit amet
            </h2><br>
            <label class="btn btn-primary">
              Baca Selengkapnya
            </label>
            </div>
          </div>
          <div class="card">
            <img alt="Person using a tablet" src="assets/img/artikel6.jpg"/>
            <div class="card-content">
            <h2 class="card-title text-center">
              Lorem ipsum dolor sit amet
            </h2><br>
            <label class="btn btn-primary" for="toggle6">
              Baca Selengkapnya
            </label>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Konselor Section ======= -->
    <section id="konselor" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Konselor</h2>
        </div>

        <div class="row">

        <?php
          $hsl = $usr->bacaTabelAll('dokter');
          if(mysqli_num_rows($hsl) > 0) {
        ?>

          <?php
            while($row = mysqli_fetch_array($hsl)) {
          ?>
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <img src="../Backend/assets/<?php echo  $row['foto'] ?>" class="pic" alt="Foto Konselor">
              <div class="member-info">
                <h4><?php echo $row['nama']; ?></h4>
                <span><?php echo $row['specialist']; ?></span>
                <p><?php echo $row['deskripsi']; ?></p>
                <div class="social">
                  <a href="#"><i class="ri-twitter-fill"></i></a>
                  <a href="#"><i class="ri-facebook-fill"></i></a>
                  <a href="#"><i class="ri-instagram-fill"></i></a>
                  <a href="#"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
        ?>
        <?php
            }
        ?> 

        </div>

      </div>
    </section><!-- End konselor Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

      <?php
        $hsl = $usr->bacaTabelAll('pertanyaan1');
        if(mysqli_num_rows($hsl) > 0) {
      ?>

        <?php
          while($row = mysqli_fetch_array($hsl)) {
        ?>
        <div class="section-title">
          <h2>Apa itu kesehatan mental?</h2>
          <p><?php echo $row['deskripsi']; ?></p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-1"><?php echo $row['pertanyaan']; ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
                <p>
                <?php echo $row['jawaban']; ?>
                </p>
              </div>
            </li>
            <?php
            }
        ?>
        <?php
            }
        ?> 

      <?php
        $hsl = $usr->bacaTabelAll('pertanyaan2');
        if(mysqli_num_rows($hsl) > 0) {
      ?>

        <?php
          while($row = mysqli_fetch_array($hsl)) {
        ?>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed"><?php echo $row['pertanyaan']; ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                <?php echo $row['jawaban']; ?>
                </p>
              </div>
            </li>
            <?php
            }
        ?>
        <?php
            }
        ?> 

        <?php
          $hsl = $usr->bacaTabelAll('pertanyaan3');
          if(mysqli_num_rows($hsl) > 0) {
        ?>

          <?php
            while($row = mysqli_fetch_array($hsl)) {
          ?>
            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed"><?php echo $row['pertanyaan']; ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                <?php echo $row['jawaban']; ?>
                </p>
              </div>
            </li>
            <?php
            }
        ?>
        <?php
            }
        ?> 

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Apakah kesehatan mental hanya berhubungan dengan pikiran atau juga tubuh?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Kesehatan mental berhubungan dengan keduanya, pikiran dan tubuh. Pikiran yang sehat dapat berpengaruh positif pada tubuh, sementara kondisi fisik yang buruk, seperti kelelahan atau penyakit, dapat memperburuk kesehatan mental. Kesehatan mental yang baik mencakup keseimbangan antara tubuh, pikiran, dan emosi.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Apakah ada cara alami untuk meningkatkan kesehatan mental? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                Beberapa cara alami untuk meningkatkan kesehatan mental termasuk olahraga teratur, meditasi, tidur yang cukup, menjaga pola makan yang sehat, berinteraksi dengan orang-orang yang positif, dan berlatih mindfulness atau kesadaran penuh. Mengelola stres dengan teknik relaksasi juga sangat membantu dalam mempertahankan keseimbangan mental
                </p>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="registrasi" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Registrasi Pemesanan</h2>
        </div>
      </div>

      <div class="container">
        <div class="row">
          
          <div class="col-lg-4">
            <div class="info">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div style="background-color: #1977cc; border-radius: 15px; margin-top: 15px;" class="row">
                <h2 style="margin-left: 80px;" class="text-white">Kontak Darurat</h2>
                  <div class="col-md-12 form-group">
                    <input style="border-radius: 10px;" type="text" name="name" class="form-control mt-3" id="name" placeholder="Nama" required>
                  </div>
                  <div class="col-md-12 form-group mt-3 mt-md-0">
                    <input style="border-radius: 10px;" type="number" class="form-control mt-3" name="nomortelepon" id="nomortelepon" placeholder="Nomor Telepon" required>
                  </div>
                  <div class="col-md-12 form-group mt-3 mt-md-0">
                    <input style="border-radius: 10px;" type="text" class="form-control mt-3" name="hubungan" id="hubungan" placeholder="Hubungan" required>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-8 mt-5">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control mt-3" id="name" placeholder="Nama lengkap" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control mt-3" name="address" id="address" placeholder="Alamat lengkap" required>
                </div>
                <div class="col-md-6 form-group">
                  <input type="date" name="TTL" class="form-control mt-3" id="TTL" placeholder="Tanggal Lahir" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control mt-3" name="JenisKelamin" id="JenisKelamin" placeholder="Jenis Kelamin" required>
                </div>
                <div class="col-md-6 form-group">
                  <input type="number" name="NoTelp" class="form-control mt-3" id="NoTelp" placeholder="Nomor Telepon" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control mt-3" name="KTP" id="KTP" placeholder="KTP" required>
                </div>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button style="margin-right: 400px;" type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" style="background-color: #1977cc;">
    
    <div id="contact" class="container mt-5" data-aos="fade-up">

<?php
    $hsl = $usr->bacaTabelAll('kontak');
    if(mysqli_num_rows($hsl) > 0) {
  ?>

    <?php
      while($row = mysqli_fetch_array($hsl)) {
    ?>
    <div class="row gy-4">
    <h2 style="text-align: center; color: white;">Contact</h2>
      <div class="col-md-5" style="background-color: #1977cc; border-radius: 15px; margin-top: 15px; padding: 20px; margin-left: 230px; width: 400px; height: 130px">
        <div class="info-item text-white d-flex align-items-center">
          <i style="font-size: 30px; margin-right: 20px;" class="icon bi bi-map flex-shrink-0"></i>
          <div>
            <h4 class="text-white">Address</h4>
            <p class="text-white"><?php echo $row['alamat']; ?></p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-5" style="background-color: #1977cc; border-radius: 15px; margin-top: 15px; padding: 20px; margin-left: 50px;  width: 400px; height: 130px">
        <div class="info-item text-white d-flex align-items-center">
          <i style="font-size: 30px; margin-right: 20px;" class="icon bi bi-envelope flex-shrink-0"></i>
          <div>
            <h4 class="text-white">Email Us</h4>
            <p class="text-white"><?php echo $row['email']; ?></p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-5" style="background-color: #1977cc; border-radius: 15px; margin-top: 15px; padding: 20px; margin-left: 230px;  width: 400px; height: 130px">
        <div class="info-item text-white d-flex align-items-center">
          <i style="font-size: 30px; margin-right: 20px;" class="icon bi bi-telephone flex-shrink-0"></i>
          <div>
            <h4 class="text-white">Call Us</h4>
            <p class="text-white"><?php echo $row['nomor_telepon']; ?></p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-5" style="background-color: #1977cc; border-radius: 15px; margin-top: 15px; padding: 20px; margin-left: 50px;  width: 400px; height: 130px">
        <div class="info-item text-white d-flex align-items-center">
          <i style="font-size: 30px; margin-right: 20px;" class="icon bi bi-share flex-shrink-0"></i>
          <div>
            <h4 class="text-white">Opening Hours</h4>
            <div><?php echo $row['jam_operasional']; ?></div>
          </div>
        </div>
      </div><!-- End Info Item -->

    </div>
    <?php
            }
        ?>
        <?php
            }
        ?> 

    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>