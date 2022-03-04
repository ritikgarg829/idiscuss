<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="css/contactus.css">
    <title>iDiscuss fourm-coding</title>
</head>

<body>
    <?php include "partials/dbconnection.php";  ?>
    <?php include "partials/header.php";  ?>

    <?php
$showalert=false;
$showblankerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include "partials/dbconnection.php";
  $name= $_POST['name'];
  $email= $_POST['email'];
  $desc= $_POST['desc'];
if(!$name==null && !$email==null && !$desc==null){
$sql="INSERT INTO `contactus` (`name`, `email`,`description`,`date`) VALUES ('$name', '$email','$desc', current_timestamp())";
$result = mysqli_query($conn,$sql);
if($result){
  $showalert=true;
}
}elseif($name==null || $email==null || $desc==null ){
$showblankerror=true;
}
}
?>

    <?php
if($showalert==true){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You Query is submitted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if($showblankerror==true){
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Please fill all the fields!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>
    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo'<div class="container my-5">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic text-white">Address</div>
                    <div class="text-one">Abc, NP12</div>
                    <div class="text-two">Noida Delhi</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic text-white">Phone</div>
                    <div class="text-one">+0198 9893 5647</div>
                    <div class="text-two">+0596 3434 5678</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic text-white">Email</div>
                    <div class="text-one">abc@gmail.com</div>
                    <div class="text-two">info.mycoding@gmail.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text text-white my-3s">Send us a message</div>
                <p class="text-white my-3">If you have any work from me or any types of quries related to this, you can send me message
                    from here. Its my pleasure to help you.</p>
                <form action="contact.php" method="post">
                    <div class="input-box">
                        <input type="text" name="name" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <input type="text" name="email" placeholder="Enter your email">
                    </div>
                    <div class="input-box message-box">
                    <textarea class="form-control" name="desc" placeholder="Desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-primary" value="Send Now">Send now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
}
    else{
   echo'<div class="container my-5">
      <div class="content">
          <div class="left-side">
              <div class="address details">
                  <i class="fas fa-map-marker-alt"></i>
                  <div class="topic text-white">Address</div>
                  <div class="text-one">Surkhet, NP12</div>
                  <div class="text-two">Birendranagar 06</div>
              </div>
              <div class="phone details">
                  <i class="fas fa-phone-alt"></i>
                  <div class="topic text-white">Phone</div>
                  <div class="text-one">+0098 9893 5647</div>
                  <div class="text-two">+0096 3434 5678</div>
              </div>
              <div class="email details">
                  <i class="fas fa-envelope"></i>
                  <div class="topic text-white">Email</div>
                  <div class="text-one">codinglab@gmail.com</div>
                  <div class="text-two">info.codinglab@gmail.com</div>
              </div>
          </div>
          <div class="right-side">
              <div class="topic-text text-white my-3s">Send us a message</div>
              <p class="text-white my-3">If you have any work from me or any types of quries related to my tutorial, you can send me message
                  from here. Its my pleasure to help you.</p>
              <form action="contact.php" method="#">
                  <div class="input-box">
                      <input type="text" name="name" placeholder="Enter your name">
                  </div>
                  <div class="input-box">
                      <input type="text" name="email" placeholder="Enter your email">
                  </div>
                  <div class="input-box message-box">
                  <textarea class="form-control" name="desc" placeholder="Desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <p class=" text-white my-3">you are not loggedin . you are not allowed to Send a Message.</p>  
                  <div class="button">
                <button type="button" class="btn btn-secondary btn-lg " disabled>Send now</button>
                  </div>
              </form>
          </div>
      </div>
  </div>';
    }
    ?>


    <?php include "partials/footer.php";  ?>


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