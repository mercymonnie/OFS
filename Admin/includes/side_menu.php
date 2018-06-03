<aside id="sidebar" class="column">
    <!-- Begin Search -->
    <div id="search">
        <form action="searchcont.php" method="post" accept-charset="utf-8">
            <input type="text"  title="Search..." class="blink field"  placeholder="Search Product"   name='search' size=60 maxlength=100 />
            <input class="search-button" type="submit" value="Submit" />
            <div class="cl">&nbsp;</div>
        </form>

    </div>
    <!-- End Search -->
    <hr/>
    <h3> OFS Database Backup:</h3>
    <ul class="toggle">
        <li class="icn_folder"><a href="Backup.php">Backup Database</a></li>
    </ul>

    <h3>Reports:</h3>
    <ul class="toggle">
        <li class="icn_settings"><a target="_blank" href="OrderReports.php">Order Report</a></li>
        <li class="icn_settings"><a target="_blank" href="CustomerReport.php">Customer Report</a></li>
        <li class="icn_settings"><a target="_blank" href="ProductReport.php"> Product Report</a></li>
         <li class="icn_settings"><a target="_blank" href="salesReport.php"> Product Report</a></li>

    </ul>



    <h3>Boutique owner:</h3>
    <ul class="toggle">
        
        <li class="icn_photo"><a href="add_product.php">Add Product</a></li>
        <li class="icn_tags"><a href="add_warehouse.php">Add Boutique</a></li>
        <li class="icn_new_article"><a href="add_category.php">Add Category</a></li>

    </ul>

    <h3>Tables:</h3>
    <ul class="toggle">
        <li class="icn_categories"><a href="order.php">Order Detial</a></li>
        <li class="icn_categories"><a href="customerTable.php">Customer Detail</a></li>
         <li class="icn_categories"><a href="salesable.php">Customer Detail</a></li>
    </ul>

    <h3>Admin</h3>
    <ul class="toggle">

        <li class="icn_jump_back"><a href="../logout.php">Logout</a></li>
    </ul>

</aside><!-- end of sidebar -->