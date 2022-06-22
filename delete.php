<?php 
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      
    </style>
    <title>Hello, world!</title>
  </head>
  <body class="bg-light">


  <?php 
  if (isset($_SESSION["kim"]) ){
        if(isset($_GET["delete"])){
        require_once('bilgiler/fonklar.php');
        require_once('vtlerim/vtlerim.php');
        $resim_id=$_GET["delete"];
        $sql = "DELETE FROM nft_images WHERE resim_id=$resim_id";
        $ja=mysqli_query($baglanti,$sql);
            
        echo'<div class="container"><div class=" mt-5 alert alert-success">
        Başarıyla silindi. Bekleyin Yönlendiriliyorsunuz...
            </div></div>';
            echo yonlendir(2,"nft_lerim.php");
        }
        else{
            require_once('bilgiler/fonklar.php');
            echo yonlendir(1,"anasayfa.php");
        }
    }
    else{
        require_once('bilgiler/fonklar.php');
        echo'<div class="container"><div class="alert alert-danger mt-5">
                Bir Sorun Oluştu. Bekleyin Yönlendiriliyorsunuz...
                </div></div>';
        echo yonlendir(2,"index.php");
    }


?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
    
  </body>


</html>