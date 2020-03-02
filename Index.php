<?php


use function PHPSTORM_META\type;

require_once('Conn/Connection.php');

session_start();

if (!isset($_SESSION['login_user'])) {

  header("location:LoginPage.php");
}

/*
if(isset($_GET['itemCode']) && isset($_GET['ammount'])){
  $itemCode = $_POST['itemCode'];
  $ammount = $_POST['ammount'];
*/

//$today = date('Y-m-d');

//$addDate = date('d-m-Y', strtotime($today.'+5 days'));

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
  <link rel="stylesheet" href="CSS/index.css">

  <style>
    body {
      background-image: url('images/BeFunkyphoto.jpg');
    }
  </style>


  <title>Document</title>
</head>

<body>


  <!--img class="img-fluid" src="Images/mainImage.jpg" alt="" -->

  <body data-gr-c-s-loaded="true">
    <div class="parallax-mirror" style="left: 0px; top: 0px; width: 1028px; height: 665px; overflow: hidden; visibility: visible; position: fixed; z-index: -100; transform: translate3d(0px, 0px, 0px);">
      <img class="parallax-slider" style="width: 1028px; height: 685px; position: absolute; max-width: none; transform: translate3d(0px, -10px, 0px);" src="">
    </div>
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
          </ul>

        </div> <!-- / .navbar-collapse -->

      </div> <!-- / .container -->
    </nav>
    <!--End Navigation bar-->

    <section class="sectionOne">
      <section class="billingSection" data-parallax="scroll" data-image-src="" id="sectionOne">
        <div class="container">
          <form action="index.php" method="POST">
            <div class="form-group">
              <label for="itemCode">Item Code</label>
              <input type="number" class="form-control" id="itemCode" name="itemCode" required />
            </div>
            <br>
            <div class="form-group">
              <label for="ammount">Ammount</label>
              <input type="number" class="form-control" id="ammount" name="ammount" required />
            </div>
            <br>

            <div class="btn-group-justified" id="btnGroup">
              <button type="submit" name="submitButton" class="btn col-sm-2 btn-outline-dark" id="submitButton">Enter</button>
            </div>
          </form>
        </div>
      </section>

      <br>
      <br>

      <section class="dataSectionIndex col-6">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-hover">
                <thead>
                  <tr id="head">
                    <th>Product Name</th>
                    <th>Ammount</th>
                    <th>Price</th>
                    <th>Sub Total</th>
                    <!--th>Date</th-->
                  </tr>
                </thead>
                <!--tr id="total">
                  <td>Total</td>
                </tr-->

                <?php

                if (isset($_POST['submitButton'])) {
                  $itemCode = $_POST['itemCode'];
                  $ammount = $_POST['ammount'];
                  //$total = 0.00;

                  //$timeAndDate = date("Y/m/d");

                  //Find product Name
                  $selectProdutName = "select p.Product_Name, pr.Price from product p, price pr where p.Price_Code = pr.Price_Code and p.Product_Code = '{$itemCode}'";
                  $resultProdutName = mysqli_query($connection, $selectProdutName);
                  if ($resultProdutName) {
                    while ($resultSetProductName = mysqli_fetch_assoc($resultProdutName)) {
                      $name = $resultSetProductName['Product_Name'];
                    }
                  } else {
                    echo "Unsuccessful select";
                  }

                  //Find product price
                  $selectPrice = "select pr.Price from product p, price pr where p.Price_Code = pr.Price_Code and p.Product_Code = '{$itemCode}'";
                  $resultPrice = mysqli_query($connection, $selectPrice);
                  if ($resultPrice) {
                    while ($resultSetPrice = mysqli_fetch_assoc($resultPrice)) {
                      //echo  mysqli_num_rows($resultPrice);
                      $price = $resultSetPrice['Price'];
                    }
                  } else {
                    echo "Unsuccessful select";
                  }

                  $subTotal = $ammount * $price;
                  //echo $price;

                  //Don't mind this. Not important. This find the max Product ID
                  //echo $total = $total + $subTotal;
                  $sql1 = "select max(Order_Id) as Max_Id from orders";

                  $sql1Result = mysqli_query($connection, $sql1);
                  if($sql1Result){
                    //echo "Successful";
                    while($sqlResult = mysqli_fetch_assoc($sql1Result)){
                      //echo @$maxId = $sqlResult['Max_Id'];
                    }
                  } else {
                    echo "Unsuccessful";
                  }

                  

                  //Insert detals into Orders table
                  @$insertQuery = "insert into orders (Product_Name, Ammount, Price, SubTotal) values('$name', '$ammount', '$price', '$subTotal')";
                  $insertResult = mysqli_query($connection, $insertQuery);
                  if ($insertResult) {
                    //while($resultSetProductName = mysqli_fetch_assoc($selectPriceResult)){}
                  } else {
                    echo "Unsuccessful insert";
                  }
                }



                //Select detals from Orders table
                $query = 'SELECT * from orders where status = 0';
                $result = mysqli_query($connection, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                  ?>
                  <?php $rows['Order_Id']; ?>
                  <tbody>
                    <tr>
                      <td><?php echo $rows['Product_Name']; ?></td>
                      <td><?php echo $rows['Ammount']; ?> </td>
                      <td>Rs. <?php echo $rows['Price']; ?>.00</td>
                      <td>Rs. <?php echo $rows['SubTotal']; ?>.00</td>
                      <td><button type="button" class="btn btn-outline-danger" onclick="location.href='deleteBillingItem.php?id=<?php echo $rows['Order_Id'] ?>'">Cancel</button> </td>
                    </tr>
                  </tbody>

                <?php
                }
                ?>

              </table>
            </div>
          </div>
        </div>
      </section>

      <br>
      <br>
      <br>

      <div class="totalAmmount col-5">
        <table class="content">
          <tr>
            <th id="tableHead">Total</th>
            <td></td>
            <td id="tableData">Rs. <?php
                                    $calTot = "select SUM(SubTotal) as 'Total' from orders where status = 0";
                                    $resultTot = mysqli_query($connection, $calTot);
                                    if ($resultTot) {
                                      $resultSetTot = mysqli_fetch_array($resultTot);
                                      echo $Total = $resultSetTot['Total'];
                                    } else {
                                      echo "Unsuccessful";
                                    }
                                    ?>.00</td>
          </tr>
        </table>

        <br>
        <br>

        <form action="index.php" method="POST">
          <div class="form-group">
            <label for="cash">Cash</label>
            <input type="number" class="form-control" id="cash" name="cash" required />
          </div>
          <div>
            <button type="submit" name="enterButton" class="enterButton btn col-sm-0 btn-outline-dark float-right" id="enterButton">Enter</button>

          </div>

        </form>

        <!-- Calculate Total -->
        <?php
        if (isset($_POST['enterButton'])) {
          $cash = $_POST['cash'];
          $calTot = "select SUM(SubTotal) as 'Total' from orders where status = 0";
          $resultTot = mysqli_query($connection, $calTot);
          if ($resultTot) {
            $resultSetTot = mysqli_fetch_array($resultTot);
            $Total = $resultSetTot['Total'];
          } else {
            echo "Unsuccessful";
          }

          //Print balance
           echo "Balance = Rs. " . $balance = $cash - $Total . ".00";
          
          //Insert billdata into bill details table
           $insertQuery = "insert into billdetails(cash, balance) values('$cash', '$balance')";
          //mysqli_select_db($connection, 'billingSystem');
          $resultset = mysqli_query($connection, $insertQuery);

          if ($resultset) {
            //echo "Successful";
          } else {
            echo "Unsuccessful";
          }
        }

        ?>
        

        <!--form action="index.php" method="POST"> 
        <button type="submit" name="printButton" class="btn col-sm-1 btn-outline-dark float-right" id="printButton">Print</button>
        
      </form-->
        <br>

      </div>
      <button type="submit" name="printButton" class="printButton btn col-sm-0 btn-outline-dark float-right" id="printButton" onclick="location.href='print.php?id=printButton'; myFunction()">Print</button>




  </body>

  <script>
    function myFunction() {
      window.print();
    }
  </script>

</html>
<?php mysqli_close($connection); ?>