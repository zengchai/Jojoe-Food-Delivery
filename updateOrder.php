<?php
session_start();
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$_SESSION['ADDTOCART']="NO";
$menuCodes = $_POST['menu_code'];
$quantities = $_POST['quantity'];
for ($i = 0; $i < count($menuCodes); $i++) {
    $menuCode = $menuCodes[$i];
    $quantity = $quantities[$i];
// foreach ($_POST as $fieldName => $value) {
$query = "SELECT * FROM menu WHERE menu_code = '$menuCode'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$sql = "insert into orderdetail (order_id,menu_code,order_quantity,order_price) values ({$_SESSION['COUNTER']},'$menuCode',$quantity,'{$row['menu_price']}')";
if(mysqli_query($conn,$sql)){
$em = "Add to Cart Successfully - Order Number: " . $_SESSION['COUNTER'];
header("Location: servicespage.php?sub=$em");}
else{
$em = "Error: ". mysqli_error($conn) . $menu_code;
header("Location: servicespage.php?sub=$em");
}
}}
?>