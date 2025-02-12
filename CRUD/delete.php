<?php

require_once('connection.php');

if(isset($_GET['id']) && isset($_GET['img'])){

    $id = $_GET['id'];
    $img = $_GET['img'];
    
    $delete = "DELETE FROM `products` WHERE `id` = $id";
    $result = mysqli_query($conn, $delete);

    if($result){
        unlink("upload/$img");
    }
    else{
        echo "
           <script>alert('deleting failed');</script>
        ";
    }

    header('Location: index.php');
}


?>