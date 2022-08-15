<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="edu_app";

//create connection to server
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
    die("Connection Failed: ".$conn->connect_error);
}

$fname=$_POST["firstName"];
$lname=$_POST["lastName"];
$idn=$_POST["index_num"];
$email=$_POST["Email"];
$upassword=$_POST["password"];
$usertype=$_POST["user_type"];

//checking if ID already exists
$query= "SELECT * FROM users WHERE indexn='".$idn."' ";
$result= mysqli_query($conn,$query);
if($row=mysqli_fetch_assoc($result))
{
    header("location:../signup.php?idtaken");
}
//checking if email already exists
$query= "SELECT * FROM users WHERE email='".$email."' ";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_assoc($result))
{
    header("location:../signup.php?emailtaken");
}  

//ADDING USER TO DATABASE
    $sql="INSERT into users(fname,lname,indexn,email,user_type,upassword) values('$fname','$lname','$idn','$email','$usertype','$upassword')";
    if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
    mysqli_close($conn);
    header("location:../login.php?success");}
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    

    exit();

?>