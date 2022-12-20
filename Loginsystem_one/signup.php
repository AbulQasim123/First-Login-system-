<?php 
    $showalert= false;
    $showerror= false;
    $require_field= false; 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '_dbconnect.php';
        $username= $_POST['username'];
        $password= $_POST['password'];
        $confirmpassword= $_POST['confirmpassword'];
        $exists= false;
        if (!empty($username and $password and $confirmpassword)) {
            if ($password == $confirmpassword and $exists == false) {
                $query= " INSERT INTO `student_signup` (`User_name`,`Pass_word`,`CNF_password`,`Date_time`) VALUES ('$username','$password','$confirmpassword', current_timestamp()) ";
                $result= mysql_query($query, $conn);
                if ($result) {
                    $showalert= true;
                    // echo "success";
                }else{
                    echo "Error! because of this". mysql_error($conn);
                }
            }else{
                $showerror= "Password do not match.";
                // echo "Password do not match";
            }
        }else{ 
            $require_field= "Please fill out of these field."; 
            // echo "Please fill out of these field";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
</head>

<body>
    <?php 
        require '_navbar.php';
    ?>
    <?php 
        if ($showalert) {
            echo "<div class='alert alert-success alert-dismiss show'>
                    <b>Success ! </b>
                    Your Account is now created. And you can login.
                    <button  class='close' data-dismiss='alert'>
                        <spna>&times;<span>
                    </button>
                  </div>";
        } 
        if ($showerror) {
            
            echo '<div class="alert alert-danger alert-dismiss show">
                    <b>Error ! </b> '. $showerror .'
                    <button  class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                  </div>';
        }
        if ($require_field) {
            echo "<div class='alert alert-danger alert-dismiss show'>
                    <b>Error ! </b> " . $require_field . "
                    <button  class='close' data-dismiss='alert'>
                        <span>&times;</span>
                    </button>
                  </div>";
        }
    ?>
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-6">
                <form action="signup.php" method="POST">
                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-gropup">
                        <label for="password" class="font-weight-bold">Password:</label>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword" class="font-weight-bold">Confirm password:</label>
                        <input type="text" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password">
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