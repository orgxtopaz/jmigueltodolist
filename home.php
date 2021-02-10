<?php
session_start();
error_reporting(0);
include("connection.php");

// DISPLAYING THE EMAIL OF USER INSIDE DASHBOARD.
echo "Welcome ".$_SESSION['email'];


// CONDITIONING IF THE EMAIL INPUT IS EQUAL TO THE EMAIL IN THE DATABASE.
$userprofile = $_SESSION['email'];

// IF INPUT EMAIL AND DATABASE EMAIL IS NOT SAME THEN
if($userprofile==true){


}else{

    header('location:login.php');
}



$query = "SELECT * FROM login WHERE email ='$userprofile'"; // FINDING THE PROFILE LINK THROUGH ITS EMAIL MUST BE EQUAL!!
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);



?>

<!DOCTYPE html>
<script src="jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<!-- CONNECTING THE DATABASE -->
<?php require_once 'connection.php';?>

<!-- DISPLAYING SESSION MESSAGE IF SAVED OR DELETED -->
<?php

 if (isset($_SESSION['message'])):?>

<!-- IF SUCCESS  THIS WILL EXECUTE-->

<div class ="alert alert-<?=$_SESSION['msg_type']?>">


      <?php

           echo $_SESSION['message'];
           unset ($_SESSION['message']);
      
      ?>
</div>
<?php  endif ?>


<div class="container">
<!-- DISPLAYING THE DATA ON HTML-->
<?php 
  
       $conn = new mysqli($servername,$username,$password,$dbname)or die(mysqli_error($conn));

        // STORING ALL THE DATA ON DATABASE TO VARIABLE RESULT
        
        $result = $conn->query("SELECT * FROM data") or die($conn->error);
?>

        <div class ="row justify-content-center">
              <table class="table">
                      <thead>
                            <tr>
                             <th>Name</th>
                             <th>Location</th>
                             <th colspan="2">Action</th>
                            </tr>
                      </thead>

              <?php
                      // $row will get all of the infos in the database and display it (fetch assoc)
                      while($row =$result->fetch_assoc()):
              ?>
                     <!-- INSERTING THE DATA ON THE TABLE -->
                    <tr>
                         <td><?php echo $row['name'];?></td>
                         <td><?php echo $row['location'];?></td>

                         <td>
                         <!--  GETTING NOW THE ID IN THE DATA "  with a link of itself EDIT-->
                         
                         <a href ="home.php?edit=<?php echo $row['id']; ?>" class ="btn btn-info">Edit</a>
                         <!--  GETTING NOW THE ID IN THE DATA "  with a link of itself DELETE-->
                              <!-- <a href ="home.php?delete=" class ="btn btn-danger" >Delete</a> -->
                          <form action="connection.php" method="GET">
                         <input type="hidden" name="delete" value="<?php echo $row['id']; ?>"> 

                          <button class ="btn btn-danger" > Delete</button>


                          
                          
                         </form>
                          </td>

                  
                    </tr>
                <?php endwhile;?>
              
              
              </table>
        </div>




<?php
        //pre_r($result);  ---->DIPLAYING HOW MANY INPUTS


        function pre_r($array){
          echo '<pre>';
          print_r($array);
          echo '<pre>';
        }
      

?>



<style>
.g-3, .gx-3 {
    --bs-gutter-x: -46rem;
}
</style>


  <form class="row g-3" action="connection.php" method ="POST">
   
    <div class="col-auto" class="form-group">

      <label for="Name" class="visually-hidden">Name</label>
      <input type="text" class="form-control"  placeholder="Name" name="name">

    </div>

    <div class="col-auto" class="form-group">

     <label for="Location" class="visually-hidden">Location</label>
     <input type="text" class="form-control"  placeholder="location" name="location">

    </div>
    <div class="col-auto" class="form-group">

     <button type="submit" class="btn btn-primary mb-3" name="save">INSERT</button>

     </div>
  </form>
  </div>



<a href="logout.php">LOG OUT</a>
</body>
</html>