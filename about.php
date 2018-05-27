<?php
session_start();
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <title> SomStore Group </title>
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

        <!-- Linking scripts -->
        <script src="js/main.js" type="text/javascript"></script>


        <!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->

        <script type="text/javascript">
            $(document).ready(function() {

                // load messages every 1000 milliseconds from server.
                load_data = {'fetch': 1};
                window.setInterval(function() {
                    $.post('shout.php', load_data, function(data) {
                        $('.message_box').html(data);
                        var scrolltoh = $('.message_box')[0].scrollHeight;
                        $('.message_box').scrollTop(scrolltoh);
                    });
                }, 1000);

                //method to trigger when user hits enter key
                $("#shout_message").keypress(function(evt) {
                    if (evt.which == 13) {
                        var iusername = $('#shout_username').val();
                        var imessage = $('#shout_message').val();
                        post_data = {'username': iusername, 'message': imessage};

                        //send data to "shout.php" using jQuery $.post()
                        $.post('shout.php', post_data, function(data) {

                            //append data into messagebox with jQuery fade effect!
                            $(data).hide().appendTo('.message_box').fadeIn();

                            //keep scrolled to bottom of chat!
                            var scrolltoh = $('.message_box')[0].scrollHeight;
                            $('.message_box').scrollTop(scrolltoh);

                            //reset value of message box
                            $('#shout_message').val('');

                        }).fail(function(err) {

                            //alert HTTP server error
                            alert(err.statusText);
                        });
                    }
                });

                //toggle hide/show shout box
                $(".close_btn").click(function(e) {
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


                    <div class="post">

                        <h1 align="center"><font color="blue">About The Project Developers</font></h1><br>
                            <h2>Developer</h2>
                            <img src="images/xogmo.jpg" alt="Post Image" width="140" height="159" />
                            <p>Abdirahman Osman Sheikh farah. </p>
                            <p>. <a href="#" class="more" title="Read More">Read More</a></p>
                            <div class="cl">&nbsp;</div>
                    </div>
                    <div class="post">
                        <h2>Developer</h2>
                        <img src="images/jananka.jpg" alt="Post Image" width="140" height="159" />
                        <p>Abdirahman Ali Abdi. </p>
                        <p>. <a href="#" class="more" title="Read More">Read More</a></p>
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

            </div>
            <!-- End Main -->

            <div class="boxes">

                <div class="copy">
                    <!-- Begin Shell -->
                    <div class="shell">
                        <div class="carts">
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

                        </div>	<p align="center">&copy; SomStore.com. Groups <a href="index.php"><i><font color="fefefe"> Welcome To <strong> SomStore</strong> Online Shopping Site </font></i></a></p>
                        <div class="cl">&nbsp;</div>
                    </div>
                    <!-- End Shell -->
                </div>
            </div>

            <!-- End Wrapper -->
    </body>
</html>