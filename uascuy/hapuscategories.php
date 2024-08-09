<?php 
    /**
     * NIM   : 2257401055
     * NAMA  : Muhammad Daiyan Illallah
     * KELAS : MI22B
     */ 
    $id = $_GET['id'];

    include 'koneksi.php';

    $query = "SELECT nama_kategori FROM tbl_kategori WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    // Cek apakah query berhasil
    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    } 
    else {
        // Menampilkan nama kategori jika query berhasil
        $row = mysqli_fetch_assoc($result);
        echo "Nama Kategori: " . $row['nama_kategori'];
    }
?>
