<?php
session_start();
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <title>OFS | product Detail </title>
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
                    <div class="post">
                        <?php
                        
                        $id = $_GET['id'];
                        $cat_id = 0;
                        $bout_id = 0;
//current URL of the Page. cart_update.php redirects back to this URL
                        $current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

                        $results = $mysqli->query("SELECT * FROM product p,boutique b where Product_ID = '" . $id . "' and p.Warehouse_ID = b.Warehouse_ID  ORDER BY Product_ID ASC");
                        if ($results) {

                            //fetch results set as object and output HTML
                            while ($obj = $results->fetch_object()) {

                                $productName = $obj->productName;
                                $Product_ID = $obj->Product_ID;
                                $cat_id = $obj->Category_ID;
                                $bout_id = $obj->Warehouse_ID;
                                
                                $boutique = $obj->Warehouse;
                                $street = $obj->street;
                                $building = $obj->building;
                                $floor = $obj->	floor;
                                $city = $obj->City;
                                $coutry = $obj->Country;
                                
                                ?>
                                <h2><?php echo $productName; ?> Details!</h2>
                                <?php echo '<img src="Admin/images/products/' . $obj->Picture . '" alt="Post Image" height="160" width="260"/>'; ?> 
                                <strong> Name: </strong> <?php echo $productName; ?> <br/>
                                 
                                 <strong> Descriptions: </strong> <?php echo $obj->Description; ?> <br/>
                                 <strong> Size: </strong> <?php echo $obj->Type;; ?> <br/>
                                 <strong> Color: </strong> <?php echo $obj->Model;; ?> <br/>
                                 <strong> Price: </strong> <?php echo $obj->Price; ?> <br/>

                                <div class="cl">&nbsp;</div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div
                <!-- End Content -->
                <!-- Begin Sidebar -->
                <div id="sidebar">
                    <ul>
                        <li class="widget">
                            <h2>Location</h2>
                            <div class="brands">

                                <strong>Location: </strong> <?php echo $city." ( ".$coutry." )"; ?> <br/> 
                                <strong>Street: </strong> <?php echo $street; ?> <br/>
                                <strong>Building: </strong> <?php echo $building; ?> <br/>
                                <strong>Floor: </strong> <?php echo $floor; ?> <br/>
                                <strong>Boutique: </strong> <?php echo $boutique; ?> <br/>

                                <div class="cl">&nbsp;</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Sidebar -->
                <div class="cl">&nbsp;</div>
                <!-- Begin Products -->
                <div id="products">
                    <h2>Related Products</h2>



                    <form name="form1">
                        <input type="hidden" name="productid" />
                        <input type="hidden" name="command" />
                    </form>


                    <div class="section group">

                        <?php
                       // $id = $_GET['id'];
//current URL of the Page. cart_update.php redirects back to this URL
                        $current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                        //echo $cat_id;
                        $results = $mysqli->query("SELECT * FROM product p, category c,sub_category s, boutique b where p.Category_ID = '" . $cat_id . "'  and p.Category_ID = s.sub_category_id and c.Category_ID = s.Category_ID and p.Warehouse_ID = b.Warehouse_ID  ORDER BY Product_ID ASC");


                        if ($results) {

                            //fetch results set as object and output HTML
                            while ($obj = $results->fetch_object()) {
                                echo '<div class="grid_1_of_4 images_1_of_4">';
                                echo '<form method="post" action="cart_update.php">';
                                echo '<div class="product-thumb"><a href="product_detail.php?id=' . $obj->Product_ID . '" ><img src="Admin/images/products/' . $obj->Picture . '"></a></div>';
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
                        <h2>About OFS</h2>
                        <div class="box-entry">
                            <img src="images/favicon.png" alt="IShop Logo" width="160" height="80"/>
                            <p>You can be confident when you're shopping online with OFS. Our Secure online shopping website encrypts your personal and financial information to ensure your order information is protected.We use industry standard 128-bit encryption. Our Secure online shopping website locks all critical information passed from you to us,
                                such as personal information, in an encrypted envelope, making it extremely difficult for this information to be intercepted. </p>
                            <div class="cl">&nbsp;</div>
                        </div>
                    </div>
                    <div class="box social-box">
                        <h2>We are Social</h2>
                        <ul>
                            <li><a href="#" title="Facebook"><img src="images/social-icon1.png" alt="Facebook" /><span>Facebook</span><span class="cl">&nbsp;</span></a></li>
                            <li><a href="#" title="Twitter"><img src="images/social-icon2.png" alt="Twitter" /><span>Twitter</span><span class="cl">&nbsp;</span></a></li>							
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
                            <li><a href="#" title="Clothes">Dresses</a></li>
                            <li><a href="#" title="Cleaning Material">Skirts</a></li>
                            <li><a href="#" title="Fizzi Drinks">jeans</a></li>
                            <li><a href="#" title="Food Stuff">jumpsuits</a></li>
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
                    </div>	<p>&copy; O.F.S. Groups <a href="index.php"><i><font color="fefefe"> Welcome To Online fashion Shopping Store </font></i></a></p>
                    <div class="cl">&nbsp;</div>
                    Copyright © 2018 O.F.S. All rights reserved. The information contained in O.F.S. may not be published, broadcast, rewritten, or redistributed without the prior written authority of SomStore.com
                </div>
                <!-- End Shell -->
            </div>
        </div>
        <!-- End Footer -->

        <div class="shout_box">
            <div class="header"> live Discussion of O.F.S. <div class="close_btn">&nbsp;</div></div>
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