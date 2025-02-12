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

    <div class="container p-3 text-center" style="background-color: #eee; max-width: 500px">
        <h2>Add a new product</h2>
        <form action="crud.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" placeholder="product name" name="pName">
            </div>
            <div class="mb-3">
                <textarea type="text" class="form-control" placeholder="Description" name="pDesc"></textarea>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Price" name="pPrice">
            </div>
            <div class="mb-4">
                <input type="file" class="form-control" name="pImg" accept=".jpg,.png,.svg" required>
            </div>
            <button type="submit" class="btn btn-success w-100" name="addProduct">Add product</button>
            <a href="index.php"><button type="button" class="btn btn-secondary mt-2 w-100" name="save">Cancle</button></a>
        </form>
    </div>

</body>

</html>