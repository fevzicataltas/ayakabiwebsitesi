<?php
session_start();
include_once("baglan.php");
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: giris.php");
  exit;
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Can Ayakabı</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename">Can Ayakabı</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Anasayfa</a></li>
          <li><a href="hakkinda.php">Biz Kimiz</a></li>
          <li><a href="ayakabi.php">Ayakabılar</a></li>
          <li><a href="iletisim.php">İletişim</a></li>
          <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
            <li><a href="panel.php">Panel</a></li>
          <?php endif; ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
        <a class="btn-getstarted" href="?logout">Çıkış Yap</a>
      <?php else : ?>
        <a class="btn-getstarted" href="giris.php">Giriş Yap</a>
      <?php endif; ?>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
        <li><a href="ayakabilar.php">Ayakabı Ekle</a></li>
      <?php endif; ?>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
        <li><a href="ayakabilist.php">Ayakabı Lİstele</a></li>
      <?php endif; ?>

    </div>
  </header>

  <main class="main">
    <br><br>

    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">


          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>can ayakabı kimdir </h3>
            <p class="fst-italic">
              Ayakkabılar, tarzımızın ve konforumuzun vazgeçilmez parçalarıdır. Günlük yaşamımızın her anında bize eşlik eden ayakkabılar, sadece birer giysi değil, aynı zamanda kişiliğimizi yansıtan önemli aksesuarlardır. Mağazamızda her zevke ve ihtiyaca uygun geniş bir ayakkabı koleksiyonu sunmaktan gurur duyuyoruz. Sizleri, kalite ve şıklığın buluştuğu, her adımda kendinizi özel hissedeceğiniz ayakkabılarımızı keşfetmeye davet ediyoruz.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Malzeme Kalitesi: Ayakkabılarımız, en kaliteli deri, süet ve kumaş malzemeler kullanılarak üretilmiştir. Her bir ürün, dayanıklılığı ve uzun ömürlülüğü garantilemek için titizlikle seçilmiştir.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Konfor: Ayak sağlığınızı ön planda tutarak tasarlanmış ayakkabılarımız, gün boyu konfor sunar. Ortopedik tabanlar ve esnek yapılarıyla ayaklarınıza maksimum rahatlık sağlar.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Çeşitlilik: Spor ayakkabılardan klasik modellere, günlük kullanımdan özel günlere kadar geniş bir ürün yelpazemiz bulunmaktadır. Her yaş ve tarza hitap eden modellerimizle, herkesin kendine uygun bir çift bulabileceği bir koleksiyon sunuyoruz.</span></li>
            </ul>
            <a href="ayakabi.php" class="read-more"><span>Alışverişe Başla</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="assets/img/about-company-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="assets/img/about-company-2.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="assets/img/about-company-3.jpg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /About Section -->



  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">QuickStart</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">QuickStart</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>