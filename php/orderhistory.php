<?php
// Start up your PHP Session
session_start();

include("config.php");

if ($_SESSION["Login"] != "YES") {
    header("Location: guest_form.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sort = $_POST['sort'];
    $sql = "SELECT * FROM menu WHERE user_id $sort";
    $res = mysqli_query($conn, $sql);
}
else{
    $sql = "SELECT * FROM menu ORDER BY menu_code";
    $res = mysqli_query($conn, $sql);
}
?>