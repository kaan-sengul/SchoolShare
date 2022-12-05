<?php 
    $admin = "";  
    session_start();
    include 'assets/connection.php';
    $admin = $_SESSION['admin'];

    $query = "SELECT * FROM announcements";
    $result = mysqli_query($connect, $query);

   
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/adminHeader.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <table border=1  class="table table-striped table-dark" style="margin-left:300px;width:79%;">
        
        <tr align=center>   
            <th style='font-size:2.5rem;' colspan=6>Announcements</th>
        </tr>
        <tr align=center>   
            <td  align='right' colspan=6><a class="w3-btn w3-blue" href='adminAnnouncementMake.php'>Make Announcement +</a></td>
        </tr>
        <tr align='center'>
            <th>No</th>
            <th>Course</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Owner</th>
        </tr>
        <?php

            if($result)
            {

                while($row = mysqli_fetch_assoc($result))
                {

                    echo "
                        <tr align='center'>
                            <td>$row[announcementID] </td>                           
                            <td>$row[announcementCourse] </td>                           
                            <td>$row[announcementSubject]</td>
                            <td>$row[announcementDate]</td>
                            <td>$row[announcementOwner]</td>
                            <td><a href='announcementADetails.php?id=$row[announcementID]'>Details...</a></td>
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