<?php
session_start(); 

include("config.php");


if (isset($_SESSION['USER'])) 
{   
    if($_SESSION['LEVEL'] == 0)
    {$sql = "UPDATE user SET order_counter={$_SESSION['COUNTER']},user_level = 2 WHERE user_id = '{$_SESSION['ID']}'";
    if(mysqli_query($conn, $sql)){
    echo "hi";}
    else{
        echo mysqli_error($conn);
    }
    }
	unset($_SESSION['USER']); 
} 
session_destroy(); //destroy the session

header("Location: guest_form.php");
// go to login page 
exit;
?> 