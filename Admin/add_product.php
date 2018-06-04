<?php
include("../session.php");
include("../config.php");
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>OFS|Admin|Products </title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
        <link rel="shortcut icon" href="images/favicon.png" />
        <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" />


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
            });</script>
        <script type="text/javascript">
            $(function () {
            $('.column').equalHeight();
            });</script>


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
                //echo "ROLE::: ".$_SESSION['role']." -- ".$_SESSION['user_id'];
                if ($_SESSION['role'] == 'admin') {
                    include_once 'includes/navigation_admin.php';
                    include_once 'includes/side_menu_admin.php';
                } else {
                    include_once 'includes/navigation.php';
                    include_once 'includes/side_menu.php';
                }
                ?>



                <section id="main" class="column">
                    <?php include_once 'includes/login_type.php'; ?>
                    <SCRIPT language="Javascript">
                        <!--
                          function isNumberKey(evt)
                        {

                        var charCode = (evt.which) ? evt.which : event.keyCode
                                window.alert("Pls. Sir In A Price Field Only Numbers Allowed !!!");
                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                                return false;
                        return true;
                        }


                    </SCRIPT>


                        <script type="text/javasc                        ript">
                                $(function () {

                                $('.                        user').keyup(function () {

                                if (this.va                        lue.match(/[^a-zA-Z]/g)) {

                                this.value = this.value.                        replace(/[^a-zA-Z ]/g, '');
                                window.alert("Pls. Sir In A UserName Field Only Charecters Allowed !!!");
                                }

                                });
                                });
                            </script>



                            <div id="form_wrapper" cla        ss="form_wrapper">

                                <table>
                                    <form class="register active"  action="insertions/insertProduct.php"method="POST" id="myForm">

                                        <th colspan="3"><h2>ADD PRODUCT:</h2> </th> 


                                        <tr>
                                            <td>  

                                                <label> Name:</label>
                                                <input type="text" name="name" id="name"  class="user" required>
                                                <span class="error">This is an error</span>

                                            </td>
                                            <td>   
                                                <label>Sub-Category:</label>

                                                <select name="category" class="ed">
                                                    <?php
                                                    include('../config.php');
                                                    $name = mysqli_query($mysqli, "select * from sub_category");

