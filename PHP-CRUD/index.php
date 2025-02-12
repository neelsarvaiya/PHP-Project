<?php require('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product CURD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", serif;
        }
    </style>
</head>

<body class="bg-light text-light">
    <?php
    $sql = "SELECT * FROM `products`";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-5 bg-dark p-3 rounded my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Products</h2>
            <a href="add.php"><button class="btn btn-success"><i class="bi bi-plus-lg"></i> Add Product</button></a>
        </div>
    </div>

    <div class="container d-flex flex-wrap mt-3">
        <?php
        if (mysqli_num_rows($result) > 0) {

            $i = 1;
            while ($data = mysqli_fetch_assoc($result)) {
        ?>

                <div class="card mx-3 mb-4" style="width:400px">
                    <img class="card-img-top" src="upload/<?= $data['image'] ?>" alt="Card image" style="width:100%; height:300px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <h4 class="card-title"><?= $data['name'] ?></h4>
                            <h5 class="card-text">₹<?= $data['price'] ?></h5>
                        </div>
                        <p class="card-text mt-3"><?= $data['description'] ?></p>
                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <a href="edit.php?id=<?= $data['id'] ?>"><button class="btn btn-info me-2">Edit</button></a>
                            <a href="delete.php?id=<?= $data['id'] ?>&img=<?= urlencode($data['image']) ?>"><button class="btn btn-danger" name="delete">Delete</button></a>
                        </div>
                    </div>
                </div>

        <?php
                $i++;
            }
        }
        ?>

        <?php
        if (mysqli_num_rows($result) == 0) {

            echo '
            <div class="alert alert-warning text-center w-100 mt-5">
            <h2>NO Data Found</h2>
            </div>
            ';

        }
        ?>

    </div>

</body>

</html>