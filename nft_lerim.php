<?php
    error_reporting(0);
    session_start();
    require 'config.php';
    if(isset($_SESSION["kim"])){
        $kim=$_SESSION["kim"];
        $nftler = DB::get("SELECT * FROM nft_images WHERE resim_sahip_id=$kim ORDER BY resim_id ");
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="images/letter-w.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>My NFTs</title>
    <style>
        body{
            font-family:'Montserrat', sans-serif !important;;
        }
        .baslik{
            background-color: blue;
            width: 100%;
            height: 80px;
            color: white;
        }
        .basliktext{
            font-size: 2rem;
            font-weight: bolder;
            white-space: nowrap;
        }
        @media only screen and (max-width: 450px) {
        .baslik {
            height:120px;
        }
        .kay{
            margin-top: 60px !important;
        }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body class="bg-light">
      <?php 
      if(isset($_SESSION["kim"])){ 
            require_once('vtlerim/vtlerim.php');
            $sql="select * from uyeler WHERE uye_id='$kim'";
            $sonuc1= mysqli_query($baglanti,$sql);

            while($b = mysqli_fetch_array($sonuc1)) {
                $ad=$b['ad'];
            }
          echo'
        <nav class="baslik">
            <div class="d-flex justify-content-between">
                <div class="d-inline-flex mt-4 ml-2 text-white kay">'.strtoupper($ad).'</div>
                <div style="padding-left: 6%;" class="d-inline-flex mt-3 text-white basliktext">My NFTs</div>
                <div class="d-inline-flex mt-4 mr-2 text-white kay"> <a class"ja" style="color:white;" href="anasayfa.php">Anasayfaya Dön</a></div>
            </div>
            
        </nav>';
    }
    ?>
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($nftler as $k => $v) : ?>
                <?php
                    $resim = PATH."nfts/$v->resim_ad";
                ?>

                <div class="col-md-4">
                    <div class="card">
                    <img class="card-img-top" src="<?php echo $resim ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $v->resim_baslik ?></h5>
                        <p class="card-text"><?php echo $v->resim_aciklama ?></p>
                        <a href="sat.php?sat=<?php echo $v->resim_id?>" class="btn btn-primary">SAT / FİYAT GÜNCELLE</a>
                        <button rel="<?php echo $v->resim_id ?>" type="button" class="btn btn-danger float-right  delete_link" data-toggle="modal" data-target="#exampleModalCenter">SİL</button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Emin Misiniz?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"> Resiminizi silmek istediğinize emin misiniz? Silerseniz birdaha geri getiremeyeceksiniz.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                                    <a href="" class="btn btn-danger modal_delete_link">Sil</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){
            
            $(".delete_link").on('click', function(){

                var id = $(this).attr("rel");

                var delete_url = "delete.php?delete="+ id +" ";

                $(".modal_delete_link").attr("href",delete_url);


            });

        });
    </script>

</body>
</html>