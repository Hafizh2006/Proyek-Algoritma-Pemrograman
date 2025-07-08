<?php 
session_start();
if (!isset($_SESSION['loginAdmin'])){
    header("Location:index.php");
    exit();
}


$_SESSION = [];
session_unset();
session_destroy();

echo "<script>alert('Berhasil Logout');</script>";
header("Location:login.php");
exit();
?>
?>