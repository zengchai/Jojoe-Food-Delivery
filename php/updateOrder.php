<?php
session_start();
include("config.php");

$today = date('Y-m-d');

if(!isset($_SESSION['COUNTER'])){
    $_SESSION['COUNTER']= 1;
    $createOrder = "insert into orders (order_id) VALUES ({$_SESSION['COUNTER']});";
    mysqli_query($conn,$createOrder);
    $file = 'counter.txt';
    file_put_contents($file, $_SESSION['COUNTER']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$_SESSION['ADDTOCART']="NO";
foreach ($_POST as $fieldName => $value) {
$query = "SELECT * FROM menu WHERE menu_code = '{$value}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$sql = "insert into orderdetail (order_id,order_date,menu_code,order_quantity,order_price) values ({$_SESSION['COUNTER']},'$today','{$row['menu_code']}',1,'{$row['menu_price']}')";
if(mysqli_query($conn,$sql)){
$em = "Add to Cart Successfully - Order Number: " . $_SESSION['COUNTER'];
header("Location: stumainpage.php?sub=$em");}
else{
$em = "Error: ". mysqli_error($conn) . $menu_code;
header("Location: stumainpage.php?sub=$em");
}
}}
?>