<?php

require_once('Conn/Connection.php');

/*
if(isset($_GET['itemCode']) && isset($_GET['ammount'])){
  $itemCode = $_POST['itemCode'];
  $ammount = $_POST['ammount'];
*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--Links to access fontawesome-->
  <link rel="stylesheet" href="FontawesomeIcons/css/all.css">
  <link rel="stylesheet" href="FontawesomeIcons/js/all.js">

  <!--Links to accsess CSS files-->
  <link rel="stylesheet" href="CSS/Index.css">
  

  <style>

    .background{
      /*
      background-image: url('Images/osen-listia-fon-derevo-kofe-colorful-kruzhka-chashka-vintage.jpg');
       The image used */
  
    }

  </style>


    <title>Document</title>
</head>
<body>
<body data-gr-c-s-loaded="true">
    <div class="parallax-mirror"
        style="left: 0px; top: 0px; width: 1028px; height: 665px; overflow: hidden; visibility: visible; position: fixed; z-index: -100; transform: translate3d(0px, 0px, 0px);">
        
    </div>

    <!--img class="img-fluid" src="Images/mainImage.jpg" alt="" -->

    <!--Navigation bar=============================================================================================== -->
    <nav class="navbar navbar-expand-lg fixed-top" >
        <div class="container">
            <!-- Navbar: Brand -->
            <a class="navbar-brand d-lg-none" href="index.php">Coffee Stories</a>

            <!-- Navbar: Toggler -->
            <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarSupportedContent"
                aria-label="Toggle navigation" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar: Collapse -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Navbar navigation: Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ViewProducts.php">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ViewCategory.php">CATEGORIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ViewPrice.php">PRICES</a>
                    </li>
                </ul>

                <!-- Navbar: Brand -->
                <a class="navbar-brand d-none d-lg-flex" href="index.php" id="Text">
                    coffee STORIES
                </a>

                <!-- Navbar navigation: Right -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ViewCustomer.php">CUSTOMERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Orders.php">ORDERS</a>
                    </li>
                    <li class="nav-item"></li>
                    <button class="btn btn-outline-secondary" id="logoutButton" name="logoutButton" onclick="location.href='logout.php'">Logout</button>
                    </li>
                    <li>
                        <!--a class="nav-link" href="Cart.html">CART</a-->
                    </li>
                </ul>

            </div> <!-- / .navbar-collapse -->

        </div> <!-- / .container -->
    </nav>
    <!--End Navigation bar-->



    <div class="background">
<br>
<br>
<br>
<br>

<label>- Add a new Customer -</label>

<br>
<br>
<br>
<br>

<section id="addProductsForm">
<div class="container">
  <form action="#" method="POST">
    <div class="form-group">
      <label for="customerName">Customer Name</label>
      <input type="text" class="form-control" id="customerName" name="customerName" required>
    </div>
    <div class="form-group">
      <label for="customerEmail">Customer Email</label>
      <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
    </div>
    <div class="form-group">
      <label for="customerContact">Contact Number</label>
      <input type="numbers" class="form-control" id="customerContact" name="customerContact" required>
    </div>
    <button type="submit" id="addButton" name="addButton" class="btn btn-dark">Add</button>
  </form>
</div>
</section>

<?php 
  if(isset($_POST['addButton'])){
     $customerName = $_POST['customerName'];
     $customerEmail = $_POST['customerEmail'];
     $customerContact = $_POST['customerContact'];  

    $insertQuery = "insert into customer(Customer_Name  , Customer_Email , Customer_Contact_No ) values('$customerName', '$customerEmail', '$customerContact')";
    $resultInsert = mysqli_query($connection, $insertQuery);
    if(!$resultInsert){
      echo "Unsuccessful";
    } else {
      //echo "Successful";
    }

  }
?>
</div>



</body>
</html>

<?php mysqli_close($connection); ?>