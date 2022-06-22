<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Warde NFT </title>

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
        .hover:hover{
            color:black;
        }
        button:hover a{
            color:black !important;
        }
    </style>
</head>

<body id="page-top">
    
    <?php 
        require_once('bilgiler/fonklar.php');

        $kim=$_SESSION["kim"];

        if (isset($_SESSION["kim"]))
        {
            require_once('vtlerim/vtlerim.php');
            $sql="select * from uyeler WHERE uye_id='$kim'";
            $sonuc1= mysqli_query($baglanti,$sql);

            while($b = mysqli_fetch_array($sonuc1)) {
                $ad=$b['ad'];
            }

            echo"
            <nav class='navbar navbar-expand-lg bg-formulaRed text-uppercase fixed-top' id='mainNav'>
        <div class='container'>
            <a style='width: 70% !important;' class='navbar-brand' target='' href='anasayfa.php'><img width='40%' src='images/wardelogo.png' alt=''></a>
            <button class='navbar-toggler text-uppercase font-weight-bold bg-white text-red rounded' type='button'
                data-bs-toggle='collapse' data-bs-target='#navbarResponsive' aria-controls='navbarResponsive'
                aria-expanded='false' aria-label='Toggle navigation'>
                Menu
                <i class='fas fa-bars'></i>
            </button>
            <div class='collapse navbar-collapse' id='navbarResponsive'>
                <ul class='navbar-nav ms-auto'>
                    <li class='nav-item mx-0 mx-lg-4'><a class='nav-link py-3 px-0 px-lg-5 rounded tt'
                            href='explore.php'data-bs-placement='bottom' title='All NFTs'>Explore</a></li>
                    <li class='nav-item mx-0 mx-lg-4'><a class='nav-link py-3 px-0 px-lg-5 rounded tt'
                            href='create_nft.php'data-bs-placement='bottom' title='NFT resimini yükle'>Create</a></li>
                    <li class='nav-item mx-0 mx-lg-4'><a class='nav-link py-3 px-0 px-lg-5 rounded text-nowrap tt'
                            href='kullanici.php' data-bs-placement='bottom' title='Kullanıcı Profili'><i style='margin-right:5px' class='fa-solid fa-user'></i> $ad</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class='d-flex justify-content-center align-items-center big-banner container-fluid'>

        <div class='row'>
            <div class='col-12'>
                <div
                    class='justify-content-center display-4 text-white col-12 text-center animated fadeInLeft'>
                    <p style='font-weight: 800;' class='Wshadow'>EXPLORE NEW NFTs</p>
                    </div>
                <div class='d-flex justify-content-center hover'>
                <a class='' href='explore.php' style='text-decoration: none; color:white; width:60%'>
                <button type='button' class='btn p-3 bg-formulaRed rounded-pill btn-outline-light warde mt-3 w-100'>
                     DISCOVER 
                </button>
                </div></a>
            </div>
        </div>
    </div>

    <footer class='bg-black py-5 '>
        <div class='container text-white'>
            <div class='row'>
                <div class='col-md-3 mt-3'><img class='img-fluid' style='width: 50%;' alt=''></div>
                <div class='col-md-6 mt-3 text-center '>
                    <h2><b>DISCOVER WITH WARDE NFT</b></h2>
                </div>
                <div class='col-md-3 mt-3'></div>
            </div>
            <div class='row text-end mt-4'>
                <div>
                    <h5><b>Contact: eatalay666@gmail.com</b></h3>
                </div>
                <hr class='mt-2'>
            </div>

            <div class='row mt-3 text-center'>
                <div>
                    <ul class='list-inline float-left'>
                        <li class='list-inline-item mx-3'>
                            <a href='#'>
                                <span class='text-white'><i class='fab fa-instagram fa-3x'></i></span>
                            </a>
                        </li>
                        <li class='list-inline-item mx-3'>
                            <a href='#'>
                                <span class='text-white'><i class='fab fa-twitter fa-3x'></i></span>
                            </a>
                        </li>
                        <li class='list-inline-item mx-3'>
                            <a href='#'>
                                <span class='text-white'><i class='fab fa-tiktok fa-3x'></i></span>
                            </a>
                        </li>
                        <li class='list-inline-item mx-3'>
                            <a href='#'>
                                <span class='text-white'><i class='fab fa-youtube fa-3x'></i></span>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>


            <div class='row mt-2'>
                <div>

                    <p class='text-muted'><small> <i class='far fa-copyright'></i> <b>2021-2022 Tüm hakları
                                saklıdır. (Created by Warde Enes)</b></small></p>
                </div>

            </div>


        </div>
    </footer>";
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
    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/navbar_scripts.js"></script>


    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <script>
      const tooltips = document.querySelectorAll('.tt')
      tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
      })
    </script>
    
</body>

</html>