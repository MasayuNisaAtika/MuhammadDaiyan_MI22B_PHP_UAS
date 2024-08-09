<?php 
    /**
     * NIM : 2257401055
     * NAMA : Muhammad Daiyan illallah
     * KELAS MI22B
     */ 
    $host       = "localhost";
    $user       = "root";
    $password   = "";
    $dbname     = "uas_php_mysql;" ;

    $koneksi    = mysqli_connect($host, $user, $password, $dbname);
    if (mysqli_connect_errno()) {
        die("Koneksi Gagal Karena : ". mysqli_connect_error());
    }
?>