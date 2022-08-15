<!doctype html>
<html>

<head>
  <meta charset="utf-8" />
  <title>EduGenesys -Login</title>
  <link rel="stylesheet" type="text/css" href="design.css" />
</head>
<style>
  body {
    background-image: url("img/logback.jpg");
    background-size:100%;
    
} 
a{
  text-decoration:underline;
  color:blue;
}
a:hover{
  text-decoration:underline;
  color:red;
}
</style>
<body>
 <div>
  <ul class="topnav">
  <li><a href="userHome.php">My Home</a></li>
  <li><a href="universal.php">Universal Courses</a></li>
  <li><a href="about.php">About</a></li>
  <div style="float:right;">
		<li><a href="login.php">Login</a></li>
		<li><a href="signup.php">Signup</a></li>
  </div>
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
</ul>
</div>

<div id="main" ><center>
  <?php if(isset($_GET['idtaken']))
    {
        $message=$_GET['idtaken'];
        $message="ID Already Used";
      echo('<span style="font-size:18px; color:rgba(230,0,0,1);"><b>'.$message.'</b></span>');
      }
      if(isset($_GET['emailtaken']))
    {
        $message=$_GET['emailtaken'];
        $message="Email Already Used";
      echo('<span style="font-size:18px; color:rgba(230,0,0,1);"><b>'.$message.'</b></span>');
      }?>
  <div style="margin-top:10px;background-color:rgba(50,50,50,0.1); padding:50px;padding-bottom:10px; width:250px;border-radius:5px;">
	<?php //GETTING THE SIGNUP FORM
	require_once("sform.php");?>
</div></center>
</div>

    <script>
			function checkvalid(){
				firstPass=document.getElementById("pass").value;
				secPass=document.getElementById("cpass").value;
				invalMess=document.getElementById("mess");
                code=document.getElementById("accessCode").value;
                user=document.getElementById("userType").value;

				if(firstPass==secPass)
				{
					invalMess.innerHTML='<spsan style="color:#00ff00; font-weight:bold;">Passwords Match</spsan><br>'+'<h3>By clicking Sign Up you agree to our <a href="homepage.php" target="blank">terms and conditions</a>.</h3>';
				}
				else{
					invalMess.innerHTML='<spsan style="color:#ff0000; font-weight:bold;">Passwords Do Not Match</spsan><br>'+'<h3>By clicking Sign Up you agree to our <a href="homepage.php" target="blank">terms and conditions</a>.</h3>';
					return false;
				};
                
                if(code!="665590" && (user=="Teacher" || user=="Lecturer"))
                {invalMess.innerHTML='<spsan style="color:#ff0000; font-weight:bold;">Invalid Acces Code</spsan><br>'+'<h3>By clicking Sign Up you agree to our <a href="homepage.php" target="blank">terms and conditions</a>.</h3>';
                return false;}
			};
			</script>
<?php require_once("footer.php");?>