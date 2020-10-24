<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "book_dumbways");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$name = htmlspecialchars($data["name"]);
	$category_id = htmlspecialchars($data["category_id"]);
	$writer_id = htmlspecialchars($data["writer_id"]);
	$publication_year = htmlspecialchars($data["publication_year"]);
	$imageLama = htmlspecialchars($data["imageLama"]);

	// cek apakah user pilih image baru atau tidak
	if ( $_FILES['img']['error'] === 4 ) {
		$img = $imageLama;	
	} else {
		$img = upload();
	}

	$query = "UPDATE book_tb SET
				name = '$name', 
				category_id = '$category_id',
				writer_id = '$writer_id',
				publication_year = '$publication_year',
				img = '$img'
				WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function upload() {

$namaFile = $_FILES['img']['name'];
$ukuranFile = $_FILES['img']['size'];
$error = $_FILES['img']['error'];
$tmpName = $_FILES['img']['tmp_name'];

// cek apakah tidak ada gambar yang diupload
if ( $error === 4) {
    
    echo "
        <script>
            alert('pilih gambar terlebih dahulu');
        </script> ";
    return false;
}

// cek apakah yang diupload adalah gambar
$ekstensiImageValid = ['jpg', 'jpeg', 'png'];
$ekstensiImage = explode('.', $namaFile);
$ekstensiImage = strtolower(end($ekstensiImage));

if ( !in_array($ekstensiImage, $ekstensiImageValid)) {

    echo "<script>
            alert('yang anda upload bukan gambar');
            document.location.href = '4.php';
          </script>";
    return false;
}

// cek jika ukurannya terlalu besar
if ( $ukuranFile > 1000000) {
    echo "<script>
            alert('yang anda upload bukan gambar');
            document.location.href = '4.php';
          </script>";
    return false;
}

// jika lolos pengecekan
move_uploaded_file($tmpName, 'img/'. $namaFile);

return $namaFile;

}

function hapus($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM book_tb WHERE id = $id");

	return mysqli_affected_rows($conn);
}