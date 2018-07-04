<?php
include("../session.php");
include("../config.php");
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title OCS|Admin|Boutique </title>

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

                    <div id="logo">
                        <a href="index.php"><img src="images/logo.png" alt="" /></a>
                    </div>

                    <div id="banner">

                    </div>

                </div>
            </div> <!--DHAMAADKA hedaerka-->


            <div id="content-wrap">	


                <?php include_once 'includes/navigation.php'; ?>
                <?php include_once 'includes/side_menu.php'; ?>

                <section id="main" class="column">

                    <?php
                    $update = $_GET['update'];
                    $result = mysqli_query($mysqli, "SELECT * FROM boutique where Warehouse_ID ='$update'");
                    ?>
                    <?php if ($row = mysqli_fetch_array($result)) {
                        ?> 



                        <div id="form_wrapper" class="form_wrapper"  >
                            <form class="quick_search">
                                <input type="text"  value="Quick Search" onfocus="if (!this._haschanged) {
                                            this.value = ''};this._haschanged = true;">
                            </form>
                            
                            
                            <table>
                                <form class="register active" id="myForm" action="wareUpdate.php"  method="POST">

                                    <th colspan="3"><h2>ADD Boutique:</h2> </th> 

                                    <input type="hidden" id="ID" name="ID" value="<?php echo $row['Warehouse_ID']; ?>"  placeholder="ID" required>
                                    <tr>
                                        <td>  


                                            <label> Boutique Name:</label>
                                            <input type="text" name="wname" id="wname"  value="<?php echo $row['Warehouse']; ?>"  placeholder="Warehouse Name" required>
                                            <span class="error">This is an error</span>





                                        </td>
                                        <td>  





                                            <label>Country:</label>
                                            <select name="country" id="select" placeholder="Select Country" required>
                                                <option value="UG" countrynum="256">Uganda</option>
                                            </select>    


                                        </td>
                                      
                                    </tr>

                                    <tr>
                                    <td>  

                                        <label> City:</label>
                                        <select name="city" id="select">
                                            <option value="Mbarara">Mbarara</option>

                                        </select>
                                        <span class="error">This is an error</span>
                                    </td>
                                    <td>   

                                        <label> Building:</label>
                                        <input type="text" name="wname" id="wname"  value="<?php echo $row['building']; ?>"  placeholder="Warehouse Name" required>
                                        
                                        <span id="pass-info"> </span>
                                    </td>




                                </tr>

                                    <tr>
                                        <td>  

                                            <label> Street:</label>
                                            <input type="text" name="address"  id="address" value="<?php echo $row['Address']; ?>"  placeholder="Address" required>
                                            <span class="error">This is an error</span>

                                        </td>

                                        <td>  

                                            <label> Floor:</label>
                                            <input type="text" name="city"  id="city" value="<?php echo $row['City']; ?>"  placeholder="City" required>

                                            <span class="error">This is an error</span>


                                        </td>

                                        <td>   

                                            <label> Postal Code:</label>
                                            <input type="text" name="pcode"  id="pcode" value="<?php echo $row['PostalCode']; ?>"  placeholder="Postal Code" required>
                                            <span id="pass-info"> </span>
                                        </td>
                                    </tr>



                                    <tr>
                                    <div class="bottom">

                                        <td colspan="3">	
                                            <button type="submit"  name="submit"  class="a-btn"><span class="a-btn-text">Update Warehouse </span></button>

                                            <div class="clear"></div>
                                    </div>


                                    </tr>
                                </form>

                            </table>
                        </div>


                </div> 
            <?php } ?>



        </section>
    </div>
</div>



</body>

</html>