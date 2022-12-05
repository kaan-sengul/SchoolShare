<?php
    session_start();
    include "connection.php";
    include "ftp_connection.php";

    $instructorEmail = $_SESSION['instructorEmail'];
    $query = "SELECT * FROM instructors WHERE instructorEmail = '$instructorEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['instructorFullName'];

    $query2 = "SELECT * FROM courses WHERE courseInstructor ='$fullname' AND courseID= '$_GET[course]' ";
    $result2 = mysqli_query($connect, $query2);

    if($result2)
    {
        while($row = mysqli_fetch_assoc($result2)){

            if(ftp_delete($ftp_connection, $_GET['file']))
            {
                header("Location:../instructorCourse.php?course=$row[courseID]" );
            }
            else{
                echo "Error";
            } 
            ftp_close($ftp_connection);
        }
    }
   
?>