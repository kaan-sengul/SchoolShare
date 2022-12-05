<?php 
        
    session_start();
    include 'assets/connection.php';
    $instructorEmail = $_SESSION['instructorEmail'];

    $query = "SELECT * FROM instructors WHERE instructorEmail = '$instructorEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['instructorID'];
    $fullname = $row['instructorFullName'];

    $query2 = "SELECT studentName, studentSurname, studentEmail, students.studentID, registers.courseID FROM students 
               INNER JOIN registers ON students.studentID=registers.studentID AND registers.courseID='$_GET[course]'";
    $result2 = mysqli_query($connect, $query2);
   
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/iHead.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <table border=1  class="table table-striped table-dark" style="margin-left:300px;width:79%;">
        
        <tr align=center>   
            <th  style='font-size:2.5rem;' colspan=6><?php echo $_GET['course']?> Student List</th>
        </tr>
        <tr align='center'>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Student Surname</th>
            <th>Student Email</th>
        </tr>
        <?php

            if($result2)
            {

                while($row = mysqli_fetch_assoc($result2))
                {

                    echo "
                        <tr align='center'>
                            <td>$row[studentID] </td>
                            <td>$row[studentName] </td>
                            <td>$row[studentSurname]</td>
                            <td>$row[studentEmail]</td>
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