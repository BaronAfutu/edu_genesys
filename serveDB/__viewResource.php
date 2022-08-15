
<!--Displaying of Resources-->
<!--READING MATERIALS-->
<!--<table style="border:rgba(3,3,3,0.2);overflow-x:auto;" border="3px" cellpadding="5px" cellspacing="0px">
<tr><th width="40%">File</th><th width="40%">Notice</th><th>Date</th>-->

<div class="tab-content">
      <div class="tab-pane fade in active" id="Soft">
        <div class="panel panel-default panel-default">
            








<?php
    if($_SESSION['resourcePage']=="studyMaterial"){
    echo('<h1>Study Materials</h1>');
    $path='http://localhost:90/geneUploads/';
    $query= "SELECT * FROM g".$_SESSION['gCode']." WHERE uploadtype='StudyMaterial'";
    #$query= "SELECT * FROM g9057 WHERE uploadtype='StudyMaterial'";
    $result= mysqli_query($conn,$query);
        $i=-1;
    while($row=mysqli_fetch_assoc($result)){
        $i=$i+1;
        $rname[$i]=$row['name_file'];
        $rdesc[$i]=$row['descri'];
        $rdate[$i]=$row['join_date'];
        echo ('<tr><td><a href="'.$path.$rname[$i].'">'.
            $rname[$i].'</a></td><td>'.$rdesc[$i].
            '</td><td> '.$rdate[$i].'</td></tr>'); 
    }
    echo("</div>   
    </div>");}

    #----------ASSINGMENTS
    elseif($_SESSION['resourcePage']=='assignment'){
        echo('<h1>Assignments</h1>');
    $path='http://localhost:90/geneUploads/';
    $query= "SELECT * FROM g".$_SESSION['gCode']." WHERE uploadtype='Assignment'";
    #$query= "SELECT * FROM g9057 WHERE uploadtype='StudyMaterial'";
    $result= mysqli_query($conn,$query);
        $i=-1;
    while($row=mysqli_fetch_assoc($result)){
        $i=$i+1;
        $rname[$i]=$row['name_file'];
        $rdesc[$i]=$row['descri'];
        $rdate[$i]=$row['join_date'];
        echo('<li class="list-group-item">'.$rname[$i].'<a href="'.$path.$rname[$i].'">Download</a></li>');
        /*echo ('<tr><td><a href="'.$path.$rname[$i].'">'.
            $rname[$i].'</a></td><td>'.$rdesc[$i].
            '</td><td> '.$rdate[$i].'</td></tr>');    */ 
    }
    echo("</div>
    </div>");
    
    echo('<table style="border:rgba(3,3,3,0.2);" border="3px" cellpadding="5px" cellspacing="0px">
    <tr><th width="40%">File</th><th width="40%">Notice</th><th>Date</th>');
    #-------LABS as part of assignments
    echo('<h1>Labs</h1>');
    $path='http://localhost:90/geneUploads/';
    $query= "SELECT * FROM g".$_SESSION['gCode']." WHERE uploadtype='Lab'";
    #$query= "SELECT * FROM g9057 WHERE uploadtype='StudyMaterial'";
    $result= mysqli_query($conn,$query);
        $i=-1;
    while($row=mysqli_fetch_assoc($result)){
            $i=$i+1;
            $rname[$i]=$row['name_file'];
            $rdesc[$i]=$row['descri'];
            $rdate[$i]=$row['join_date'];
            echo ('<tr><td><a href="'.$path.$rname[$i].'">'.
            $rname[$i].'</a></td><td>'.$rdesc[$i].
            '</td><td> '.$rdate[$i].'</td></tr>');     
        }}
        elseif($_SESSION['resourcePage']=="submission"){
            echo('<h1>Submissions</h1>');
            $path='http://localhost:90/geneUploads/';
            $query= "SELECT * FROM g".$_SESSION['gCode'].",users WHERE uploadtype='Submission' AND member_id=indexn";
            #$query= "SELECT * FROM g9057 WHERE uploadtype='StudyMaterial'";
            $result= mysqli_query($conn,$query);
                $i=-1;
            while($row=mysqli_fetch_assoc($result)){
                $i=$i+1;
                $rname[$i]=$row['name_file'];
                $rsender[$i]=$row['member_id'];
                $rsname[$i]=$row['fname']." ".$row['lname'];
                $rdate[$i]=$row['join_date'];
                echo ('<tr><td><a href="'.$path.$rname[$i].'">'.
                    $rname[$i].'</a></td><td>'.$rsender[$i].
                    ' - '.$rsname[$i].'</td><td> '.$rdate[$i].'</td></tr>'); 
            }
            echo("</table>");}

            if($_SESSION['resourcePage']=="strialstudyMaterial"){
                echo('<h1>Study Materials</h1>');
                $path='http://localhost:90/geneUploads/';
                $query= "SELECT * FROM g".$_SESSION['gCode']." WHERE uploadtype='Trials'";
                #$query= "SELECT * FROM g9057 WHERE uploadtype='StudyMaterial'";
                $result= mysqli_query($conn,$query);
                    $i=-1;
                while($row=mysqli_fetch_assoc($result)){
                    $i=$i+1;
                    $rname[$i]=$row['name_file'];
                    $rdesc[$i]=$row['descri'];
                    $rdate[$i]=$row['join_date'];
                    echo ('<tr><td><a href="'.$path.$rname[$i].'">'.
                        $rname[$i].'</a></td><td>'.$rdesc[$i].
                        '</td><td> '.$rdate[$i].'</td></tr>'); 
                }
                echo("</div>
                </div>");}
?>