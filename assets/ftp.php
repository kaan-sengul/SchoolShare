<?php

    // get FTP access parameters
    include "connection.php";
    include "ftp_connection.php";
    $query3 = "SELECT * FROM courses WHERE courseID = '$_GET[course]'";
    $result3 = mysqli_query($connect, $query3);
    $row = mysqli_fetch_assoc($result3);
    $id = $row['courseID'];

    $temporary = basename($_FILES['file']['tmp_name']);

    $t = move_uploaded_file($_FILES['file']['tmp_name'], $local_dir."/".$temporary);
    if($t)
    {
        header("Location:../course.php?course=$_GET[course]");
    }

    $upload = ftp_put($ftp_connection, $destination_dir ."/". $id . "/".$_FILES['file']['name'], $local_dir."/".$temporary, FTP_BINARY);

    if (!$upload) 
    {
        header("Location:../course.php?course=$_GET[course]");
        
    } 
    else 
    {
        
        header("Location:../course.php?course=$id");
    }

    ftp_close($ftp_connection);
    
?>