
<!DOCTYPE html>
<html>
  <head>
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#0c2461;">
<div class="collapse navbar-collapse d-flex justify-content-center">
  <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Accueil </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="mypub.php">Publications</a>
      </li>
    </ul>
    </div>
  <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarText">
    
    <span class="navbar-text white-text">
          <?php
        
        session_start();
        
        
        if(!isset($_SESSION["username"])){
         
          echo '<a href="login.php"> Se connecter !</a>';
          
        }else {
          echo '<span style="color:white;font-family: "Comic Sans MS", cursive, sans-serif;"> '. $_SESSION["username"].'  </span>';
          echo '&nbsp;<a href="logout.php">Déconnexion</a>';
        }
      ?>
    </span>
  </div>
</nav>

<div class="all1">
<div class="container">
<h3 class="title"  style="color:#0c2461;">Ajouter Votre publication</h3>

<div class="curs" >


<?php

require('config.php');
require('class.php');


$sql = "SELECT post.*, user.username FROM post JOIN user ON post.id_user = user.id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row

while($row = $result->fetch_assoc()) {
  
  echo ' 
  <div class="blog-card alt flex">
    <div class="meta">
      <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-2.jpg)"></div>
      
    </div>
    <div class="description" style="color:black; >
      <h1>'. $row["title"].' </h1>
      <h2>' . $row["username"]. ' , '. $row["date"].'</h2>
      <p>' . $row["content"].'</p>
      <p class="read-more">
      </p>
    </div>
  </div>';
}
} else {
echo "<p>Pas de publication ! <a href='addpost.php'> Clique ici</a> pour ajouter une pbulication </p>";
}

 ?>
 <div class="flexx">
 <a class="btn " href="addpost.php"  style="color:#0c2461; background-color:white;">Ajouter</a>
 </div>
</div>

</div>
</div>


  </body>
</html>