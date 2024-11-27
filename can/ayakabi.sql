-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Haz 2024, 22:26:28
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ayakabi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `admin`, `sifre`) VALUES
(1, 'can', '$2y$10$1Bv6LUYufbDd1zKIxrcyVueROgw.mETD.gDW5KzwJe5/.3gZUAiRS');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayakabilar`
--

CREATE TABLE `ayakabilar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `aciklama` text NOT NULL,
  `dosya_adi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ayakabilar`
--

INSERT INTO `ayakabilar` (`id`, `baslik`, `fiyat`, `aciklama`, `dosya_adi`) VALUES
(26, 'Nike Air Force 1 \\\'07', 5000, 'Erkek Ayakkabısı', 'resim/666df8afdc97c_Ekran görüntüsü 2024-06-15 232331.png'),
(27, 'Nike Air Force 1 \\\'07', 5000, 'erkek ayakabı', 'resim/666df8c0b3e8b_Ekran görüntüsü 2024-06-15 232357.png'),
(28, 'Nike Air Force 1 \\\'07', 5000, 'erkek ayakabı', 'resim/666df8cc48a52_Ekran görüntüsü 2024-06-15 232423.png');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayakabilar`
--
ALTER TABLE `ayakabilar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ayakabilar`
--
ALTER TABLE `ayakabilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
