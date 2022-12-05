<?php
    $admin ="";
    session_start();
    $_SESSION['admin'] = $admin;

?>  
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/adminHeader.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <table id="table">

        <tr>
            <td id='coursebox'><a href='courseList.php'><h4>Courses</h4><br></a></td>
            <td id='coursebox'><a href='studentList.php'><h4>Students</h4><br></a></td>
            <td id='coursebox'><a href='instructorList.php'><h4>Instructors</h4><br></a></td>
        </tr>
        <tr>
            <td id='coursebox'><a href='announcementList.php'><h4>Announcements</h4><br></a></td>
        </tr>
    </table>
  </section><!-- End Hero -->
 <?php include "assets/footer.php" ?>

</body>

</html>