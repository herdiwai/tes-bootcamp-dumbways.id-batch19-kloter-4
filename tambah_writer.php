<?php 
include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "book_dumbways");

// ambil data dari tabel writer / query data writer
if ( isset($_POST["submit"])) {


	$penulis = $_POST["penulis"];
	$address = $_POST["address"];

	// query insert data
	$query = "INSERT INTO writer_tb VALUES ('', '$penulis','$address')";

	mysqli_query($conn, $query);

	// cek apakah data berhasil di tambahkan atau tidak
	if ( mysqli_affected_rows($conn) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan');
				document.location.href = '4.php';
			  </script> 
			";
	} else {
		echo "<script>
				alert('data gagal ditambahkan');
				document.location.href = '4.php';
			  </script> 
			";
		echo mysqli_error($conn);
	}
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Add Writer</title>
</head>
<body class="bg-dark">

<div class="container d-flex justify-content-center text-white">
	<div class="row">
		<form action="" method="POST" enctype="multipart/form-data">
		<h1 class="mt-4">Tambah Data Writer</h1>
			<br>

			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" name="penulis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Address</label>
				<textarea name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Tambah</button>
			<br><br><br><br><br><br>
		</form>
	</div>
</div>

	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="js/jquery-3.5.1.slim.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>

