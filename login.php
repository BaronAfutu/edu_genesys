<!doctype html>
<html>

<head>
  <meta charset="utf-8" />
  <title>EduGenesys -Login</title>
  <link rel="stylesheet" type="text/css" href="design.css" />
</head>
<style>
  body {
    background-image: url("img/logback2.jpg");
    background-size:cover;
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

<div id="main" >
  <div style="float:left;margin-top:8%;margin-left:15%;background-color:rgba(50,50,50,0.1); padding:50px; padding-top:40px; width:250px;border-radius:5px;">
  <?php #UPON SUCCESSFUL SIGNUP
    if(isset($_GET['success']))
    {
        $message=$_GET['success'];
        $message="ACCOUNT SUCCESSFULLY CREATED<br/>YOU CAN LOG IN";
      echo('<h3>'.$message.'</h3>');
      }
    if(isset($_GET['outed']))
      {
          $message=$_GET['outed'];
          $message="You Have to Log in to Continue";
        echo('<h3 style="color:red; font-weight:bold;">'.$message.'</h3>');
      }
      if(isset($_GET['invalid']))
      {
          $message=$_GET['invalid'];
          $message="Invalid ID or Password";
        echo('<h3 style="color:red; font-weight:bold;">'.$message.'</h3>');
      }
  ?>
<!--------------------------------->
  <form action="serveDB/dblogin.php" method="POST" onsubmit="">
<input type="text" name="log_idn" placeholder="Index Number" id="logIdn" required/><br/>
<input type="password" name="log_password" placeholder="Password" id="pass" required/>
<input type="submit" name="login" value="LOG IN" />
</form>
<br/>
<span style="margin:0 0 30px 0;
	font-weight:20;color:black;
	font-size:16px;">New here? Click <a href="signup.php">Here</a> to sign up</span>
</div>
<!--<div style="float:center;margin-left:850px;margin-top:150px;background-color:rgba(50,50,50,0.1); padding:50px; width:250px;border-radius:5px;">
<?php #require_once('sform.php'); ?>
</div>-->
</div>
</body>
<script>
			function checkvalid(){
				firstPass=document.getElementById("pass").value;
				secPass=document.getElementById("cpass").value;
				invalMess=document.getElementById("mess");
        code=document.getElementById("accessCode").value;
        user=document.getElementById("userType").value;

				if(firstPass==secPass)
				{
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
</html