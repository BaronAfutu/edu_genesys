<?php 
	session_start();
	require_once("serveDB/databaseConnect.php");
	if(!$_SESSION['userID']){header('location:login.php?outed');}
?>
<?php if(isset($_GET['profile']))
        {
          if(isset($_POST['submit'])){
            $fname=$_POST["firstName"];
            $lname=$_POST["lastName"];
            $idn=$_POST["index_num"];
            $email=$_POST["Email"];
            $oldpassword=$_POST["oldPassword"];
            $desc=$_POST['desc'];
            $newpassword=$_POST["newPassword"];
            $cpassword=$_POST["cPassword"];
          }
        }
      ?>