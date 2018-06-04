
<?php

include('../config.php');
$role = "B-Owner";
$sql = "INSERT INTO employee (Employee_Name, Username, Password,role,mtn,airtel,Picture) 
VALUES ('$_POST[fullname]', '$_POST[username]', '$_POST[password]','$role','$_POST[mtn]','$_POST[airtel]', '$_POST[picture]')";

if (!mysqli_query($mysqli, $sql)) {
    die('Error: ' . mysqli_error($mysqli));
}
header("location: Employee.php");
echo "1 record added";

mysqli_close($mysqli);
?> 



