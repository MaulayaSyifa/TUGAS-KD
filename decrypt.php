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
	
	<div class="container">
		<hr>
        <h4>Data Produk</h4>
		<hr>
        <div class="row">
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>TIMESTAMPS</th>
					<th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once 'config.php';

            // Query untuk mengambil data produk
            $query = "SELECT * FROM tb_file";
            $result = mysqli_query($conn, $query);

            // Periksa apakah query berhasil dieksekusi
            if ($result) {
                // Tampilkan data dalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['tgl_akses'] . "</td>";
					echo "<td><a class='btn btn-primary' href='file-detail.php?id=".$row['id']."'>Lihat Detail</a></td>";
                    echo "</tr>";
                    }
                } else {
                    echo "Query gagal dieksekusi: " . mysqli_error($koneksi);
            }

            // Tutup koneksi
            mysqli_close($conn);
            ?>
			</tbody>
        </table>
        </div>
    </div>
	
    <!-- Memuat Bootstrap JS dari MaxCDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</body>
</html>