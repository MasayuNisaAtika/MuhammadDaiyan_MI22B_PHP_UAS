<?php
/**
 * NIM : 2257401055
 * NAMA : Muhammad Daiyan Illallah
 * KELAS MI22B
 */ 
include 'cek_session.php';
include 'navigation.php';
include 'koneksi.php';

// Mengambil data kategori dari database
$sql = "SELECT id, nama_categories FROM categories";
$query = mysqli_query($koneksi, $sql); 

// Memproses penambahan kategori baru
if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $insert_sql = "INSERT INTO categories (nama_categories) VALUES ('$name')";
    if (mysqli_query($koneksi, $insert_sql)) {
        echo "<script>alert('Category added successfully'); window.location.href='category.php';</script>";
    } else {
        echo "<script>alert('Failed to add category');</script>";
    }
}

// Memproses penghapusan kategori
if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['delete']);
    $delete_sql = "DELETE FROM categories WHERE id = $id";
    if (mysqli_query($koneksi, $delete_sql)) {
        echo "<script>alert('Category deleted successfully'); window.location.href='category.php';</script>";
    } else {
        echo "<script>alert('Failed to delete category');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #3589dd;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-style: initial;
        }
        .category-container {
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
    </style>
</head>
<body>
<div class="container category-container">
    <h1 class="text-center">Manage Categories</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Add New Category</h5>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary btn-block">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center mt-4">Category List</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($query)){ ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_categories']; ?></td>
                        <td>
                            <a href="category.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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
