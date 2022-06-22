<?php
error_reporting(0);



	header("Access-Control-Allow-Origin: *");
	header ('Content-type: text/html; charset=utf-8');	
function topla($a, $b) //$a ve $b local değişkenlerdir. sadece fnk içinde geçerlidir
{
	$toplamaca=$a + $b; 
	
	
	return $toplamaca;
}

function ortalama($a, $b, $c)
{
	$ort=($a+$b+$c)/3;
	
	return $ort;
}

function yonlendir($sure,$sayfa){ 
  $deger = "<meta http-equiv=\"refresh\" content=\"$sure;url=$sayfa\">\n"; 
  return $deger; 
 } 
 
 
function turkcele($metin)
{
	$ara = array("ı", "i", "ö", "ü", "ş", "ç", "ğ");
	$degistir = array("I", "İ", "Ö", "Ü", "Ş", "Ç", "Ğ");
	

	$ifade = strtoupper(str_replace($ara, $degistir, $metin));
	
	
	return $ifade;
}

function dikkatcek($metin, $renk, $buyuk)
{
	$deger= "<font color='$renk' size='$buyuk'> $metin </font>";
	return $deger;	
}

?>