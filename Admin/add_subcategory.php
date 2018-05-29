<?php
include("../session.php");
include("../config.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>OFS|Admin|Sub-Category </title>

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
                    <h4 class="alert_info">Welcome To <strong>"SomStore"</strong> Admin Panel As: <?php echo "  " . "<font color='#f90'><big><b>" . $login_session . "</b></big></font>"; ?>  </h4>

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
                            <form class="register active" id="myForm" action="insertions/insertsubCategory.php" method="POST" name="addEmployee" >

                                <th colspan="3"><h2>  Add Sub Category</h2> </th> 


                                <tr>
                                    <td>  

                                        <label> Select-Category:</label>

                                        <select name="select" class="ed">
                                            <?php
                                            include('../config.php');
                                            $name = mysqli_query($mysqli, "select * from category");

                                            //echo '<select  name="select"  id="ml" class="ed">';
                                            echo '<option selected="selected">Select</option>';
                                            while ($res = mysqli_fetch_assoc($name)) {


                                                echo '<option value=' . $res['Category_ID'] . '>' . $res['Category_Name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <span class="error">This is an error</span>
                                    </td>

                                    <td>  

                                        <label>Sub-Category:</label>

                                        <input type="text" id="empValid" name="sub_name" placeholder="Category Name" required>
                                        <span class="error">This is an error</span>
                                    </td>
                                    <td>   

                                        <label>Description:</label>

                                        <input type="text" id="empValid" name="sub_descriptions" placeholder="Description" required>
                                        <span class="error">This is an error</span>


                                    </td>

                                </tr>




                                <tr>
                                <div class="bottom">

                                    <td colspan="3">	

                                        <button name="submit" id="save" title="Click to Save"  class="a-btn"> <span class="a-btn-text">Add Sub-Category</span></button>

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
                        }); });
                        </script>


                        <div class="tab_container">



                            <?php
                            $result = mysqli_query($mysqli, "SELECT * FROM sub_category s, category c WHERE s.Category_ID = c.Category_ID");
                            ?>
                            <div id="tab1" class="tab_content">
                                <table class="tablesorter" cellspacing="0"> 


                                    <thead><th colspan="6"> Sub-Category Data Table And Information</th></thead>
                                    <thead>
                                        </tr>
                                    <th>Check</th> 
                                    <th> ID</th>
                                    <th> Category</th>	
                                    <th> Sub-Category</th>			  
                                    <th>Description</th>
                        				
                                    <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php while ($row = mysqli_fetch_array($result)) {
    ?>


                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td><?Php echo $row['sub_category_id']; ?></td>
                                                <td><?php echo $row['Category_Name']; ?></td>
                                                <td><?php echo $row['sub_name']; ?></td>
                                                <td><?php echo $row['sub_descriptions']; ?></td>
                                                
                                                <td>  </a>
                                                    <a href="subcatDelete.php?delete=<?php echo $row['sub_category_id']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
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