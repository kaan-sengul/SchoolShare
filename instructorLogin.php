<html>
    <head>
        <?php 
            
            include 'assets/connection.php';
            $error = "";
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {

                $instructorEmail = $_POST['instructorEmail'];
                $instructorPassword = $_POST['instructorPassword'];

                $query = "SELECT * FROM instructors WHERE instructorEmail = '$instructorEmail' AND instructorPassword = '$instructorPassword'";
                $result = mysqli_query($connect, $query);

                while($row = mysqli_fetch_assoc($result))
                {

                    if($row{'instructorEmail'} = $instructorEmail && $row{'instructorPassword'} = $instructorPassword)
                    {

                        session_start();
                        $_SESSION['instructorEmail'] = $instructorEmail;
                        header("Location: instructorIndex.php");

                    }
                    

                }
                $error = "Wrong E-Mail or Password!";

            }
        
        ?>
        <title>Instructor Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>

    </head>
    <body>
        <div class="wrapper" style="margin:auto">
            <h1 align=center>SchoolShare</h1>
            <h3 align=center>Instructor Login</h3>
            <form action="instructorLogin.php" method="POST">
                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="text" name="instructorEmail" class="form-control">
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="instructorPassword" class="form-control">
                </div>
                <div align=center class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login"><br>
                    <?php echo $error;?>
                </div>
            </form>
        </div>    
    </body>
</html>