<?php 
        
    session_start();
    include 'assets/connection.php';

    $studentEmail = $_SESSION['studentEmail'];

    $query = "SELECT studentID, studentFullName FROM students WHERE studentEmail = '$studentEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['studentID'];
    $fullname = $row['studentFullName'];

    $query2 = "SELECT * FROM students WHERE studentEmail = '$studentEmail'";
    $result2 = mysqli_query($connect, $query2);

    $img ="";

    $query3 = "SELECT status FROM students WHERE studentEmail = '$studentEmail'";
    $result3 = mysqli_query($connect, $query3);
    if($result3)
    {
        while($row = mysqli_fetch_assoc($result3))
        {
            if($row['status'] == 0)
            {
                $img = "<img width=250 height=200 src='assets/uploads/profile" . $id . ".jpg'>";
            }
            else
            {
                $img = "<img width=100 height=300 src='assets/uploads/profileDefault.jpg'>";
            }
        }
    }

   
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/header.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <form action='assets/upload.php' method="POST" enctype="multipart/form-data">
        <table border=1  class="table table-striped table-dark" style="margin-left:300px;width:79%;">
            <tr align=center>
                <th style='font-size:1.5em' colspan=3>Profile</th>
            </tr>
            <?php
            if($result2)
            {
                while($row = mysqli_fetch_assoc($result2))
                {
                    echo "
                    <tr>
                        <td width=250 height=200 rowspan=4>$img</td>
                        <th>Student ID: </th>
                        <td>$id</td>
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
                    ";
                }
                
            }

            ?>
            <tr>
                <td colspan=2><input type="file" name="file"><button class='w3-btn w3-blue' type="submit" name="submit">Change Image</button></td>
                <td><a  class='w3-btn w3-blue' href="changePassword.php">Change Password</a></td>
            </tr>
        </table>
    </form>
  </section><!-- End Hero -->
 <?php include "assets/footer.php" ?>

</body>

</html>