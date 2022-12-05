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
   
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/iHead.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <table id="table">

        <?php
          $i=0;
          if($result2)
          {
            while($row = mysqli_fetch_assoc($result2))
            {
              if($i % 3 == 0)
              {
                print "<tr><td id='coursebox'><a href='instructorCourse.php?course=$row[courseID]'><h4>$row[courseID]</h4><br>$row[courseName]</a></td>";
              }
              else
              {
                print "<td id='coursebox'><a href='instructorCourse.php?course=$row[courseID]'><h4>$row[courseID]</h4><br>$row[courseName]</a></td>";
              }
              $i++;
            }
          }

        ?>
      </tr>
    </table>
  </section><!-- End Hero -->
 <?php include "assets/footer.php" ?>

</body>

</html>