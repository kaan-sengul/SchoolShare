<?php 
        
    session_start();
    include 'assets/connection.php';

    $instructorEmail = $_SESSION['instructorEmail'];

    $query = "SELECT * FROM instructors WHERE instructorEmail = '$instructorEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['instructorID'];
    $fullname = $row['instructorFullName'];

    $query2 = "SELECT * FROM courses WHERE courseInstructor ='$fullname' ";
    $result2 = mysqli_query($connect, $query2);
   
    $subject ="";
    $message="";
    $date ="";
    $course ="";
    $serror = "";
    $merror = "";
    $derror = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $date = $_POST['date'];
        $course = $_POST['course'];
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
    
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $date = $_POST['date'];
            $course = $_POST['course'];
            
            if(empty($subject))
            {
                $serror = "Subject is required!";
            }
            elseif(empty($message))
            {
                $merror = "Message is required!";
            }
            elseif(empty($date))
            {
                $derror = "Date is required!";
            }
            elseif(isset($subject) && isset($message) && isset($date) && isset($course))
            {
                $query3 = "INSERT INTO announcements(announcementSubject, announcementMessage, announcementDate, announcementOwner, announcementCourse) VALUES ('$subject', '$message', '$date', '$fullname', '$course')";
                $result3 = mysqli_query($connect, $query3);  
                header("Location:instructorAnnouncement.php");
            }
    
        }

    }
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/iHead.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">  
    <form method="POST" action="instructorAnnouncementMake.php">
        <table class="table table-striped table-dark" style="margin-left:510px;width:50%;">
            <tr align='center'>

            <th colspan=2>Make Announcement</th>

            </tr>
            <tr>
                <td>Course: </td>
                <td><select name='course'>
                    <?php
                        if($result2)
                        {
                            while($row = mysqli_fetch_assoc($result2))
                            {
                                echo "<option value=$row[courseID]>$row[courseID]</option>";
                            }
                        }
                    ?>
                    </select></td>
            </tr>
            <tr>
                <td>Subject: </td>
                <td><input type="text" name="subject"><?php echo $serror ?></td>
            </tr>
            <tr>
                <td>Message: </td>
                <td><textarea rows="4" cols="50" name="message"></textarea><br><?php echo $merror ?></td>
            </tr>            
            <tr>
                <td>Date: </td>
                <td><input type="date" name="date"><?php echo $derror ?></td>
            </tr>   
            <tr align=center>
                <td colspan=2><input type="submit" value="Submit"> <input type="reset" value="Reset"></td>
            </tr>        
        </table>
    </form>
  </section><!-- End Hero -->
 <?php include "assets/footer.php" ?>

</body>

</html>