<?php
include("connection.php");
?>





<form action = "" method = "post">

Email: <input type = "email" name="email" value=""/><br><br>
Password: <input type = "password" name="password" value=""/><br><br>
<input type = "submit" name="submit" value="Login"/>
</form>














 <?php


 if(isset($_POST['submit'])){

     $email = $_POST['email'];
     $password = $_POST['password'];
     $query = "SELECT * FROM LOGIN WHERE email= '$email' && password ='$password' ";
    $data =  mysqli_query($conn, $query);
    $total =  mysqli_num_rows($data);
    
    if($total == 1){
        $_SESSION['email'] =$email;
        header("location:home.php");

    }
    else{
        echo "Login Failed";
    }

 }

 ?>   



