<?php 

$connection = mysqli_connect('localhost', 'root', '', 'billingsystem');

    if(mysqli_connect_errno()){
        die('Database connection faild'.mysqli_connect_errno());
    } else {
        //echo "Connection successful";
        $findLastDetails = "SELECT * FROM `billdetails` WHERE order_no = (select max(order_no) FROM billdetails)";
          $resultfindLastDetails = mysqli_query($connection, $findLastDetails);
          if ($resultfindLastDetails) {
            while($resultSetresultfindLastDetails = mysqli_fetch_array($resultfindLastDetails)){
              $cash = $resultSetresultfindLastDetails['cash'];
              $balance = $resultSetresultfindLastDetails['balance'];
            }
            
          } else {
            echo "Unsuccessful";
          }
    }

/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */
try {
    // Enter the share name for your USB printer here
    //$connector = null;
    $connector = new WindowsPrintConnector("Coffee Stories");

    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    
    date_default_timezone_get('Asia/Colombo');
    $date = date('d/m/Y h:i;s a', time());
    $printer->text("Printed on " . $date . "\n\n");
    $printer->text("Tel: 0000 "."\n");
    $printer->text("Payments"."\n");
    $printer->text("CASH: ". $cash  ."\n");
    $printer->text("Balance: ".$balance."\n\n");
    $printer->text("Greetings"."\n");
    $printer -> cut();
    
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}


mysqli_close($connection);
?>