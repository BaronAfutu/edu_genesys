<?php 
	session_start();
	require_once("serveDB/databaseConnect.php");
	if(!$_SESSION['userID']){header('location:login.php?outed');}
?>
<!DOCTYPE html>
<html>
<head>
  <?php if(isset($_GET[$_SESSION['userID']]))
        {
          $message=$_GET[$_SESSION['userID']];
          //$message='<form method="POST" action="signout.php"><li><button class="nav  li a" type="submit" name="clearSession">SIGNOUT</button></li></form>';
          $message='<title>Genesys- '.$_SESSION['userFname'].' '.$_SESSION['userLname'].'</title>';
      ?>
      <span><?php echo $message; ?> </span>

      <?php
        }
        else
        echo('<title>Genesys- '.$_SESSION['userFname'].' '.$_SESSION['userLname'].'</title>');
      ?>
<link rel="stylesheet" type="text/css" href="design.css" />
<script src="script.js"></script>
<style>
input[type="text"],
input[type="password"],
input[type="number"]{
  border:0px;
  font-size:17px;
  width:100%;
  height:100%;
  background:rgba(1,1,1,0);
  color:white;
}
body{
  background-image: url("img/groupback.jpg");
  background-size:cover;
  color:white;
  font-size:17px;
}
table{
  font-size:17px;
}
input[type="submit"],
input[type="reset"]{
  font-size:17px;
}
table{
  border:rgba(3,3,3,0.2);
}
</style>
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Universal Course 1</a>
  <a href="#">Universal Course 2</a>
  <a href="#">Universal Course 3</a>
  <a href="#">Universal course 4</a>
</div>

<div>
<ul class="topnav">
  <li><!-- Use any element to open the sidenav -->
	<!--<img src="BibleTopRight.png" width="100px" height="40px"  onclick="openNav()"></img>--><a onclick="openNav()"> | | | </a></li>
  <li><a href="index.php">Home</a></li>
  <li><a href="userHome.php">My Home</a></li>
  <li><a href="universal.php">Universal Courses</a></li>
  <li><a href="#about">About</a></li>
  <div style="float:right;">
		<li><a href="profile.php">Profile</a></li>
		<li><a href="signout.php">Sign out</a></li>
  <div>
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
</ul>

</div>


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">
  <h1>PROFILE UPDATE</h1>
    <form action="serveDB/update.php?profile" method="POST" onsubmit="return checkValid()">
    <?php echo('<span style="color:rgba(2,2,2,0);" id="realPass" value="'.$_SESSION['userPassword'].'">'.$_SESSION['userPassword'].'</span>'); ?>
    <table width="50%" border="2px"; cellpadding="8px" cellspacing="3px">
    <tr>
    <td width="30%" style="text-align:right;">
    First Name</td>
    <td><?php echo('<input type="text" name="firstName" value="'.$_SESSION['userFname'].'">');?>
    </td>
    </tr>

    <tr>
    <td style="text-align:right;">
    Last Name</td>
    <td><?php echo('<input type="text" name="lastName" value="'.$_SESSION['userLname'].'"/>')?>
    </td>
    </tr>

    <tr>
    <td style="text-align:right;">
    Index Number</td>
    <td><?php echo('<input type="number" name="index_num" value="'.$_SESSION['userID'].'"/>')?>
    </td>
    </tr>

    <tr>
    <td style="text-align:right;">
    Email</td>
    <td><?php echo('<input type="text" name="Email" value="'.$_SESSION['email'].'"/>')?>
    </td>
    </tr>
    
    <tr>
    <td style="text-align:right;">
    Description</td>
    <td><?php echo('<input type="text" name="desc" value=""/>')?>
    </td>
    </tr>

    <tr>
    <td style="text-align:right;">
    Old Password</td>
    <td><?php echo('<input type="password" id="oldPassword" name="oldPassword" value="" oninput="checkValid()" required/>')?>
    </td>
    </tr>

    <tr>
    <td style="text-align:right;">
    New Password</td>
    <td><?php echo('<input type="password" name="newPassword" value=""/>')?>
    </td>
    </tr>

    <tr>
    <td style="text-align:right;">
    Confirm Password</td>
    <td><?php echo('<input type="password" name="cPassword" value=""/>')?>
    </td>
    </tr>
    <tr>
    <td style="text-align:right;border:0px;">
    <input type="submit" name="submit" value="Save">
    <input type="reset" name="" value="Discard Changes">
    </td>
    <td style="text-align:right;border:0px;">
    <p id="info" style="text-align:left;color:red; font-size:20px;"></p>
    </td>
    </tr>
    </table>
    </form>
<!--Scripts-->
<script>
  function checkValid(){
    parag=document.getElementById("info");
    oldPass=document.getElementById("oldPassword").value;
    //alert(oldPass);
    rpass=document.getElementById("realPass");
    //alert(rpass.innerHTML);
    if(oldPass!=rpass.innerHTML){
    parag.innerHTML="Password Incorrect";
    return false;}
    else{
      parag.innerHTML='<font color="green">Password Match</font>';
    }
    
  }
  function calljoin(){
    parag=document.getElementById("JG");
    parag.innerHTML='<form method="POST" action="serveDB/joinGroup.php">Group Access Code <input name="g_code" type="number"/>&nbsp<input type="submit" value="Find and Join"></form>'
  }
  function setSession(n){
    n1='g'+n;
    parag=document.getElementById(n1);
    sr='groupHome.php?'+parag.innerHTML;
    window.location=sr;
  }
</script>

</div>
</body>
</html>