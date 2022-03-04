<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
     
    <title>iDiscuss fourm-coding</title>
</head>
<body>
    
<!-- ---------------------header file -->
<?php include "partials/dbconnection.php";  ?>
<?php include "partials/header.php";  ?>
    
<!-- ---------------------image slider -->

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slider1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slider2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?coding,company,laptop" class="d-block w-100"
                    alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<!-- ---------------------cards categories -->
    <div class="container bg-dark my-3 ml-2">
        <h2 class="text-center text-white my-3"> iDiscuss-Browse Categories</h2>
        <div class="cards row" style="
    margin-left: 3.5rem;">
<!-- ---------------------cards categories loop start here -->
<?php 
$sql="SELECT * FROM `categories`";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
  $catname=$row['categories_name'];
  $catid=$row['categories_sno'];
  $catdesc=$row['categories_description'];
  echo'<div class="col-md-4 my-2 mb-5">
  <div class="card" style="width: 18rem;">
  <img src="https://source.unsplash.com/500x400/?'.$catname.',coding,code,laptop" class="card-img-top" alt="...">
  <div class="card-body">
          <h5 class="card-title"> <a href="thread_cat.php?catid='.$catid.'">'.$catname.'</a></h5>
          <p class="card-text"> '.substr($catdesc,0,90).'...</p>
          <a href="thread_cat.php?catid='.$catid.'" class="btn btn-primary">View Threads</a>
      </div>
  </div>
</div>';
}
?>
        </div>
    </div>
    <?php include "partials/footer.php";  ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>