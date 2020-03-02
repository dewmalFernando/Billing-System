<?php require_once('Conn/Connection.php');


    $id = $_GET['id'];

    

    $deleteQuery = "Delete from price where Price_Code = '$id' ";
    //mysqli_select_db($connection, 'billingSystem');
    $resultset = mysqli_query($connection, $deleteQuery);

    if($resultset){
      //echo "Successful";
    } else {
      echo "Unsuccessful";
    }


    header("location:ViewPrice.php");         
                      
                    








mysqli_close($connection);
?>