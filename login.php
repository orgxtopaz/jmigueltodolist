<?php
include("connection.php");
?>





<!DOCTYPE html>
<html>
<title>HTML Tutorial</title>

<body>


    <script src="js/prefixfree.min.js"></script>
    <link rel="stylesheet" href="style.css">


    </head>

    <body>

        <div id="logo">
            <h1><i>ZIGM CRUD</i></h1>
        </div>
        <section class="stark-login">

           <form action = "" method = "post">
                <div id="fade-box">
                    <input type="email" name="email" id="username" placeholder="Email" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type = "submit" name="submit" value="Login"/>

                    
                </div>
            </form>
            <div class="hexagons">

                <img src="https://images.unsplash.com/photo-1516116216624-53e697fedbea?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDF8fHxlbnwwfHx8&w=1000&q=80" height="768px" width="1366px" />
            </div>
        </section>

        <div id="circle1">
            <div id="inner-cirlce1">
                <h2> </h2>
            </div>
        </div>

        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

        <script src='https://codepen.io/assets/libs/fullpage/jquery.js'></script>

        <script src="js/index.js"></script>

    </body>

</html>
</body>

</html>




















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



