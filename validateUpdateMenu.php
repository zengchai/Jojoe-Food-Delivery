<?php
require_once("config.php");

if (isset($_POST['upload']) && isset($_FILES['uploadfile'])) {
 
    echo "<pre>";
   print_r($_FILES['uploadfile']);
    echo "</pre>";

    $menu_code = $_POST["menucode"];
    $menu_name = $_POST["menuname"];
    $menu_price = $_POST["menuprice"];
    $menu_description = $_POST["menudesc"];
    $img_name = $_FILES['uploadfile']['name'];
    $img_size = $_FILES['uploadfile']['size'];
    $img_tmp_name = $_FILES['uploadfile']['tmp_name'];
    $img_error = $_FILES['uploadfile']['error'];

    if ($img_error === 0 ){
        
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png");
            if (in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'menuimages/'.$new_img_name;
                move_uploaded_file($img_tmp_name,$img_upload_path);

                // Insert into database
                $sql = "insert into menu (menu_img, menu_code, menu_name, menu_price, menu_description) values ('$new_img_name','$menu_code','$menu_name','$menu_price','$menu_description')";
                mysqli_query($conn,$sql);
                $em = "Updated Successfully";
            }else{
                $em = "You can't upload files of this type";
            }
    }else {
        $em = "Unknown error occured!";
    }
}
$_SESSION['alert_message'] = $em; 
header("Location: servicespage.php");


?>