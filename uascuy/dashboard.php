<?php
 /**
     * NIM : 2257401055
     * NAMA : Muhammad Daiyan
     * KELAS MI22B
     */ 

   // Pastikan ini di baris paling atas
   include 'cek_session.php';
   include 'navigation.php';
   include 'koneksi.php';

// Query database
$data_users = mysqli_query($koneksi, "SELECT * FROM users");
$data_product = mysqli_query($koneksi, "SELECT * FROM products");
$data_categories = mysqli_query($koneksi, "SELECT * FROM categories");

// menghitung data barang
$jumlah_users = mysqli_num_rows($data_users);
$jumlah_product = mysqli_num_rows($data_product);
$jumlah_categories = mysqli_num_rows($data_categories);
   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #3589dd;
        }
        .navbar {
            margin-bottom: 30px;
        }
        .dashboard-container {
            margin-top: 30px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }
        .card-text {
            font-size: 1rem;
        }
    </style>
</head>
<body>

    <div class="container dashboard-container">
        <h1 class="text-center">Welcome to the Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Categories</h5>
                        <p class="card-text">Add, update, or delete product categories.</p>
                        <a href="category.php" class="btn btn-primary">Go to Categories</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Products</h5>
                        <p class="card-text">Add, update, or delete products.</p>
                        <a href="product.php" class="btn btn-primary">Go to Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Logout</h5>
                        <p class="card-text">End your session.</p>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>