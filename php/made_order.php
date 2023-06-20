<?php
session_start();

include("config.php");

$today = date('Y-m-d H:i:s');

if ($_SESSION["Login"] != "YES") {
    header("Location: guest_form.php");
}

$totalprice = $_GET["totalprice"];

if (isset($_GET["totalprice"])) {
    $pass = $_GET["totalprice"];
}

$sql = "UPDATE orders SET payment_status='PAID',payment_date='$today',total_price = $totalprice WHERE order_id = {$_SESSION['COUNTER']}";
if(mysqli_query($conn, $sql)){
    $em = "Paid Successfully - Order Number: " . $_SESSION['COUNTER'];
    unset($_SESSION['COUNTER']);
    $_SESSION['PAID'] = "YES";
    header("Location: stumainpage.php?sub=$em");}
    else{
    $em = "Error: ". mysqli_error($conn);
    header("Location: stumainpage.php?sub=$em");
}


?>