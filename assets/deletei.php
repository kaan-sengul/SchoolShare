<?php 
        
    session_start();
    include 'connection.php';
    $instructorEmail = $_SESSION['instructorEmail'];

    $query = "SELECT * FROM instructors WHERE instructorEmail = '$instructorEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['instructorID'];
    $fullname = $row['instructorFullName'];

    $query2 = "SELECT * FROM announcements WHERE announcementID = $_GET[id]";
    $result2 = mysqli_query($connect, $query2);
   
    $query3 = "DELETE FROM announcements WHERE announcementID = $_GET[id]";
    $result3 = mysqli_query($connect, $query3);
    $ms = "";
    if($result3)
    {
        $ms = "Succesfully deleted!";
        header("Location:../instructorAnnouncement.php?ms=$ms");

    }
?>
