<?php 
    $admin ="";
    session_start();
    include 'connection.php';
    $admin = $_SESSION['admin'];

    $query = "SELECT * FROM registers WHERE courseID = '$_GET[course]'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
   
    $query3 = "DELETE FROM registers WHERE courseID = '$_GET[course]' AND studentID = '$_GET[id]'";
    $result3 = mysqli_query($connect, $query3);
    if($result3)
    {
        header("Location:../editStudent.php?id=$_GET[id]");

    }
?>
