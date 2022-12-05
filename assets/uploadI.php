<?php
    session_start();
    include "connection.php";
    $instructorEmail = $_SESSION['instructorEmail'];
    $query = "SELECT instructorID FROM instructors WHERE instructorEmail = '$instructorEmail'"; 
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if(isset($_POST['submit']))
            {
                
                $file = $_FILES['file'];

                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array('jpg');

                if(in_array($fileActualExt, $allowed))
                {
                    if($fileError === 0)
                    {
                        if($fileSize < 1000000)
                        {
                            $fileNameNew = "instructor". $row['instructorID'] . "." . $fileActualExt;
                            $fileDestination = "uploads/". $fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            $query2 = "UPDATE instructors SET status=0 WHERE instructorID = '$row[instructorID]'";
                            $result2 =mysqli_fetch_assoc($connect, $result2);
                            header("Location:../instructorProfile.php?upload");
                        }
                        else
                        {
                            echo "Please upload under 500mb";
                        }
                    }
                    else
                    {
                        echo "There was an error while uploading!";
                    }
                }
                else
                {
                    echo "File type doesn't support.(Please upload jpg)";
                }

            }
    }
}

?>