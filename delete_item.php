<?php

require_once ("config.php");

$pass = $_GET["pass"];

if (isset($_GET["pass"])) {
    $pass = $_GET["pass"];
}


//Q2: delete guest according to id using DELETE FROM
if($_SESSION['LEVEL']==1){
$sql = "DELETE FROM menu WHERE menu_code = '$pass'";

if (mysqli_query($conn, $sql)) {
   $em = "Record deleted successfully";
    header("Location: selmainpage.php?sub=$em");
   } else {
    $em = "Error deleting record: " . mysqli_error($conn);
    header("Location: selmainpage.php?sub=$em");
}}

else if($_SESSION['LEVEL']==0){
    $sql = "DELETE FROM orderdetail WHERE item_id = '$pass'";

    if (mysqli_query($conn, $sql)) {
       $em = "Record deleted successfully";
        header("Location: cart.php?sub=$em");
       } else {
        $em = "Error deleting record: " . mysqli_error($conn);
        header("Location: cart.php?sub=$em");
    }
}
mysqli_close($conn);
?>
