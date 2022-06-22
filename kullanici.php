<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Sayfası</title>

    <link rel="icon" type="image/x-icon" href="images/letter-w.ico">

    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="css/styles4.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/sidebar.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>
<style>
    body{
        font-family: 'Montserrat', sans-serif !important;
    }
    i,a{
        text-decoration: none;
    }
    ::selection{
        background: transparent;
    }
    .bg-formulaRed {
        background-color: #0268dc;
    }

    ul li a:hover {
        color: black !important;
        cursor: pointer;

    }

    .warde {
        
        background-color: rgba(0, 98, 255, 0.7);
        font-size: 30px;
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 800;

    }
    .Wshadow{
        text-shadow: 2px 2px 8px #000;
    }
    .iconcolor{
        color: rgb(0, 110, 255);
        background:rgb(0, 74, 220) ;
    }
    body{
        background-color: #F7F6FB;
    }
</style>

<body id="body-pd">

<?php require_once('bilgiler/fonklar.php'); ?>

<?php
    $kim=$_SESSION["kim"];

    require_once('vtlerim/vtlerim.php');

    $kontrol=$_GET['kontrol'];

    if (!isset($kontrol))
    {
        
        if (isset($_SESSION["kim"]))
        {
            require_once('vtlerim/vtlerim.php');
            $sql="select * from uyeler WHERE uye_id='$kim'";
            $sonuc1= mysqli_query($baglanti,$sql);
                        
                while($b = mysqli_fetch_array($sonuc1)) {
                    $ad=$b['ad'];
                    $eposta=$b['eposta'];
                }
            echo"<header class='header' id='header' style='background:transparent'>
            <div class='header_toggle ' style='color: rgb(0, 94, 255);'> <i class='bx bx-menu' id='header-toggle'></i> </div>
            <div class='text-center '> <h2 >WARDE NFT</h2></div>
        </header>
        <div class='l-navbar iconcolor' id='nav-bar'>
            <nav class='nav' iconcolor>
                <div class='iconcolor'> <a href='#' class='nav_logo'> <i class='bx bxs-user nav_logo-icon'></i> <span class='nav_logo-name'>Warde Nft</span> </a>
                    <div class='nav_list'> 
                        <a href='kullanici.php' class='nav_link active'> <i class='bx bx-user nav_icon'></i> <span class='nav_name'>Kullanıcı İşlemleri</span> </a> 
                        <a href='nft_lerim.php' class='nav_link '> <i class='bx bx-grid-alt nav_icon'></i> <span class='nav_name'>My NFTs</span> </a> 
                        
                        <a href='anasayfa.php' class='nav_link'> <i class='bx bxs-home'></i> <span class='nav_name'>Anasayfa Dön</span> </a>
                        
                    </div>
                </div> 
                
                <a href='cikisyap.php' class='nav_link'> <i class='bx bx-log-out nav_icon'></i> <span class='nav_name'>Çıkış Yap</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class='height-100 bg-light'>
            <div style='margin-left: 25%; margin-top:4% ; width:50% ;' >
            <form action='kullanici.php' method='GET'>
                <div class='form-group mb-2' style='margin-top: 22%;'>
                    <h3 class='text-center' > Bilgilerimi Güncelle</h2>
                  <label class='mt-3  mb-2' for='kadi'>Kullanıcı Adı</label>
                  <input type='text' class='form-control' id='kadi' placeholder='Kullanıcı Adı' required value=$ad name='username'>
                </div>
                <div class='form-group mb-2'>
                  <label class=' mb-2' for='eposta'>Eposta</label>
                  <input type='email' class='form-control' id='eposta' placeholder='E-posta' required value=$eposta name='eposta'>
                </div>
                <div class='form-group mb-2'>
                    <label class=' mb-2' for='sifre1'>Şifre</label>
                    <input type='password' class='form-control' id='sifre1' placeholder='Sifre' required name='sifre1'> 
                  </div>
                  <input type='hidden' name='kontrol' value=1>
                  <div class='form-group mb-2'>
                    <label  class=' mb-2' for='sifre2'>Sifre Tekrar</label>
                    <input type='password' class='form-control' id='sifre2' placeholder='Sifre (Tekrar)' required name='sifre2'>
                  </div>
                <button type='submit' class='btn btn-primary mt-2'>Güncelle</button>
              </form>
            </div>
        </div>
            ";
        
        } else{
            echo'<div class="container">
            <div class="alert alert-danger  mt-5">
                <strong>Üzgünüm teknik bir arıza oluştu. Lütfen Yeniden Deneyiniz <br> </strong> Bekleyin Yönlendiriliyorsunuz.
              </div>
        </div>
            ';
             echo yonlendir(2,"index.php"); 
        }
    }else{
        $sifre1=$_GET['sifre1'];
        $sifre2=$_GET['sifre2'];
        $ad=$_GET['username'];
        $eposta=$_GET['eposta'];

        $ad=trim(htmlspecialchars(addslashes($ad)));
        $eposta=trim(htmlspecialchars($eposta));
        $sifre1=md5(trim(htmlspecialchars($sifre1)));
        
        require_once('vtlerim/vtlerim.php');

        $guncelle="UPDATE `uyeler` SET ad='$ad', eposta='$eposta', sifre='$sifre1' where uye_id='$kim'";
        $sonuc=mysqli_query($baglanti,$guncelle);

        if ($sonuc==0)
			{
			echo "Güncelleme işlemi yapılamadı :( Lütfen Yeniden Deneyiniz.";
			echo yonlendir(2,"kullanici.php"); 
			}
            else
            {
                echo '<div class="container">
                <div class="alert alert-success  mt-5">
                    <strong>Başarılı bir şekilde guncellendi. <br> </strong> Bekleyin Yönlendiriliyorsunuz.
                  </div>
            </div>';
           session_destroy();
           echo yonlendir(2,"index.php"); 
            }
            mysql_close($baglanti);
            
    }
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/navbar_scripts.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>