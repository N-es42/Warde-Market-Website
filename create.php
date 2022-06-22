<?php if (!defined( "indexed")){ 
        require_once('bilgiler/fonklar.php');
        echo yonlendir(0,"index.php");
        exit; 
}  //indexed define edilmemişse çıkış yap.?>
        <div class="text-center mb-5 mt-2 ">
            <a class=""  href="#" style="color:black; text-decoration:none;"><h2 class="text-bold" style="font-weight: 800;">NFT Resmini Yükle</h2></a>
        </div>
    
    <div class="container">
    <div class="row">
    <div class="col-md-6 mb-5">
        <img class="rounded" src="images/clonex.png" alt="Image" class="" width="99%">
        <p class="mt-2 text-center text-muted"> CLONE X by ( <i>Takashi Murakami</i> )  </p>
    </div>
    <div class="col-md-6">
        <main class="login-form">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <?php if(isset($_GET['resimHata'])): ?>
                            <div class="alert alert-danger">
                                <?php echo $_GET['resimHata'] ?>
                            </div>
                        <?php endif;?>

                        <?php if(isset($_GET['success'])): ?>
                            <div class="alert alert-success">
                                Başarıyla eklendi.
                            </div>
                        <?php endif;?>
                        <div class="card mt-5">
                            <div class="card-header">Resim Yükle</div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-3 col-form-label text-md-right">Başlık</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="baslik" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-3 col-form-label text-md-right">Açıklama</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="aciklama" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-3 col-form-label text-md-right">Dosya</label>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="gorsel" accept="image/jpeg, image/png">
                                                <label class="custom-file-label" for="customFile">Seçiniz</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary w-75">
                                            Yükle
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
</div>