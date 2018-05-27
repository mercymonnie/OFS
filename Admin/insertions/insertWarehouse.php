

<?php

include('../../config.php');

$sql = "INSERT INTO boutique (Country, City, street, building, floor, Warehouse) VALUES  
('$_POST[country]', '$_POST[city]', '$_POST[street]', '$_POST[building]', '$_POST[floor]', '$_POST[wname]')";

if (!mysqli_query($mysqli, $sql)) {
    die('Error: ' . mysqli_error($mysqli));
}
header("location: ../add_warehouse.php");
echo "1 record added";

mysqli_close($mysqli);
?> 


