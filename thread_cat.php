<?php
$showalert=false;
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

    <style>
    #ques {
        min-height: 333px;
    }

    .media-body {
        margin-left: 4rem;
        margin-top: -4rem;
    }
    </style>


    <title>iDiscuss fourm-coding</title>
</head>

<body>

    <!-- ---------------------header file -->
    <?php include "partials/dbconnection.php";  ?>
    <?php include "partials/header.php"; ?>

    <?php 
    $catid=$_GET["catid"];
    $sql="SELECT * FROM `categories` WHERE categories_sno ='$catid'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
  $catname=$row["categories_name"];
  $catdesc=$row["categories_description"];
    }
    ?>
    <!-- -------------------START DISCUSSION INSERT DATA IN THIS--------- -->
    <?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $problem_title=$_POST["title"];
   $problem_desc=$_POST["desc"];
   $problem_desc = str_replace("<" ,"&lt", $problem_desc);
  $problem_desc = str_replace(">" ,"&gt", $problem_desc);
   $sno=$_POST["sno"];
if(!($problem_title==null && $problem_desc==null)){
    $sql= "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `date`) VALUES ('$problem_title', '$problem_desc', '$catid', '$sno', current_timestamp())";
  $result = mysqli_query($conn,$sql);
  $showalert=true;
  }
}else{
    $showalert=false;
}
    ?>
    <?php
if($showalert==true){
echo'<div class="alert alert-primary alert-dismissible fade show" role="alert">
<strong>Success!</strong> Your question added successfully.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} 
?>
    <!-- ---------------------------- -->

    <div class="container my-4  bg-secondary " style="height: 300px;">
        <div class="jumbotron ">
            <h1 class="display-3 text-black">Welcome to <?php echo $catname?></h1>
            <p class="lead text my-4 text-black"><?php echo $catdesc ?></p>
            <hr class="my-4">
            <p class="text-black">This is peer to peer forum | for sharing knowledge witc each other</p>
        </div>
    </div>
    <div class="container" style="height: 100vhvh;">
        <h2 class="text-center mb-5">Quizz 😍 | Unlocking knowledge at the speed of thought. </h2>
        <h4 class="my-4 text-center "> Welcome, You have to selected only one out of 3. best of luck👍
        </h4>
    </div>
    <div class="card-header">
        <!-- --------form -->
        <?php
$catid=$_GET["catid"];
echo'<form  action="/FOURMSPROJECT/check.php?catid='.$catid.'" method="post">';
?>
 <!-- -----------------        -->
        <?php
$catid=$_GET["catid"];
for($i=1; $i<4; $i++){
$sql="SELECT * FROM `quizquestion` WHERE `catid` = '$catid' AND `thread_quesno` = '$i'";
$result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
     $question=$row["question"];       
     echo'<div class="container card">
     <h5 class="card-header">'.$question.'</h5>
     </div>';
     $sql2="SELECT * FROM `quizanswer` WHERE `catid` = '$catid' AND `ans_id` = '$i'";
     $result2=mysqli_query($conn,$sql2);
         while($row=mysqli_fetch_assoc($result2)){
          $answer=$row["answer"];    
          $aid=$row["aid"];    
          $ans_id=$row["ans_id"];    
          echo'<div class="container card-body shadow-sm p-3 mb-5 bg-body rounded">
      <input type="radio" name="quizcheck['.$ans_id.']" value="'.$aid.'">
      '.$answer.'
          </div>';

         }
    }
}
?>
    <button type="submit" name="submit"value="submit" class="btn btn-primary m-auto d-block">submit</button>
    </form>
</div>





    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<div class="container">
        <h2 class="text-center my-5">Start Discussion</h2>
        <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Ask a question short as possible as</div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="DESC" id="desc" name="desc"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Problem Desc..</label>
                <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>';
}else{
    echo'<div class="container">
    <h2 class="text-center mb-5">Start Discussion</h2>
    <h4 class="lead my-5">you are not loggedin . you are not allowed to start a discussion.</h4>  
    </div>';
}
    ?>
    <div class="container">
        <h2 class="text-center mb-5">BROWSE QUESTION</h2>
        <?php 
    $catid=$_GET["catid"];
    $sql="SELECT * FROM `thread` WHERE thread_cat_id=$catid;";
    $result=mysqli_query($conn,$sql);
    $noresult=true;
    while($row=mysqli_fetch_assoc($result)){
    $noresult=false;
        $thread_id=$row['thread_id'];
        $threadtitle=$row['thread_title'];
        $threaddesc=$row['thread_desc'];
        $thread_date=$row['date'];
        $thread_user_id=$row['thread_user_id'];
        $sql2= "SELECT username FROM `registration` WHERE sno='$thread_user_id'";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
//------In this  line 68 in <a> href it is compulsary to get a Threadid because i need to use this thread id in another php file thats why first we get a thread id to use like that.
   echo '<div class="container media mb-4">
   <img class="mb-3" src="img/userdefault.png" width="40px" alt="Generic placeholder image">
   <div class="media-body">
   <p class="font-weight-bold my-0" style="font-weight: bold;">Asked by : '. $row2['username'].' at '.$thread_date.'</p>
      <h5 class="mr-5"><a href="thread.php?thread_id='.$thread_id.'">'.$threadtitle .'</a></h5>
      ' .$threaddesc.'
    </div>
  </div>';
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