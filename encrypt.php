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
                    <a class="nav-link active" href="#">Enkripsi</a>
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
	
	<div class="container-fluid bg-cover" id="enkripsi" style="margin-top:0px;">
	
	<div class="container">
		<hr>
        <h2>Form Upload File</h2>
		<hr>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="gambar">Pilih File:</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar">
				<br>
				<label for="nama">Nama File</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
			
            <button type="submit" class="btn btn-success btn-sm" id="submit" name="submit" aria-hidden="true">Encrypt</button>
        </form>
		<hr>
    </div>
	
	<div class="container">
        <h2>Hasil Enkripsi</h2>
		<hr>
		
        <?php
				
				require_once 'config.php';
				
                $valid_array = array('jpg','jpeg','png','gif','bmp');
                if(isset($_POST['submit']) && $_FILES['gambar']['size']>0){
					
					$ext = @strtolower(end(@explode('.', $_FILES['gambar']['name'])));
					$nama = $_POST['nama'];

					if(in_array($ext, $valid_array)){

						move_uploaded_file($_FILES['gambar']['tmp_name'], 'image/'.$_FILES['gambar']['name']);
                    
						$enkripsi = base64_encode(file_get_contents('image/'.$_FILES['gambar']['name']));
						
						#sql query to insert into database
						$sql = "INSERT into tb_file (nama, cipher) VALUES ('$nama', '$enkripsi')";
 
						if(mysqli_query($conn,$sql)){
							echo "<div class='alert alert-success'><strong>File Sucessfully uploaded</strong></div>";
						} else{
							echo "Error";
						}
				?>
				
				
                <form method="post" action="get-txt.php">
                <textarea name="txt" class="form-control" rows="8" id="comment"><?php echo $enkripsi; ?></textarea><br>
				<div  style="float: right">
                <label class='alert alert-light'>Salin untuk digunakan saat dekripsi</label>
                <button type="submit" class="btn btn-success" href="get-txt.php">Download .txt</button>
				</div>
                </form>

                <?php 
						} else{

						echo "<div class='alert alert-danger'><strong>Maaf... file yang ada pilih bukan file gambar. Hanya file JPG, PNG, GIF, BMP atau PSD yang boleh diupload..!</strong></div>";

						}

				} ?>

	</div>
	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</body>
</html>