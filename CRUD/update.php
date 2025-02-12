<?php

require_once('connection.php');

function upload_image($img)
{
    $tmpLocation = $img['tmp_name'];
    $fileName = random_int(111, 999) . $img['name'];

    $fileLocation = UPLOAD_SRC . $fileName;

    if (!move_uploaded_file($tmpLocation, $fileLocation)) {
        echo "
           <script>alert('File uploading failed');</script>
        ";
        exit();
    } else {
        return $fileName;
    }
}

if (isset($_POST['save'])) {

    $id = $_POST['id'];
    $productName = $_POST['pName'];
    $description = $_POST['pDesc'];
    $productPrice = $_POST['pPrice'];

    if ($_FILES['pImg']['error'] == 0) {

        $filename =  upload_image($_FILES['pImg']);

        $update = "UPDATE `products` SET `name`='$productName',       
        `description`='$description',`price`='$productPrice',`image`='$filename' WHERE `id` = $id";
    } else {
        $update = "UPDATE `products` SET `name`='$productName',       
        `description`='$description',`price`='$productPrice' WHERE `id` = $id";
    }

    $result = mysqli_query($conn, $update);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "inserting failed" . mysqli_error($conn);
    }
}
