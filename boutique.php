<?php
session_start();
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <title>OCS | Boutique  </title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="images/favicon.png" />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />

        <link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" />
        <script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

        <script src="js/cufon-yui.js" type="text/javascript"></script>
        <script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
        <script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/functions.js" type="text/javascript" charset="utf-8"></script>

        <script src="js/main.js" type="text/javascript" charset="utf-8"></script>


        <!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->

        <script type="text/javascript">
            $(document).ready(function () {

                // load messages every 1000 milliseconds from server.
                load_data = {'fetch': 1};
                window.setInterval(function () {
                    $.post('shout.php', load_data, function (data) {
                        $('.message_box').html(data);
                        var scrolltoh = $('.message_box')[0].scrollHeight;
                        $('.message_box').scrollTop(scrolltoh);
                    });
                }, 1000);

                //method to trigger when user hits enter key
                $("#shout_message").keypress(function (evt) {
                    if (evt.which == 13) {
                        var iusername = $('#shout_username').val();
                        var imessage = $('#shout_message').val();
                        post_data = {'username': iusername, 'message': imessage};

                        //send data to "shout.php" using jQuery $.post()
                        $.post('shout.php', post_data, function (data) {

                            //append data into messagebox with jQuery fade effect!
                            $(data).hide().appendTo('.message_box').fadeIn();

                            //keep scrolled to bottom of chat!
                            var scrolltoh = $('.message_box')[0].scrollHeight;
                            $('.message_box').scrollTop(scrolltoh);

                            //reset value of message box
                            $('#shout_message').val('');

                        }).fail(function (err) {

                            //alert HTTP server error
                            alert(err.statusText);
                        });
                    }
                });

                //toggle hide/show shout box
                $(".close_btn").click(function (e) {
                    //get CSS display state of .toggle_chat element
                    var toggleState = $('.toggle_chat').css('display');

                    //toggle show/hide chat box
                    $('.toggle_chat').slideToggle();

                    //use toggleState var to change close/open icon image
                    if (toggleState == 'block')
                    {
                        $(".header div").attr('class', 'open_btn');
                    } else {
                        $(".header div").attr('class', 'close_btn');
                    }


                });
            });

        </script>

        <!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->

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
            <!-- Begin Slider -->
            <div id="slider">

                <!-- End Shell -->
            </div>
            <!-- End Slider -->
            <!-- Begin Main -->
            <div id="main" class="shell">
                <!-- Begin Content -->
                <div id="content">

                </div
                <!-- End Content -->
                <!-- Begin Sidebar -->
                <div id="sidebar">
                    <ul>
                        <li class="widget">
                            
                            <h2><a href="products.php" class="more" title="More Brands">All Products</a> </h2>
                        </li>
                    </ul>
                </div>
                <!-- End Sidebar -->
                <div class="cl">&nbsp;</div>
                <!-- Begin Products -->
                <div id="products">
                    <h2>Featured Products</h2>



                    <form name="form1">
                        <input type="hidden" name="productid" />
                        <input type="hidden" name="command" />
                    </form>


                    <div class="section group">

                        <?php
                        $id = $_GET['page'];
