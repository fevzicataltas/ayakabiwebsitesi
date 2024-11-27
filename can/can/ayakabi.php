<?php
session_start();
include_once("baglan.php");

if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: giris.php");
  exit;
}
$sql = "SELECT * FROM ayakabilar";
$result = $conn->query($sql);
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
          <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
            <li><a href="ayakabilar.php">Ayakabı Ekle</a></li>
          <?php endif; ?>
          <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
            <li><a href="ayakabilist.php">Ayakabı Lİstele</a></li>
          <?php endif; ?>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
        <a class="btn-getstarted" href="?logout">Çıkış Yap</a>
      <?php else : ?>
        <a class="btn-getstarted" href="giris.php">Giriş Yap</a>
      <?php endif; ?>

    </div>
  </header>

  <main class="main">
    <br><br>
    <section id="about" class="about section">
      <style>
        .container {
          width: 90%;
          max-width: 1200px;
          margin: 20px auto;
          background-color: #fff;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card {
          border: 1px solid #ddd;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          margin-bottom: 20px;
          overflow: hidden;
          display: flex;
          flex-direction: column;
        }

        .card img {
          width: 100%;
          height: auto;
        }

        .card-body {
          padding: 15px;
        }

        .card-title {
          font-size: 1.5rem;
          margin-bottom: 10px;
          color: #333;
        }

        .card-text {
          font-size: 1rem;
          margin-bottom: 10px;
          color: #555;
        }

        .card-price {
          font-size: 1.2rem;
          font-weight: bold;
          margin-bottom: 15px;
          color: #007bff;
        }

        .actions {
          margin-top: auto;
          display: flex;
          justify-content: space-between;
          padding: 15px;
        }

        .actions a {
          padding: 10px 20px;
          text-decoration: none;
          background-color: #007bff;
          color: #fff;
          border-radius: 4px;
          transition: background-color 0.3s;
        }

        .actions a:hover {
          background-color: #0056b3;
        }
      </style>
      <main class="main">
        <section id="products" class="products section">
          <div class="container">
            <h2>Ayakkabı Listesi</h2>
            <div class="row">
              <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $baslik = htmlspecialchars($row["baslik"]);
                  $fiyat = htmlspecialchars($row["fiyat"]);
                  $aciklama = htmlspecialchars($row["aciklama"]);
                  $dosya_adi = htmlspecialchars($row["dosya_adi"]);

                  echo "<div class='col-md-4'>";
                  echo "<div class='card'>";
                  echo "<img src='{$dosya_adi}' alt='{$baslik}'>";
                  echo "<div class='card-body'>";
                  echo "<h5 class='card-title'>{$baslik}</h5>";
                  echo "<p class='card-price'>₺{$fiyat}</p>";
                  echo "<p class='card-text'>{$aciklama}</p>";
                  echo "<div class='actions'>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                }
              } else {
                echo "<p>Hiç ayakkabı bulunamadı.</p>";
              }
              ?>
            </div>
          </div>
        </section>
      </main>

    </section>



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