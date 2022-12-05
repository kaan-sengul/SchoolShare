<?php 
        
    session_start();
    $admin="";
    include 'connection.php';
    $admin = $_SESSION['admin'];

    $query2 = "SELECT * FROM announcements WHERE announcementID = $_GET[id]";
    $result2 = mysqli_query($connect, $query2);
    $row2 = mysqli_fetch_assoc($result2);
   
    $query3 = "DELETE FROM announcements WHERE announcementID = $_GET[id]" ;
    $result3 = mysqli_query($connect, $query3);
    if($result3)
    {
        header("Location:../announcementList.php");
    }
    else{

        echo "error";
        
    }
?>
