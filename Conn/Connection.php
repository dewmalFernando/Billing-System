<?php 
    $connection = mysqli_connect('localhost', 'root', '', 'billingsystem');

    if(mysqli_connect_errno()){
        die('Database connection faild'.mysqli_connect_errno());
    } else {
        //echo "Connection successful";
    }
?>