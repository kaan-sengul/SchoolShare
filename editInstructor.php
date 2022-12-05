<?php
    $admin ="";
    session_start();
    $_SESSION['admin'] = $admin;
    include "assets/connection.php";
    $query = "SELECT * FROM instructors WHERE instructorID = '$_GET[id]'";
    $result = mysqli_query($connect, $query);


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

        $instructorID = $_POST['instructorID'];
        $instructorName = $_POST['instructorName'];
        $instructorSurname = $_POST['instructorSurname'];
        $instructorEmail = $_POST['instructorEmail'];
        $instructorPassword = $_POST['instructorPassword'];
        $instructorFullName = $_POST['instructorFullName'];

        $query3 = "UPDATE instructors SET instructorID = '$instructorID', instructorName='$instructorName', instructorSurname = '$instructorSurname', instructorEmail = '$instructorEmail', instructorPassword='$instructorPassword', instructorFullName ='$instructorFullName', status = 0 WHERE instructorID='$_GET[id]'";
        $result3 = mysqli_query($connect, $query3);

        if($result3)
        {
            header("Location:instructorDetails.php?id=$instructorID");
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
                echo "<form method='POST' action='editInstructor.php?id=$row[instructorID]'>
                            <table border=1 class='table table-striped table-dark' style='margin-left:300px;width:79%;'>
                                <tr align=center>
                                    <th colspan=2>Edit Instructor</th>
                                </tr>
                                <tr>
                                    <th>Instructor ID: </th>
                                    <td><input type=text name=instructorID value='$row[instructorID]'></td>
                                </tr>
                                <tr>
                                    <th>Instructor Name: </th>
                                    <td><input type=text name=instructorName value='$row[instructorName]'></td>
                                </tr>
                                <tr>
                                    <th>Instructor Surname: </th>
                                    <td><input type=text name=instructorSurname value='$row[instructorSurname]'></td>
                                </tr>
                                <tr>
                                    <th>Instructor Email: </th>
                                    <td><input type=text name=instructorEmail value='$row[instructorEmail]'></td>
                                </tr>
                                <tr>
                                    <th>Instructor Password: </th>
                                    <td><input type=text name=instructorPassword value='$row[instructorPassword]'></td>
                                </tr>
                                <tr>
                                    <th>Instructor FullName: </th>
                                    <td><input type=text name=instructorFullName value='$row[instructorFullName]'></td>
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