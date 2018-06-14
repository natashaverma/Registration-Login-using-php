<?php
session_start();

$db = mysqli_connect("localhost","root","","mydatabase");

if(isset($_POST['login_btn'])){
   
    
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    $password = md5($password);     //hashed password
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db,$sql);
    
    
    if( mysqli_num_rows($result) == 1){         //returns the number of rows in result
        $_SESSION['message'] ="You are now logged in";
        $_SESSION ['username'] =$username;
        header("Location: home.php");
            
    }
    else{
        
        $_SESSION['message'] = "username or password is incorrect";
    }
    
}
?>


<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register and Login</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    
</head>

<body>
    <div class="headerLogin">
    <h1> Login</h1>

    </div>
    
    
    <?php
    if(isset($_SESSION['message'])){
        echo "<div id='error_msg'>".$_SESSION['message']."</div";
        unset($_SESSION['message']);
    }
    ?>
    <form method="post" action="login.php"> 
    <table>
        
       <tr>
       <td>Username:</td> 
        <td><input type="text" name="username" class="textInput"></td>
        </tr>   
           
        
      <tr>
       <td>Password:</td> 
        <td><input type="password" name="password" class="textInput"></td>
        </tr>   
          
        
      <tr>
       <td></td> 
        <td><input type="submit" name="login_btn" value="Login"></td>
        </tr>   
              
        </table>
    
    
    
    </form>
</body>
</html>
