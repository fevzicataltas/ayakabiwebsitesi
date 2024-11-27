<?php
session_start();
include_once("baglan.php");

// CSRF koruma: Token kontrolü
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_token = $_POST['csrf_token'] ?? '';
    $session_token = $_SESSION['csrf_token'] ?? '';

    if (!hash_equals($session_token, $post_token)) {
        // Tokenlar eşleşmiyorsa veya token gönderilmediyse işlemi durdur
        die("CSRF token doğrulaması başarısız. İşlem durduruldu.");
    }
}

// Yeni CSRF token oluşturma ve session'a kaydetme
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// Formdan gelen verileri güvenli hale getirme
$baslik = mysqli_real_escape_string($conn, $_POST['baslik']);
$fiyat = floatval($_POST['fiyat']);
$aciklama = mysqli_real_escape_string($conn, $_POST['aciklama']);

// XSS (Cross-Site Scripting) saldırılarına karşı koruma
$baslik = htmlspecialchars($baslik);
$aciklama = htmlspecialchars($aciklama);

// Dosya yükleme işlemleri için temel kontroller (tür, boyut, güvenlik vb.) yapılabilir

// Örneğin, yüklenen dosyayı kaydetme işlemi
if ($_FILES['resim']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["resim"]["tmp_name"];
    $name = basename($_FILES["resim"]["name"]);
    // Dosya adını rastgele oluşturup, güvenli bir şekilde kaydetme
    $dosya_adi = "resim/" . uniqid() . "_" . $name;
    
    // Dosya türü kontrolü yapılabilir (örneğin sadece belirli türler kabul edilsin)
    $dosya_turu = $_FILES["resim"]["type"];
    $izinli_turler = array("image/jpeg", "image/png", "image/gif");

    if (!in_array($dosya_turu, $izinli_turler)) {
        die("Hata! Yalnızca JPEG, PNG ve GIF dosyaları kabul edilir.");
    }

    // Dosya boyutu kontrolü yapılabilir (örneğin belirli bir sınıra kadar kabul edilsin)
    $dosya_boyutu = $_FILES["resim"]["size"];
    $max_boyut = 5 * 1024 * 1024; // 5 MB
    if ($dosya_boyutu > $max_boyut) {
        die("Hata! Dosya boyutu çok büyük. En fazla 5 MB olabilir.");
    }

    move_uploaded_file($tmp_name, $dosya_adi);
} else {
    die("Hata! Fotoğraf yüklenemedi.");
}

// Veritabanına ekleme işlemi - prepared statement kullanımı
$sql = "INSERT INTO ayakabilar (baslik, fiyat, aciklama, dosya_adi) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sdss", $baslik, $fiyat, $aciklama, $dosya_adi);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: ayakabilar.php");
    exit;
} else {
    echo "Hata: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