//current URL of the Page. cart_update.php redirects back to this URL
                        $current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                        $results = $mysqli->query("SELECT * FROM product where Warehouse_ID = '".$id."'  ORDER BY Product_ID ASC");
                        if ($results) {

                            //fetch results set as object and output HTML
                            while ($obj = $results->fetch_object()) {
                                echo '<div class="grid_1_of_4 images_1_of_4">';
                                echo '<form method="post" action="cart_update.php">';
                                echo '<div class="product-thumb"> <a href="product_detail.php?id=' . $obj->Product_ID . '" > <img src="Admin/images/products/' . $obj->Picture . '"></a>-</div>';
                                echo '<div class="product-content"><h2><b>' . $obj->productName . '</b> </h2>';
                                echo '<div class="product-desc">' . $obj->Description . '</div>';
                                echo '<div class="product-info">';
                                echo '<p><span class="price"> Price:<big style="color:green">' . $currency . $obj->Price . '</big></span></p>';
                                echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
                                echo '<div class="button"><span><img src="images/cart.jpg" alt="" /><button class="cart-button"  class="add_to_cart">Add to Cart</button></span> </div>';
                                echo '</div></div>';
                                echo '<input type="hidden" name="Product_ID" value="' . $obj->Product_ID . '" />';
                                echo '<input type="hidden" name="type" value="add" />';
                                echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
                                echo '</form>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="cl">&nbsp;</div>
            </div>

            <!-- End Products -->

        </div>
        <!-- End Main -->
        <!-- Begin Footer -->
        <div id="footer">
            <div class="boxes">
                <!-- Begin Shell -->
                <div class="shell">
                    <div class="box post-box">
                        <h2>About OCS</h2>
                        <div class="box-entry">
                            <img src="images/logo_1.png" alt="IShop Logo" width="160" height="80"/>
                            <div class="cl">&nbsp;</div>
                        </div>
                    </div>
                    <div class="box social-box">
                        <h2>We are Social</h2>
                        <ul>
                            <li><a href="#" title="Facebook"><img src="images/social-icon1.png" alt="Facebook" /><span>Facebook</span><span class="cl">&nbsp;</span></a></li>
                            <li><a href="#" title="Twitter"><img src="images/social-icon2.png" alt="Twitter" /><span>Twitter</span><span class="cl">&nbsp;</span></a></li>							
                        </ul>
                        <div class="cl">&nbsp;</div>
                    </div>
                    <div class="box">
                        <h2>Information</h2>
                        <ul>
                            <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
                            <li><a href="#" title="Contact Us">Contact Us</a></li>
                            <li><a href="#" title="Log In">Log In</a></li>
                            <li><a href="#" title="Account">Account</a></li>

                        </ul>
                    </div>
                    <div class="box last-box">
                        <h2>Categories</h2>
                        <ul>
                           <li><a href="#" title="Dresses">Dresses</a></li>
                            <li><a href="#" title="skirts">skirts</a></li>
                            <li><a href="#" title="Fizzi Jeans">Jeans</a></li>
                            <li><a href="#" title="Jumpsuits">Jumpsuits</a></li>
                        </ul>
                    </div>
                    <div class="cl">&nbsp;</div>
                </div>
                <!-- End Shell -->
            </div>
            <div class="copy">
                <!-- Begin Shell -->
                <div class="shell">
                    <div class="carts">
                        <ul>
                            <li><span>We accept</span></li>
                            <li><a href="#" title="PayPal"><img src="images/cart-img1.jpg" alt="PayPal" /></a></li>
                            <li><a href="#" title="VISA"><img src="images/cart-img2.jpg" alt="VISA" /></a></li>
                            <li><a href="#" title="MasterCard"><img src="images/cart-img3.jpg" alt="MasterCard" /></a></li>
                        </ul>
                    </div>	<p>&copy; OCS. Groups <a href="index.php"><i><font color="fefefe"> Welcome To OCS Online Shopping Site </font></i></a></p>
                    <div class="cl">&nbsp;</div>
                    Copyright © 2018 OCS All rights reserved. The information contained in OFS may not be published, broadcast, rewritten, or redistributed without the prior written authority of SomStore.com
                </div>
                <!-- End Shell -->
            </div>
        </div>
        <!-- End Footer -->

        <div class="shout_box">
            <div class="header"> live Discussion of OFS <div class="close_btn">&nbsp;</div></div>
            <div class="toggle_chat">
                <div class="message_box">
                </div>
                <div class="user_info">
                    <input name="shout_username" id="shout_username" type="text" placeholder="Your Name" maxlength="15" />
                    <input name="shout_message" id="shout_message" type="text" placeholder="Type Message Hit Enter" maxlength="100" /> 
                </div>
            </div>
        </div>

        </div>
        <!-- End Wrapper -->
    </body>
</html>