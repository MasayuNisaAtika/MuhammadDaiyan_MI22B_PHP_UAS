<?php 
    /**
     * NIM   : 2257401055
     * NAMA  : Muhammad Daiyan illallah
     * KELAS :MI22B
     */ 
    session_start();
    $id = $_GET['id'];

    include 'koneksi.php';

    $sql = "DELETE FROM tbl_produk WHERE tbl_produk. kode_produk = '$id';";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $_SESSION['success'] = "Barang Berhasil dihapus";
        header('location: produk.php');

    } else {
        $_SESSION['error'] = "Barang Gagal dihapus";
        header('location: produk.php');
    }
?>