<?php
session_start();
require_once ("config.php");

if ($_SESSION["Login"] != "YES") {
    header("Location: guest_form.php");
}

if (isset($_GET["pass"])) {
    $pass = $_GET["pass"];


//Q2: delete guest according to id using DELETE FROM
if($_SESSION['LEVEL']==1){
$sql = "DELETE FROM menu WHERE menu_code = '$pass'";

if (mysqli_query($conn, $sql)) {
   $em = "Record deleted successfully";
    header("Location: servicespage.php?sub=$em");
   } else {
    $em = "Error deleting record: " . mysqli_error($conn);
    header("Location: servicespage.php?sub=$em");
}}

else if($_SESSION['LEVEL']==0){
    $sql = "DELETE FROM orderdetail WHERE item_id = '$pass'";

    if (mysqli_query($conn, $sql)) {
       $em = "Record deleted successfully";
        header("Location: servicespage.php?sub=$em");
       } else {
        $em = "Error deleting record: " . mysqli_error($conn);
        header("Location: servicespage.php?sub=$em");
    }
}
mysqli_close($conn);
}


?>
