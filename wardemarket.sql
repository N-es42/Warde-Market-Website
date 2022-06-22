-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 09 Haz 2022, 08:21:23
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `wardemarket`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cuzdan`
--

DROP TABLE IF EXISTS `cuzdan`;
CREATE TABLE IF NOT EXISTS `cuzdan` (
  `uye_id` int(11) NOT NULL,
  `bakiye` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `cuzdan`
--

INSERT INTO `cuzdan` (`uye_id`, `bakiye`) VALUES
(10, 7450),
(27, 0),
(25, 4000),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(26, 1811),
(11, 7900),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `nft_images`
--

DROP TABLE IF EXISTS `nft_images`;
CREATE TABLE IF NOT EXISTS `nft_images` (
  `resim_id` int(11) NOT NULL AUTO_INCREMENT,
  `resim_ad` text COLLATE utf8_turkish_ci NOT NULL,
  `resim_baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `resim_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `resim_sahip_id` int(11) NOT NULL,
  PRIMARY KEY (`resim_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `nft_images`
--

INSERT INTO `nft_images` (`resim_id`, `resim_ad`, `resim_baslik`, `resim_aciklama`, `resim_sahip_id`) VALUES
(1, 'nft-resim.png', 'Bayc ', 'bored ape', 10),
(14, 'nft-resim_2.png', 'doodles', 'doodles 3333', 11),
(4, 'nft-resim_10.jpg', 'max verstappen', 'verstappen 1x1 fotosu', 11),
(8, 'nft-resim_14.jpg', 'heyo', 'test', 11),
(9, 'nft-resim_15.jpg', 'UFO361', 'UFUK BAYRAKTAR', 10),
(19, 'nft-resim_5.png', 'Azuki Anime ', 'Azuki koleksiyonundan güzel bir resim', 26),
(11, 'nft-resim_17.jpg', 'Dünyanın En iyi sanatı', 'best art', 26),
(18, 'nft-resim_4.png', 'Kahiru 1', 'kahiru pfp 1 resmi', 11),
(13, 'nft-resim_19.jpg', 'CALM', 'Sakura tree and 2 man', 10),
(17, 'nft-resim_1.png', 'Cyberkongz', 'Cyberkongs maymunları 1', 25),
(15, 'nft-resim_3.png', 'İnci Kefali', 'Dünyanın en iyi balığı ', 21),
(20, 'nft-resim_6.png', 'Resim', 'acıklama', 26);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satilik`
--

DROP TABLE IF EXISTS `satilik`;
CREATE TABLE IF NOT EXISTS `satilik` (
  `resim_id` int(11) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `resim_sahip` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `satilik`
--

INSERT INTO `satilik` (`resim_id`, `fiyat`, `resim_sahip`) VALUES
(17, 2000, 25),
(13, 2000, 10),
(4, 5000, 11),
(8, 1000, 11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `eposta` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uyetarih` date NOT NULL,
  `uye_tur` int(2) NOT NULL,
  PRIMARY KEY (`uye_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `ad`, `eposta`, `sifre`, `uyetarih`, `uye_tur`) VALUES
(1, 'admin', 'admin@com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-05-30', 1),
(4, 'Enes', 'eatalay666@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-05-30', 2),
(5, 'denem', 'dene@com', 'df483402b9bfeb234717a32c6e86280e', '2022-05-30', 2),
(6, 'mbappe', 'mbappe@gmail.com', 'f2fa5c6cc46b025d8de6b570b5e61a15', '2022-05-30', 2),
(7, 'ewaea', 'eqwq@c', '8f10d078b2799206cfe914b32cc6a5e9', '2022-05-30', 2),
(8, 'Enesaa', 'eata@42.com', '3d2172418ce305c7d16d4b05597c6a59', '2022-05-30', 2),
(9, 'Enes', 'wwaaa@c', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-30', 2),
(10, 'alican', 'ali@can', '827ccb0eea8a706c4c34a16891f84e7b', '2022-05-30', 2),
(11, 'wardeenes', 'warde1@co', 'a4972ce1be970a724355dce7e4d3a8fc', '2022-05-30', 2),
(12, 'enes', 'enes@co', '827ccb0eea8a706c4c34a16891f84e7b', '2022-05-30', 2),
(14, 'hakan_warde', 'hakan3531@gmail.com', '6c47dcebd7ee0e138d0b88290f5e0d3d', '2022-05-30', 2),
(15, 'tarih', 'tarih@c', '827ccb0eea8a706c4c34a16891f84e7b', '2022-05-30', 2),
(16, 'mehmet123', 'mehmet12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2031-05-22', 2),
(17, 'iamenesatalay', 'enesata@42', 'ae8b5aa26a3ae31612eec1d1f6ffbce9', '2031-05-22', 2),
(18, 'sevval', 'sev@34', '8f60c8102d29fcd525162d02eed4566b', '2031-05-22', 2),
(21, 'ensar65', 'ensar65@com', '827ccb0eea8a706c4c34a16891f84e7b', '2003-06-22', 2),
(22, 'ufuk', 'ufuk@com', '7c37c205e590641f21e6e50d4fb57c7f', '2005-06-22', 2),
(23, 'mehmet', 'mehmet@com', '4e39298ce8bb79e5243616f7e09aae28', '2005-06-22', 2),
(24, 'burak', 'burak@com', 'a21075a36eeddd084e17611a238c7101', '2005-06-22', 2),
(25, 'ufuk361', 'ufuk@361com', '827ccb0eea8a706c4c34a16891f84e7b', '2005-06-22', 2),
(26, 'mustafa', 'afef@com', '827ccb0eea8a706c4c34a16891f84e7b', '2006-06-22', 2),
(27, 'gokhan', 'gokhan@com', '827ccb0eea8a706c4c34a16891f84e7b', '2007-06-22', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
