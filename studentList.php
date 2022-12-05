<?php
    $admin ="";
    session_start();
    $_SESSION['admin'] = $admin;
    include "assets/connection.php";

    $query = "SELECT * FROM students";
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
                <th  style='font-size:2.5rem;' colspan=6>Students</th>
            </tr>
            <tr align=center>   
                <td align='right' colspan=6><a class="w3-btn w3-blue" href='createStudent.php'>New Student +</a></td>
            </tr>
            <tr align='center'>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Surname</th>
                <th>Student Email</th>
            </tr>
            <?php

                if($result)
                {

                    while($row = mysqli_fetch_assoc($result))
                    {

                        echo "
                            <tr align='center'>
                                <td>$row[studentID] </td>
                                <td>$row[studentName] </td>
                                <td>$row[studentSurname] </td>
                                <td>$row[studentEmail] </td>
                                <td><a class='w3-btn w3-blue' href='studentDetails.php?id=$row[studentID]'>Details</a></td>
                            </tr>
                            ";
                    }
                }

            ?>
        </table>
  </section><!-- End Hero -->
 <?php include "assets/footer.php" ?>

</body>

</html>