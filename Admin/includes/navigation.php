 <section id="secondary_bar">
    <nav><!-- Defining the navigation menu -->
        <ul>
            <li class="selected"><a href="index.php">Home</a></li>
            
            <li><a href="add_warehouse.php">Add Boutique</a></li>
            <li><a href="add_product.php">Add product</a></li>
          
            <li><a href="add_category.php">Categories</a></li>
            <li><a href="add_subcategory.php">Sub Category</a></li>
            <li class="logout"> <span class="check"> <?php echo "Welcome Mr/Miss:   " . "<font color='##fa5400'><i><b>" . $_SESSION['name'] . "</b></i></font>"; ?> </span></li>
        </ul>
    </nav>
</section><!-- end of secondary bar -->