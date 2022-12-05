<?php 
    $admin = ""; 
    session_start();
    include 'assets/connection.php';
    include 'assets/ftp_connection.php';
    $admin = $_SESSION['admin'];

    $query2 = "SELECT * FROM instructors";
    $result2 = mysqli_query($connect, $query2);
   
    $serror = "";
    $merror = "";
    $derror = "";
        
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
        $courseID = $_POST['courseID'];
        $courseName = $_POST['courseName'];
        $courseDescription = $_POST['courseDescription'];
        $courseInstructor = $_POST['courseInstructor'];
            
        if(empty($courseID))
        {
            $serror = "CourseID is required!";
        }
        elseif(empty($courseName))
        {
            $merror = "CourseName is required!";
        }
        elseif(empty($courseDescription))
        {
            $derror = "CourseDescription is required!";
        }
        elseif(isset($courseID) && isset($courseName) && isset($courseDescription) && isset($courseInstructor))
        {
            $query3 = "INSERT INTO courses(courseID, courseName, courseDescription, courseInstructor) 
                        VALUES ('$courseID', '$courseName', '$courseDescription', '$courseInstructor')";
            $result3 = mysqli_query($connect, $query3);  
            $dir = $courseID;
            if(ftp_mkdir($ftp_connection, $dir))
            {
                header("Location:courseList.php");
            }
            else
            {
                echo "error";
            }
            ftp_close($ftp_connection);
        }

    
    }

?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/adminHeader.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">  
    <form method="POST" action="createCourse.php">
        <table class="table table-striped table-dark" style="margin-left:510px;width:50%;">
            <tr align='center'>

            <th colspan=2>New Course</th>

            </tr>
            <tr>
                <td>Course ID: </td>
                <td><input type="text" name="courseID"><?php echo $serror ?></td>
            </tr>
            <tr>
                <td>Course Name: </td>
                <td><input type="text" name="courseName"><?php echo $serror ?></td>
            </tr>
            <tr>
                <td>Course Description: </td>
                <td><textarea rows="4" cols="50" name="courseDescription"></textarea><br><?php echo $merror ?></td>
            </tr>            
            <tr>
                <td>Instructor: </td>
                <td><select name='courseInstructor'>
                <?php   
                    if($result2)
                    {
                        while($row = mysqli_fetch_assoc($result2))
                        {
                            echo "<option value='$row[instructorFullName]'>$row[instructorFullName]</option>";
                        }
                    }
                ?>
                </select></td>
            </tr>   
            <tr align=center>
                <td colspan=2><input type="submit" value="Submit"> <input type="reset" value="Reset"></td>
            </tr>        
        </table>
    </form>
  </section><!-- End Hero -->
 <?php include "assets/footer.php" ?>

</body>

</html>