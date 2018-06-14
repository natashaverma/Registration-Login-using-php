<?php
session_start();

$db = mysqli_connect("localhost","root","","mydatabase");       //connect the database

if(isset($_POST['register_btn'])){
    
    
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email =    mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 =mysqli_real_escape_string($db, $_POST['password2']);
    
    if($password == $password2){
        
        $password = md5($password);                             //hashing the password 
        
        
     $sql ="INSERT INTO users (username,email,password) VALUES('$username','$email','$password')";
        
       mysqli_query($db,$sql);    
        
        
        $_SESSION['message']  = "You are logged in"; 
        $_SESSION['username'] = $username;
        
        header("Location: home.php");
    }
    
    else{
        $_SESSION['message'] ="Passwords do not match";
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
    <div class="header">
    <h1>Register</h1>
    
    </div>
    <?php
    
    if(isset($_SESSION['message'])){
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    ?>
    <form method="post" action="register1.php"> 
    <table>
        
       <tr>
       <td>Username:</td> 
        <td><input type="text" name="username" class="textInput"></td>
        </tr>   
        
      <tr>
       <td>Email:</td> 
        <td><input type="email" name="email" class="textInput"></td>
        </tr>   
        
      <tr>
       <td>Password:</td> 
        <td><input type="password" name="password" class="textInput"></td>
        </tr>   
        
      <tr>
       <td>Password again:</td> 
        <td><input type="password" name="password2" class="textInput"></td>
        </tr>   
        
      <tr>
       <td></td> 
        <td><input type="submit" name="register_btn" value="Register"></td>
        </tr>   
              
        </table>
    
    
    
    </form>
</body>
</html>
