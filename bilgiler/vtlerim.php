<?php

$baglanti = mysqli_connect("localhost", "root", "") or die ("Bağlantı Hatası: Lütfen Yeniden Deneyiniz"); 


mysqli_select_db($baglanti,"sesver");
//$db=mysql_select_db('alsancak',$baglanti);
mysqli_query($baglanti, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn
);
mysqli_query($baglanti, "SET CHARACTER SET 'utf8'");
mysqli_query($baglanti, "SET NAMES 'utf8'");
mysqli_query($baglanti, "SET COLLATION_CONNECTION = 'latin5_turkish_ci'");



?>
