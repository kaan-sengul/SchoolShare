<?php 
        
    session_start();

    include 'connection.php';
    $studentEmail = $_SESSION['studentEmail'];

    $query = "SELECT * FROM students WHERE studentEmail = '$studentEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['studentID'];
    $fullname = $row['studentFullName'];

    $query2 = "SELECT * FROM announcements WHERE announcementID = $_GET[id]";
    $result2 = mysqli_query($connect, $query2);
    $row2 = mysqli_fetch_assoc($result2);
   
    $query3 = "DELETE FROM announcements WHERE announcementID = $_GET[id]" ;
    
    $ms = "";
    if($row2['announcementOwner'] == $fullname)
    {
        $ms = "Succesfully deleted!";
        $result3 = mysqli_query($connect, $query3);
        header("Location:../studentAnnouncements.php?ms=$ms");
    }
    else{
        $ms = "You cannot delete this announcement";
        header("Location:../studentAnnouncements.php?ms=$ms");
        
    }
?>
