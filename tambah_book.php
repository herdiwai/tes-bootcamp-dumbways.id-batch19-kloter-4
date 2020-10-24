<?php 
include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "book_dumbways");

// ambil data dari tabel dealer / query data dealer
if ( isset($_POST["submit"])) {


	$name = $_POST["name"];
	$category_id = $_POST["category_id"];
	$writer_id = $_POST["writer_id"];
	$publication_year = $_POST["publication_year"];

	$img = upload();
	if (!$img) {
		return false;
	}


	// query insert data
	$query = "INSERT INTO book_tb VALUES ('', '$name', '$category_id', '$writer_id', '$publication_year', '$img')";

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

    <title>Add Book</title>
</head>
<body class="bg-dark">

<div class="container d-flex justify-content-center text-white">
	<div class="row">
		<form action="" method="POST" enctype="multipart/form-data">
		<h1 class="mt-4">Tambah Data Produk</h1>
			<br>

			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>

			<div class="form-group">
			    <label for="exampleFormControlSelect1">Category</label>
			    <select class="form-control" name="category_id" id="exampleFormControlSelect1">
				    <option value="">Pilih</option>
				    <!-- mengambil data table brand -->
				    <?php 
					    $sql = mysqli_query($conn, "SELECT * FROM category_tb") or die (mysqli_error($conn));

					    while ($data = mysqli_fetch_assoc($sql)) {
					    	echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
					    }
				    ?>
		    	</select>
			</div>

			<div class="form-group">
			    <label for="exampleFormControlSelect1">Writer</label>
			    <select class="form-control" name="writer_id" id="exampleFormControlSelect1">
				    <option value="">Pilih</option>
				    <!-- mengambil data table brand -->
				    <?php 
					    $sql = mysqli_query($conn, "SELECT * FROM writer_tb") or die (mysqli_error($conn));

					    while ($data = mysqli_fetch_assoc($sql)) {
					    	echo '<option value="'.$data['id'].'">'.$data['penulis'].'</option>';
					    }
				    ?>
		    	</select>
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">Publication Year</label>
				<input type="text" name="publication_year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			
			<div class="form-group">
			    <label for="exampleFormControlFile1">Upload Image</label>
			    <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
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

