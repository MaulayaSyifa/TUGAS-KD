<?php
session_start();
require_once 'config.php';

$username	= $_POST['user'];
$password	= $_POST['pass'];

$sql = "SELECT * FROM tb_user WHERE user = '$username' AND pass = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  $_SESSION['user'] = $username;
  header("Location: dashboard.php");
} else {
  echo "<div class='alert alert-danger'><strong>Sign-in gagal. Silakan coba lagi.</strong></div>";
}

mysqli_close($conn);
?>
