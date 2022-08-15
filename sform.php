<?php ?>
<form method="POST" action="serveDB/dbSubmit.php" onsubmit="return checkvalid()">
<input type="text" style="text-transform:capitalize;" name="firstName" placeholder="First Name"/>
<input type="text" style="text-transform:capitalize;" name="lastName" placeholder="Last Name" />
<input type="number" name="index_num" placeholder="Index Number" required />
<input type="email" name="Email" placeholder="Email"  />
<br/>
<select id="userType" name="user_type">
<option value="Student">Student</option>
<option value="Teacher">Teacher</option>
<option value="Lecturer">Lecturer</option>
</select><br>
<input type="text" name="access_code" placeholder="Access Code for Tutors" id="accessCode"/>

<br/>
<input type="password" name="password" placeholder="Password" id="pass" required />
<input type="password" name="Password2" placeholder="Repeat password" id="cpass" oninput="checkvalid()" required />

    <?php
    if(isset($_GET['invalidCode']))
    {
        $message=$_GET['invalidCode'];
        $message="Invalid Code";
    ?>
    <div style="font-size:16pt; color:red; font-weigth:bold;"><?php echo $message; ?> </div>
    <?php
    }
    ?> 
    <h3 style="font-size:16px; color:#fff" id="mess">By clicking Sign Up you agree to our <a href="homepage.php" style="color:#bbf;" target="blank">terms and conditions</a>.</h3>
    <input type="Submit" value="Submit"/><br/>
    <span style="font-size:18px;color:#fff">You can click <a style="color:#bbf;" href="login.php">HERE</a> to LOG IN.</span>
    </div>
    </div>

</form>
<?php ?>