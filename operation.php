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
        header("Location: cart.php?sub=$em");
       } else {
        $em = "Error deleting record: " . mysqli_error($conn);
        header("Location: cart.php?sub=$em");
    }
}
mysqli_close($conn);
}

if(isset($_POST["menucode"])){
    $menu_code = $_POST["menucode"];
    $menu_code = $_POST["menucode"];
    $menu_name = $_POST["menuname"];
    $menu_price = $_POST["menuprice"];
    $menu_description = $_POST["menudesc"];
    if(isset($_FILES['uploadfile'])){
    $img_name = $_FILES['uploadfile']['name'];
    $img_size = $_FILES['uploadfile']['size'];
    $img_tmp_name = $_FILES['uploadfile']['tmp_name'];
    $img_error = $_FILES['uploadfile']['error'];}
    unset($_POST["menucode"]);
    if ($img_error === 0){
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png");
            if (in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = '../menuimages/'.$new_img_name;
                move_uploaded_file($img_tmp_name,$img_upload_path);

                // Insert into database
                $sql = "UPDATE menu set menu_img='$new_img_name', menu_name='$menu_name', menu_price='$menu_price', menu_description='$menu_description' WHERE menu_code = '$menu_code'";
                if(mysqli_query($conn,$sql)){
                    $em = "Edited Successfully";
                    header("Location: servicespage.php?sub=$em");}
                else{
                    $em = "Error updating record: ". mysqli_error($conn);
                    header("Location: servicespage.php?sub=$em");
                }
            }else{
                $em = "You can't upload files of this type";
                header("Location: servicespage.php?sub=$em");
            }}
    
    else{
        $sql = "UPDATE menu set menu_name='$menu_name', menu_price='$menu_price', menu_description='$menu_description' WHERE menu_code = '$menu_code'";
        if(mysqli_query($conn,$sql)){
        $em = "Edited Successfully";
        header("Location: servicespage.php?sub=$em");}
        else{
            $em = "Error updating record: ". mysqli_error($conn);
            header("Location: servicespage.php?sub=$em");
        }
}
mysqli_close($conn);
}

?>
