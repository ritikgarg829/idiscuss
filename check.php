<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/check.css">

    <title>iDiscuss fourm-coding</title>
</head>

<body>
    <!-- ---------------------header file -->
    <?php include "partials/dbconnection.php";  ?>
    <?php include "partials/header.php";  ?>
    <?php
if(isset($_POST['submit'])){
    $catid=$_GET["catid"];
    include "partials/dbconnection.php";
    if(!empty($_POST['quizcheck'])){
        $count = count($_POST['quizcheck']);
        // echo"Out of 3, you selected ".$count." option";
        $score=0;
        $i=1; 
        if($count==3){
        $selected=$_POST['quizcheck'];
        // print_r($selected);
        $sql="SELECT * FROM `quizquestion` where `catid`='$catid'";
       $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_array($result)){
        // print_r($row['answer']);
   $checked=$row['answer']==$selected[$i];
   if($checked){
       $score++;
   }
   $i++;
}
// echo " your score ".$score;
        }else{
            echo'<div class="alert alert-warning" role="alert">
          please select all option. 
     </div>';
        }
}
}
?>

    <?php
echo'
    <h3 class="heading my-5"> iDiscuss Quiz World </h3>
    <div class="container">
    <div class="main-card">
    <div class="card-header my-3" text-align="center">
        <h2 class="result">RESULT </h2>
</div>
<table class="table table-bordered table-dark">
  <tbody>
  <tr>
      <th scope="row">Question Attempted</th>
      <td colspan="2">Out of 3, you selected '.$count.' option </td>
    </tr><tr>
      <th scope="row">Your total Score</th>
      <td colspan="2">'.$score.'/3 </td>
    </tr>
  </tbody>
  </table>
  <button  onclick="history.go(-1);" class="back btn-dark ">Back</button>
</div>
</div>';
?>
<button  onclick="history.go(-1);" class="back btn ">Back</button>








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