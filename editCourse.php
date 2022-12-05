<?php
    $admin ="";
    session_start();
    $_SESSION['admin'] = $admin;
    include "assets/connection.php";
    $query = "SELECT * FROM courses WHERE courseID = '$_GET[course]'";
    $result = mysqli_query($connect, $query);

    $query2 = "SELECT * FROM instructors";
    $result2 = mysqli_query($connect, $query2);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

        $courseID = $_POST['courseID'];
        $courseName = $_POST['courseName'];
        $courseDescription = $_POST['courseDescription'];
        $courseInstructor = $_POST['courseInstructor'];

        $query3 = "UPDATE courses SET courseID = '$courseID', courseName='$courseName', courseDescription='$courseDescription', 
                                                    courseInstructor='$courseInstructor' WHERE courseID='$_GET[course]'";
        $result3 = mysqli_query($connect, $query3);

        if($result3)
        {
            header("Location:courseDetails.php?course=$courseID");
        }
        else{
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
                echo "<form method='POST' action='editCourse.php?course=$row[courseID]'>
                            <table border=1  class='table table-striped table-dark' style='margin-left:300px;width:79%;'>
                                <tr align=center>
                                    <th colspan=2>Edit Course</th>
                                </tr>
                                <tr>
                                    <th>Course ID: </th>
                                    <td><input type=text name=courseID value='$row[courseID]'></td>
                                </tr>
                                <tr>
                                    <th>Course Name: </th>
                                    <td><input type=text name=courseName value='$row[courseName]'></td>
                                </tr>
                                <tr>
                                    <th>Course Description: </th>
                                    <td><textarea rows=4 cols=50 name=courseDescription>$row[courseDescription]</textarea></td>
                                </tr>
                                <tr>
                                    <th>Course Instructor: </th>
                                    <td><select name=courseInstructor>";
                                    if($result2)
                                    {
                                        while($row2 = mysqli_fetch_assoc($result2))
                                        {
                                            echo "<option value='$row2[instructorFullName]'>$row2[instructorFullName]</option>";
                                        }
                                    }
                                    echo "</select>
                                    </td>
                                </tr>
                                <tr align=center>
                                    <td colspan=2><input class='w3-btn w3-blue' type=submit value='Save Changes'></td>
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