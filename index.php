<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Giris Yap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="images/letter-w.ico">
	<link rel="stylesheet" href="css/css2/style.css">
	
	<style>
        body{
          font-family: 'Montserrat', sans-serif;
        }
        .wardeRenk{
          background-color: #0381ff;
          color: white;
        }

    </style>
	</head>
	<body class="img js-fullheight" style="background-image: url(images/bayc.jpg);">
     <?php require_once('bilgiler/fonklar.php'); ?>

     <?php 
        $kontrol=$_GET['kontrol']; 
        if (!isset($kontrol))
        { echo'<section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <p style="font-size: 50px; font-weight: bold; color: white;"> WARDE NFT</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                      <h3 class="mb-4 text-center" style="font-family: \'Montserrat\', sans-serif;
                      ">Giriş Yap</h3>
                      <form action="index.php" class="signin-form mt-5">
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Kullanıcı Adınız" required name="username">
                          </div>
    
                    <div class="form-group">
                      <input id="password-field" type="password" class="form-control" placeholder="Şifreniz" required name="sifre">
                      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <input type="hidden" name="kontrol">
                    <div class="form-group " style="margin-top: 40px;">
                        <button type="submit" class="form-control btn  submit px-3 wardeRenk">Giriş Yap</button>
                    </div>
                    
                  </form>
                  <p class="w-100 text-center"> Üye değil misin? Şimdi üye ol! <a style="color: blue;" href="uyeol.php"> Uye ol</a> </p>
                  
                  </div>
                    </div>
                </div>
            </div>
        </section>

            
            ';}else{
                require_once('vtlerim/vtlerim.php');
                $gelenusername=trim($_GET['username']);
                $gelensifre=md5(trim($_GET['sifre']));

                $sql="select * from uyeler WHERE ad='$gelenusername' and sifre='$gelensifre' ";
                $sonuc1= mysqli_query($baglanti,$sql);
                $satirsay=mysqli_num_rows($sonuc1);

                if ($satirsay>0)
		        {   
                    while($b = mysqli_fetch_array($sonuc1)) {
                           $_SESSION["kim"]=$b['uye_id'];	  
                       }    

                       echo '<div class="container">
                       <div class="alert alert-success mt-5">
                           
                           <strong>Başarılı bir şekilde giriş yaptınız. <br> </strong> Bekleyin Yönlendiriliyorsunuz.
                         </div>
                   </div>';
 		
                       echo yonlendir(2,"anasayfa.php"); 
                }
                else{
                    echo yonlendir(2,"index.php"); 
                    echo '
                       <div class="alert alert-danger mt-5">
                           <strong>Kullanıcı adınız kayıtlı değil veya yanlış giriş yaptınız <br> </strong> Lütfen tekrar deneyin. Bekleyin Yönlendiriliyorsunuz.
                         </div>
                   ';
                    mysql_close($baglanti);	
				    
                }
            }
            mysql_close($baglanti);	
      ?>
	

  <script src="js/js2/jquery.min.js"></script>
  <script src="js/js2/popper.js"></script>
  <script src="js/js2/bootstrap.min.js"></script>
  <script src="js/js2/main.js"></script>

	</body>
</html>

