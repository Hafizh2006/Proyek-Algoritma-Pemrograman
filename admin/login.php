<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
session_start();


if (isset($_SESSION['loginAdmin'])){
    header("Location: index.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN ADMIN</title>
    <link rel="stylesheet" href="../asset/admin/login.css">
</head>
<body>
   <div class="container">
        <div class="login-box">
            <div class="form">
                <h1>LOGIN ADMIN</h1>
                <form method="POST" id = "formdaftar" action="../Algoritma/algoritmaLogin.php">
                    <input type="text" placeholder="Username" name="username" id = "username"><br>
                    <span class="error" id="errorNama"></span><br>

                    <input type="password" placeholder="Password" name="password" id = "password"><br>
                    <span class="error" id="errorPassword"></span><br>

                    <button type = "submit" name = "daftar" class = "tombol">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>