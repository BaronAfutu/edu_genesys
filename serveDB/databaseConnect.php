<?php
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
    ?>