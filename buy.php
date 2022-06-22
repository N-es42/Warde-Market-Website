<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="icon" type="image/x-icon" href="images/letter-w.ico">
    
  </head>
  <body>
    <?php
    session_start();
    
    if(isset($_SESSION["kim"])){
        if(isset($_GET['buyid'])){
            $kim=$_SESSION["kim"];
        
            $resim_id=$_GET['buyid'];
            require_once('vtlerim/vtlerim.php');
            require_once('bilgiler/fonklar.php');
            // alacak olan adamın bakiye cekme
            $sqlbakiye="SELECT bakiye FROM cuzdan WHERE uye_id=$kim";
            $sqlSonuc = mysqli_query($baglanti,$sqlbakiye);
            while($b = mysqli_fetch_array($sqlSonuc)) {
                $bakiye=$b['bakiye'];
            }    
            
            // urun fiyatı çekme ve sahip id si çekme
            $sqlurun ="SELECT fiyat,resim_sahip from satilik where resim_id=$resim_id";
            $sqlSonuc2 = mysqli_query($baglanti,$sqlurun);
            while($b = mysqli_fetch_array($sqlSonuc2)) {
                $urunfiyat=$b['fiyat'];
                $urunSahip=$b['resim_sahip'];
            }

            // satan adamın bakiyesi çekme
            $sqlbakiye2="SELECT bakiye FROM cuzdan WHERE uye_id=$urunSahip";
            $sqlSonuc2 = mysqli_query($baglanti,$sqlbakiye2);
            while($b = mysqli_fetch_array($sqlSonuc2)) {
                $bakiye2=$b['bakiye'];
            } 

            // parası yetiyormu kontrol?
            if($bakiye>=$urunfiyat){
                require_once('bilgiler/fonklar.php');
                //alıcı bakiyesi azaltma
                $yenibakiye= $bakiye-$urunfiyat;
                $sqlbakiyeguncelle_alici= "UPDATE cuzdan SET bakiye=$yenibakiye WHERE uye_id=$kim";
                mysqli_query($baglanti,$sqlbakiyeguncelle_alici);

                // satıcı bakiye artma
                $yenibakiye2=$bakiye2+$urunfiyat;
                $sqlbakiyeguncelle_satici= "UPDATE cuzdan SET bakiye=$yenibakiye2 WHERE uye_id=$urunSahip";
                mysqli_query($baglanti,$sqlbakiyeguncelle_satici);

                // satılıkdan kaldırma
                $deletesql="DELETE FROM satilik WHERE resim_id=$resim_id";
                mysqli_query($baglanti,$deletesql);

                //sahibi değiştirme
                $sqlsahiplik= "UPDATE nft_images SET resim_sahip_id=$kim WHERE resim_id=$resim_id";
                mysqli_query($baglanti,$sqlsahiplik);

                echo '<div class="container alert alert-success mt-5">
                            <strong>Alım işlemi başarılı <br> </strong>Bekleyin Yönlendiriliyorsunuz.
                            </div>
                    ';
                echo yonlendir(2,"explore.php"); 
                mysql_close($baglanti);	

            }else{
                require_once('bilgiler/fonklar.php');
                echo '<div class="container alert alert-danger mt-5">
                            <strong>Yetersiz bakiye. <br> </strong> Lütfen bakiye yükleyin. Bekleyin Yönlendiriliyorsunuz.
                            </div>
                    ';
                echo yonlendir(2,"explore.php"); 
            }
        }

    }else{
        require_once('bilgiler/fonklar.php');
        echo yonlendir(2,"index.php"); 
                    echo '
                       <div class="alert alert-danger mt-5">
                           <strong>Kullanıcı adınız kayıtlı değil veya yanlış giriş yaptınız <br> </strong> Lütfen tekrar deneyin. Bekleyin Yönlendiriliyorsunuz.
                         </div>
                   ';

    }
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>