<?php
   include("database.php"); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="index.css">
</head>
<body>
 
   <section id="for">
   <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
   <h2>&nbsp;&nbsp;&nbsp;&nbsp;WELCOME TO WEBPAGE</h2>
   Username : &nbsp;
   <input type="text" name="username"><br><br>
   Age : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="int" name="age"><br><br>
   Password : &nbsp;
   <input type="password" name="password"><br><br>
   
   <input type="submit" name = "submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="reset" name="reset">

   </form></section>
   
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

   $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
   $age=filter_input(INPUT_POST,"age",FILTER_SANITIZE_SPECIAL_CHARS);
   $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
   

   if(empty($username)){
      echo"please enter username";
   }
   elseif(empty($password)){
      echo"please enter the password";
   }
   else if(empty($age)){
      echo "please enter the age";
   }
   else{
      $hash=password_hash($password,PASSWORD_DEFAULT);
      $sql="INSERT INTO login_details(user_name,password,age) values('$username','$hash','$age')";
      mysqli_query($conn,$sql);
      echo"login successful";
   }


}

   mysqli_close($conn);
?>