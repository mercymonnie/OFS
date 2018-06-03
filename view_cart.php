<?php
session_start();
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <title> OFS | Chart </title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
        <link rel="shortcut icon" href="images/favicon.png" />
        <script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

        <script src="js/cufon-yui.js" type="text/javascript"></script>
        <script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
        <script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/functions.js" type="text/javascript" charset="utf-8"></script>


        <!-- Linking scripts -->
        <script src="js/main.js" type="text/javascript"></script>

    </head>
    <body>
        <!-- Begin Wrapper -->
        <div id="wrapper">
            <!-- Begin Header -->

            <?php include_once 'includes/header.php'; ?>
            <!-- End Header -->
            <!-- Begin Navigation -->


            <?php include_once 'includes/navigation.php'; ?>

            <!-- End Navigation -->

            <!-- Begin Main -->
            <div id="main" class="shell">
                <br>

                    <div class="viewcart">
                        <?php
                        $current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                        if (isset($_SESSION["cart_session"])) {
                            $total = 0;

                            echo '<form method="post" action="cart_update.php">';
                            echo '<table cellspacing="0">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<td>Check:</td>';
                            echo '<td>Product:</td>';
                            echo '<td>Quantity:</td>';
                            echo ' <td>Description:</td>';
                            echo '<td>Price:</td>';
                            echo '<td>Action:</td>';
                            echo '</tr>';
                            echo '</thead>';

                            $cart_items = 0;
                            foreach ($_SESSION["cart_session"] as $cart_itm) {
                                $Product_ID = $cart_itm["code"];
                                $results = $mysqli->query("SELECT productName,Description, Price FROM product  WHERE Product_ID='$Product_ID'");
                                if ($results) {



                                    //fetch results set as object and output HTML
                                    while ($obj = $results->fetch_object()) {


                                        echo '<tr class="cart-itm">';
                                        echo '<td><input type="checkbox"></td>';
                                        echo '<td><h3>' . $obj->productName . ' (Code :' . $Product_ID . ')</h3></td> ';
                                        echo '<td class="p-qty">Qty :<input type="text" name="product_qty" value="' . $cart_itm["TiradaProductTiga"] . '" size="2"   maxlength="5" /></td>';
                                        echo '<td>' . $obj->Description . '</td>';
                                        echo '<td class="p-price" style="color:green"><b>' . $currency . number_format($obj->Price) . '</b></td>';
                                        echo '<td><span class="remove-check"><a href="cart_update.php?removep=' . $cart_itm["code"] . '&return_url=' . $current_url . '">&times;</a></span></td>';
                                        echo '</tr>';
                                        $subtotal = ($cart_itm["Qiimaha"] * $cart_itm["TiradaProductTiga"]);
                                        $total = ($total + $subtotal);



                                        echo '<input type="hidden" name="item_name[' . $cart_items . ']" value="' . $obj->productName . '" />';
                                        echo '<input type="hidden" name="item_code[' . $cart_items . ']" value="' . $Product_ID . '" />';
                                        echo '<input type="hidden" name="item_desc[' . $cart_items . ']" value="' . $obj->Description . '" />';
                                        echo '<input type="hidden" name="item_qty[' . $cart_items . ']" value="' . $cart_itm["TiradaProductTiga"] . '"/>';
                                        $cart_items ++;
                                    }
                                }
                            }


                            echo '<span class="midigta"><a  class="a-btn" href="products.php?emptycart=1&return_url=' . $current_url . '"><span class="a-btn-text">Continue Shopping</span></a></span>';
                            echo '<span class="check-out-txt">';

                            echo '</table>';
                            echo '<span> <h4 class="pricewayn"> Grand Total : <big style="color:green">' . $currency . number_format($total) . '</big> </h4></span> ';
                            echo '<spa class="midigta"><a  class="a-btn" href="OFS checkout/process.php?payment_mode=Airtel Money"><span class="a-btn-text">Proced On Airtel Money</span> </a></span>';

                            echo '<span class="midigta"> <a  class="a-btn" href="OFS checkout/process.php?payment_mode=MTN Money"> <span class="a-btn-text"> Pay On MTN Mobile money</span></a></span>';
                            echo '</span>';
                            echo '</form>';
                        } else {
                            echo '<span class="wacwayn"><i>Your Cart is empty</i></span>';
                        }
                        ?>
                    </div><br><br><br>


                                <!-- Begin Products Slider -->
                                <div id="product-slider">
                                    <h2>Best Products</h2>
                                    <ul>

                                        <?php
                                        $result = mysqli_query($mysqli, "select * from product") or die(mysqli_error());
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <li>
                                                <a href="products.php" title="Product Link"><img src="Admin/images/products/<?php echo $row['Picture'] ?>" alt="IMAGES" /></a>
                                                <div class="info">
                                                    <h4><b><?php echo $row['productName'] ?></b></h4>
                                                    <span class="number"><span>Price:<big style="color:green">Ugx<?php echo number_format($row['Price']); ?></big></span></span>

                                                    <div class="cl">&nbsp;</div>

                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="cl">&nbsp;</div>
                                </div>
                                <!-- End Products Slider -->		
                                <br> <br> <br> <br> 
                                                <!-- Begin Content -->

                                                <!-- End Content -->

                                                <div class="cl">&nbsp;</div>


                                                </div>
                                                <!-- End Main -->

                                                </div>
                                                <!-- End Wrapper -->
                                                </body>
                                                </html>