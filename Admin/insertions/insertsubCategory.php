<?php

include('../../config.php');

$sql = "INSERT INTO sub_category (sub_name, sub_descriptions, Category_ID) 
VALUES ('$_POST[sub_name]', '$_POST[sub_descriptions]', '$_POST[select]')";

if (!mysqli_query($mysqli, $sql)) {
    die('Error: ' . mysqli_error($mysqli));
}
header("location: ../add_subcategory.php");


mysqli_close($mysqli);
?> 
<?php

echo "1 record added";
?>