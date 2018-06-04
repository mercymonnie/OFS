<?php
include("../config.php");
include("../session.php");
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title> OFS|ORDER</title>

        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="js/hideshow.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.equalHeight.js"></script>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $(".tablesorter").tablesorter();
            }
            );
            $(document).ready(function () {

                //When page loads...
                $(".tab_content").hide(); //Hide all content
                $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                $(".tab_content:first").show(); //Show first tab content

                //On Click Event
                $("ul.tabs li").click(function () {

                    $("ul.tabs li").removeClass("active"); //Remove any "active" class
                    $(this).addClass("active"); //Add "active" class to selected tab
                    $(".tab_content").hide(); //Hide all tab content

                    var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                    $(activeTab).fadeIn(); //Fade in the active ID content
                    return false;
                });

            });
        </script>
        <script type="text/javascript">
            $(function () {
                $('.column').equalHeight();
            });
        </script>

    </head>


    <body>
        <div id="container">


            <div id="header">


                <div id="logo-banner">


                    <div id="banner">

                    </div>

                </div>
            </div> <!--DHAMAADKA hedaerka-->


            <div id="content-wrap">		
               

                <?php
                if ($_SESSION['role'] == 'admin') {
                    include_once 'includes/navigation_admin.php';
                    include_once 'includes/side_menu_admin.php';
                } else {
                    include_once 'includes/navigation.php';
                    include_once 'includes/side_menu.php';
                }
                ?><!-- end of sidebar -->

                <section id="main" class="column">

                    <?php include_once 'includes/login_type.php'; ?>
                    <div class="module_content">


                    </div>



                    <?php
                    $result = mysqli_query($mysqli, "SELECT * FROM payment");
                    ?>
                    <div id="tab2" class="tab_content">

                        <table class="tablesorter" cellspacing="0"> 
                            <thead>
                            <thead><th colspan="15"> Customer Order Detail </th></thead>
                            <thead>
                                </tr>
                            <th>Check</th> 
                            <th> ID</th>
                            <th> FullName</th>
                            <th> Email</th>
                            <th>Adress</th>	
                            <th>Country</th>	
                            <th>City</th>
                            <th>Phone</th>
                            <th>Delivery Address</th>
                            <th>Total Amount</th>
                            <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><?Php echo $row['order_ID']; ?></td>
                                        <td><?php echo $row['Full_Name']; ?></td>
                                        <td><?php echo $row['Email']; ?></td>
                                        <td><?php echo $row['Address']; ?></td>
                                        <td><?php echo $row['Country']; ?></td>
                                        <td><?php echo $row['City']; ?></td>
                                        <td><?php echo $row['Phone']; ?></td>
                                       
                                        <td><?php echo $row['Dilivery_Address']; ?></td>
                                   
                                        <td><?php echo $row['Total_Amount']; ?></td>
                                        <td> <a href="PaymentDelete.php?delete=<?php echo $row['order_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
                                    </tr



                                <?php }mysqli_close($mysqli); ?>
                            </tbody>
                        </table>


                    </div><!-- end of #tab2 -->



                    <div class="clear"></div>



                    <div class="spacer"></div>
                </section>
            </div>
        </div>

    </body>

</html>