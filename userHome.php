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
</head>
<style>
  body {
    background-image: url("img/logback2.jpg");
    background-size:cover;
    font-size:20px;
    
} 
</style>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="universal.php#Soft">Software Engineering</a>
  <a href="universal.php#C++">C++ Programming</a>
  <a href="universal.php#Calc">Calculus II</a>
</div>

<div>
<ul class="topnav">
  <li><!-- Use any element to open the sidenav -->
  <!--<img src="BibleTopRight.png" width="100px" height="40px"  onclick="openNav()"></img>-->
  <a onclick="openNav()"> | | | </a></li>
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
  <!--If no User Can be gotten rid of-->
  <?php
    if(isset($_GET['nouser']))
    {
      session_unset();
      session_destroy();

      $message='
    <li><a href="login.php"> LOGIN</a></li>

    <li><a href="signup.php">SIGN-UP</a></li>
    ';?>
    <span><?php echo $message; ?> </span>
    <?php
    }
  ?>		
    <div style="float:left;margin-left:15%;margin-top:10%;">
  <!--Displaying the user info would be designed-->
  <?php
    if (isset($_SESSION['userID'])){
      $userDisp = $_SESSION['userID'];

      //
      echo "<div class='userDisplay'>".$userDisp."</div>
      <div class='userDisplay'>".$_SESSION['userFname']."</div>
      <div class='userDisplay'>".$_SESSION['userLname']."</div>
      <div class='userDisplay'>".$_SESSION['userType']."</div>";
    }
  ?>

  <!--Creating or joing group depending on user type-->
  <?php
    if($_SESSION['userType']!='Student'){
      echo '<!--CREATING A GROUP-->
      <p id="CG">
        <input type="button" onclick="callcreate()" name="group_create" id="groupCreate" value="Create a group"/>
      </p>';
    }
    else{$message="";

    if(isset($_GET['nogroup']))
        {
            $message="Group not found";
        }
    if(isset($_GET['alreadyjoined']))
        {
            $message="You've Already Joined This Group";
        }
      echo '<!--JOINING GROUPS-->
      <p id="JG">
        <input type="button" onclick="calljoin()" name="group_join" id="groupJoin" value="Join a group"/>
        &nbsp;'.$message.'</p>';}
  ?>
  </div>

    <div style="float:center;margin-left:55%;margin-top:10%;">
    <p style="font-size:25px; font-weight:bold;">Groups</p>
    <!--Displaying of Groups-->
  <?php
    $query= "SELECT group_code FROM user_Groups WHERE user_id='".$_SESSION['userID']."' ";
    $result= mysqli_query($conn,$query);
    //for ($i=0; $i <3 ; $i++) { 
      $i=-1;
    while($row=mysqli_fetch_assoc($result)){
      //echo ("<h3>".$row['group_code']."</h3>");
      $quer= "SELECT gname FROM groups WHERE invite_code='".$row['group_code']."' ";
      $resul= mysqli_query($conn,$quer);

      if($row1=mysqli_fetch_assoc($resul))
      {
        $i=$i+1;
        $gname[$i]=$row1['gname'];
        echo ('<button class="grp" id="g'.$i.'" value="'.$gname[$i].'" onClick="setSession('.$i.')" style="text-decoration:none;">'.$gname[$i].'</button><br/><br/>');}
      }
      
  ?></div>
<!--Scripts-->
<script>
  function callcreate(){
    parag=document.getElementById("CG");
    parag.innerHTML='<form method="POST" action="serveDB/createGroup.php">Group Name <input name="g_name" style="text-transform:capitalize;" type="text" required/>&nbsp <input type="submit" value="Create"></form>';
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