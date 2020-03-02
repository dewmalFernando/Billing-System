<?php 

require_once('Conn/Connection.php');

    session_start();


		$userName = $_POST['userName'];
		$password = $_POST['password'];

		$query = "select Admin_Id, User_Name, Password  from admin where User_Name = '$userName' and Password = '$password'";
		$queryResult = mysqli_query($connection, $query);

		

		//$count = mysqli_num_rows($result);

		if(!$queryResult){
            echo "Unsuccessful. Please Contact the developer";
        } else {

			while($result = mysqli_fetch_assoc($queryResult)){
				$myUserName = $result['User_Name'];
				$myPassword = $result['Password'];
			}

		/*if($count == 1){
			$_SESSION['login_User'] = $userName;
			$_SESSION['type'] = "admin";
            $_SESSION['userName'] = $result[1];
            
            header("location:index.php");

		} else {
            $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
		}*/
		
		if($_POST['userName'] == @$myUserName && $_POST['password'] == @$myPassword){
            $_SESSION['login_user'] = $userName;
            header("location:Index.php");

		} else {
            $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
        }
    
		}
?>
<?php mysqli_close($connection); ?>