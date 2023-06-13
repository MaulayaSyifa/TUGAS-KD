<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: dashboard.php");
  exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Halaman Home</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Selamat datang, <?php echo $user; ?>!</h2>
    <a href="sign-out.php" class="btn btn-primary">Logout</a>
  </div>
</body>
</html>
