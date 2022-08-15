<?php
if(isset($_POST['submit'])){
    #require_once('serveDB/addResource.php');
    $upFile=$_FILES['up_file'];
    $upFileName=$upFile['name'];
    
    if(!empty($upFileName)){
    $upFileTemp=$upFile['tmp_name'];
    #$upFileTemp=str_replace (" ", "_", $upFileTemp);
    $upFileExt=strtolower(substr($upFileName,(strpos($upFileName,".")+1)));
    $upFileInfo=$_POST['info'];
    $upFileType=$_POST['upload_type'];
    $path='C:/xampp/htdocs/geneUploads/';
    if(move_uploaded_file($upFileTemp,$path.$upFileName)){
    echo $upFileName." <br/> ".$upFileInfo."<br/> ".$upFileType;
    echo "<p>Upload Successful</p>";
    $sql="INSERT INTO g".$_SESSION['gCode']."(member_id,descri,name_file,uploadtype) VALUES('".$_SESSION['userID']."','".$upFileInfo."','".$upFileName."','".$upFileType."')";
        if(mysqli_query($conn,$sql)){//h
        }}
    $_POST['submit']=!$_POST['submit'];
    $upFileName='';
    }}
?>