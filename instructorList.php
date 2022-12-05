<?php
    $admin ="";
    session_start();
    $_SESSION['admin'] = $admin;
    include "assets/connection.php";

    $query = "SELECT * FROM instructors";
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
                <th  style='font-size:2.5rem;' colspan=6>Instructors</th>
            </tr>
            <tr align=center>   
                <td align='right' colspan=6><a class="w3-btn w3-blue" href='createInstructor.php'>New Instructor +</a></td>
            </tr>
            <tr align='center'>
                <th>Instructor ID</th>
                <th>Instructor Name</th>
                <th>Instructor Surname</th>
                <th>Instructor Email</th>
            </tr>
            <?php

                if($result)
                {

                    while($row = mysqli_fetch_assoc($result))
                    {

                        echo "
                            <tr align='center'>
                                <td>$row[instructorID] </td>
                                <td>$row[instructorName] </td>
                                <td>$row[instructorSurname] </td>
                                <td>$row[instructorEmail] </td>
                                <td><a class='w3-btn w3-blue' href='instructorDetails.php?id=$row[instructorID]'>Details</a></td>
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