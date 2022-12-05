<?php 
    $admin ="";
    session_start();
    include 'assets/connection.php';
    $admin = $_SESSION['admin'];

    $query = "SELECT * FROM students WHERE studentID = '$_GET[id]'"; 
    $result = mysqli_query($connect, $query);

    $query2 = "SELECT * FROM courses";
    $result2 = mysqli_query($connect, $query2);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $courseID = $_POST['courseID'];
        $query4 = "SELECT * FROM courses WHERE courseID = '$courseID'";
        $result4 = mysqli_query($connect, $query4);
        $row4 = mysqli_fetch_assoc($result4);
        $courseName = $row4['courseName'];

        $query3 = "INSERT INTO registers(studentID, courseID, courseName) VALUES ('$_GET[id]', '$courseID', '$courseName')";
        $result3 = mysqli_query($connect, $query3);

        if($result3)
        {
            header("Location:studentDetails.php?id=$_GET[id]");
        }
        else
        {
            echo "error";
        }

    }
    
   
?>
<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/adminHeader.php' ?>
 <section id="hero">
    <?php
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<form method='POST' action='enrollStudent.php?id=$row[studentID]'>
                            <table border=1  class='table table-striped table-dark' style='margin-left:300px;width:79%;'>
                                <tr align=center>
                                    <th colspan=2>Enroll Student</th>
                                </tr>
                                <tr>
                                    <th>Course: </th>
                                    <td><select name=courseID>";

                                    if($result2)
                                    {
                                        while($row2 = mysqli_fetch_assoc($result2))
                                        {
                                            echo "<option value='$row2[courseID]'>$row2[courseID]</option>";
                                        }
                                    }
                                    
                                    echo "</select></td>
                                </tr>
                                <tr align=center>
                                    <td colspan=2><input class='w3-btn w3-blue' type=submit value='Enroll'></td>
                                </tr>
                            </table>
                        </form>";
            }

        }
    ?>
  </section><!-- End Hero -->


  <!-- ======= Footer ======= -->


  <?php include "assets/footer.php" ?>

</body>

</html>
