<?php include("../../config.php");?>
<?php
$delete= $_GET['delete'];
if(empty($delete)){
echo "you don't select any record";

}else{
$query="delete from boutique where Warehouse_ID=".$delete."";
$result=mysqli_query($mysqli,$query);
header("location: ../add_warehouse.php?msg = Boutique record has been deleted !!!");
exit();
mysqli_close($mysqli);
}
?>