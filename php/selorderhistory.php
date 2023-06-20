<?php

session_start();
include("config.php");

if ($_SESSION["Login"] != "YES") {
    header("Location: guest_form.php");
}
if(isset($_GET["userid"])){
    $user_id = $_GET["userid"];
    $sql = "SELECT * FROM orders WHERE payment_status = 'PAID' AND user_id LIKE '$user_id'";
    if($_GET["userid"]==""){
        $sql = "SELECT * FROM orders WHERE payment_status = 'PAID'";
    }
}
else{
$sql = "SELECT * FROM orders WHERE payment_status = 'PAID'";}

$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) { 
        echo "<p> ORDER ID {$row['order_id']} </p>";
        echo "<p> USER ID {$row['user_id']} </p>";
        $sqli = "SELECT * FROM orderdetail WHERE order_id = '{$row['order_id']}'";
        $resi = mysqli_query($conn, $sqli);
        if (mysqli_num_rows($resi) > 0) {
            while ($rowi = mysqli_fetch_assoc($resi)) { 
            $menu_name = "SELECT * FROM menu WHERE menu_code = '$rowi[menu_code]'";
            $query_menu_name = mysqli_query($conn, $menu_name);
            $res_menu_name = mysqli_fetch_assoc($query_menu_name);
            $total_order_price = $rowi['order_quantity'] * $rowi['order_price'];
    echo "<p> $rowi[menu_code] </p>
    <p> $res_menu_name[menu_name] </p>
    <p> $rowi[order_quantity] </p>
    <p> $total_order_price </p>";} }
echo "<p>$row[total_price]</p>
<p>$row[payment_date]</p>
";}
echo "<a href='selmainpage.php'>Back</a>";}
echo "
<form method='get' action='selorderhistory.php'>
  <input type='text' value='' name='userid' placeholder='Enter the user id'/>
  <input type='submit' value='Submit'/>
</form>";
?>