<?php
include("usersession.php");
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <title> OFS Group </title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="images/favicon.png" />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />

        <link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />

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

                <br> <br>
                        <!-- Begin Content -->
                        <div id="content">
                            <div class="post">
                                <h2>Welcome!</h2>
                                <img src="images/logo.png" alt="Post Image" height="160" width="260"/>
                                You can be confident when you're shopping online with OFS. Our Secure online shopping website encrypts your personal and financial information to ensure your order information is protected.We use industry standard 128-bit encryption. Our Secure online shopping website locks all critical information passed from you to us,
                                such as personal information, in an encrypted envelope, making it extremely difficult for this information to be intercepted.. <a href="#" class="more" title="Read More">Read More</a></p>




                                <div class="cl">&nbsp;</div>
                            </div>
                        </div>
                        <!-- End Content -->
                        <!-- Begin Sidebar -->
                        <div id="sidebar">
                            <ul>
                                <li class="widget">
                                    <h2>Customer Information</h2>
                                    <div class="brands">
                                        <div id="form_wrapper" class="form_wrapper">			
                                            <?php
                                            $id = $_SESSION['login_username'];
                                            $query = mysqli_query($mysqli, "SELECT * FROM customer WHERE Email = '$id'") or die(mysqli_error());
                                            $result = mysqli_fetch_array($query);
                                            ?>
                                            <table>	
                                                <form  class="register active" action="custUpdate.php" method="POST" autocomplete="off">
                                                    <tr>

                                                        <td><input name="username" type="hidden" id="namebox" value="<?php echo $result['Cust_Id'] ?>"/></td></tr>
                                                    <tr>

                                                        <td>  <label>Full Name:</label><input name="firstname"  type="text" id="namebox" value="<?php echo $result['FullName'] ?>"/></td></tr>
                                                    <tr>

                                                        <td> <label>User Name:</label><input name="lastname"  type="text" id="namebox" value="<?php echo $result['UserName'] ?>"/></td></tr>
                                                    <tr>

                                                        <td> <label>Phone:</label><input name="phone"  type="text" id="namebox" value="<?php echo $result['Phone'] ?>"/></td></tr>
                                                    <tr>

                                                        <td> <label>Email:</label><input name="Email" type="text" id="namebox" value="<?php echo $result['Email'] ?>"/></td></tr>
                                                    <tr>

                                                        <td> <label>Country:</label> <input name="country"  type="text" id="namebox" value="<?php echo $result['Country'] ?>"/></td></tr>
                                                    <tr>

                                                        <td> <label>City:</label> <input name="city"  type="text" id="namebox" value="<?php echo $result['City'] ?>"/></td></tr>
                                                    <tr>

                                                        <td> <label>Address:</label> <input name="address"  type="text" id="namebox" value="<?php echo $result['Adress'] ?>"/></td></tr>
                                                    <tr>

                                                        <td> <label>Postal Code:</label> <input name="pcode"  type="text" id="namebox" value="<?php echo $result['PostalCode'] ?>"/></td></tr>


                                                    <td colspan="3">	

                                                        <button type="submit"  name="submit" value="Update" class="a-btn"><span class="a-btn-text"> Update</span> </button>

                                                    </td>

                                                </form>
                                            </table>
                                        </div>

                                        <div class="cl">&nbsp;</div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <!-- End Sidebar -->
                        <div class="cl">&nbsp;</div>




                        <!-- Begin Products Slider -->
                        <div id="product-slider">
                            <h2>Best Products</h2>
                            <ul>

                                <?php
                                $result = mysqli_query($mysqli, "select * from product") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <li>
                                        <a href="products.php" title="Product Link"><img src="images/<?php echo $row['Picture'] ?>" alt="IMAGES" /></a>
                                        <div class="info">
                                            <h4><b><?php echo $row['productName'] ?></b></h4>
                                            <span class="number"><span>Price:<big style="color:green">$<?php echo $row['Price'] ?></big></span></span>

                                            <div class="cl">&nbsp;</div>

                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                            <div class="cl">&nbsp;</div>
                        </div>
                        <!-- End Products Slider -->		


                        <?php
                        $ids = $_SESSION['login_username'];
                        $qry = mysqli_query($mysqli, "SELECT * FROM customer WHERE Email = '$ids'") or die(mysqli_error());
                        ?>




                        </div>
                        <!-- End Main -->

                        </div>
                        <!-- End Wrapper -->
                        </body>
                        </html>