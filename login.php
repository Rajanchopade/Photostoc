<?php

include 'config.php';
session_start();
error_reporting(0);

if(isset($_SESSION['username'])){
  header("Location:1.html");
}

if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn , $sql);
  if($result->num_rows > 0){
  $row = mysqli_fetch_assoc($result);
  $_SESSION['username']= $row['username'];
  header ("Location:1.html");
  }else{
    echo "<script>alert('Email or Password is Wrong.')</script>";
  
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Photostoc</title>
  <link rel="stylesheet" href="css2/login.css">
  <link rel="stylesheet" href="css1/navbarmix3.css">
</head>

 <body>
 <nav class="navbar">
        <div class="brand-title">TravelInMH</div>
        <button type="button" class="collap">☰ </button>
        <div class="navbar-links ">
            <ul>
                <li><a href="index.php">Home</a></li>
               <li><a class="logbut" href="Logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

  <div class="container">
  
    <!-- navbar -->

   <form action="" method="POST" class="signin">
  
    <h1> Login</h1>       
      <div class="input-field">
        <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>" required> 
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" name="password"  value="<?php echo $_POST['password']; ?>" required>
      </div>
      <div class="input-field">
         <button name="submit" value="Login" class="btn solid"> LogIn </button>                
         </div>
         <p class="ptext">
           Don't have an account? 
             <a href="register.php">SignUp Here</a>
         </p>
    </form>
  
  </div> 
  <script>
  var coll = document.getElementsByClassName(" collap");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

    </script>
 </body>

</html>