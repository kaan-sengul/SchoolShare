<?php 
        
    session_start();
    include 'assets/connection.php';
    include 'assets/ftp_connection.php';
    $instructorEmail = $_SESSION['instructorEmail'];

    $query = "SELECT * FROM instructors WHERE instructorEmail = '$instructorEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['instructorID'];
    $fullname = $row['instructorFullName'];

    $query2 = "SELECT * FROM announcements";
    $result2 = mysqli_query($connect, $query2);
    if (isset($_GET['ms'])) {
        print '<script type="text/javascript">alert("' . $_GET['ms'] . '");</script>';
    }
   
   
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/iHead.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <table border=1  class="table table-striped table-dark" style="margin-left:300px;width:79%;">
        
        <tr align=center>   
            <th  style='font-size:2.5rem;' colspan=6>Announcements</th>
        </tr>
        <tr align=center>   
            <td  align='right' colspan=6><a class="w3-btn w3-blue" href='instructorAnnouncementMake.php'>Make Announcement +</a></td>
        </tr>
        <tr align='center'>
            <th>No</th>
            <th>Course</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Owner</th>
        </tr>
        <?php

            if($result2)
            {

                while($row = mysqli_fetch_assoc($result2))
                {

                    echo "
                        <tr align='center'>
                            <td>$row[announcementID] </th>
                            <td>$row[announcementCourse] </th>
                            <td>$row[announcementSubject]</td>
                            <td>$row[announcementDate]</td>
                            <td>$row[announcementOwner]</td>
                            <td><a class='w3-btn w3-blue' href='announcementDetails.php?id=$row[announcementID]'>Details...</a></td>
                        </tr>
                        ";
                }
            }

        ?>
    </table>
  </section><!-- End Hero -->


  <!-- ======= Footer ======= -->


  <?php include "assets/footer.php" ?>

</body>

</html>