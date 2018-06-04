
<div id="header">
    <!-- Begin Shell -->
    <div class="shell">


        <div id="top-nav">

            <ul>

                <li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
                <li><a href="Sign In.php" title="Sign In"><span>Sign In</span></a></li>
            </ul>

            <li>
                <h1><p> <a href="Sign In.php"><img src="images/logo.png" alt="" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> <font color="grey">ONLINE FASHION SHOPPING </font> <span> </span></p> </h1>
            </li>
        </div>
        <div id="left"></div>

        <div class="cl">&nbsp; </div>
        <div class="cl">&nbsp;</div>
        <div class="cl">&nbsp;</div>
        <br/>

        <div class="shopping-cart"  id="cart" id="right" >
            <dl id="acc">	
                <dt class="active">								
                    <p class="shopping" >Shopping Cart &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                </dt>
                <dd class="active" style="display: block;">
                    <?php
                    //current URL of the Page. cart_update.php redirects back to this URL
                    $current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

                    if (isset($_SESSION["cart_session"])) {
                        $total = 0;
                        $t = 0;

                        foreach ($_SESSION["cart_session"] as $cart_itm) {

                            $id = $cart_itm["code"];
                            $qty = $cart_itm["TiradaProductTiga"];
                            $r = $mysqli->query("SELECT * FROM product WHERE Product_ID=$id");
                            if ($r) {
                                //fetch results set as object and output HTML
                                if ($obj2 = $r->fetch_object()) {
                                    $p_id = $obj2->Product_ID;
                                    $p_bal = $obj2->balance;

                                    if ($p_bal >= $qty) {
                                        echo '<br/><br/><br/><br/><ul>';
                                        echo '<li class="cart-itm">';
                                        echo '<span class="remove-itm"><a href="cart_update.php?removep=' . $cart_itm["code"] . '&return_url=' . $current_url . '">&times;</a></span>' . "</br>";
                                        echo '<h3  style="color: green" ><big> ' . $cart_itm["name"] . ' </big></h3>';
                                        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> ' . $cart_itm["code"] . ' </big></strong></div>';
                                        echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> ' . $cart_itm["TiradaProductTiga"] . '</big></strong>) </span>';
                                        echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>' . $currency . $cart_itm["Qiimaha"] . '</big></strong></div>';
                                        echo '</li>';
                                        $subtotal = ($cart_itm["Qiimaha"] * $cart_itm["TiradaProductTiga"]);
                                        $total = ($total + $subtotal) . "</br>";
                                        $t += $qty;
                                        echo '</ul>';
                                    } else {
                                        foreach ($_SESSION["cart_session"] as $cart_itm) { //loop through session array var
                                            if ($cart_itm["code"] != $id) { //item does,t exist in the list
                                                $product[] = array('name' => $cart_itm["name"], 'code' => $cart_itm["code"], 'TiradaProductTiga' => $cart_itm["TiradaProductTiga"], 'Qiimaha' => $cart_itm["Qiimaha"]);
                                            
                                                //create a new product list for cart
                                            $_SESSION["cart_session"] = $product;
                                            }
                                            
                                        }
                                    }
                                }
                            }
                        }

                        if ($t > 0) {
                            echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >' . $currency . $total . '</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Continue</span></a></span>';
                            echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url=' . $current_url . '"><span class="a-btn-text">Clear Cart</span></a>';
                        } else {
                            echo '<span class="check-out-txt"><strong style="color:green" ><i>Selected Product Out of Stock:</i> <big style="color:green" > Please reduce on the quantities..!</big></strong> </span>';
                            echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url=' . $current_url . '"><span class="a-btn-text">Refresh</span></a>';
                        }
                    } else {
                        echo ' <h4>(Your Shopping Cart Is Empty!!!)</h4>';
                    }
                    ?>

                </dd>
            </dl>
        </div>
        <div class="clear"></div>
    </div>
    <!-- End Shell -->
</div>