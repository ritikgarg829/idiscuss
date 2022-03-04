

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src = 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
        </script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
  .back{
    margin-left: 55rem;
    background-color:black !important;
    color:white !important;
  }
  .verify{
    background-color:black !important;
    color:white !important;
  }
  }
</style>

    <title>iDiscuss fourm-coding</title>
</head>

<body>
<?php include "partials/dbconnection.php";  ?>
    <?php include "partials/header.php";  ?>
    <?php 
     include "partials/dbconnection.php";
    $comments_id=$_GET["comments_id"];
    $sql="SELECT * FROM `comments` WHERE comments_id ='$comments_id'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
  $comments_content=$row["comments_content"];
    }
    echo '<div class="container  shadow-lg p-3 mb-5 bg-body rounded">
    <h1>IF YOU FEEL THIS COMMENT IS USEFULL THEN VERIFY THIS</h1>
    <div class="content shadow-lg p-3 mb-5 bg-body rounded">
    <p class="text" style="font-size:2rem;">Comment:'.$comments_content.'</p>
    </div>';
    ?>

<?php 
$comments_id=$_GET["comments_id"];
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include "partials/dbconnection.php";
   $verify=$_POST["verify"];
    $sql= "UPDATE `comments` SET `verified` = '1' WHERE `comments_id` = '$comments_id'"; 
  $result = mysqli_query($conn,$sql);
  }
  echo'<form action="verify.php?comments_id='.$comments_id.'" method="post">
  <button type="submit" name="verify"class="verify btn btn mt-3">Click to verify this Comment</button>
  </form>
  <button  onclick="history.go(-1);" class="back btn ">Back</button>';
?>
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