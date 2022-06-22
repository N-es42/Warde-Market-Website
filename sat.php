
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="images/letter-w.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>SAT</title>
  </head>
  <body>
    
  <?php
    session_start();
    require_once('bilgiler/fonklar.php');
    require_once('vtlerim/vtlerim.php');
    $kontrol=$_GET['kontrol'];
    $kim=$_SESSION["kim"];
    $resim_id=$_GET['sat'];
    if(!isset($kontrol)){
        if(isset($_SESSION["kim"])){
            if(isset($_GET['sat'])){
                echo "<div class='container text-center'>
                <form action='sat.php'  class='' style='margin-top: 170px;'>
                <div class='form-group '>
                    <label class='mb-5' for='exampleInputEmail1'><h3>Fiyatı Girin</h3></label>
                    <input name='fiyat' type='number' class='form-control mb-5' required id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Fiyat'>
                    <input type='hidden' name='kontrol'>
                    <input type='hidden' name='resim_id' value='$resim_id'>
                    </div>
                <button type='submit' class='btn btn-danger w-25'>Sat/Güncelle</button>
                </form>
            </div>";
            }else{
                require_once('bilgiler/fonklar.php');
                echo'<div class="container">
                    <div class="alert alert-danger  mt-5">
                        <strong>Üzgünüm teknik bir arıza oluştu. Lütfen Yeniden Deneyiniz <br> </strong> Bekleyin Yönlendiriliyorsunuz.
                    </div>
                </div>
                    ';
                echo yonlendir(0,"index.php");
            }
          
        }else{
            require_once('bilgiler/fonklar.php');
            echo'<div class="container">
                <div class="alert alert-danger  mt-5">
                    <strong>Üzgünüm teknik bir arıza oluştu. Lütfen Yeniden Deneyiniz <br> </strong> Bekleyin Yönlendiriliyorsunuz.
                </div>
            </div>
                ';
            echo yonlendir(0,"index.php");
        }
    }else{
        require_once('bilgiler/fonklar.php');
        $resim_id=$_GET["resim_id"];
        $fiyat = $_GET["fiyat"];

        $sql0="select * from satilik WHERE resim_id='$resim_id'";
        $sonuc1= mysqli_query($baglanti,$sql0);
		$satirsay=mysqli_num_rows($sonuc1);

        if($satirsay>0){
            $sqlUpdate="UPDATE satilik SET fiyat=$fiyat WHERE resim_id=$resim_id";
            mysqli_query($baglanti,$sqlUpdate);
            echo '<div class="container alert alert-success mt-5">
                            <strong>İşlem başarılı <br> </strong>Bekleyin Yönlendiriliyorsunuz.
                            </div>
                    ';
            echo yonlendir(0,"nft_lerim.php");
        }else{
            $sql="INSERT INTO satilik (resim_id, fiyat, resim_sahip) VALUES ('$resim_id','$fiyat','$kim')";
            $sonuc2= mysqli_query($baglanti,$sql);
            echo '<div class="container alert alert-success mt-5">
                            <strong>İşlem başarılı <br> </strong>Bekleyin Yönlendiriliyorsunuz.
                            </div>
                    ';
            
            echo yonlendir(0,"nft_lerim.php");
        }

    }
?>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>