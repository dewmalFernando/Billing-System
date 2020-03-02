<?php require_once('Conn/Connection.php');


    $id = $_GET['id'];

    $deleteQuery = "Delete from category where Category_Code = '$id' ";
    //mysqli_select_db($connection, 'billingSystem');
    $resultset = mysqli_query($connection, $deleteQuery);

    if($resultset){
      //echo "Successful";
    } else {
      echo "Unsuccessful";
    }


    header("location:ViewCategory.php");         
                      
                    








mysqli_close($connection);
?>