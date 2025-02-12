<?php

 $conn = mysqli_connect("localhost","root","","tut-4-second");

 if(!$conn){
    die("Connection Failed".mysqli_connect_error());
 }

define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/php/tut-4-second/upload/");


?>