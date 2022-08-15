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

$gCode=$_POST['g_code'];
$query= "SELECT * FROM groups WHERE invite_code='".$gCode."'";
$result= mysqli_query($conn,$query);
    if($row=mysqli_fetch_assoc($result))
    {
        $query= "SELECT * FROM g".$gCode." WHERE member_id='".$_SESSION['userID']."'";
        $result= mysqli_query($conn,$query);
        if($row[1]=mysqli_fetch_assoc($result))
        {header("location:../userHome.php?alreadyjoined");}
        else{
        $sql="INSERT INTO g".$gCode."(member_id) VALUES(".$_SESSION['userID'].")";
        if(mysqli_query($conn,$sql)){};
            $_SESSION['gName']=$row['gname'];
            $_SESSION['gOwner']=$row['gadmin'];
            $_SESSION['gCode']=$gCode;
            header("location:../groupHome.php?added");
    }}
        
    else{
        if($_SESSION['userType']=="Student"){
           header("location:../userHome.php?nogroup");
        }
    }

?>