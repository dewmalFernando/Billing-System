<?php require_once('Conn/Connection.php');


    $id = $_GET['id'];

    

    $deleteQuery = "Delete from orders where Order_Id = '$id' ";
    //mysqli_select_db($connection, 'billingSystem');
    $resultset = mysqli_query($connection, $deleteQuery);

    

    if($resultset){
      //echo "Successful";
    } else {
      echo "Unsuccessful";
    }




    header("location:index.php");         
                      
                    








mysqli_close($connection);
?>