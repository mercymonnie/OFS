<div id="navigation">
    <!-- Begin Shell -->
    <div class="shell">
        <ul>
            <li class="active"><a href="index.php" title="index.php">Home</a></li>
            <li>
                <a href="products.php">Category</a>
                <div class="dd">
                    <ul>

                        <!-- JAMPSUIT -->

                        <?php
                        include("config.php");
                        $query = mysqli_query($mysqli, "select * from category");
                        while ($res = mysqli_fetch_assoc($query)) {

                            $category = $res['Category_Name'];
                            $category_id = $res['Category_ID'];
                            ?>
                            <li>
                                <a href="warehouse_4.php"> <?php echo $category; ?></a>
                                <div class="dd">

                                    <?php
                                    $result2 = mysqli_query($mysqli, "SELECT * FROM sub_category s where s.Category_ID = '" . $category_id . "' ");
                                    while ($rows = mysqli_fetch_assoc($result2)) {
                                        ?>
                                        <ul>
                                            <li><a href="products.php?page=<?php echo $rows['sub_category_id']; ?>"><?php echo $rows['sub_name']; ?></a></li>
                                        </ul>
                                    <?php } ?>

                                </div>
                            </li>
                        <?php } ?>


                    </ul>
                </div>
            </li>
            <li><a href="#"> Products</a></li>
            <li>
                <a href="#">Boutique</a>
                <div class="dd">
                    <ul>
                        <?php
                        include("config.php");
                        $query = mysqli_query($mysqli, "select * from boutique");
                        while ($res = mysqli_fetch_assoc($query)) {

                            $bname = $res['Warehouse'];
                           
                            ?>
                        <li>
                            <a href="boutique.php?page=<?php echo $res['Warehouse_ID']; ?>"><?php echo $bname; ?></a>

                        </li>
                        <?php } ?>

                        

                    </ul>
                </div>
            </li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="customer.php">Free Sign Up</a> </li>
        </ul>
        <div class="cl">&nbsp;</div>
    </div>
    <!-- End Shell -->
</div>