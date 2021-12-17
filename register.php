<?php
include 'config.php';
error_reporting(0);
session_start();

if(isset($_SESSION['username'])){
  header("Location:index.php");
}

if(isset($_POST['submit'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$cpassword =md5($_POST['cpassword']);

if($password == $cpassword){
  $sql="SELECT * FROM users WHERE email='$email'";
  $result =mysqli_query($conn , $sql);

  if(!$result->num_rows > 0) {
  $sql = "INSERT INTO users (username, email, password)
  VALUES('$username' , '$email' , '$password')";
  $result=mysqli_query($conn , $sql);
  if ($result){
    header("Location:1.html");
  $username = "";
  $email = "";
  $_POST['password']= "";
  $_POST['cpassword']= "";
  // header ("Location:Welcome.php");
}else{
    echo "<script>alert('Oops! something wrong went.')</script>";
  }
}else{
  echo "<script>alert('Email Already Exists..')</script>";
}
}else{
  echo "<script>alert('Password Not Matched')</script>";
 }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Photostoc</title>
  <link rel="stylesheet" href="css2/signin.css">
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
   
 
   <form action="" method="POST" class="signin">
    <h1>Signin</h1>       
      <div class="input-field">
        <input type="text"  name="username" placeholder="Username" value="<?php echo $username;?>" required>
      </div>
      <div class="input-field">
        <input type="email" name="email" placeholder="Email" value="<?php echo $email;?>" required>
      </div>
      <div class="input-field">
       <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password'];?>" required>
      </div>
      <div class="input-field">
        <input type=" password" name="cpassword" placeholder=" Confirm Password" value="<?php echo $_POST['cpassword'];?>" required>
      </div>

      <div class="input-field">
         <button name="submit" value="register" class="btn solid">SignUp</button>                
      </div>
           <p class="ptext">
          Do you have an account?
             <a href="login.php">Login Here</a>
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