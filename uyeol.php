<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="icon" type="image/x-icon" href="images/letter-w.ico">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Uye Ol</title>
  </head>
    <style>
        body{
          font-family: 'Montserrat', sans-serif;
        }
        .wardeRenk{
          background-color: #0381ff;
          color: white;
        }

    </style>

  <body>
    <?php require_once('bilgiler/fonklar.php');?>
    <?php $kontrol=$_GET['kontrol'];
        if (!isset($kontrol))
        {
        echo '  <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img src="images/bored.png" alt="Image" class="img-fluid">
              <p class="mt-2 text-center">Bored Ape Yatch Club(#8585)</p>
            </div>
            <div class="col-md-6 contents">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="mb-4">
                  <p style="font-weight: bold; color: #000; font-size:35px ;">Uye Ol</p>
                  <p class="mb-4"><span class="auto-input"></span></p>
                </div>
                <form action="uyeol.php" method="GET">
                  <div class="form-group first mb-1">
                    <label for="username">Kullanıcı Adınız</label>
                    <input type="text" class="form-control" id="username" name="username" required>
    
                  </div>
                  <div class="form-group mb-1">
                    <label for="eposta">E-posta</label>
                    <input type="email" class="form-control" id="eposta" name="eposta" required>
    
                  </div>
                  <input type="hidden" name="kontrol" value=1>
                  <div class="form-group  mb-1">
                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" id="password" name="sifre1" required>
                    
                  </div>
                  <div class="form-group last mb-4">
                    <label for="password2">Şifre (Tekrar)</label>
                    <input type="password" class="form-control" id="password2" name="sifre2" required>
                    
                  </div>
                  
                  <input type="submit" value="Uye Ol" class="btn btn-block wardeRenk">
    
                  <span class="d-block text-left my-4 text-muted">Zaten hesabınız var mı? <a href="index.php"> Giriş Yap</a></span>
                  
                </form>
                </div>
              </div>
              
            </div>
            
          </div>
        </div>
      </div>';
        }else{
            $sifre1=$_GET['sifre1'];
            $sifre2=$_GET['sifre2'];
            $username=$_GET['username'];     
            $eposta=$_GET['eposta'];
            if ($sifre1==$sifre2 and strlen($sifre1)>=3){
                require_once('vtlerim/vtlerim.php');
                
                $sql="select * from uyeler WHERE eposta='$eposta'";
                $sonuc1= mysqli_query($baglanti,$sql);
		            $satirsay=mysqli_num_rows($sonuc1);

                if ($satirsay>0)
                {
                echo "Bu eposta adresi ($eposta) daha önce kaydedilmiş. Şifremi Unuttumu kullanabilirsiniz.";
                echo yonlendir(1,"uyeol.php");
                }else{
                    $username=trim(htmlspecialchars($username));	
                    $eposta=trim(htmlspecialchars($eposta));
                    $sifre1=md5(trim(htmlspecialchars($sifre1)));
                    $uyetarih=date("d/m/y");

                    $sqlekle="INSERT INTO uyeler( ad, eposta, sifre, uyetarih,uye_tur) 
		                      VALUES ('$username','$eposta','$sifre1','$uyetarih','2')";

                    $sonuc=mysqli_query($baglanti,$sqlekle);

                    $sql="select * from uyeler WHERE ad='$username' and sifre='$sifre1' ";
                    $sonuc1= mysqli_query($baglanti,$sql);
                    while($b = mysqli_fetch_array($sonuc1)) {
                        $cuzdanid=$b['uye_id'];	  
                      } 
                    $sqlcuzdan="INSERT INTO cuzdan(uye_id, bakiye) VALUES ('$cuzdanid','5000')";
                    mysqli_query($baglanti,$sqlcuzdan);
                    
                    if ($sonuc==0)
                        {
                        echo "Kayıt işlemi yapılamadı :( Lütfen Yeniden Deneyiniz.";
                        }
                    else
                    {
                    echo '<div class="container">
                    <div class="alert alert-success alert-dismissible mt-5">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Üyelik işleminiz başarılı bir şekilde yapılmıştır. Lütfen giriş yapınız. <br> </strong> Bekleyin Yönlendiriliyorsunuz.
                      </div>
                </div>';
                    echo yonlendir(2,"index.php"); 
                    
                    }
                }
                mysql_close($baglanti);
        }
        else 
	    {
            echo"
            <div class='content'>
            <div class=\"container\">
            <div class=\"alert alert-danger alert-dismissible\">
                <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                <strong>Şifreler Uyuşmadı</strong> Lütfen tekrar deneyiniz.
              </div>
            </div>
        <div class='container'>
          <div class='row'>
            <div class='col-md-6'>
              <img src='images/bored.png' alt='Image' class='img-fluid'>
              <p class='mt-2 text-center'>Bored Ape Yatch Club(#8585)</p>
            </div>
            <div class='col-md-6 contents'>
              <div class='row justify-content-center'>
                <div class='col-md-8'>
                  <div class='mb-4'>
                  <p style='font-weight: bold; color: #000; font-size:35px ;'>Uye Ol</p>
                  <p class='mb-4'><span class='auto-input'></span></p>
                </div>
                <form action='uyeol.php' method='GET'>
                  <div class='form-group first mb-1'>
                    <label for='username'>Kullanıcı Adınız</label>
                    <input type='text' class='form-control' id='username' name='username' required value=$username>
    
                  </div>
                  <div class='form-group mb-1'>
                    <label for='eposta'>E-posta</label>
                    <input type='email' class='form-control' id='eposta' name='eposta' required value=$eposta>
    
                  </div>
                  <div class='form-group  mb-1'>
                    <label for='password'>Şifre</label>
                    <input type='password' class='form-control' id='password' name='sifre1' required>
                    
                  </div>
                  <input type='hidden' name='kontrol' value=1>
                  <div class='form-group last mb-4'>
                    <label for='password2'>Şifre (Tekrar)</label>
                    <input type='password' class='form-control' id='password2' name='sifre2' required>
                    
                  </div>
                  
                  <input type='submit' value='Uye Ol' class='btn btn-block wardeRenk'>
    
                  <span class='d-block text-left my-4 text-muted'>Zaten hesabınız var mı? <a href='index.php'> Giriş Yap</a></span>
                  
                </form>
                </div>
              </div>
              
            </div>
            
          </div>
        </div>
      </div>";
        }
    }

    ?>
  

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
      var typed = new Typed(".auto-input",{
        strings: ["Warde NFT ile en yeni NFT'lere sahip ol veya sergile."],
        typeSpeed:50,
        backSpeed:100,
        loop:true
      })
    </script>
  </body>
</html>