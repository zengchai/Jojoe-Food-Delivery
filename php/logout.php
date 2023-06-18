<?php
session_start(); 

if (isset($_SESSION['USER'])) 
{ 
	unset($_SESSION['USER']); 
} 
// if the user is logged in, unset the session 
if (isset($_SESSION['USER'])) 
{ 
	unset($_SESSION['USER']); 
} 
session_destroy(); //destroy the session


// go to login page 
header('Location: guest_form.php'); 
exit; 
?> 