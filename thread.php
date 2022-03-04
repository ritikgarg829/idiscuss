<?php  $showalert=false; ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
    #ques {
        min-height: 333px;
    }

    .media-body {
        margin-left: 4rem;
        margin-top: -4rem;
    }
    .icon{
        width:50px;
    }
    .verify{
        background-color: black;  
    }
    #verify{
        text-decoration: none;
       background-color: black;
       color: white;
}
    }
    </style>


    <title>iDiscuss fourm-coding</title>
</head>

<body>

    <!-- ---------------------header file -->
    <?php include "partials/dbconnection.php";  ?>
    <?php include "partials/header.php";  ?>
    <?php 
    $thread_id=$_GET["thread_id"];
    $sql="SELECT * FROM `thread` WHERE thread_id ='$thread_id'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
  $cattitle=$row["thread_title"];
  $catdesc=$row["thread_desc"];
//   ---------getting posted by  username dynamic --------
  $thread_user_id=$row["thread_user_id"];
  $sql2= "SELECT username FROM `registration` WHERE sno='$thread_user_id'";
  $result2=mysqli_query($conn,$sql2);
  $row2=mysqli_fetch_assoc($result2);
  $postedby = $row2['username'];
    }
    ?>

    <?php
 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $thread_id=$_GET["thread_id"];
   $comments_content=$_POST["comments_content"];
   $comments_content = str_replace("<" ,"&lt", $comments_content);
   $comments_content = str_replace(">" ,"&gt", $comments_content);
   $sno=$_POST["sno"];
if(!$comments_content==null){
    $sql= "INSERT INTO `comments` ( `comments_content`, `thread_id`, `commentby`,`date`) VALUES ('$comments_content', '$thread_id','$sno', current_timestamp())";
  $result = mysqli_query($conn,$sql);
  $showalert=true;
  }
}
else{
    $showalert=false;
}
if($showalert==true){
echo'<div class="alert alert-primary alert-dismissible fade show" role="alert">
<strong>Success!</strong> Your comments added successfully.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $cattitle?></h1>
            <p class="lead"><?php echo $catdesc ?></p>
            <hr class="my-4">
            <p>This is peer to peer forum | for sharing knowledge with each other</p>
            <p><b>Posted By: <?php echo" $postedby"; ?></b></p>
        </div>
    </div>

    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<div class="container">
    <h2 class="text-center mb-5">POST A COMMENTS</h2>
    <form action="' . $_SERVER['REQUEST_URI'].'" method="post">
        <div class="form-floating">
            <textarea class="form-control" placeholder="comments" id="desc" name="comments_content"
                style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comment..</label>
                <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Post Your comment</button>
    </form>
</div>';
}
else{
    echo '<div class="container">
        <h2 class="text-center mb-5">POST A COMMENTS</h2>
        <form action="' . $_SERVER['REQUEST_URI'].'" method="post">
            <div class="form-floating">
                <textarea class="form-control" placeholder="comments" id="desc" name="comments_content"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comment..</label>
                <p class="my-3">you are not loggedin . you are not allowed to Post a comments.</p>  
            </div>
            <button type="button" class="btn btn-secondary btn-lg " disabled>Your comment</button>
            </form>
    </div>';
    }
    ?>


    <div class="container my-3">
        <h2 class="text-center mt-4 mb-4">Discussion</h2>
        <?php 
    $sql="SELECT * FROM `comments` WHERE thread_id=$thread_id;";
    $thread_id=$_GET["thread_id"];
    $result=mysqli_query($conn,$sql);
    $noresult=true;
    while($row=mysqli_fetch_assoc($result)){
    $noresult=false;
    $comments_id=$row['comments_id'];
   $comments_content=$row['comments_content'];
   $date=$row['date'];
   $commentby=$row['commentby'];
   $verify=$row['verified'];
   
   $sql2= "SELECT username FROM `registration` WHERE sno='$commentby'";
   $result2=mysqli_query($conn,$sql2);
   $row2=mysqli_fetch_assoc($result2);

//------In this  line 68 in <a> href it is compulsary to get a Thread_id because i need to use this thread id in another php file thats why first we get a thread id to use like that.

   if($verify==1){echo'<div class="container media mb-4">
   <img class="mb-3" src="img/userdefault.png" width="40px" alt="Generic placeholder image">
   <div class="media-body">
   <p class="font-weight-bold my-0" style="font-weight: bold;">Commented by : '. $row2['username'].' at '.$date.' <span title="It is verified by a user">&#10003;</span></p> 
      <h7 class="mr-5">'.$comments_content .'</a></h5>
    </div>
  </div>';}
  else{
    echo'<div class="container media mb-4">
    <img class="mb-3" src="img/userdefault.png" width="40px" alt="Generic placeholder image">
    <div class="media-body">
    <p class="font-weight-bold my-0" style="font-weight: bold;">Commented by : '. $row2['username'].' at '.$date.'</p> 
       <h7 class="mr-5 my-4"><a>'.$comments_content .'</a></h5>
       <button class="verify"><a id="verify" href="verify.php?comments_id='.$comments_id.'">verify</a></button>
     </div>
   </div>';
  }
}

if($noresult==true){
echo '<div class="jumbotron jumbotron-fluid">
<div class="container">
  <h1 class="display-4">NO RESULT FOUND</h1>
  <p class="lead">BE THE FIRST PERSON TO ASK A QUESTIONS</p>
</div>
</div>';
}
            ?>
    </div>










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