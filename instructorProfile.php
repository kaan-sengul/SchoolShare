<?php 
        
    session_start();
    include 'assets/connection.php';

    $instructorEmail = $_SESSION['instructorEmail'];
    $query = "SELECT instructorID, instructorFullName FROM instructors WHERE instructorEmail = '$instructorEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['instructorID'];
    $fullname = $row['instructorFullName'];

    $query2 = "SELECT * FROM instructors WHERE instructorEmail = '$instructorEmail'";
    $result2 = mysqli_query($connect, $query2);

    $img ="";

    $query3 = "SELECT status FROM instructors WHERE instructorEmail = '$instructorEmail'";
    $result3 = mysqli_query($connect, $query3);
    if($result3)
    {
        while($row = mysqli_fetch_assoc($result3))
        {
            if($row['status'] == 0)
            {
                $img = "<img width=250 height=200 src='assets/uploads/instructor" . $id . ".jpg'>";
            }
            elseif($row['status'] == 1)
            {
                $img = "<img width=100 height=300 src='assets/uploads/profileDefault.jpg'>";
            }
        }
    }

   
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/iHead.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <form action='assets/uploadI.php' method="POST" enctype="multipart/form-data">
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
                        <th>Instructor ID: </th>
                        <td>$id</td>
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
                    ";
                }
                
            }

            ?>
            <tr>
                <td colspan=2><input type="file" name="file"><button class='w3-btn w3-blue' type="submit" name="submit">Change Image</button></td>
                <td><a  class='w3-btn w3-blue' href="changeIPassword.php">Change Password</a></td>
            </tr>
        </table>
    </form>
  </section><!-- End Hero -->
 <?php include "assets/footer.php" ?>

</body>

</html>