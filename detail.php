<?php 

include "function.php";

$category_id= $_GET["category_id"];
$book= query("SELECT * FROM book_tb JOIN category_tb ON book_tb.category_id = category_tb.id LEFT JOIN writer_tb ON book_tb.writer_id = writer_tb.id WHERE category_id = $category_id")[0];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Detail Book</title>
</head>
<body class="bg-dark">
    <div class="container mt-4 text-white">
        <div class="row col-md-4">
            <img src="img/<?= $book['img']; ?>" width="400" alt="Responsive image" class="img-fluid">
            <h3 class="text-warning">Category :<?= $book["name"]; ?></h3>
            <p class="ml-2 font-italic font-weight-bold text-lowercase">Writer By : <?= $book['penulis']; ?> </p>
            <!-- <p class="font-italic font-weight-bold text-lowercase">Email</p> -->
            <!-- <p class="">Deskripsi : </p> -->
            <p class="font-italic text-lowercase"><br>Publish at : <?= $book['publication_year']; ?></p>
            <h2 class="ml-4"></h2>
        </div>
    </div>


      <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="js/jquery-3.5.1.slim.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>  