<?php
session_start();
include_once("baglan.php");

// Kullanıcı girişi kontrolü
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: giris.php");
    exit;
}

// Çıkış işlemi
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: giris.php");
    exit;
}

// Veritabanı sorgusu
$sql = "SELECT * FROM ayakabilar";
$result = $conn->query($sql);

// HTML başlangıcı
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
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
                        <li><a href="ayakabilar.php">Ayakabı Ekle</a></li>
                        <li><a href="ayakabilist.php">Ayakabı Listele</a></li>
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

        <section id="about" class="about section">

            <style>
                body {
                    font-family: 'Roboto', Arial, sans-serif;
                    background-color: #f0f0f0;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    width: 90%;
                    max-width: 1200px;
                    /* Added max-width for better responsiveness */
                    margin: 20px auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                h2 {
                    color: #333;
                    margin-bottom: 20px;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                    /* Added margin-top to separate from previous elements */
                }

                table th,
                table td {
                    border: 1px solid #ddd;
                    padding: 12px;
                    text-align: left;
                }

                table th {
                    background-color: #f2f2f2;
                    color: #333;
                }

                table td.actions {
                    text-align: center;
                }

                .actions a {
                    margin: 0 5px;
                    padding: 8px 16px;
                    /* Slightly increased padding for better clickability */
                    text-decoration: none;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    background-color: #f2f2f2;
                    color: #333;
                    transition: background-color 0.3s;
                    display: inline-block;
                    /* Ensures buttons are inline */
                }

                .actions a:hover {
                    background-color: #e0e0e0;
                }

                .btn-getstarted {
                    margin-left: 10px;
                    /* Adjusted margin for better spacing */
                    padding: 10px 20px;
                    /* Increased padding for better button size */
                    text-decoration: none;
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 4px;
                    transition: background-color 0.3s;
                }

                .btn-getstarted:hover {
                    background-color: #0056b3;
                }
            </style>
            <div class="container">
                <h2>Ürün Listesi</h2>
                <table>
                    <tr>
                        <th>Başlık</th>
                        <th>Fiyat</th>
                        <th>Açıklama</th>
                        <th>Dosya Adı</th>
                        <th>İşlemler</th>
                    </tr>

                    <!-- PHP Kodları -->
                    <!-- Bu kısım PHP kodları ile doldurulacak -->
                    <?php
                    // Veritabanı sorgusu
                    $sql = "SELECT * FROM ayakabilar";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $baslik = htmlspecialchars($row["baslik"]);
                            $fiyat = htmlspecialchars($row["fiyat"]);
                            $aciklama = htmlspecialchars($row["aciklama"]);
                            $dosya_adi = htmlspecialchars($row["dosya_adi"]);

                            echo "<tr>";
                            echo "<td>$baslik</td>";
                            echo "<td>$fiyat</td>";
                            echo "<td>$aciklama</td>";
                            echo "<td>$dosya_adi</td>";
                            echo "<td class='actions'>";
                            echo "<a href='akduz.php?id={$row['id']}'>Düzenle</a>";
                            echo "<a href='aksil.php?id={$row['id']}'>Sil</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Kayıt bulunamadı.</td></tr>";
                    }

                    // Veritabanı bağlantısını kapat
                    $conn->close();
                    ?>

                </table>
            </div>
        </section>

    </main>

    <footer id="footer" class="footer position-relative">
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">QuickStart</strong><span>All Rights Reserved</span></p>
            <div class="credits">
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