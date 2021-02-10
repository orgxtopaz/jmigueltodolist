<?php
session_start();
error_reporting(0);
include("connection.php");




// CONDITIONING IF THE EMAIL INPUT IS EQUAL TO THE EMAIL IN THE DATABASE.
$userprofile = $_SESSION['email'];

// IF INPUT EMAIL AND DATABASE EMAIL IS NOT SAME THEN
if($userprofile==true){


}else{

    header('location:login.php');
}




?>

<!DOCTYPE html>
<html>

<head>
  <title>Our Company</title>
</head>

<body>
  <img src='<?php echo $result['profilepicture'];?>' height ='250' width="200"/>
  
  <h1>Welcome to Our Company</h1>
  <h2>Web Site Main Ingredients:</h2>

  <p>Pages (HTML)</p>
  <p>Style Sheets (CSS)</p>
  <p>Computer Code (JavaScript)</p>
  <p>Live Data (Files and Databases)</p>

<a href="logout.php">LOG OUT</a>
</body>
</html>