<?php 
        
    $admin ="";
    session_start();
    $_SESSION['admin'] = $admin;
    include "assets/connection.php";

    $query = "SELECT * FROM students WHERE studentID = '$_GET[id]'"; 
    $result = mysqli_query($connect, $query);

    $query2 = "SELECT * FROM registers WHERE studentID ='$_GET[id]'";
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
                        <th>Student ID: </th>
                        <td>$row[studentID]</td>
                    </tr>
                    <tr>
                        <th width=250>Student Name: </th>
                        <td>$row[studentName]</td>
                    </tr>
                    <tr>
                        <th>Student Surname: </th>
                        <td>$row[studentSurname]</td>
                    </tr>
                    <tr>
                        <th>Student Email: </th>
                        <td>$row[studentEmail]</td>
                    </tr>
                    <tr>
                    <th>Student Password: </th>
                        <td>$row[studentPassword]</td>
                    </tr><tr><th>Enrolled Courses: </th><td>";
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
                            <td colspan=2><a class='w3-btn w3-blue' href='enrollStudent.php?id=$row[studentID]'>Enroll to Course</a> <a href='editStudent.php?id=$row[studentID]' class='w3-btn w3-blue'>Edit Student</a></td>
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