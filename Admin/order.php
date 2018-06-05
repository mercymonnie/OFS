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


            <?php include_once 'includes/header.php';?><!--DHAMAADKA hedaerka-->


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
                    $emp_id   = $_SESSION['user_id'];
                    $result = mysqli_query($mysqli, "SELECT * FROM payment p,invoice_items i,product pd WHERE p.order_ID = i.order_ID AND i.item = pd.Product_ID AND pd.Employee_ID = '".$emp_id."' GROUP BY i.order_ID ");
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
                                    $emp_id = $_SESSION['user_id'];
                                    $order_id = $row['order_ID'];
                                    $qqqry = mysqli_query($mysqli, "SELECT * FROM invoice_items i, product p, category c, sub_category s, boutique b "
                                            . " WHERE i.item = p.Product_ID AND i.order_ID = '" . $order_id . "' AND p.Category_ID = s.sub_category_id AND s.Category_ID = c.Category_ID AND p.Warehouse_ID = b.Warehouse_ID AND p.Employee_ID = '" . $emp_id . "' GROUP BY date");
                                    
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
                                   
                                        <td><?php 
                                        if ($qqqry) {
                                                if ($obj = $qqqry->fetch_object()) {
                                                    $amount = $obj->price;
                                                    echo number_format($obj->price);
                                                    //$total_amount += $obj->price;
                                                }
                                            }
                                            ?>
                                        </td>
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