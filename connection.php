<?php
session_start();
$name='';
$location ='';
$id=0;

#DEFAULT VALUE OF UPDATE BUTTON WHEN EDIT WASNT CLICKED!
$update=false;

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
    $_SESSION['msg_type'] ="success"; // SUCH A BACKROUND OF "$_SESSION['message']"

    header("location:home.php");
}


#DELETING THE DATA BY ITS ID

if(isset($_GET['delete'])){
    $id = $_GET['delete']; #THE NAME OF THE INPUT FIELD//


    $conn ->query("DELETE FROM data WHERE id=$id") or die ($conn->error);

    $_SESSION['message'] ="Record has been Deleted!";
    $_SESSION['msg_type'] ="danger"; // SUCH A BACKROUND OF "$_SESSION['message']"
                 
    header("location:home.php");
}

#EDIT BUTTON AND UPDATE

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    #WHEN EDIT BUTTON IS CLICKED! UPDATE BUTTON NEW WILL BE EXECUTED!

    $update =true;

    $result=$conn->query("SELECT * FROM data WHERE id=$id")or die ($conn->error);

    if(count($result)==1){
        $row = $result->fetch_array();
        $name =$row['name'];
        $location =$row['location'];

    }
}


#IF UPDATE BUTTON IS CLICKED!
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name= $_POST['name'];
    $location = $_POST['location'];

    $conn->query("UPDATE data SET name ='$name',location='$location' WHERE id=$id")or die ($conn->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type']="Warning"; // SUCH A BACKROUND OF "$_SESSION['message']"

    header('location:home.php');
}

?>




