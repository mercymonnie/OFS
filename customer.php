<?php
session_start();
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <title> OFS Groups </title>
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
            <!-- End Navigation -->		<!-- Begin Slider -->
            <div id="slider">

                <!-- End Shell -->
            </div>
            <!-- End Slider -->
            <!-- Begin Main -->
            <div id="main" class="shell">
                <!-- Begin Content -->
                <div id="content">


                    <script type="text/javascript">
                        $(document).ready(function() {

                            $('#btnSubmit').click(function() {

                                $(".error").hide();
                                var hasError = false;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

                                var emailaddressVal = $("#email").val();
                                if (emailaddressVal == '') {
                                    $("#email").after('<span class="error">Please enter your email address.</span>');
                                    hasError = true;
                                }

                                else if (!emailReg.test(emailaddressVal)) {
                                    $("#email").after('<span class="error">Enter a valid email address.</span>');
                                    hasError = true;
                                }

                                if (hasError == true) {
                                    return false;
                                }

                            });
                        });

                    </script>


                    <div id="form_wrapper" class="form_wrapper">
                        <table>
                            <form class="register active"  id="myForm" method="POST" action="insertCustomer.php">


                                <th colspan="3"><h2>CUSTOMER REGISTRATION:</h2> </th> 




                                <tr>
                                    <td>  

                                        <label> Email:</label>
                                        <input type="text" name="email" id="email"/>
                                        <span class="error">This is an error</span>


                                    </td>
                                    <td>   



                                        <label> FullName:</label>
                                        <input type="text" name="name" />
                                        <span class="error">This is an error</span>

                                    </td>


                                </tr>

                                <tr>
                                    <td>  

                                        <label>Password:</label>
                                        <input type="password" name="password1" id="password1" />

                                    </td>

                                    <td>   
                                        <label>UserName:</label>
                                        <input type="text" name="username" id="username"/>
                                        <span class="error">This is an error</span>

                                    </td>

                                </tr>

                                <tr>
                                    <td>  

                                        <label> Re-Password:</label>
                                        <input type="password" name="password2"id="password2" />  
                                        <div id="pass-info"> </div>
                                    </td>

                                    <td>   

                                        <label> Phone:</label>
                                        <input type="text" name="tell" id="tell"/>
                                        <span class="error">This is an error</span>

                                    </td>


                                </tr>

                                <tr>
                                    <td>   

                                        <label> Cuntery:</label>
                                        <script type="text/javascript" src="js/countries.js"></script>
                                        <select onchange="print_state('state', this.selectedIndex);" id="country" name ="country"></select>

                                    </td>

                                    <td>   

                                        <label>Address:</label>
                                        <input type="text" name="address" id="address"/>
                                        <span class="error">This is an error</span>   


                                    </td>


                                </tr>


                                <tr>
                                    <td>   

                                        <label> City:</label>
                                        <select name ="City" id ="state"></select>
                                        <script language="javascript">print_country("country");</script>
                                        <span class="error">This is an error</span>
                                    </td>

                                    <td>   

                                        <label>Postal code:</label>
                                        <input type="text" name="pcode" id="pcode"/>
                                        <span class="error">This is an error</span>

                                    </td>

                                </tr>


                                <tr>
                                    <div class="bottom">

                                        <td colspan="3">	
                                            <button  id="btnSubmit" type="submit" name="submit"> Register</button>

                                            <div class="clear"></div>
                                    </div>


                                </tr>
                            </form>

                        </table>


                        <script type="text/javascript">

                            $(document).ready(function() {
                                $("#btnSubmit").click(function() {
                                    alert("Are You Want To Save A New Customer !!!");
                                    $.ajax({
                                        cache: false,
                                        type: 'POST',
                                        url: 'insertCustomer.php',
                                        data: $("#myForm").serialize(),
                                        success: function(d) {
                                            $("#someElement").html(d);
                                        }
                                    });
                                });
                            });

                        </script>


                    </div>


                </div>
                <!-- End Content -->
                <!-- Begin Sidebar -->
                <div id="sidebar">
                   
                </div>
                <!-- End Sidebar -->
                <div class="cl">&nbsp;</div>
                <!-- Begin Products -->



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
                                <img src="images/logo.png" alt="OFS" width="160" height="80"/>
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
                                <li><a href="#" title="Zaad service"><img src="images/zaad.png" alt="Zaad Service" /></a></li>
                                <li><a href="#" title="OFS"><img src="images/suncart.png" alt="OFS" /></a></li>

                            </ul>
                        </div>	<p>&copy; OFS. Groups <a href="index.php"><i><font color="fefefe"> Welcome To OFS Online Shopping Site </font></i></a></p>
                        <div class="cl">&nbsp;</div>
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