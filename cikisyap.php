<?php
    session_start();
    session_destroy();
    require_once('bilgiler/fonklar.php');
    echo yonlendir(0,'index.php');
?>