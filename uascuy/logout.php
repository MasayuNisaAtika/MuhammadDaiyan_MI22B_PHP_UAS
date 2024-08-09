<?php
     /**
     * NIM : 2257401055
     * NAMA : Muhammad Daiyan Illallah
     * KELAS MI22B
     */ 
    session_start();
    session_destroy();
    session_unset();

    header('location:login.php');
?>