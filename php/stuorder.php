<?php
    session_start();

    include("config.php");
    
    if ($_SESSION["Login"] != "YES") {
        header("Location: guest_form.php");
    }
    $sql = "SELECT * FROM orderdetail";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        echo "<p> ORDER ID {$_SESSION['COUNTER']} </p>";
        while ($row = mysqli_fetch_assoc($res)) { 
        $menu_name = "SELECT menu_name FROM menu WHERE menu_code = '$row[menu_code]'";
        $query_menu_name = mysqli_query($conn, $menu_name);
        $res_menu_name = mysqli_fetch_assoc($query_menu_name);
        echo "<p> $row[menu_code] </p>
        <p> $res_menu_name[menu_name] </p>
        <p> $row[order_quantity] </p>
        <p> $row[order_price] </p>";
} } 
?>