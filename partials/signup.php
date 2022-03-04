<?php include "dbconnection.php";  ?>
<?php
$showalert=false;
$showerror=false;
$showblankerror=false;
$existerror=false;
$existemailerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "dbconnection.php";
    $username= $_POST['usernames'];
    $password= $_POST['passwords'];
    $email= $_POST['email'];
    $confirmpassword= $_POST['confirmpasswords'];
//  ------here we check user exist or not-----   
    $existsql="SELECT * FROM `registration` WHERE username ='$username'";
    $result=mysqli_query($conn,$existsql);
    $num=mysqli_num_rows($result);
    if($num>0){
      $existerror=true;
    }
//  ------here we check email exist or not-----   
    $existsql="SELECT * FROM `registration` WHERE emailid ='$email'";
    $result=mysqli_query($conn,$existsql);
    $num=mysqli_num_rows($result);
    if($num>0){
      $existemailerror=true;
    }
    
    
if(($password==$confirmpassword)&& !$username==null && !$password==null && !$email==null && $existerror==false ){
  $hash = password_hash($password,$PASSWORD_DEFAULT);
  $sql="INSERT INTO `registration` (`username`, `emailid`,`password`,`date`) VALUES ('$username', '$email','$hash', current_timestamp())";
 $result = mysqli_query($conn,$sql);
 if($result){
    $showalert=true;
   header("Location:/fourmsproject/partials/login.php");
 }
}elseif($username==null || $email==null || $password==null || $confirmpassword==null){
  $showblankerror=true;
}
else{
    $showerror=true;
}
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/signup.css">

    <title>Signup</title>
</head>

<body>
    <?php
include ("signup_headers.php");  ?>
    <?php
if($showalert){

    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You Signup Successfully thanks.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if($showerror){

    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Your password do not match!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if($showblankerror){

  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Please fill all the fields!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if($existerror){
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>this account is already created!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if($existemailerror){
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>This Email address is already in use!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

        <div class="container">
    <div class="title">SignUp</div>
    <div class="content">
    <form action="/FOURMSPROJECT/partials/signup.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="usernames" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Email Address</span>
            <input type="email"  name="email" placeholder="Enter your email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="passwords" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="confirmpasswords" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="button">
        <button type="submit" class="btn btn-primary">Signup</button>
        </div>
        <p> <a href="login.php"> Already registered? </a></p> 
      </form>
    </div>
  </div>















        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>