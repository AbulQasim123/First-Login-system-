<?php 
    $login= false;
    $showerror= false;
    $require_field= false;
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        require '_dbconnect.php';
        $username= $_POST['username'];
        $password= $_POST['password'];
        if (!empty($username and $password)) {
            $query= " SELECT * FROM `student_signup` WHERE `User_name`= '$username' AND  `Pass_word`='$password' ";
            $result= mysql_query($query,$conn);
            $num= mysql_num_rows($result);
            if ($num == 1) {
                $login = true;
                session_start();
                $_SESSION['loggedin']= true;
                $_SESSION['username']= $username;
                header('Location: index.php');
            }else{
                $showerror="Invalid credential. please try again later";
            }
        }else{
            $require_field= "Please out of these field";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
</head>

<body>
    <?php 
        require '_navbar.php';
    ?>
    <?php 
        if ($login) {
            echo "<div class='alert alert-success alert-dismiss show'>
                    <b>Success ! </b> You are logedin successfully.
                    <button class='close' data-dismiss='alert'>
                        <span>&times;</span>
                    </button>
            </div>";
        } 
        if ($showerror) {
            echo "<div class='alert alert-danger alert-dismiss show'>
                    <b>Error ! </b> ". $showerror ."
                    <button class='close' data-dismiss='alert'>
                        <span>&times;</span>
                    </button>
            </div>";
        }
        if ($require_field) {
            echo "<div class='alert alert-danger alert-dismiss show'>
                    <b>Error ! </b> ". $require_field ."
                    <button class='close' data-dismiss='alert'>
                        <span>&times;</span>
                    </button>
            </div>";
        }
    ?>
    <div class="container my-4">
        <h2 class="">Login to our Website.</h2>
        <div class="row">
            <div class="col-lg-4">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="bootstrap-4.0.0-dist\js\myjquery.js"></script>
    <script type="text/javascript" src="bootstrap-4.0.0-dist\js\mypopper.js"></script>
    <script type="text/javascript" src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
</body>

</html>