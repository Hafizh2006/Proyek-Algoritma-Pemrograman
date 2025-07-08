<?php 
session_start();


if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin') {
    echo "<script>alert('Berhasil login');</script>";
    $_SESSION['loginAdmin'] = true;
    header("Location:../admin/index.php");
    exit();
} else {
    echo "<script>alert('Username atau password salah')</script>";
    header("Location:../admin/login.php");
    exit();
}

?>
