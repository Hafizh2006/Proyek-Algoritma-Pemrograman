<?php 

if (!isset($_SESSION['loginUser'])){
    header("Location: login.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
</head>
<body>
    <a href="lihatData.php"><button>Lihat Data</button></a>
    <a href=""><button></button></a>

</body>
</html>