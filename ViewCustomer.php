<?php require_once('Conn/Connection.php'); ?>


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
    body{
      background-image: url('images/BeFunky-photo (1).jpg');
    }
  
  </style>
  
  <title>Document</title>
</head>

<body>

  <body data-gr-c-s-loaded="true">
    <div class="parallax-mirror" style="left: 0px; top: 0px; width: 1028px; height: 665px; overflow: hidden; visibility: visible; position: fixed; z-index: -100; transform: translate3d(0px, 0px, 0px);">
      <img class="parallax-slider" style="width: 1028px; height: 685px; position: absolute; max-width: none; transform: translate3d(0px, -10px, 0px);" src="">
    </div>

    <!--img class="img-fluid" src="Images/mainImage.jpg" alt="" -->

    <!--Navigation bar=============================================================================================== -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <!-- Navbar: Brand -->
        <a class="navbar-brand d-lg-none" href="index.php">Coffee Stories</a>

        <!-- Navbar: Toggler -->
        <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarSupportedContent" aria-label="Toggle navigation" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
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

    <br>
    <br>
    <br>
    <br>

    <div>
      <button type="button" class="addButton btn btn-outline-success" onclick="location.href='addCustomer.php'">Add</button>

      <form action="searchCustomer.php" method="POST" class="search">
        <input type="text" placeholder="Search Customers by Name" class="form-control" name="searchCustomer" id="searchCustomer" />
        <button type="button" class="searchButton btn btn-outline-success" onclick="location.href='searchCustomer.php'">Search</button>
      </form>
    </div>
    <br>
    <br>
    <section class="dataSection">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-hover">
              <thead>
                <tr id="head">
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Contact Number</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <?php



              $query = 'select * from customer';
              $result = mysqli_query($connection, $query);


              ?>
              <?php
              while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $rows['Customer_Id']; ?></td>
                    <td><?php echo $rows['Customer_Name']; ?> </td>
                    <td><?php echo $rows['Customer_Email']; ?></td>
                    <td><?php echo $rows['Customer_Contact_No']; ?> </td>

                    <td><button type="button" name="deleteButton" class="btn btn-outline-danger" onclick="location.href='deleteCustomer.php?id=<?php echo $rows['Customer_Id'] ?>'">Delete</button></td>

                  </tr>
                <?php
                }
                ?>


                </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </body>

</html>
<?php mysqli_close($connection); ?>