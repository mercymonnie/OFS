<?php
include("../session.php");
include("../config.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>OFS|Admin|Owner </title>
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
                        var a = document.forms["addemployee"]["fullname"].value;
                        if (a == null || a == "")
                        {
                        alert("Pls. Employee Full Name IS Missing !!!");
                        return false;
                        }
                        var b = document.forms["addemployee"]["username"].value;
                        if (b == null || b == "")
                        {
                        alert("Pls. Your User Name Is Missing !!!");
                        return false;
                        }

                        var c = document.forms["addemployee"]["password"].value;
                        if (c == null || c == "")
                        {
                        alert("Pls. Your Password Is MIsssing !!!");
                        return false;
                        }

                        }
                    </script>	



                    <script type="text/javascript">
                        $(function() {
                        $('#empValid').keyup(function() {

                        if (this.value.match(/[^a-zA-Z]/g)) {
                        this.value = this.value.replace(/[^a-zA-Z ]/g, '');
                        }
                        Alart("Numbers IS NOT Allowed Sir!!!!!! !!!");
                        });
                        });
                    </script>




                    <div id="form_wrapper" class="form_wrapper">

                        <table>
                            <form class="register active" id="myForm"action="empRegistration.php"  method="POST" >

                                <th colspan="3"><h2>Register boutique owner</h2> </th> 


                                <tr>
                                    <td>  

                                        <label>Full Name:</label>

                                        <input type="text" id="empValid" name="fullname" placeholder="Full name" />
                                        <span class="error">This is an error</span>
                                    </td>
                                    <td>   

                                        <label>Username:</label>

                                        <input type="text" id="username" name="username" placeholder="User name" />
                                        <span class="error">This is an error</span>
                                    </td>
                                    
                                    <td>  

                                        <label> MTN Money Number:</label>

                                        <input type="text" id="username" name="mtn" placeholder="078*****" >
                                       <span class="error">This is an error</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>  

                                        <label> Select boutique owner image :</label>
                                        <input type="file" name="picture" id="picture"  required>
                                        <span id="pass-info"> </span>

                                    </td>

                                    <td>  

                                        <label> Enter Password:</label>

                                        <input type="password" id="password" name="password" placeholder="****" >
                                        <span id="pass-info"> </span>

                                    </td>
                                    <td>  

                                        <label> Airtel Money Number:</label>

                                        <input type="text" id="empValid" name="airtel" placeholder="075/070****" >
                                        <span class="error">This is an error</span>

                                    </td>

                                </tr>



                                <div class="bottom">

                                    <td colspan="3">	

                                        <button name="submit" id="submit" title="Click to Save"  class="a-btn"> <span class="a-btn-text"> Add Boutique Owner</span></button>

                                    </td>

                                    <div class="clear"></div>
                                </div>



                            </form>

                        </table>
                    </div>


                    <script>
                < script type = "text/javascript" >
$(document).ready(function() {
                                $("#submit").click(function() {

                        $.ajax({
                        cache: false,
                                type: 'POST',
                                url: 'empRegistration.php',
                                data: $("#myForm").serialize(),
                                success: function(d) {
                                $("#someElement").html(d);
                        }
                        });
                        });
                        });
                        
                        </script>







                        <?php
                        $result = mysqli_query($mysqli, "SELECT * FROM employee");
                        ?>
                        <div id="tab1" class="tab_content">
                            <table class="tablesorter" cellspacing="0"> 


                                <thead><tr> <th colspan="7"> Registered Users Data Record</th>  </tr> <thead>
                                <thead>
                                    <tr>
                                        <th>Check</th> 
                                        <th>Employee ID</th>
                                        <th> Employee Name</th>			  
                                        <th>User Name</th>
                                        <th>ROLE</th>
                                        <th>MTN</th>
                                        <th>Airtel</th>			
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($result)) {
                                        ?>

                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td><?Php echo $row['Employee_ID']; ?></td>
                                            <td><?php echo $row['Employee_Name']; ?></td>
                                            <td><?php echo $row['Username']; ?></td>
                                            <td><?php echo $row['role']; ?></td>
                                            <td><?php echo $row['mtn']; ?></td>
                                            <td><?php echo $row['airtel']; ?></td>
                                            
                                            <td> <a href="empViewUpdate.php?update=<?php echo $row['Employee_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
                                                <a href="empDelete.php?delete=<?php echo $row['Employee_ID']; ?>" onClick="del(this);" title="Delete"><input type="image" src="images/icn_trash.png" title="Trash"/>  </a></td>
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