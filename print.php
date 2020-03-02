

<?php require_once('Conn/Connection.php');



    $id = $_GET['id'];

    $sql = "UPDATE orders SET Status= 1";
        $result = mysqli_query($connection, $sql);

    if($result){
      //echo "Successful";
    } else {
      echo "Unsuccessful";
    }

    $sql1 = "UPDATE billdetails SET Status= 1";
        $result1 = mysqli_query($connection, $sql1);

    if($result1){
      //echo "Successful";
    } else {
      echo "Unsuccessful";
    }

    header("location:index.php");       

mysqli_close($connection);
?>





