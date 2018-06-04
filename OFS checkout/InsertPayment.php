<?php

session_start();
include('../config.php');

$sql = "INSERT INTO payment (Full_Name, Email, Postal_Code, Address, Country, City, Phone, Dilivery_Address, Total_Amount) 
VALUES ('$_POST[fullname]', '$_POST[email]', '$_POST[pcode]', '$_POST[address]', '$_POST[country]', '$_POST[city]', '$_POST[phone]',  '$_POST[delivery]', '$_POST[total]')";

if (!mysqli_query($mysqli, $sql)) {
    die('Error: ' . mysqli_error($mysqli));
}

//GET THE LATEST ID>>>>>>>>>>>
$results = $mysqli->query("SELECT * FROM payment ORDER BY order_ID DESC LIMIT 1");
if ($results) {
    //fetch results set as object and output HTML
    if ($obj = $results->fetch_object()) {
        $last_id = $obj->order_ID;
        // Insert the invoice item
        if (isset($_SESSION["cart_session"])) {
            $total = 0;
            foreach ($_SESSION["cart_session"] as $cart_itm) {
                $inv = "INV-".$last_id;
                $id = $cart_itm["code"];
                $unit = $cart_itm["Qiimaha"];
                $qty = $cart_itm["TiradaProductTiga"];
                $tax = 0;
                $price = $unit * $qty;
                $sql2 = "INSERT INTO invoice_items (invoice, item, unit_price, qty,tax, price, order_ID,date,time ) 
                                 VALUES ('$inv', '$id', '$unit', '$qty', '$tax', '$price', '$last_id','$today',NOW())";
                if (!mysqli_query($mysqli, $sql2)) {
                    die('Error: ' . mysqli_error($mysqli));
                }
            }
        }
    }
}
session_start();
if (session_destroy()) {
    header("location: process.php?payment_mode=Thanks for Your purchase..!");
    echo "1 payment method has been processed";
}

mysqli_close($mysqli);
?> 
