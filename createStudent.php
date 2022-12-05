<?php 
    $admin = ""; 
    session_start();
    include 'assets/connection.php';

    $admin = $_SESSION['admin'];

   
    $error1 = "";
    $error2 = "";
    $error3 = "";
    $error4 = "";
    $error5 = "";
        
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
        $studentName = $_POST['studentName'];
        $studentSurname = $_POST['studentSurname'];
        $studentEmail = $_POST['studentEmail'];
        $studentPassword = $_POST['studentPassword'];
        $studentFullName = $_POST['studentFullName'];
            
        if(empty($studentName))
        {
            $error1 = "studentName is required!";
        }
        elseif(empty($studentSurname))
        {
            $error2 = "studentSurname is required!";
        }
        elseif(empty($studentEmail))
        {
            $error3 = "studentEmail is required!";
        }
        elseif(empty($studentPassword))
        {
            $error4 = "studentPassword is required!";
        }
        elseif(empty($studentFullName))
        {
            $error5 = "studentFullName is required!";
        }
        elseif(isset($studentName) && isset($studentSurname) && isset($studentEmail) && isset($studentPassword) && isset($studentFullName))
        {
            $query3 = "INSERT INTO students(studentName, studentSurname, studentEmail, studentPassword, studentFullName, status) 
            VALUES ('$studentName', '$studentSurname', '$studentEmail', '$studentPassword', '$studentFullName', status=1)";
            $result3 = mysqli_query($connect, $query3);  
            header("Location:studentList.php");
        }
    
    }

?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/adminHeader.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">  
    <form method="POST" action="createStudent.php">
        <table class="table table-striped table-dark" style="margin-left:510px;width:50%;">
            <tr align='center'>

            <th colspan=2>New Student</th>

            </tr>
            <tr>
                <td>Student Name: </td>
                <td><input type="text" name="studentName"><?php echo $error1 ?></td>
            </tr>
            <tr>
                <td>Student Surname: </td>
                <td><input type="text" name="studentSurname"><?php echo $error2 ?></td>
            </tr>
            <tr>
                <td>Student Email: </td>
                <td><input type="text" name="studentEmail"><?php echo $error3 ?></td>
            </tr>            
            <tr>
                <td>Student Password: </td>
                <td><input type="text" name="studentPassword"><?php echo $error4 ?></td>
            </tr> 
            <tr>
                <td>Student Full Name: </td>
                <td><input type="text" name="studentFullName"><?php echo $error5 ?></td>
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