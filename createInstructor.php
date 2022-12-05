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
    
        $instructorName = $_POST['instructorName'];
        $instructorSurname = $_POST['instructorSurname'];
        $instructorEmail = $_POST['instructorEmail'];
        $instructorPassword = $_POST['instructorPassword'];
        $instructorFullName = $_POST['instructorFullName'];
            
        if(empty($instructorName))
        {
            $error1 = "instructorName is required!";
        }
        elseif(empty($instructorSurname))
        {
            $error2 = "instructorSurname is required!";
        }
        elseif(empty($instructorEmail))
        {
            $error3 = "instructorEmail is required!";
        }
        elseif(empty($instructorPassword))
        {
            $error4 = "instructorPassword is required!";
        }
        elseif(empty($instructorFullName))
        {
            $error5 = "instructorFullName is required!";
        }
        elseif(isset($instructorName) && isset($instructorSurname) && isset($instructorEmail) && isset($instructorPassword) && isset($instructorFullName))
        {
            $query3 = "INSERT INTO instructors(instructorName, instructorSurname, instructorEmail, instructorPassword, instructorFullName, status) 
            VALUES ('$instructorName', '$instructorSurname', '$instructorEmail', '$instructorPassword', '$instructorFullName', status=1)";
            $result3 = mysqli_query($connect, $query3);  
            header("Location:instructorList.php");
        }
    
    }

?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/adminHeader.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">  
    <form method="POST" action="createInstructor.php">
        <table class="table table-striped table-dark" style="margin-left:510px;width:50%;">
            <tr align='center'>

            <th colspan=2>New Instructor</th>

            </tr>
            <tr>
                <td>Instructor Name: </td>
                <td><input type="text" name="instructorName"><?php echo $error1 ?></td>
            </tr>
            <tr>
                <td>Instructor Surname: </td>
                <td><input type="text" name="instructorSurname"><?php echo $error2 ?></td>
            </tr>
            <tr>
                <td>Instructor Email: </td>
                <td><input type="text" name="instructorEmail"><?php echo $error3 ?></td>
            </tr>            
            <tr>
                <td>Instructor Password: </td>
                <td><input type="text" name="instructorPassword"><?php echo $error4 ?></td>
            </tr> 
            <tr>
                <td>Instructor Full Name: </td>
                <td><input type="text" name="instructorFullName"><?php echo $error5 ?></td>
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