<?php
 /**
     * NIM : 2257401055
     * NAMA : Muhammad Daiyan illallah
     * KELAS MI22B
     */ 
    
session_start();
if (!isset($_SESSION['users'])){
    $_SESSION['error'] = "Login Dulu Bro";
    header('location: login.php');
}

?>