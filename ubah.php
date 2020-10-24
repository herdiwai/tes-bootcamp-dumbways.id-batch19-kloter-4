<?php 

include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "book_dumbways");

$id = $_GET["id"];
$sql = query("SELECT * FROM book_tb WHERE id = $id")[0];
// ambil data dari tabel book_tb / query data book_tb
if ( isset($_POST["submit"])) {

	if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = '4.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = '4.php';
			</script>
		";
	}

}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Ubah Book</title>
</head>
<body class="bg-dark">

<div class="container d-flex justify-content-center text-white">
	<div class="row">
		<form action="" method="POST" enctype="multipart/form-data">
		<h1 class="mt-4">Ubah Data Book</h1>
			<br>

            <input type="hidden" name="id" value="<?= $sql["id"]; ?>">
			<input type="hidden" name="imageLama" value="<?= $sql["img"]; ?>">

            <div class="form-group">
			    <label for="exampleFormControlFile1">Upload Image</label><br>
                <img src="img/<?= $sql['img']; ?>" width="125"><br><br>
			    <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
			</div>

            <div class="form-group">
				<label for="exampleInputEmail1">Publication Year</label>
				<input type="text" name="publication_year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $sql["publication_year"]; ?>">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $sql["name"]; ?>">
			</div>

			<div class="form-group">
			    <label for="exampleFormControlSelect1">Category</label>
			    <select class="form-control" name="category_id" id="exampleFormControlSelect1">
				    <option value="">Pilih</option>
				    <!-- mengambil data table category_tb -->
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
				    <!-- mengambil data table writer_tb -->
				    <?php 
					    $sql = mysqli_query($conn, "SELECT * FROM writer_tb") or die (mysqli_error($conn));

					    while ($data = mysqli_fetch_assoc($sql)) {
					    	echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
					    }
				    ?>
		    	</select>
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

