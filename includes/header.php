
<div id="header">
    <!-- Begin Shell -->
    <div class="shell">
       
        <div id="top-nav">
            <ul>

                <li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
                <li><a href="Sign In.php" title="Sign In"><span>Sign In</span></a></li>
            </ul>
            
        </div>
        <div id="left"><header>
                <h1><p> <a href="Sign In.php"><img src="images/logo.png" alt="" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>ONLINE FASHION SHOPPING<span> </span></p> </h1>
            </header></div>
        
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
                        echo '<br/><br/><br/><br/><ul>';
                        foreach ($_SESSION["cart_session"] as $cart_itm) {
                            echo '<li class="cart-itm">';
                            echo '<span class="remove-itm"><a href="cart_update.php?removep=' . $cart_itm["code"] . '&return_url=' . $current_url . '">&times;</a></span>' . "</br>";
                            echo '<h3  style="color: green" ><big> ' . $cart_itm["name"] . ' </big></h3>';
                            echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> ' . $cart_itm["code"] . ' </big></strong></div>';
                            echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> ' . $cart_itm["TiradaProductTiga"] . '</big></strong>) </span>';
                            echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>' . $currency . $cart_itm["Qiimaha"] . '</big></strong></div>';
                            echo '</li>';
                            $subtotal = ($cart_itm["Qiimaha"] * $cart_itm["TiradaProductTiga"]);
                            $total = ($total + $subtotal) . "</br>";
                        }
                        echo '</ul>';
                        echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >' . $currency . $total . '</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Continue</span></a></span>';
                        echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url=' . $current_url . '"><span class="a-btn-text">Clear Cart</span></a>';
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