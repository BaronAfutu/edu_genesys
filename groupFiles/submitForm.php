<form action="#file" method="POST" enctype="multipart/form-data">
        <p>Index: <?php echo('<input type="number" value="'.$_SESSION['userID'].'"></p>');?>
        File: <input type="file" name="up_file">
        <?php $_POST['upload_type']="Submission"; 
        $_POST['info']='';?>
        <p><input type="submit" name="submit"/>
    </form>