<?php 
	session_start();
	require_once("serveDB/databaseConnect.php");
	if(!$_SESSION['userID']){header('location:login.php?outed');}
?>
<?php
#SUCCESSFUL CONNECTION TO DATABASE

#GETTING THE GROUP NAME FROM THE URL OF THE PAGE
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
#THE ABOVE FUNCTION GETS THE URL
$sess=substr($actual_link, strpos($actual_link, "?") + 1);
#THE ABOVE FUNCTION GETS ALL THE CHARACTERS AFTER THE ? SIGN
$sess = str_replace ("%20", " ", $sess);
#THE ABOVE FUNCTION REPLACES %20 WITH SPACE GIVING US THE GROUP NAME

$query= "SELECT * FROM groups WHERE gname='".$sess."' OR invite_code='".$sess."' ";
$result= mysqli_query($conn,$query);
    if($row=mysqli_fetch_assoc($result))
       {$_SESSION['gName']=$row['gname'];
        $_SESSION['gOwner']=$row['gadmin'];
        $_SESSION['gCode']=$row['invite_code'];};   
?>
<!DOCTYPE html>
<html>
<head>
  <?php echo("<title>".$_SESSION['gName']."</title>");
		?>
	<link rel="stylesheet" type="text/css" href="design.css" />
	<script src="script.js"></script>
</head>
<style>
body {
    background-image: url("img/groupback.jpg");
    background-size:cover;
    font-size:20px;
    color:white;
} 
</style>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="groupHome.php">Group Info</a>
  <a href="groupFiles/materials.php">Reading Materials</a>
  <a href="groupFiles/assignment.php">Assignments</a>
  <a href="groupFiles/submit.php">Submission</a>
  <a href="groupFiles/trials.php">Trial Tests</a>
  <a href="groupFiles/mcqs.php">MCQs</a>
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
        <?php 
        if($_SESSION['userType']!='Student'){
            echo ('<li><a href="serveDB/deleteGroup.php">Delete Group</a></li>');
        }
        else{
            //echo('<li><a href="serveDB/leaveGroup.php">Leave Group</a></li>');
            echo('<li><a onclick="confirmLeave()">Leave Group</a></li>');
        }
         ?>
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
<?php echo '<input type="hidden" id="hp" value="'.$_SESSION['userPassword'].'">'?>
<?php #DISPLAYING THE GROUP'S INFO
   $query= "SELECT * FROM users WHERE indexn='".$_SESSION['gOwner']."'";
   $result= mysqli_query($conn,$query);
       if($row=mysqli_fetch_assoc($result))
       {};
   echo('<h1 align="center">'.$_SESSION['gName'].'</h1>'.
   '<p> Invite Code: '.$_SESSION['gCode'].'</p>'.
    '<p>Group Admin: '.$row['fname'].' '.$row['lname'].'</p>');
   ?>

   <?php
    if(isset($_GET['added']))
    {
        $sq="INSERT INTO user_groups(user_id,group_code) VALUES(".$_SESSION['userID'].",".$_SESSION['gCode'].")";
        if(mysqli_query($conn,$sq)){/*h*/};
        $message=$_GET['added'];
        $message='<span style="color:white;">GORUP JOINED<br/>';
    ?>
    <h3><?php echo $message; ?> </h3>
    <?php
    }
    ?> 

    <?php
		if($_SESSION['userType']!='Student'){
			echo '<!--ADDING A RESOURCE-->
			<p id="AR">
				<input type="button" onclick="calladd()" name="resource_add" id="resourceAdd" value="Upload"/>
			</p>';
		}
		else
			#require_once('serveDB/viewResource.php');
		?>

<script>
    function calladd(){
        parag=document.getElementById("AR");
        parag.innerHTML='<form method="POST" action="#file" enctype="multipart/form-data">'+
        'File: Name <input name="up_file" type="file"/>&nbsp'+
        '<select id="uploadType" name="upload_type"><option value="Assignment">Assignment</option>'+
        '<option value="Lab">Lab</option> <option value="StudyMaterial">Reading Material</option>'+
        '<option value="Trials">Trial Exercise</option></select>&nbsp'+
        '<input type="text" name="info" cols="20" placeholder="Info about upload"/> &nbsp'+
        '<input type="submit" name="submit" value="Upload"></form>';
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
    function confirmLeave(){
       var up=document.getElementById('hp').value;
           var pass=prompt('Type Your Password To Exit Group');
            if(pass==up){
                window.location='serveDB/exit.php';
            }
        }
</script>
<?php
require_once('serveDB/addResource.php');


    mysqli_close($conn);
?>
</div>
</body>
</html>