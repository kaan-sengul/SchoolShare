<?php 
        
    $admin ="";
    session_start();
    $_SESSION['admin'] = $admin;
    include "assets/connection.php";

    $query = "SELECT * FROM instructors WHERE instructorID = '$_GET[id]'"; 
    $result = mysqli_query($connect, $query);

    $query4 = "SELECT * FROM instructors WHERE instructorID = '$_GET[id]'"; 
    $result4 = mysqli_query($connect, $query4);
    $row4 = mysqli_fetch_assoc($result4);
    $courseInstructor = $row4['instructorFullName'];

    $query2 = "SELECT * FROM courses WHERE courseInstructor ='$courseInstructor'";
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
                <th style='font-size:1.5em' colspan=3>Profile</th>
            </tr>
            <?php
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "
                    <tr>
                        <th>Instructor ID: </th>
                        <td>$row[instructorID]</td>
                    </tr>
                    <tr>
                        <th width=250>Instructor Name: </th>
                        <td>$row[instructorName]</td>
                    </tr>
                    <tr>
                        <th>Instructor Surname: </th>
                        <td>$row[instructorSurname]</td>
                    </tr>
                    <tr>
                        <th>Instructor Email: </th>
                        <td>$row[instructorEmail]</td>
                    </tr>
                    <tr>
                    <th>Instructor Password: </th>
                        <td>$row[instructorPassword]</td>
                    </tr><tr><th>Courses: </th><td>";
                    if($result2)
                    {   
                        while($row2=mysqli_fetch_assoc($result2))
                        {
                            echo "
                                <li>$row2[courseID]</li>
                            ";
                        }
                    }
                    echo "</td>
                    </tr>
                    <tr align=center>
                        <td colspan=2><a href='editInstructor.php?id=$row[instructorID]' class='w3-btn w3-blue'>Edit Instructor</a></td>
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