<?php

$baglanti = mysqli_connect("localhost", "root", "") or die ("Bağlantı Hatası: Lütfen Yeniden Deneyiniz"); 
mysqli_select_db($baglanti,"wardemarket");

mysqli_query($baglanti, "SET CHARACTER SET 'utf8'");
mysqli_query($baglanti, "SET NAMES 'utf8'");
mysqli_query($baglanti, "SET COLLATION_CONNECTION = 'latin5_turkish_ci'");



?>
