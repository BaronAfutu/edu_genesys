<?php
 session_start(); 
 unset($_SESSION); 
 session_destroy();
echo $_SESSION['userID'];
header('location:login.php');
?>