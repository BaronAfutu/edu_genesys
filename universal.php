<?php
session_start();
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Rare-PDFs</title>
  
  <link rel="stylesheet"   href="css/bootstrap.min.css" />
  <link rel="stylesheet"   href="css/bootstrap-theme.min.css" />
  <link rel="stylesheet"  href="css/bootstrap-grid.css" />
  <link rel="stylesheet" type="text/css"  href="style/style7.css" />
  <link rel="stylesheet" type="text/css"  href="design.css" />
</head>

<style>
body {
    background-image: url("img/groupback.jpg");
    background-size:cover;
    font-size:20px;
    
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
  <li><a href="index.php">Home</a></li>
  <li><a href="userHome.php">My Home</a></li>
  <li><a href="universal.php">Universal Courses</a></li>
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
    

    
  </div>

  <div class="container">
    <ul class=" nav nav-pills nav-justified">
      <li class="active"><a href="#Soft" data-toggle="tab">Software Engineering</a></li>
      <li><a href="#C++" data-toggle="tab">C++</a></li>
      <li><a href="#Calc" data-toggle="tab">Calculus II</a></li>
      
      
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade in active" id="Soft">
        <div class="panel panel-default panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">SOFTWARE ENGINEERING-SECOND SEMESTER</h3>            
          </div>
            <li class="list-group-item">PDF1 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF2 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF3 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF4 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF5 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF6 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF7 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF8 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF9 <input type="submit" name="download" value="Download" /></li>
            
          <div class="panel-footer">
          Comments and Suggestions are warmly welcome.
          </div>
        </div>
        
      </div>
      
      <div class="tab-pane fade" id="C++">
        <div class="panel panel-default panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">C++ Second Semester</h3>            
          </div>
            <li class="list-group-sitem">PDF1 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF2 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF3 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF4 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF5 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF6 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF7 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF8 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF9 <input type="submit" name="download" value="Download" /></li>
          <div class="panel-footer">
          Comments and Suggestions are warmly welcome.
          </div>
        </div>
        
      </div>
      <div class="tab-pane fade" id="Calc">
        <div class="panel panel-default panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">CALCULUS II-SECOND SEMESTER</h3>            
          </div>
            <li class="list-group-item">PDF1 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF2 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF3 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF4 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF5 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF6 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF7 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF8 <input type="submit" name="download" value="Download" /></li>
            <li class="list-group-item">PDF9 <input type="submit" name="download" value="Download" /></li>
          <div class="panel-footer">
          Comments and Suggestions are warmly welcome.
          </div>
        </div>
        
      </div>
      
    </div>
    
  </div>

  <footer>
  <div class="container1">
    <div class="row">
      <div class="col-sm-2">
       <h5>Copyright &copy; 2018 GENESYS</h5> 
      </div>
      <div class="col-sm-4">
        <h5>About Us</h5>
        <p>Genesys is a team of five Undergraduate students who with their tknowledge in Web Development are making teaching and learning less stressful.The team interacts with differnt people in order to fully understand the task ahead.All five members of Genesys are from the University Of Ghana.</p>
        
      </div>
      <div class="col-sm-2">
      <h5>Navigation</h5>
      <ol>
        <li><a href="#">Home</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contects</a></li>
      </ol>
      </div>
      <div class="col-sm-2">
        <h5>Follow Us</h5>
      <ol>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Instagram</a></li>
      </ol>
      </div>
      <div class="col-sm-2">
        <h5>Coded with<span class="glyphicon glyphicon-heart"></span> by GENESYS</h5>
      </div>
    </div>
    
  </div>
</footer>

   <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script>
    $("textarea").tooltip();
  </script>
  <script>
    $("input").tip();
  </script>
  <script>
    $("input").tipp();
  </script>
  <script src="js/bootstrap.min.js"></script>
  
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
</body>

</html