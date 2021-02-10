<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zigm";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn){
    echo"";
}else{
    die("Connection Failed".mysqli_connect_error());
}


#INSERTING THE DATA INTO THE TABLE NAME DATA 


if(isset($_POST['save'])){
    $name = $_POST['name']; #THE NAME OF THE INPUT FIELD//
    $location = $_POST['location'];
   


    $conn ->query("INSERT INTO data (name,location)VALUES('$name','$location')")or
                    die ($conn->error);

                     
    $_SESSION['message'] ="Record has been saved!";
    $_SESSION['msg_type'] ="success";

    header("location:home.php");
}


#DELETING THE DATA BY ITS ID

if(isset($_GET['delete'])){
    $id = $_GET['delete']; #THE NAME OF THE INPUT FIELD//


    $conn ->query("DELETE FROM data WHERE id=$id") or die ($conn->error);

    $_SESSION['message'] ="Record has been Deleted!";
    $_SESSION['msg_type'] ="danger";
                 
    header("location:home.php");
}


?>




