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

    <div class="container mt-3">
        <table class="table table-bordered-bottom text-center mt-3">
            <thead id="header">
                <tr>
                    <th width="5%" class="bg-secondary">No.</th>
                    <th width="20%" class="bg-secondary">Image</th>
                    <th width="10%" class="bg-secondary">Name</th>
                    <th width="30%" class="bg-secondary">Description</th>
                    <th width="10%" class="bg-secondary">Price</th>
                    <th width="20%" class="bg-secondary">Action</th>
                </tr>
            </thead>
            <tbody class="shadow">
                <?php
                if (mysqli_num_rows($result) > 0) {

                    $i = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><img src="upload/<?= $data['image'] ?>" height="150px"></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['description'] ?></td>
                            <td><?= $data['price'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $data['id'] ?>"><button class="btn btn-info me-2">Edit</button></a>
                                <a href="delete.php?id=<?= $data['id'] ?>&img=<?= urlencode($data['image']) ?>"><button class="btn btn-danger" name="delete">Delete</button>
                            </td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        if (mysqli_num_rows($result) == 0) {

            echo '
            <div class="alert alert-warning text-center mt-5">
            <h2>NO Data Found</h2>
            </div>
            ';
        ?>
            <script>
                var header = document.querySelector('#header');
                header.style.display = 'none';
            </script>
        <?php
        }
        ?>
    </div>

</body>

</html>