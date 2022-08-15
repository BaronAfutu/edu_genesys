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

$groupName=$_POST["g_name"];
$groupOwner=$_SESSION['userID'];
$code=($groupOwner%100)*100+ random_int(0,99);

$sql="INSERT into groups(gname,gadmin,invite_code) values('$groupName','$groupOwner','$code')";
if (mysqli_query($conn, $sql)) {
    $_SESSION['gName']=$groupName;
    $_SESSION['gOwner']=$groupOwner;
    $_SESSION['gCode']=$code;
    echo $groupName;
    //CREATING TABLE FOR GROUP
    $sql="CREATE TABLE g".$code."(
        id INT(200) AUTO_INCREMENT PRIMARY KEY,
        member_id INT(200) NOT NULL,
        join_date TIMESTAMP,
        descri VARCHAR(200),
        name_file VARCHAR(200),
        uploadtype VARCHAR(200)
        )";
        if(mysqli_query($conn,$sql)){
            $sql="ALTER TABLE g".$code." 
            ADD CONSTRAINT FOREIGN KEY(member_id) REFERENCES users(indexn)
            ON UPDATE CASCADE ON DELETE CASCADE";
            if(mysqli_query($conn,$sql)){};
        }
        else{
            echo "Error creating table: ".mysqli_error($conn);
        }
        $sql="INSERT INTO g".$code."(member_id) VALUES(".$_SESSION['gOwner'].")";
        if(mysqli_query($conn,$sql)){//h
        };
        $sql="INSERT INTO user_groups(user_id,group_code) VALUES(".$_SESSION['userID'].",".$_SESSION['gCode'].")";
        if(mysqli_query($conn,$sql)){//h
        };
        mysqli_close($conn);

   header("location:../groupHome.php?$code");
}