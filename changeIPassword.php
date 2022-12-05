<?php 
        
    session_start();
    include 'assets/connection.php';
    $instructorEmail = $_SESSION['instructorEmail'];

    $query = "SELECT * FROM instructors WHERE instructorEmail = '$instructorEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['instructorID'];
    $fullname = $row['instructorFullName'];
   
    $old = "";
    $confirm = "";
    $new = "";
    $error="";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $old = $_POST['old'];
        $confirm = $_POST['confirm'];
        $new = $_POST['new'];

        if($old == $confirm)
        {
            $query2 = "UPDATE instructors SET instructorPassword = $new";
            $result2 = mysqli_query($connect, $query2);
            header("Location:instructorProfile.php");
        }
        else
        {
            $error = "Passwords doesn't match! Try Again!";
        }

    

    }
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/iHead.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">  
    <form method="POST" action="changeIPassword.php">
        <table class="table table-striped table-dark" style="margin-left:510px;width:50%;">
            <tr align='center'>

                <th colspan=2>Change Password</th>

            </tr>
            <tr>
                <td>Old Password: </td>
                <td><input type='password' name='old'></td>
            </tr>
            <tr>
                <td>Confirm Old Password: </td>
                <td><input type='password' name='confirm'></td>
            </tr>
            <tr>
                <td>New Password: </td>
                <td><input type='password' name='new'></td>
            </tr>
            <tr align=center>
                <td colspan=2><input class='w3-btn w3-blue' type=submit value='Confirm Change'><br><?php echo $error; ?></td>
            </tr>
        
        </table>
    </form>
  </section><!-- End Hero -->
 <?php include "assets/footer.php" ?>

</body>

</html>