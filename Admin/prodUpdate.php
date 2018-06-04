<?php
include("../session.php");
include '../config.php';

?>

<?php 

if (isset($_POST['submit'])){
$id=$_POST['ID'];

echo $fullname=$_POST['fname'];
echo  $cname =$_POST['category'];
echo $model   =$_POST['color'];
echo $type   =$_POST['type'];
echo  $whouse  =$_POST['boutique'];
echo $desp     =$_POST['desp'];
echo $cost   =$_POST['cost'];
echo $price   =$_POST['price'];
echo $stock   =$_POST['stock'];
echo $emp_id   = $_SESSION['user_id'];

echo $query="update product  set productName ='$fullname', Category_ID ='$cname', Model ='$model'   , Type ='$type' , Warehouse_ID='$whouse' , Description='$desp' , Price='$price'   ,quant='$stock', cost_price='$cost', balance='$stock', Employee_ID='$emp_id'  where Product_ID =$id ";
$rows=mysqli_query($mysqli,$query);
echo "succes full updated ".$rows;
mysqli_close($mysqli);
header("location: add_Product.php?msg=succes full update one record");
exit();
}

?>

