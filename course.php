<?php 
        
    session_start();
    include 'assets/connection.php';
    include 'assets/ftp_connection.php';
    $studentEmail = $_SESSION['studentEmail'];

    $query = "SELECT * FROM students WHERE studentEmail = '$studentEmail'"; 
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['studentID'];
    $fullname = $row['studentFullName'];

    $query2 = "SELECT courseName FROM registers WHERE studentID ='$id' ";
    $result2 = mysqli_query($connect, $query2);

    $query3 = "SELECT * FROM courses WHERE courseID = '$_GET[course]'";
    $result3 = mysqli_query($connect, $query3);

    $file ="";
    $filerror="";
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

      $file = $_POST['file'];

      if(empty($file))
      {
        $filerror = "Select document!";
      }

    }
   
?>
<html lang="en">

<?php include 'assets/head.php' ?>

<body>

<?php include 'assets/header.php' ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <table border=1  class="table table-striped table-dark" style="margin-left:300px;width:79%;">
      <?php

        if($result3)
        {

            while($row = mysqli_fetch_assoc($result3))
            {

                echo "<tr align=center>   
                        <th  style='font-size:2.5rem;' colspan=3>$row[courseID]</th>
                      </tr>
                      <tr>   
                        <th style='width:200px;'>Course Name: </th>
                        <td colspan=2 >$row[courseName]</td>
                      </tr>
                      <tr>   
                        <th>Course Description: </th>
                        <td colspan=2>$row[courseDescription]</td>
                      </tr>
                      <tr>   
                        <th>Course Instructor: </th>
                        <td colspan=2>$row[courseInstructor]</td>
                      </tr>
                      </table><table border=1 class='table table-striped table-dark' style='color:white;margin-left:300px;width:79%;'>
                      <th  style='font-size:1.5rem;' colspan=3>Uploaded Files</th>

            
    " ;
    
    $file_list = ftp_nlist($ftp_connection, "$row[courseID]"); 
    $i=0;
    foreach($file_list as $key=>$dat) { 
      if($i % 3 == 0)
      {
        echo "<tr align='justify'><td align='center'  ><a href = 'assets/download.php?file=".$dat."'><img width='50' height='50' src='assets/img/file.png'><br>$dat</a></td>"; 
      }
      else
      {
        echo "<td  align='center'  ><a href = 'assets/download.php?file=".$dat."'><img width='50' height='50' src='assets/img/file.png'><br>$dat</a><br></td>"; 
      }
      $i++;
    } 
   
    echo "</tr><tr><td colspan=3>
    <form enctype='multipart/form-data' method='post' action='assets/ftp.php?course=$row[courseID]'>
      <div class='input-group' >
        
        <input type='file' name='file' style='width:80%'  class='input-group-text' >
        <input type='submit' value='Upload' class='input-group-text' for='inputGroupFile01'>$filerror

      </div>
    </form></td></tr></table>"
    
    ;
    }

  }

?>
  </section><!-- End Hero -->


  <!-- ======= Footer ======= -->


  <?php include "assets/footer.php" ?>

</body>

</html>