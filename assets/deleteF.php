<?php
    session_start();
    include "connection.php";
    include "ftp_connection.php";
    $admin ="";
    $admin = $_SESSION['admin'];

    $query = "SELECT * FROM courses WHERE courseID ='$_GET[course]'";
    $result = mysqli_query($connect, $query);

    if($result)
    {
        while($row = mysqli_fetch_assoc($result)){

            if(ftp_delete($ftp_connection, $_GET['file']))
            {
                header("Location:../courseDetails.php?course=$row[courseID]" );
            }
            else{
                echo "Error";
            } 
            ftp_close($ftp_connection);
        }
    }
   
?>