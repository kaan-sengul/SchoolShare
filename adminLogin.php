<html>
    <head>
        <?php 
            
            $error = "";
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {

                $admin = $_POST['admin'];
                $password = $_POST['password'];

                if($admin == "admin" && $password == "admin")
                {

                    session_start();
                    $_SESSION['admin'] = $admin;
                    header("Location: adminIndex.php");

                }
                else
                {
                    $error = "Wrong E-Mail or Password!";
                }
            }
        
        ?>
        <title>Admin Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>

    </head>
    <body>
        <div class="wrapper" style="margin:auto">
            <h1 align=center>SchoolShare</h1>
            <h3 align=center>Admin Login</h3>
            <form action="adminLogin.php" method="POST">
                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="text" name="admin" class="form-control">
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div align=center class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login"><br>
                    <?php echo $error;?>
                </div>
            </form>
        </div>    
    </body>
</html>