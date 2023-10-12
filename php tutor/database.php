<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "Password1!";
    $db_name = "registration-form";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server,
                               $db_user,
                               $db_pass,
                               $db_name);
        if(!$conn){
            throw new Exception($e);
        }else{
            echo "Connected!";
        }
        
    }
    catch(Exception $e)
    {
        echo "Could not connect! <br> ". $e->getMessage();
    }
?>
   
