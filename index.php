<?php 
        
    session_start();
    include 'assets/connection.php';

    $studentEmail = $_SESSION['studentEmail'];

    $query = "SELECT * FROM students WHERE studentEmail = '$studentEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['studentID'];
    $fullname = $row['studentFullName'];


    $query2 = "SELECT courseID, courseName FROM registers WHERE studentID ='$id' ";
    $result2 = mysqli_query($connect, $query2);
   
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/header.php' ?>

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
                print "<tr><td id='coursebox'><a href='course.php?course=$row[courseID]'><h4>$row[courseID]</h4><br>$row[courseName]</a></td>";
              }
              else
              {
                print "<td id='coursebox'><a href='course.php?course=$row[courseID]'><h4>$row[courseID]</h4><br>$row[courseName]</a></td>";
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