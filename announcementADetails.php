<?php 
        
    $admin = "";  
    session_start();
    include 'assets/connection.php';
    $admin = $_SESSION['admin'];

    $query2 = "SELECT * FROM announcements WHERE announcementID = '$_GET[id]'";
    $result2 = mysqli_query($connect, $query2);
   
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/adminHeader.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <table border=1  class="table table-striped table-dark" style="margin-left:300px;width:79%;">

        <tr align=center>   
            <th  style='font-size:2.5rem;' colspan=5>Announcements</th>
        </tr>
        <?php

            if($result2)
            {

                while($row = mysqli_fetch_assoc($result2))
                {

                    echo "
                        <tr>
                            <th>Date: </th>
                            <td>$row[announcementDate]</td>
                        </tr>
                        <tr>
                        <th>Course: </th>
                            <td>$row[announcementCourse]</td>
                        </tr>
                        <tr>
                            <th>Subject: </th>
                            <td >$row[announcementSubject]</td>
                        </tr>
                        <tr>
                            <th>Message: </th>
                            <td>$row[announcementMessage]</td>
                        </tr>
                        <tr>
                            <td colspan=2 align=right>$row[announcementOwner]</td>
                        </tr>
                        <tr align=center>
                            <th colspan=2><a href='assets/deletea.php?id=$row[announcementID]'>Delete Announncement</a></th>
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