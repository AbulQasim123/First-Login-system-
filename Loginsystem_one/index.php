<?php 
     session_start();
     if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true) {
         header('Location: login.php');
         exit;
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']; ?></title>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
</head>

<body>
    <?php  
        require '_navbar.php';
    ?>
    <?php echo "<h4>Welcome ".$_SESSION['username']."<h4>"; ?>
    
    <script type="text/javascript" src="bootstrap-4.0.0-dist\js\myjquery.js"></script>
    <script type="text/javascript" src="bootstrap-4.0.0-dist\js\mypopper.js"></script>
    <script type="text/javascript" src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
</body>

</html>