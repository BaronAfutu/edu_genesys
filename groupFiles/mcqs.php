<?php 
	session_start();
	require_once("../serveDB/databaseConnect.php");
	if(!$_SESSION['userID']){header('location:login.php?outed');}
?>
<!DOCTYPE html>
<html>
<head>
  <?php echo("<title>Materials-".$_SESSION['gName']."</title>");
		?>
	<link rel="stylesheet" type="text/css" href="../design.css" />
	<script src="../script.js"></script>
</head>
<style>
body {
    background-image: url("../img/groupback.jpg");
    background-size:cover;
    font-size:20px;
    color:white;
} 
</style>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../groupHome.php">Group Info</a>
  <a href="../groupFiles/materials.php">Reading Materials</a>
  <a href="../groupFiles/assignment.php">Assignments</a>
  <a href="../groupFiles/submit.php">Submission</a>
  <a href="../groupFiles/trials.php">Trial Tests</a>
  <a href="../groupFiles/mcqs.php">MCQs</a>
</div>

<div>
<ul class="topnav">
  <li><!-- Use any element to open the sidenav -->
	<!--<img src="BibleTopRight.png" width="100px" height="40px"  onclick="openNav()"></img>--><a onclick="openNav()"> | | | </a></li>
  <li><a href="../index.php">Home</a></li>
  <li><a href="../userHome.php">My Home</a></li>
  <li><a href="../universal.php">Universal Courses</a></li>
  <li><a href="#about">About</a></li>
  <div style="float:right;">
  <?php 
        if($_SESSION['userType']!='Student'){
            echo ('<li><a href="../serveDB/deleteGroup.php">Delete Group</a></li>');
        }
        else{
            echo('<li><a href="../serveDB/leaveGroup.php">Leave Group</a></li>');
        }
    ?>
		<li><a href="../profile.php">Profile</a></li>
		<li><a href="../signout.php">Sign out</a></li>
  </div>
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
</ul>

</div>
<div id="main">
    <?php
		if($_SESSION['userType']!='Student'){
			$_SESSION['resourcePage']="studyMaterial";
            require_once('../serveDB/viewmcq.php');
            echo '<!--CREATING A GROUP-->
			<p id="AR">
				<input type="button" onclick="calladd()" name="resource_add" id="resourceAdd" value="Upload"/>
            </p>';
        }
        else{
            $_SESSION['resourcePage']="studyMaterial";
            require_once('../serveDB/viewmcq.php');
        }
		?>
        </div>
<script>
    function calladd(){
        parag=document.getElementById("AR");
        parag.innerHTML='<form method="POST" action="#file" enctype="multipart/form-data">'+
        'File: Name <input name="up_file" type="file"/>&nbsp'+
        '<select id="uploadType" name="upload_type"><option value="StudyMaterial">Reading Material</option></select>&nbsp'+
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
</script>
<?php
require_once('../serveDB/addResource.php');


    mysqli_close($conn);
?>
</div>
</body>
</html>