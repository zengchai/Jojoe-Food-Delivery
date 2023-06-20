<?php
    session_start();

    include("config.php");
    
    if ($_SESSION["Login"] != "YES") {
        header("Location: guest_form.php");
    }

    
    $total_price = 0;
    $sqlz = "SELECT * FROM orders WHERE user_id = '{$_SESSION['ID']}' ";
    $resz = mysqli_query($conn, $sqlz);
    echo "<p> ORDER ID {$_SESSION['COUNTER']} </p>";
    if (mysqli_num_rows($resz) > 0) {
        while ($rowz = mysqli_fetch_assoc($resz)) { 
    $sql = "SELECT * FROM orderdetail where order_id = '{$rowz['order_id']}'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {while ($row = mysqli_fetch_assoc($res)) { 
            if($row['order_id']==$_SESSION['COUNTER']){
        $menu_name = "SELECT menu_name FROM menu WHERE menu_code = '$row[menu_code]'";
        $query_menu_name = mysqli_query($conn, $menu_name);
        $res_menu_name = mysqli_fetch_assoc($query_menu_name);
        $total_order_price = $row['order_quantity'] * $row['order_price'];
        $total_price += $row['order_price'] * $row['order_quantity'];
        echo "<p> $row[menu_code] </p>
        <p> $res_menu_name[menu_name] </p>
        <p> $row[order_quantity] </p>
        <p> $total_order_price </p>
        <a href='delete_item.php?pass=$row[item_id]'>Delete</a>";
} }}}}
echo "<p>Total Price: $total_price </p>
<a href='made_order.php?totalprice=$total_price'>Pay</a>";
 if (isset($_GET['sub'])){
	echo $_GET['sub'];
    unset($_GET['sub']);}
echo "<a href='stumainpage.php'>Back</a>";
?>