//echo '<select  name="select"  id="ml" class="ed">';
                                                    echo '<option selected="selected">Select</option>';
                                                    while ($res = mysqli_fetch_assoc($name)) {


                                                        echo '<option value=' . $res['sub_category_id'] . '>' . $res['sub_name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>


                                            </td>



                                            <td>  

                                                <label> Color:</label>
                                                <select name="color" class="ed">
                                                    <option value="blue">Blue</option>
                                                    <option value="black">Black</option>
                                                    <option value="white">White</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="yellow">Yellow</option>
                                                    <option value="red">red</option>
                                                    <option value="grey">gray</option>
                                                    <option value="maroon">maroon</option>
                                                    <option value="purple">purple</option>
                                                    <option value="browm">brown</option>
                                                    <option value="green">green</option>
                                                    <option value="beige">beige</option>


                                                </select>
                                                <span id="pass-info"> </span>

                                            </td>

                                        </tr>


                                        <tr>


                                            <td> 

                                                <label>Size:</label>

                                                <select name="size" class="ed" required>
                                                    <option value="xxl">XXL</option>
                                                    <option value="xl">XL</option>
                                                    <option value="l">L</option>
                                                    <option value="m">M</option>
                                                    <option value="s">S</option>

                                                </select>
                                                <span id="pass-info"> </span>



                                            </td>
                                            <td> 
                                                <label> Boutique:</label>
                                                <select name="boutique" class="ed">
                                                    <?php
                                                    include('../config.php');
                                                    $name = mysqli_query($mysqli, "select * from boutique");

//echo '<select  name="select"  id="ml" class="ed">';
                                                    echo '<option selected="selected">Select</option>';
                                                    while ($res = mysqli_fetch_assoc($name)) {


                                                        echo '<option value=' . $res['Warehouse_ID'] . '>' . $res['Warehouse'] . '-' . $res['City'] . '</option>';
                                                    }
                                                    ?>
                                                </select>


                                            </td>

                                            <td>   
                                                <label> Description:</label>
                                                <input type="text"  name="description"  id="ml"  maxlength="19" required> 
                                                <span id="pass-info"> </span>

                                            </td>

                                        </tr>


                                        <tr>
                                            <td>  

                                                <label>Cost-Price:</label>
                                                <input type="text"  name="cost"  id="price"  onkeypre                                            ss="return isNumberKey(event)"  required>



                                            </td>
                                            <td>  

                                                <label>Selling-Price:</label>
                                                <input type="text"  name="price"  id="price"  onkeypre                                            ss="return isNumberKey(event)"  required>
                                                <span class="error">This is an error</span>


                                            </td>
                                            <td>  

                                                <label>Qty:</label>
                                                <input type="text"  name="stock"  id="price"  onkeypre                                            ss="return isNumberKey(event)"  required>



                                            </td>

                                        </tr><tr>
                                            <td>   

                                                <label> Picture:</label>
                                                <input type="file" name="picture" id="picture"  required>


                                            </td>


                                        </tr>


                                        <div class="bottom">

                                            <td colspan="3">	

                                                <button name="save" id="delbutton" title="Click to Save"  class="a-btn" > <span class="a-btn-text"> Add Product</span></</button>
                                                <div class="clear"></div>
                                        </div>

                                    </form>

                                </table>


                                <script src="js/jquery.js"></script>



                            </div>

                            <?php
                            $emp_id = $_SESSION['user_id'];
                            $result = mysqli_query($mysqli, "SELECT * FROM product WHERE Employee_ID = '".$emp_id."' ");
                            ?>
                            <div id="tab1" class="tab_content">
                                <table class="tablesorter" cellspacing="0"> 

                                    <thead>  <th Colspan="11">  OFS Product Data Table </th></thead>
                                    <thead>
                                        </tr>
                                    <th>Check</th> 
                                    <th>ID</th>
                                    <th> Name</th>			  
                                    <th>Category</th>
                                    <th>Model</th>				
                                    <th> Type</th>
                                    <th>Boutique</th>				
                                    <th> Description</th>
                                    <th>Cost-Price</th>
                                     <th>Selling-Price</th>
                                      <th>STOCK</th>
                                    <th> Picture</th>
                                    <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($result)) {
                                            ?>

                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td><?Php echo $row['Product_ID']; ?></td>
                                                <td><?php echo $row['productName']; ?></td>
                                                <td><?php echo $row['Category_ID']; ?></td>
                                                <td><?php echo $row['Model']; ?></td>
                                                <td><?Php echo $row['Type']; ?></td>
                                                <td><?php echo $row['Warehouse_ID']; ?></td>
                                                <td><?php echo $row['Description']; ?></td>
                                                <td><?php echo $row['cost_price']; ?></td>
                                                <td><?php echo $row['Price']; ?></td>
                                                <td><?php echo $row['balance']; ?></td>
                                                <td> <img src="images/products/<?php echo $row['Picture']; ?> " width="40" height="40"   ></td>
                                                <td> 
                                                    <a href="prodViewUpdate.php?update=<?php echo $row['Product_ID']; ?>"title="Edit/ Update" class="delbutton"><input type="image" src="images/icn_edit.png" title="Edit/Update">  </a>
                                                                                                <a href="prodDelete.php?delete=<?php echo $row['Product_ID']; ?>" onClick="del(this);" title="Delete" class="delbutton"><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
                                            </tr>

                                        <?php }mysqli_close($mysqli); ?>
                                    </tbody>
                                </table>

                            </div> 



                            <script src="js/jquery.js"></script>
                                <script type="text/javascr                           ipt">
                        $(function () {


                        $(".delbutton").click(function                   () {

//Save the link in a variable called el                                   ement
                        var element = $(th                                   is);
                        if (confirm("Sure you want to delete this PRODUCT? There is NO PLS.und                                   o!"))
                        {

                        $.a                                           jax({
                        type: "                                           GET",
                                url: "prodDelete.                                           php",
                                data:                                            info,
                                success: function                                            () {

                                }
                        });
                        $(this).parents(".record").animate({backgroundColor: "#fbc7c7"}, "f                                               ast")
                                .animate({opacity: "hide"}, "slo                                   w");
                        }

                        return fa                               lse;
                        });
                        });
                        < /scri                    pt> 
                          
                          < /sec                tion>
                        < /div>
                        < /div>
                                
                                
                                < /body>
                        
                        < /html>