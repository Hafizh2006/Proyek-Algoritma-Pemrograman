<?php 
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
    <title>Login Admin</title>
</head>
<body>
    <form action="../Algoritma/algoritmaLogin.php" method="POST">
        <label for="username">Username :</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="password">Password :</label>
        <input type="password" id="password" name="password">
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>