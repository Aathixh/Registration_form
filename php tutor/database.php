<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "registration_form";
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
   
