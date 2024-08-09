<?php
/**
 * NIM : 2257401055
 * NAMA : Muhammad Daiyan Illallah
 * KELAS MI22B
 */
 session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        .login-container {
            background-color: rgb(200, 200, 200);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 login-container">
            <h2 class="text-center">Login</h2>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
            </form>

            <p id="error">
                    <?php 
                    if (isset($_SESSION['error'])){
                        echo "<span style='color:red'>".$_SESSION['error']."</label>";
                        unset($_SESSION['error']);
                    }
                    ?>
                </p>

    <?php 
      if(isset($_POST["login"])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT username, password FROM users WHERE username = '$username' AND password = sha1('$password');";

        $koneksi = mysqli_connect("localhost", "root", "", "uas_php_mysql;");
        $result = mysqli_query($koneksi, $sql);

        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $_SESSION['users'] = $username;
            header('location: dashboard.php');
        } else {
            $_SESSION['error'] = "Username / Password tidak sesuai";
            header('location: login.php');
        }
    }
    ?>
        </div>
    </div>
</div>
</body>
</html>
