<?php include "dbconnection.php";  ?>

<?php
echo ' 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/fourmsproject">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/fourmsproject">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDropdown">';         
          $sql="SELECT categories_name, `categories_sno` FROM `categories`";
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_array($result)){
            $catid=$row['categories_sno'];
            $url="../thread_cat.php?catid=$catid";
           echo'<li><a class="dropdown-item" href="'.$url.'">'.$row['categories_name'].'</a></li>';
          }
          echo'</ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contactus</a>
        </li>
      </ul>
      <div class=" mx-2">
      <form class="d-flex">
        <input class="form-control me-2" type="search" name="search"  placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
    </div>
    <a class="nav-link" href="login.php">LOGIN</a>
  </div>
</nav>';
?>