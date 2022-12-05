<?php 
        
    session_start();
    $admin="";
    include 'connection.php';
    include 'ftp_connection.php';
    $admin = $_SESSION['admin'];
   
    $query3 = "DELETE FROM courses WHERE courseID = '$_GET[course]'" ;
    $result3 = mysqli_query($connect, $query3);
    if($result3)
    {
        if(ftp_rmdir($ftp_connection, $_GET['course']))
        {
            header("Location:../courseList.php");
        }
        else{
            echo "errpr";
        }
        
    }
    else{

        echo "error";
        
    }
?>
