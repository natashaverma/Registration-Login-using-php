<?php
session_start();

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
   
<?php
    if(isset($_SESSION['message'])){
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
  
 ?>
    
    
    
 <h1> Home </h1>
    
    <div><a href="logout.php">Logout</a></div>
    
</body>
</html>
