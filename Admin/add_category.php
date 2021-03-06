<?php
include("../session.php");
include("../config.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>OFS|Admin|Category </title>
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
            $(function(){
            $('.column').equalHeight();
            });</script>

    </head>


    <body>

        <div id="container">



            <?php include_once 'includes/header.php';?> <!--DHAMAADKA hedaerka-->


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
                        var a = document.forms["addCategory"]["categoryName"].value;
                        if (a == null || a == "")
                        {
                        window.alert("Pls. Enter The Category Name !!!");
                        return false;
                        }
                        var b = document.forms["addCategory"]["description"].value;
                        if (b == null || b == "")
                        {
                        alert("Pls. Enter The Description !!!");
                        return false;
                        }
                        var a = document.forms["addCategory"]["file"].value;
                        if (a == null || a == "")
                        {
                        alert("Pls. You Have Been Missing Employee Full Name !!!");
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
                            <form class="register active" id="myForm" action="insertions/insertCategory.php" method="POST" name="addEmployee" >

                                <th colspan="3"><h2> Add Category</h2> </th> 


                                <tr>
                                    <td>  

                                        <label>Category Name:</label>

                                        <input type="text" id="empValid" name="categoryName" placeholder="Category Name" required>
                                        <span class="error">This is an error</span>
                                    </td>
                                    <td>   

                                        <label>Description:</label>

                                        <input type="text" id="empValid" name="description" placeholder="Description" required>
                                        <span class="error">This is an error</span>


                                    </td>


                                </tr>

                                <tr>
                                <div class="bottom">

                                    <td colspan="3">	

                                        <button name="submit" id="save" title="Click to Save"  class="a-btn"> <span class="a-btn-text">Add Category</span></button>

                                    </td>

                                    <div class="clear"></div>
                                </div>


                                </tr>
                            </form>

                        </table>
                    </div>


                    <script>
                        <script type="text/javascript">
                            $(document).rea                                    dy(function(){
                                    $("#save").click                            (function() {

                            $.ajax({
                            cache: false,
                                    type: 'POST',
                                    url: 'insert                                    Category.php',
                                    data: $("#myForm").serialize(),
                                    success:                                    function(d) {
                                    $("#someElem                           ent").html(d);
                            }
                            });
                            }); 
                    });
                        </script>


                        <div class="tab_container">



                            <?php
                            $result = mysqli_query($mysqli, "SELECT * FROM category");
                            ?>
                            <div id="tab1" class="tab_content">
                                <table class="tablesorter" cellspacing="0"> 


                                    <thead><th colspan="6"> Category Data Table And Information</th></thead>
                                    <thead>
                                        </tr>
                                    <th>Check</th> 
                                    <th> ID</th>
                                    <th> Category</th>			  
                                    <th>Discription</th>
                                    				
                                    <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($result)) {
                                            ?>


                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td><?Php echo $row['Category_ID']; ?></td>
                                                <td><?php echo $row['Category_Name']; ?></td>
                                                <td><?php echo $row['Discription']; ?></td>
                                                <td> 
                                                    <a href="catDelete.php?delete=<?php echo $row['Category_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
                                            </tr>

                                        <?php }mysqli_close($mysqli); ?>
                                    </tbody>
                                </table>

                            </div> 

                        </div><!-- end of .tab_container -->


                    </section>
                </div>
            </div>

        </body>

    </html>