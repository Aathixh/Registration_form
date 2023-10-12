<?php
    include("database.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    <form action= "<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"  method="post">
    <div class="container">
    <div class="mb-3">
      <label for="formGroupExampleInput" class="form-label">Username:</label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Username"
      name="username">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput2" class="form-label">Password:</label>
      <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter password"
      name="pass">
    </div>
        <input class="btn btn-outline-success" type="submit" name="login" value="Register">
        
    </div>
    </form>

</body>
</html>


<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username)){
            echo "Username not entered!";
        }elseif($password){
            echo "Password is Missing!";
        }else{
            $hash = password_hash($password,PASSWORD_BCRYPT);
            $sql = "INSERT INTO users(user,password)
                    VALUES('$username','$hash')";

            if (mysqli_query($conn, $sql)) {
                echo "Registration Successful!";
            } else {
                echo "Username is already taken";
            }
        }
    }

    mysqli_close($conn);
?>