<?php 
    $server_name= 'localhost';
    $user_name= 'root';
    $pass_word= '';
    $database_name= 'codewith_haryy';
    $conn= mysql_connect($server_name, $user_name, $pass_word);
    mysql_select_db($database_name);
    
    if (!$conn) {
        die('Error' . mysql_error());
    }
    // else{
    //     echo 'Connection was successful';
    // }
?>