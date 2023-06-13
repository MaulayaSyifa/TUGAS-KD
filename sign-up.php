<?php
session_start();
require_once 'config.php';

$username	= $_POST['user'];
$password	= $_POST['pass'];

$sql = "INSERT INTO tb_user (user, pass) VALUES ('$username', '$password')";

if (mysqli_query($conn, $sql)) {
  $_SESSION['user'] = $username;
  header("Location: index.html");
} else {
  echo "<div class='alert alert-danger'><strong>Sign-up gagal. Silakan coba lagi.</strong></div>";
}

mysqli_close($conn);
?>
