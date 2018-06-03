<?php
include("../session.php");
include("../config.php");
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>OFS|Admin|Boutique </title>
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
            $(document).ready(function()
            {
                $(".tablesorter").tablesorter();
            }
            );
            $(document).ready(function() {

                //When page loads...
                $(".tab_content").hide(); //Hide all content
                $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                $(".tab_content:first").show(); //Show first tab content

                //On Click Event
                $("ul.tabs li").click(function() {

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
            $(function() {
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
                ?>


                <section id="main" class="column">
                    <?php include_once 'includes/login_type.php'; ?>

                    <script type="text/javascript">
                        function validateForm()
                        {
                            var a = document.forms["addwarehouse"]["wname"].value;
                            if (a == null || a == "")
                            {
                                alert("Pls. Enter the The Warehouse Name !!!");
                                return false;
                            }
                            var b = document.forms["addwarehouse"]["country"].value;
                            if (b == null || b == "")
                            {
                                alert("Pls. Country Is Missing !!!");
                                return false;
                            }
                            var c = document.forms["addwarehouse"]["email"].value;
                            if (c == null || c == "")
                            {
                                alert("Pls. Email Is MIsssing !!!");
                                return false;
                            }
                            var d = document.forms["addwarehouse"]["address"].value;
                            if (d == null || d == "")
                            {
                                alert("Pls. Address Is Missing !!!");
                                return false;
                            }
                            var e = document.forms["addwarehouse"]["city"].value;
                            if (e == null || e == "")
                            {
                                alert("Pls. City Is Misssing");
                                return false;
                            }
                            var e = document.forms["addwarehouse"]["pcode"].value;
                            if (e == null || e == "")
                            {
                                alert("Pls. Postal Code Is Misssing !!!");
                                return false;
                            }

                        }
                    </script>



                    <script type="text/javascript">
                        $(function() {
                            $('#wareValid').keyup(function() {

                                if (this.value.match(/[^a-zA-Z]/g)) {
                                    this.value = this.value.replace(/[^a-zA-Z ]/g, '');

                                }
                                Alart("Numbers IS NOT Allowed Sir!!!!!! !!!");
                            });
                        });
                    </script>



                    <div id="form_wrapper" class="form_wrapper"  >

                        <table>
                            <form class="register active" id="myForm" action="insertions/insertWarehouse.php"  method="POST" enctype="multipart/form-data" name="addwarehouse" onsubmit="return validateForm()">

                                <th colspan="3"><h2>ADD Boutique:</h2> </th> 

                                <tr>
                                    <td>  


                                        <label> Boutique Name:</label>
                                        <input type="text" name="wname" id="wareValid"/>
                                        <span class="error">This is an error</span>





                                    </td>
                                    <td>  





                                        <label>Country:</label>
                                        <select name="country" id="select">
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
                                        <input type="text" name="building"  required id="pcode"/>
                                        <span id="pass-info"> </span>
                                    </td>




                                </tr>

                                <td>  

                                    <label> Street:</label>
                                    <select name="street" id="select">
                                        <option value="Mbaguta">Mbaguta</option>
                                        <option value="High_Street">High Street</option>
                                        <option value="Macanisin">Macanisin</option>
                                        <option value="Mburemba">Mburemba</option>
                                    </select>

                                    <span class="error">This is an error</span>

                                </td>
                                <td>  

                                    <label> floor:</label>
                                    <select name="floor" id="select">
                                        <option value="ist">1st Floor</option>
                                        <option value="2nd">2nd Floor</option>
                                        <option value="3rd">3rd Floor</option>
                                        <option value="4th">4th Floor</option>
                                    </select>

                                    <span class="error">This is an error</span>

                                </td>


                                <tr>

                                </tr>
                                <tr>
                                <div class="bottom">

                                    <td colspan="3">	
                                        <button name="save" id="myButton" class="a-btn"> <span class="a-btn-text"> Add Boutique </span></ </button>

                                        <div class="clear"></div>
                                </div>


                                </tr>
                            </form>

                        </table>
                    </div>


                    <script type="text/javascript">

                        $(document).ready(function() {
                            $("#myButton").click(function() {
                                //alert("Pls. Postal Code Is Misssing !!!");
                                $.ajax({
                                    cache: false,
                                    type: 'POST',
                                    url: 'jointCustomer.php',
                                    data: $("#myForm").serialize(),
                                    success: function(d) {
                                        $("#someElement").html(d);
                                    }
                                });
                            });
                        });

                    </script>




                    <?php
                    $result = mysqli_query($mysqli, "SELECT * FROM boutique");
                    ?>
                    <div id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 

                            <thead>  <th Colspan="9">  Boutique Data Table </th></thead>
                            <thead>
                            <thead>
                                </tr>
                            <th>Check ID</th> 
                            <th>ID</th>
                            <th> Name</th>			  
                            <th>Country</th>
                            <th>City</th>				
                            <th> Building</th>
                            <th>Street</th>				
                            <th> Floor</th>
                            <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><?Php echo $row['Warehouse_ID']; ?></td>
                                        <td><?php echo $row['Warehouse']; ?></td>
                                        <td><?php echo $row['Country']; ?></td>
                                        <td><?php echo $row['City']; ?></td>
                                        <td><?php echo $row['building']; ?></td>
                                        <td><?php echo $row['street']; ?></td>
                                        <td><?php echo $row['floor']; ?></td>
                                        <td>
                                            <a href="insertions/DeleteWarehouse.php?delete=<?php echo $row['Warehouse_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
                                    </tr>

                                <?php }mysqli_close($mysqli); ?>
                            </tbody>
                        </table>

                    </div> 

                </section>
            </div>
        </div>



    </body>

</html>