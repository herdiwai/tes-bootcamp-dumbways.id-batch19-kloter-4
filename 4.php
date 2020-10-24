<?php 

include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "book_dumbways");

$result = mysqli_query($conn, "SELECT * FROM book_tb");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Test Dumbways Batch 19 Kloter 4</title>
</head>
<body class= "bg-dark">

<div class="container mt-4">
    <div class="row col-md">
        <a class="btn btn-success btn-sm mr-4" href="tambah_book.php" role="button">Add Book</a>
        <a class="btn btn-success btn-sm mr-4" href="tambah_category.php" role="button">Add Category</a>
        <a class="btn btn-success btn-sm mr-4" href="tambah_writer.php" role="button">Add Writer</a>
    </div>
</div>
    
<div class="container">
    <div class="row">
        <div class="col-md d-flex justify-content-start text-white mt-4">
            <h2>News Book</h2>
        </div>
    </div>
</div>
    
<div class="container">
    <div class="row">

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

        <div class="card mt-4 mr-4" style="width: 250px;">
            <img src="img/<?= $row["img"]; ?>" width="40" class="card-img-top" alt="mulan">
            <div class="card-body">
                <h5 class="card-title"><?= $row["name"]; ?></h5>
                <!-- <p class="card-text"><?= $row["publication_year"]; ?></p>
                <p class="card-text"></p> -->
                <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning btn-sm btn-block">Ubah</a>
                <a href="detail.php?category_id=<?= $row["category_id"]; ?>" class="btn btn-primary btn-sm btn-block"
                >Detail</a>
                <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm btn-block" onclick="return confirm('yakin?');">Hapus</a>
            </div>
        </div>

    <?php endwhile; ?>

    </div>
</div>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>