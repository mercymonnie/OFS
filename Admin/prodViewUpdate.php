	
<?php
include("../session.php");
include("../config.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>OFS|Admin|Product </title>

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


                    <?php
                    $update = $_GET['update'];
                    $result = mysqli_query($mysqli, "SELECT * FROM product p, sub_category c,boutique b  where Product_ID ='$update' AND p.Category_ID = c.sub_category_id AND p.Warehouse_ID = b.Warehouse_ID");
                    ?>
                    <?php if ($row = mysqli_fetch_array($result)) {
                        ?> 


                        <div id="form_wrapper" class="form_wrapper">

                            <table>
                                <form class="register active" action="prodUpdate.php" method="POST" autocomplete="off">

                                    <th colspan="3"><h2>Update Product Data :</h2> </th> 

                                    <input type="hidden" id="ID" name="ID" value="<?php echo $row['Product_ID']; ?>"  placeholder="ID" required>
                                    <span class="error">This is an error</span>

                                    <tr>

                                        <td>  

                                            <label>Full Name:</label>

                                            <input type="text" id="fname" name="fname" value="<?php echo $row['productName']; ?>"  placeholder="Full name" required>
                                            <span class="error">This is an error</span>
                                        </td>
                                        <td>   

                                            <label>Sub-Categor:</label>

                                            <select name="category" class="ed">
                                                <?php
                                                include('../config.php');
                                                $name = mysqli_query($mysqli, "select * from sub_category ");

//echo '<select  name="select"  id="ml" class="ed">';
                                                echo '<option value=' . $row['sub_category_id'] . '> ' . $row['sub_name'] . '</option>';
                                                while ($res = mysqli_fetch_assoc($name)) {
                                                    echo '<option value=' . $res['sub_category_id'] . '>' . $res['sub_name'] . '</option>';
                                                }
                                                ?>
                                            </select>

                                            <span class="error">This is an error</span>
                                        </td>

                                        <td>   

                                            <label>Color:</label>

                                            <select name="color" class="ed">
                                                <option value="<?php echo $row['Model']; ?>"><?php echo $row['Model']; ?></option>
                                                <option value="black">Black</option>
                                                <option value="white">White</option>
                                                <option value="orange">Orange</option>
                                                <option value="yellow">Yellow</option>
                                                <option value="red">red</option>
                                                <option value="grey">gray</option>
                                                <option value="maroon">maroon</option>
                                                <option value="purple">purple</option>
                                                <option value="brown">brown</option>
                                                <option value="green">green</option>
                                                <option value="beige">beige</option>


                                            </select>

                                            <span class="error">This is an error</span>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>  

                                            <label>Size:</label>

                                            <input type="text" id="type" name="type" value="<?php echo $row['Type']; ?>"  placeholder="Full name" required>
                                            <span class="error">This is an error</span>
                                        </td>
                                        <td>   

                                            <label>Boutique:</label>

                                            <select name="boutique" class="ed">
                                                <?php
                                                include('../config.php');
                                                $name = mysqli_query($mysqli, "select * from boutique");

//echo '<select  name="select"  id="ml" class="ed">';
                                                echo '<option value=' . $row['Warehouse_ID'] . '>' . $row['Warehouse'] . '</option>';
                                                while ($res = mysqli_fetch_assoc($name)) {


                                                    echo '<option value=' . $res['Warehouse_ID'] . '>' . $res['Warehouse'] . '-' . $res['City'] . '</option>';
                                                }
                                                ?>
                                            </select>

                                            <span class="error">This is an error</span>


                                        </td>
                                        <td>   

                                            <label>Description:</label>

                                            <input type="text" id="desp" name="desp" value="<?php echo $row['Description']; ?>" placeholder="User name" required>
                                            <span class="error">This is an error</span>


                                        </td>

                                    </tr>


                                    <tr>
                                        <td>  

                                            <label>Cost-Price:</label>

                                            <input type="text" id="price" name="cost" value="<?php echo $row['cost_price']; ?>"  placeholder="enter cost-price" required>
                                            <span class="error">This is an error</span>
                                        </td>
                                        <td>  

                                            <label>Selling-Price:</label>

                                            <input type="text" id="price" name="price" value="<?php echo $row['Price']; ?>"  placeholder="Full name" required>
                                            <span class="error">This is an error</span>
                                        </td>

                                        <td>  

                                            <label>Stock</label>

                                            <input type="text" id="price" name="stock" value="<?php echo $row['balance']; ?>"  placeholder="enter stock balance" required>
                                            <span class="error">This is an error</span>
                                        </td>



                                    </tr>


                                    <div class="bottom">

                                        <td colspan="3">	

                                        <td colspan="3">	

                                            <button type="submit"  name="submit" value="Update" class="a-btn"> <span class="a-btn-text">Update</span></button>

                                        </td>

                                        </td>

                                        <div class="clear"></div>
                                    </div>

                                </form>

                            </table>
                        </div>
                    <?php } ?>



                    <article class="module width_3_quarter">


                    </article><!-- end of content manager article -->

                </section>
            </div>
        </div>

    </body>

</html>