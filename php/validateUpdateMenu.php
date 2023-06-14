<?php
require_once("config.php");

if (isset($_POST['upload']) && isset($_FILES['uploadfile'])) {
 
    echo "<pre>";
   print_r($_FILES['uploadfile']);
    echo "</pre>";

    $img_name = $_FILES['uploadfile']['name'];
    $img_size = $_FILES['uploadfile']['size'];
    $img_tmp_name = $_FILES['uploadfile']['tmp_name'];
    $img_error = $_FILES['uploadfile']['error'];

    if ($img_error === 0 ){
        // if($img_size >12500){
        //     $em = "Sorry, your file size is too large";
        //     header("Location: selmainpage.php?error=$em");
        // }else { }   
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png");
            if (in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = '../menuimages/'.$new_img_name;
                move_uploaded_file($img_tmp_name,$img_upload_path);

                // Insert into database
                $sql = "insert into menu (menu_img) values ('$new_img_name')";
                mysqli_query($conn,$sql);
            }else{
                $em = "You can't upload files of this type";
                header("Location: selmainpage.php?error=$em");
            }
    }else {
        $em = "Unknown error occured!";
        header("Location: selmainpage.php?error=$em");
    }
}


?>