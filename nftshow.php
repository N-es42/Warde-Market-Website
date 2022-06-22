<?php
    error_reporting(0);
    session_start();
    require 'config.php';
    if(isset($_SESSION["kim"])){
        $kim=$_SESSION["kim"];
        $resim_id=$_GET["show"];
        $nftler = DB::get("SELECT nft_images.resim_id, resim_ad, resim_baslik, resim_aciklama, resim_sahip_id, fiyat FROM nft_images INNER JOIN satilik ON nft_images.resim_id=satilik.resim_id WHERE nft_images.resim_id=$resim_id; ");
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
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="images/letter-w.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warde NFT Explore</title>

    <link rel="icon" type="image/x-icon" href="images/letter-w.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="css/styles3.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/stil.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
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
           text-shadow: 2px 2px 10px #000;
       }
   </style>
    <title>Hello, world!</title>
  </head>
  <body class="bg-light">
    <?php 
        require_once('vtlerim/vtlerim.php');
            $sql="select * from uyeler WHERE uye_id='$kim'";
            $sonuc1= mysqli_query($baglanti,$sql);

            while($b = mysqli_fetch_array($sonuc1)) {
                $ad=$b['ad'];
                
            }
    ?>
    <?php if($_SESSION["kim"]):?>
    <nav class='navbar navbar-expand-lg bg-formulaRed text-uppercase fixed-top' id='mainNav'>
        <div class='container'>
            <a class='navbar-brand' target='' href='anasayfa.php'><img width='90%' src='images/wardelogo.png' alt=''></a>
            <button class='navbar-toggler text-uppercase font-weight-bold bg-white text-red rounded' type='button'
                data-bs-toggle='collapse' data-bs-target='#navbarResponsive' aria-controls='navbarResponsive'
                aria-expanded='false' aria-label='Toggle navigation'>
                Menu
                <i class='fas fa-bars'></i>
            </button>
            <div class='collapse navbar-collapse' id='navbarResponsive'>
                <ul class='navbar-nav ms-auto'>
                    <li class='nav-item mx-0 mx-lg-4'><a class='nav-link py-3 px-0 px-lg-5 rounded tt'
                            href='explore.php' data-bs-placement='bottom' title='All NFTs'>Explore</a></li>
                    <li class='nav-item mx-0 mx-lg-4'><a class='nav-link py-3 px-0 px-lg-5 rounded tt'
                            href='create_nft.php'data-bs-placement='bottom' title='NFT resimini yükle'>Create</a></li>
                    <li class='nav-item mx-0 mx-lg-4'><a class='nav-link py-3 px-0 px-lg-5 rounded text-nowrap tt'
                            href='kullanici.php' data-bs-placement='bottom' title='Kullanıcı Profili'><i style='margin-right:5px' class='fa-solid fa-user'></i> <?php echo $ad;?></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php endif;?>
    <?php foreach ($nftler as $k => $v) : ?>
                <?php
                    $resim = PATH."nfts/$v->resim_ad";
                ?>
                <div class="container" style="margin-top: 150px;">
                
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3">
                            <img class="rounded"src="<?php echo $resim ?>" alt="" width="90%">
                        </div>
                        <div class="col-md-6 text-center">
                            <h1 class="mt-5"> <?php echo $v->resim_baslik ?></h1>
                            <hr>
                            <h4 class="mt-5 " style="text-align:justify;"><?php echo $v->resim_aciklama ?></h4>
                            
                            <h3 class="mt-5">Price: <?php echo $v->fiyat ?></h3>
                            
                            <a style="font-family: 'Montserrat', sans-serif !important;" href="buy.php?buyid=<?php echo $v->resim_id ?>"class="mt-5 btn btn-primary w-50">BUY</a>
                        </div>
                    </div>
                </div>

    <?php endforeach; ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/navbar_scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      const tooltips = document.querySelectorAll('.tt')
      tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
      })
    </script>
  </body>
</html>