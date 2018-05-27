<?php
session_start();
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <title> Somstore Groups </title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="images/favicon.png" />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />

        <link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" /> 


        <link rel="stylesheet" href="css/audioplayer.css"  type="text/css" media="screen" />

        <script>
            /*
             VIEWPORT BUG FIX
             iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
             */
            (function (doc) {
                var addEvent = 'addEventListener', type = 'gesturestart', qsa = 'querySelectorAll', scales = [1, 1], meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];
                function fix() {
                    meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
                    doc.removeEventListener(type, fix, true);
                }
                if ((meta = meta[meta.length - 1]) && addEvent in doc) {
                    fix();
                    scales = [.25, 1.6];
                    doc[addEvent](type, fix, true);
                }
            }(document));
        </script>
        <script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

        <script src="js/cufon-yui.js" type="text/javascript"></script>
        <script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
        <script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/functions.js" type="text/javascript" charset="utf-8"></script>


        <!-- Linking scripts -->
        <script src="js/main.js" type="text/javascript"></script>

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
        <?php
        $page = $_GET['page'];
        echo $page;
        ?>
        <!-- Begin Wrapper -->
        <div id="wrapper">
            <!-- Begin Header -->
            <?php include_once 'includes/header.php'; ?>
            <!-- End Header -->
            <!-- Begin Navigation -->


            <?php include_once 'includes/navigation.php'; ?>
            <div id="slider">

                <!-- End Shell -->
            </div>
            <!-- End Slider -->
            <!-- Begin Main -->
            <div id="main" class="shell">
                <!-- Begin Main -->
                <div id="main" class="shell">
                    <!-- Begin Content -->
                    <div id="content">
                        <div class="post">
                            <h2>Welcome!</h2>
                            <img src="images/logo.png" alt="Post Image" height="160" width="260"/>
                            You can be confident when you're shopping online with SomStore. Our Secure online shopping website encrypts your personal and financial information to ensure your order information is protected.We use industry standard 128-bit encryption. Our Secure online shopping website locks all critical information passed from you to us,
                            such as personal information, in an encrypted envelope, making it extremely difficult for this information to be intercepted.. <a href="#" class="more" title="Read More">Read More</a></p>
                            <div class="cl">&nbsp;</div>
                        </div>
                    </div>
                    <!-- End Content -->
                    <!-- Begin Sidebar -->
                    <div id="sidebar">
                        <ul>
                            <li class="widget">
                                <h2>TOP Warehouse</h2>
                                <div class="brands">
                                    <ul>
                                        <li><a href="warehouse_1.php" title="Brand 1"><img src="images/k.png" width="103" height="51" alt="Brand 1" /></a></li>
                                        <li><a href="warehouse_2.php" title="Brand 2"><img src="images/b.png" width="103" height="51" alt="Brand 2" /></a></li>
                                        <li><a href="warehouse_3.php" title="Brand 3"><img src="images/ab.png" width="103" height="51" alt="Brand 3" /></a></li>
                                        <li><a href="warehouse_4.php" title="Brand 4"><img src="images/33.png" width="103" height="51" alt="Brand 4" /></a></li>
                                    </ul>
                                    <div class="cl">&nbsp;</div>
                                </div>
                                <a href="products.php" class="more" title="More Brands">All Products</a>
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
//current URL of the Page. cart_update.php redirects back to this URL
                            $current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

                            $results = $mysqli->query("SELECT * FROM product where Warehouse_ID=7 ORDER BY Product_ID ASC");
                            if ($results) {

                                //fetch results set as object and output HTML
                                while ($obj = $results->fetch_object()) {
                                    echo '<div class="grid_1_of_4 images_1_of_4">';
                                    echo '<form method="post" action="cart_update.php">';
                                    echo '<div class="product-thumb"><img src="images/' . $obj->Picture . '"></div>';
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
           <?php include_once 'includes/footer.php'; ?>
            <!-- End Footer -->

            <div class="shout_box">
                <div class="header"> live Discussion of Somstore <div class="close_btn">&nbsp;</div></div>
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