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
        <a class="navbar-brand" href="#">
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
                    <a class="nav-link" href="decrypt.php">Dekripsi</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="sign-out.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
	
	<div class="container-fluid bg-cover" id="home" style="margin-top:0px;">
		<div class="page-header">
		<hr>
		<h5>Selamat datang, <?php echo $user; ?></h5>
		<hr>
        <h1><b>ENKRIPSI GAMBAR BASE64</b></h1>
		<hr>
		</div>
		<p>Menggunakan Algoritma Base64</p> 
		<a class="btn btn-success lg btn-lg" href="encrypt.php">Mulai Enkripsi</a>
    </div>
	
	<div id="bantuan" class="container-fluid bg-1" style="margin-top:0px;">
		<div class="row">
			<div class="col-md-12">
				<br>
				<h3>Petunjuk Penggunaan</h3>
				<hr>
				<p>Format file yang didukung untuk dienkripsi adalah sebagai betikut:</p>
			<div class="col-md-6">
				<li>.jpg</li>
				<li>.jpeg</li>
				<li>.png</li>
			</div>
				<br>
				<a class="btn btn-outline-info btn-sm" href="#demoEn" data-toggle="collapse" style="margin-right: 10px">Enkripsi<span aria-hidden="true"></span></a>
				<a class="btn btn-outline-info btn-sm" href="#demoDe" data-toggle="collapse">Dekripsi<span aria-hidden="true"></span></a>
				<br><br>
			<div id="demoEn" class="collapse">
				<div class="card card-body">
				ENKRIPSI
				<li>Setelah berada di halaman enkripsi lalu pada form pilih gambar, pilih gambar yang akan di enkripsi.</li>
				<li>selanjutnya klik tombol enkripsi maka akan muncul hasil enkripsi disamping berupa kumpulan karakter.</li>
				<li>salin / unduh semua karakter tersebut untuk digunakan saat mendekripsi atau mengembalikan menjadi gambar kembali.</li>
				</div>
			</div>
			<br>
			<div id="demoDe" class="collapse">
				<div class="card card-body">
				DEKRIPSI
				<li>Setelah berada di halaman dekripsi lalu pada form plaintext, masukan teks / karakter untuk di dekripsi.</li>
				<li>selanjutnya klik tombol dekripsi maka akan muncul hasil dekripsi dibawah berupa gambar.</li>
				<li>untuk menyimpan sebagai gambar kembali pilih save image pada brower yang digunakan.</li>
				</div>
			</div>

    <!-- JavaScript -->
    <script>
		$(document).ready(function(){
			// Add smooth scrolling to all links in navbar + footer link
			$(".navbar a, footer a[href='#myPage']").on('click', function(event) {

			// Make sure this.hash has a value before overriding default behavior
			if (this.hash !== "") {

				// Prevent default anchor click behavior
				event.preventDefault();

				// Store hash
				var hash = this.hash;

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
				$('html, body').animate({
					scrollTop: $(hash).offset().top
					}, 900, function(){

				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
					});
				} // End if 
			});
		});
    </script>
	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</body>
</html>