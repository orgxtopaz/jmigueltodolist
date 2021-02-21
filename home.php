<?php
session_start();
error_reporting(0);
include("connection.php");

// DISPLAYING THE EMAIL OF USER INSIDE DASHBOARD.
echo "<p class='useremaildisplay''> Welcome ".$_SESSION['email'] . "</p>";



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
<body >


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
              <table class="fl-table">
                      <thead>
                        <div class='table-wrapper'>
                            <tr>
                             <th>Name</th>
                             <th>Location</th>
                             <th colspan="2">Action</th>
                            </tr>
                        </div>
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
<link rel="stylesheet" href="homestyle.css">

  <form class="row g-3" action="connection.php" method ="POST">
     <input type ="hidden" name ="id" value="<?php echo $id;?>">
    
    <div class="col-auto" class="form-group">

      <label for="Name" class="visually-hidden" id="name">Name</label>
      <input type="text" class="form-control"  placeholder="Name" name="name" value="<?php echo $name; ?>">

    </div>

    <div class="col-auto" class="form-group">

     <label for="Location" class="visually-hidden">Location</label>
     <input type="text" class="form-control"  placeholder="location" name="location" value="<?php echo $location; ?>">

     
    </div>
    <div class="col-auto" class="form-group">

    <?php
    if($update==true):
    ?>
         
         <button type="submit" class="btn btn-primaryupdate mb-3 glow-on-hover" name="update"  >UPDATE</button>

    <?php else: ?>
      <br>
      
     <button type="submit" class="btn btn-primary mb-3 glow-on-hover"  name="save"  >INSERT</button>
    <?php endif; ?>
    
     </div>
  </form>
  </div>



  <div class="wrapper">
  <div class="link_wrapper">
    <a class="logout" href="logout.php">log out</a>
    <div class="icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
        <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
      </svg>
    </div>
  </div>
  
</div>



</body>
</html>