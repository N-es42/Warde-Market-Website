<?php
session_start();

?>
<?php
    error_reporting(0);
    require 'config.php';
    require 'verot.net.php';
    if($_POST){
        $foo = new Upload($_FILES['gorsel']); 
        if ($foo->uploaded) {

            $foo->file_new_name_body = 'nft-resim';
            $foo->process('nfts');
            if ($foo->processed) {
                $kim=$_SESSION["kim"];
                $resim_adi= $foo->file_dst_name;

                DB::insert("INSERT INTO nft_images(resim_ad,resim_baslik,resim_aciklama,resim_sahip_id) VALUES(?,?,?,?)", array(
                    $resim_adi,
                    $_POST['baslik'],
                    $_POST['aciklama'],
                    $kim,
                ));
                Header("location:create_nft.php?success=1");
            }
            else{
                Header("location:create_nft.php?resimHata=". $foo->error);
            } 
        
        }  
        else{
            Header("location:create_nft.php?resimHata=Lütfen resim yükleyiniz");
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="images/letter-w.ico">
    <title>Create an NFT</title>
    <style>
        body{
          font-family: 'Montserrat', sans-serif;
        }
    </style>
  </head>
  <body>
    
  <?php 
        require_once('bilgiler/fonklar.php');
        define("indexed",TRUE);
        $kim=$_SESSION["kim"];

        if (isset($_SESSION["kim"]))
        {
            require_once('vtlerim/vtlerim.php');
            $sql="select * from uyeler WHERE uye_id='$kim'";
            $sonuc1= mysqli_query($baglanti,$sql);

            while($b = mysqli_fetch_array($sonuc1)) {
                $ad=$b['ad'];
                echo"
                <h3 class='ml-4 mt-3'>
                    $ad
                </h3>
                <a class='ml-4' href='anasayfa.php'>Anasayfaya dön.</a>
                ";
            }
            include "create.php";
        }
        else{
            echo'<div class="container">
            <div class="alert alert-danger  mt-5">
                <strong>Üzgünüm teknik bir arıza oluştu. Lütfen Yeniden Deneyiniz <br> </strong> Bekleyin Yönlendiriliyorsunuz.
              </div>
        </div>
            ';
            echo yonlendir(2,"index.php");
        }
    ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
