<?php
 /**
     * NIM : 2257401055
     * NAMA : Muhammad Daiyan Illallah
     * KELAS MI22B
     */ 
    
     include 'cek_session.php';
    include 'navigation.php';
    include 'koneksi.php';

    $sql = "SELECT kode_produk, nama_produk, kategori, deskripsi, gambar FROM tbl_produk";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

    
    if ($op == 'edit') {
        $id         = $_GET['id'];
        $sql       = "select * from products where kode_produk = '$id'";
        $q1         = mysqli_query($koneksi, $sql);
        $r1         = mysqli_fetch_array($q1);
        $id        = $r1['kode_produk'];
        $nama       = $r1['nama_produk'];
        $kategori   = $r1['kategori'];
        $deskripsi  = $r1['deskripsi'];
        $gambar     = $r1['gambar'];
    
        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #3589dd;
            font-style: initial;
            
        }
        .product-container {
            margin-top: 30px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);
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
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .table {
            margin-top: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container product-container">
    <h1 class="text-center">Manage Products</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Add New Product</h5>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" required>

                                <!-- Populate categories here -->
                                <?php while($row = mysqli_fetch_assoc($categories)){ ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary btn-block">Add Product</button>
                        <br><br>
                    </form>

                    <p>
                    <?php
                    if(isset($_SESSION['error'])) {
                    echo   "<span style='color:red'>" .  $_SESSION['error'] . "</span>";
                    unset($_SESSION['error']);
                    }
                    
                    if(isset($_SESSION['success'])) {
                        echo   "<span style='color:green'>" .  $_SESSION['success'] . "</span>";
                        unset($_SESSION['success']);
                        }
                   ?>
                </p>

                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center mt-4">Product List</h2>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>kode_produk</th>
                        <th>nama_produk</th>
                        <th>kategori</th>
                        <th>deskripsi</th>
                        <th>gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $row['kode_produk']; ?></td>
                        <td><?php echo $row['nam_produk']; ?></td>
                        <td><?php echo $row['kategori']; ?></td>
                        <td><?php echo $row['deskripsi']; ?></td>
                        <td><?php echo $row['gambar']; ?></td>
                        <td><img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_produk']; ?>" width="50"></td>
                        <td>
                        <a href="edit.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>    
                        <a href="hapus_produk.php?id=<?php echo $row['kode_produk']; ?>" onclick="return confirm('Apakah yakin akan di hapus?')">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>