<?php

require_once ("config.php");

$menu_code = $_GET["menucode"];

if (isset($_GET["menucode"])) {
    $menu_code = $_GET["menucode"];
}


//Q2: delete guest according to id using DELETE FROM
$sql = "DELETE FROM menu WHERE menu_code = '$menu_code'";

if (mysqli_query($conn, $sql)) {
   $em = "Record deleted successfully";
    header("Location: selmainpage.php?sub=$em");
   } else {
    $em = "Error deleting record: " . mysqli_error($conn);
    header("Location: selmainpage.php?sub=$em");
}
mysqli_close($conn);
?>
