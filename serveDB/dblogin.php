<?php
    session_start(); 
    
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="edu_app";

    //create connection to server
    $conn= mysqli_connect($servername,$username,$password,$dbname);
    //$conn=new mysqli($servername,$username,$password);


    //check connection
    if(!$conn)
    {
        die("Connection Failed: ".$conn->connect_error);
    }

    //WHEN LOGIN IS CLICKED
    if(isset($_POST['login']))
    {
        //$idn=mysqli_real_escape_string($conn,$_POST["log_idn"]);
        $idn=$_POST["log_idn"];
        $userP= mysqli_real_escape_string($conn,$_POST["log_password"]);

        //USER INFO REQUEST
        $query= "SELECT * FROM users WHERE indexn='".$idn."' ";
        $result= mysqli_query($conn,$query);

        if($row=mysqli_fetch_assoc($result))
        {
            //$checkPass= password_verify($userP,$row['Passwords']);
            if ($row['upassword']!=$userP)
            {
                header("location:../login.php?invalid");
                exit();
            }
            elseif($row['upassword']==$userP)
            {
                $userId=$row['indexn'];
                $_SESSION['userFname']=$row['fname'];
                $_SESSION['userLname']=$row['lname'];
                $_SESSION['userID']=$row['indexn'];
                $_SESSION['email']=$row['email'];
                $_SESSION['userType']=$row['user_type'];
                $_SESSION['userPassword']=$row['upassword'];
                if($row['user_type']=="Student"){
               header("location:../userHome.php?$userId");
                }
                if($row['user_type']!="Student"){
                header("location:../userHome.php?$userId");
                }
                exit();
            }
        }
        else{header("location:../login.php?invalid");}



    }
?>