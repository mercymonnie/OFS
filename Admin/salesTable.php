<?php
include("../config.php");
include("../session.php");
error_reporting(0);
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title> OFS|Admin|Sales </title>

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
                    <div class="module_content">
                    </div>
                    <?php
                    include("../config.php");
                    $emp_id = $_SESSION['user_id'];
                    $result = mysqli_query($mysqli, "SELECT * FROM payment p,invoice_items i,product pd WHERE p.order_ID = i.order_ID AND i.item = pd.Product_ID AND pd.Employee_ID = '".$emp_id."' GROUP BY i.order_ID ");
                    ?>
                    <div id="tab2" class="tab_content">

                        <table class="tablesorter" cellspacing="0"> 
                            <thead>
                            <th colspan="13">  Sales Information  </th> </thead>
                            <thead>
                                <tr>
                                    <th>Check</th> 
                                    <th> #</th>
                                    <th> Customer</th>	
                                    <th>Phone</th>	
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Delivery Address</th>
                                    <th>Amount(Ugx)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $total_amount = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $no ++;
                                    ?>

                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><?Php echo $no; ?></td>
                                        <td><?php echo $row['Full_Name']; ?></td>
                                        <td><?php echo $row['Phone']; ?></td>
                                        <td><?php echo $row['Email']; ?></td>
                                        <td><?php echo $row['Country']; ?></td>
                                        <td><?php echo $row['City']; ?></td>
                                        <td><?php echo $row['Address']; ?></td>
                                        <td><?php echo $row['Dilivery_Address']; ?></td>
                                        <td><?php
                                            echo number_format($row['Total_Amount']);
                                            $total_amount += $row['Total_Amount'];
                                            ?></td>

                                    </tr>

                                <?php }mysqli_close($mysqli); ?>
                            </tbody>
                            <tfoot>
                            <th> <h2>  <strong>Total Sales:</strong>  <?php echo number_format($total_amount); ?> </h2> </th>
                            </tfoot>
                        </table>


                        <table class="tablesorter" cellspacing="0"> 
                            <thead>
                            <th colspan="13">  Item Sold  </th> </thead>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th> #</th>
                                    <th> Item</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Boutique</th>                                   
                                    <th>Qty</th>	
                                    <th>UnitPrice(UGX)</th>
                                    <th>Total(UGX)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("../config.php");
                                $emp_id = $_SESSION['user_id'];
                                $result1 = mysqli_query($mysqli, "SELECT * FROM invoice_items i, product p, category c, sub_category s, boutique b "
                                        . " WHERE i.item = p.Product_ID AND p.Category_ID = s.sub_category_id AND s.Category_ID = c.Category_ID AND p.Warehouse_ID = b.Warehouse_ID AND p.Employee_ID = '".$emp_id."' GROUP BY date");
                                $no = 0;
                                $qty_sold = 0;
                                $cost_p = 0;
                                $bal = 0;

                                while ($row1 = mysqli_fetch_array($result1)) {
                                    $date = $row1['date'];
                                    $result22 = mysqli_query($mysqli, "SELECT * FROM invoice_items i, product p, category c, sub_category s, boutique b "
                                            . " WHERE i.item = p.Product_ID AND p.Category_ID = s.sub_category_id AND s.Category_ID = c.Category_ID AND p.Warehouse_ID = b.Warehouse_ID AND date = '" . $date . "' ");
                                    $count = mysqli_num_rows($result22);
                                    ?>
                                    <tr><td rowspan="<?php echo $count + 1; ?>"><input type="checkbox"> <?php echo $date; ?></td></tr>
                                    <?php
                                    $result = mysqli_query($mysqli, "SELECT * FROM invoice_items i, product p, category c, sub_category s, boutique b "
                                            . " WHERE i.item = p.Product_ID AND p.Category_ID = s.sub_category_id AND s.Category_ID = c.Category_ID AND p.Warehouse_ID = b.Warehouse_ID AND date = '" . $date . "' ");
                                    $no = 0;
                                   // $total_amount = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $no ++;
                                        $qty_sold += $row['qty'];
                                        $costp = $row['cost_price'];
                                        $bl = $row['balance'];
         
                                        $bal += $bl;
                                        $cost_p += $costp*$row['qty'];
                                        ?>


                                        <tr>

                                            <td><?Php echo $no; ?></td>
                                            <td><?php echo $row['productName']; ?></td>
                                            <td><?php echo $row['Category_Name']; ?></td>
                                            <td><?php echo $row['sub_name']; ?></td>
                                            <td><?php echo $row['Warehouse']; ?></td>
                                            <td><?php echo $row['qty']; ?></td>
                                            <td><?php echo number_format($row['unit_price']); ?></td>
                                            <td><?php echo number_format($row['price']); ?></td>


                                        </tr>

                                    <?php
                                    }mysqli_close($mysqli);
                                };
                                ?>
                            </tbody>
                            <tfoot>
                            <th> <h4><strong>Qty Sold:</strong>  <?php echo "        ".$qty_sold; ?></h4> 
                                <h4><strong>Cost Price:</strong>  <?php echo  "        ".number_format($cost_p); ?></h4> 
                                <h2><strong>Profit:</strong>  <?php echo "        ". number_format($total_amount - $cost_p); ?> </h2> <br/></th>
                            </tfoot>
                        </table>
                    </div><!-- end of #tab2 -->
                    <div class="clear"></div>
                    <div class="spacer"></div>
                </section>
            </div>
        </div>

    </body>

</html>