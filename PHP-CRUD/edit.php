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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", serif;
        }
    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <?php
    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM `products` WHERE `id` = $id";
        $result = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($result);
    }
    ?>

    <div class="container mt-2 p-3" style="background-color: #eee; max-width: 500px">
        <h2 class="text-center">Edit product</h2>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <label>Name:</label>
            <div class="mb-3">
                <input type="text" class="form-control" value="<?= $data['name'] ?>" name="pName">
            </div>
            <label>Description:</label>
            <div class="mb-3">
                <textarea type="text" class="form-control" name="pDesc"><?= $data['description'] ?>"</textarea>
            </div>
            <label>Price:</label>
            <div class="mb-3">
                <input type="text" class="form-control" value="<?= $data['price'] ?>" name="pPrice">
            </div>
            <label>Image:</label> <br>
            <img src="upload/<?= $data['image'] ?>" alt="img" height="150px">
            <div class="mb-4">
                <input type="file" class="form-control mt-3" name="pImg">
            </div>
            <input type="hidden" value="<?= $data['id'] ?>" name="id">
            <button type="submit" class="btn btn-success w-100" name="save">Save</button>
            <a href="index.php"><button type="button" class="btn btn-secondary mt-2 w-100" name="save">Cancle</button></a>
        </form>
    </div>

</body>

</html>