<?php

require_once('connection.php');

function upload_image($img)
{
    $tmpLocation = $img['tmp_name'];
    $fileName = random_int(111, 999) . $img['name'];

    $fileLocation = UPLOAD_SRC . $fileName;

    if (!is_dir('upload')) {
        mkdir('upload');
    }

    if (!move_uploaded_file($tmpLocation, $fileLocation)) {
        echo "
           <script>alert('File uploading failed');</script>
        ";
        exit();
    }else{
        return $fileName;
    }
}

if (isset($_POST['addProduct'])) {

    $productName = $_POST['pName'];
    $description = $_POST['pDesc'];
    $productPrice = $_POST['pPrice'];

    $filename =  upload_image($_FILES['pImg']);

    $sql = "INSERT INTO `products`(`name`, `description`, `price`, `image`) 
            VALUES ('$productName','$description',$productPrice,'$filename')";

    $result = mysqli_query($conn, $sql);
    
    if($result){
        header('Location: index.php');
    }
    else{
        echo "inserting failed".mysqli_error($conn);
    }

}
