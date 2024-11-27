<?php
session_start();
include_once("baglan.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: giris.php");
    exit;
}

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM ayakabilar WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: ayakabilist.php'); 
        exit;
    } else {
        echo "Kayıt silinirken hata oluştu: " . $conn->error;
    }
}

$conn->close();
?>