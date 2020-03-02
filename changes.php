<?php require_once('Conn/Connection.php'); ?>

<?php
    if(isset($_POST['confirmButton'])){
        $currentPassword = $_POST['currentPassword'];
        $newUserName = $_POST['newUserName'];
        $newPassword = $_POST['newPassword'];

        $sql = "select User_Name, Password from admin where Password  = '$currentPassword' ";
        $result = mysqli_query($connection, $sql);
        if(!$result){
            echo "Unseccessful";
        } else {
            while($resultSet = mysqli_fetch_assoc($result)){
                 $userName = $resultSet['User_Name'];
                 $password = $resultSet['Password'];
            }
        }

        if($currentPassword == $password){
            $sql = "update admin set User_Name = '$newUserName', Password = '$newPassword' where Password = '$currentPassword' ";
            $query = mysqli_query($connection, $sql);
            if(!$query){
                echo "Unsucessful";
            } else {
                
                $message = "Successful";
  echo "<script type='text/javascript'>alert('$message');</script>";
            }
            header("location: LoginPage.php");
        } else {
            $message = "User name or Password is incorrect.\\n Try again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
        }
        

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--===============================================================================================-->	
	<link rel="icon" type="Image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="CSS/util.css">
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
<!--===============================================================================================-->
    <title>Document</title>
</head>
<body>
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/isaac-benhesed-onLbXleIkds-unsplash.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Reset Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="#">

					<div class="wrap-input100 validate-input" data-validate = "Current password">
						<input class="input100" type="password" name="currentPassword" id="currentPassword" placeholder="Current Password">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="New username">
						<input class="input100" type="text" name="newUserName" id="newUserName" placeholder="New User name">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="New password">
						<input class="input100" type="password" name="newPassword" id="newPassword" placeholder="New Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="confirmButton" id="confirmButton">
							Confirm
						</button>
					</div>

				</form>
			</div>
		</div>
    </div>
    
    <div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="JS/main.js"></script>
</body>
</html>