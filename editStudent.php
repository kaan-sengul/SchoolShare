<?php
    $admin ="";
    session_start();
    $_SESSION['admin'] = $admin;
    include "assets/connection.php";
    $query = "SELECT * FROM students WHERE studentID = '$_GET[id]'";
    $result = mysqli_query($connect, $query);

    $query2 = "SELECT * FROM registers WHERE studentID = '$_GET[id]'";
    $result2 = mysqli_query($connect, $query2);

    $query4 = "SELECT * FROM courses";
    $result4 = mysqli_query($connect, $query4);



    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

        $studentID = $_POST['studentID'];
        $studentName = $_POST['studentName'];
        $studentSurname = $_POST['studentSurname'];
        $studentEmail = $_POST['studentEmail'];
        $studentPassword = $_POST['studentPassword'];
        $studentFullName = $_POST['studentFullName'];

        $query3 = "UPDATE students SET studentID = '$studentID', studentName='$studentName', studentSurname = '$studentSurname', studentEmail = '$studentEmail', studentPassword='$studentPassword', studentFullName ='$studentFullName', status = 0 WHERE studentID='$_GET[id]'";
        $result3 = mysqli_query($connect, $query3);

        if($result3)
        {
            header("Location:studentDetails.php?id=$studentID");
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
                echo "<form method='POST' action='editStudent.php?id=$row[studentID]'>
                            <table border=1  class='table table-striped table-dark' style='margin-left:300px;width:79%;'>
                                <tr align=center>
                                    <th colspan=2>Edit Student</th>
                                </tr>
                                <tr>
                                    <th>Student ID: </th>
                                    <td><input type=text name=studentID value='$row[studentID]'></td>
                                </tr>
                                <tr>
                                    <th>Student Name: </th>
                                    <td><input type=text name=studentName value='$row[studentName]'></td>
                                </tr>
                                <tr>
                                    <th>Student Surname: </th>
                                    <td><input type=text name=studentSurname value='$row[studentSurname]'></td>
                                </tr>
                                <tr>
                                    <th>Student Email: </th>
                                    <td><input type=text name=studentEmail value='$row[studentEmail]'></td>
                                </tr>
                                <tr>
                                    <th>Student Password: </th>
                                    <td><input type=text name=studentPassword value='$row[studentPassword]'></td>
                                </tr>
                                <tr>
                                    <th>Student FullName: </th>
                                    <td><input type=text name=studentFullName value='$row[studentFullName]'></td>
                                </tr>
                                <tr>
                                    <th>Enrolled Courses: </th>
                                    <td>";
                                    if($result2)
                                    {
                                        while($row2 = mysqli_fetch_assoc($result2))
                                        {
                                            echo "<li>$row2[courseID] <a class='w3-btn' href='assets/removeCourse.php?course=$row2[courseID]&id=$row[studentID]'>Remove Course</a></li>";
                                        }
                                    }
                                    
                                    echo "</td>
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