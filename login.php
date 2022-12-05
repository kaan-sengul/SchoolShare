<html>
    <head>
        <?php 
            
            include 'assets/connection.php';
            $error = "";
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {

                $studentEmail = $_POST['studentEmail'];
                $studentPassword = $_POST['studentPassword'];

                $query = "SELECT * FROM students WHERE studentEmail = '$studentEmail' AND studentPassword = '$studentPassword'";
                $result = mysqli_query($connect, $query);

                while($row = mysqli_fetch_assoc($result))
                {

                    if($row{'studentEmail'} = $studentEmail && $row{'studentPassword'} = $studentPassword)
                    {

                        session_start();
                        $_SESSION['studentEmail'] = $studentEmail;
                        header("Location: index.php");

                    }
                    

                }
                $error = "Wrong E-Mail or Password!";

            }
        
        ?>
        <title>Student Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>

    </head>
    <body>
        <div class="wrapper" style="margin:auto">
            <h1 align=center>SchoolShare</h1>
            <h3 align=center>Student Login</h3>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="text" name="studentEmail" class="form-control">
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="studentPassword" class="form-control">
                </div>
                <div align=center class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login"><br>
                    <?php echo $error;?>
                </div>
                <div align=center class="form-group">
                    <a href ="instructorLogin.php">For Instructor Login click here</a>
                </div>
            </form>
        </div>    
    </body>
</html>