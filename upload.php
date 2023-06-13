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
    <title>Dashboard</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS style code for the dashboard layout */
        body {
            padding-top: 56px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100%;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="dashboard.php">
			<img src="assets/img/encripted.png" width="30" height="30" class="d-inline-block align-top" alt="" style="margin-right: 10px"> 
			Dashboard
		</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="encrypt.php">Enkripsi</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link active" href="#">Dekripsi</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="sign-out.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

<?php
require_once 'config.php';

// Periksa apakah parameter ID ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil detail produk berdasarkan ID
    $query = "SELECT * FROM tb_file WHERE id = " . $id;
    $result = mysqli_query($conn, $query);

    // Periksa apakah produk ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Tampilkan detail produk
        echo "ID: " . $row['id'] . "<br>";
        echo "Nama Produk: " . $row['nama'] . "<br>";
        echo "Harga: " . $row['tgl_akses'] . "<br>";
        // Tambahkan informasi detail lainnya sesuai kebutuhan
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "Parameter ID tidak ditemukan.";
}

// Tutup koneksi
mysqli_close($conn);
?>

<!-- Memuat Bootstrap JS dari MaxCDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</body>
</html>