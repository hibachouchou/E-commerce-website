<?php
include_once "functions.php" ;
 
$famille=getAllFamilles();

?>
<section id="header">
<a href="index.php?page=1"><img src="img/Marque/logo.jpg" class="logo" alt=""></a>

  <div class="container-fluid" id="inf" >
    <form class="d-flex" action="search.php" method="POST" >
      <input class="form-control me-2" id="ff" type="search" placeholder="" aria-label="Search" name="recherche">
      <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>

    <ul id="navbar">
      <li><a href="index.php?page=1" class="active">ACCUEIL</a></li>
      <li><a href="marques.php?page=1">MARQUES</a></li>
      <li><a href="blog.php?page=1">BLOG</a></li>
      <li><a href="about.php">PROPOS</a></li>
      <li><a href="contact.php">CONTACT</a></li>
      <li><a href="cart.php"><i class="fas fa-shopping-bag"></i><?php 
      session_start();
      if($_SESSION['username']){//user non connectee
        if((isset($_SESSION['panier']))&&(is_array($_SESSION['panier'][3]))){
echo"(<span class='text-success'>". count($_SESSION['panier'][3])."</span>)" ;
    }
   }
    else{
      echo"<span></span>" ;
    }
      ?></a></li>
      <li><a href="inscrit.php"><i class="fas fa-user"></i></a></li>
    </ul>
<div id="mobile">
<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
<i class="fas fa-align-justify"></i><?php 
      session_start();
      if($_SESSION['username']){//user non connectee
        if((isset($_SESSION['panier']))&&(is_array($_SESSION['panier'][3]))){
echo"(<span class='text-danger'>". count($_SESSION['panier'][3])."</span>)" ;
    }
   }
    else{
      echo"<span></span>" ;
    }
      ?>
    </button>
  </div>
<nav class="navbar navbar-light bg-light fixed-top">
  <div class="container-fluid">

  
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?page=1">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="promotions.php?page=1">Promotions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="newss.php">Nouveautes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="marques.php?page=1">Les marques</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="blog.php?page=1">Les articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="about.php">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="cart.php">Panier <i class="fas fa-shopping-bag"></i><?php 
      session_start();
      if($_SESSION['username']){//user non connectee
        if((isset($_SESSION['panier']))&&(is_array($_SESSION['panier'][3]))){
echo"(<span class='text-success'>". count($_SESSION['panier'][3])."</span>)" ;
    }
   }
    else{
      echo"<span></span>" ;
    }
      ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="inscrit.php">Mon Compte <i class="fas fa-user"></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gammes des produits
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
            <?php
foreach($famille as $fam){ 
 echo"
 <li><a class='dropdown-item' href='family.php?id=".$fam['id']."&&page=1'>".$fam['nom']."</a></li>
";
}
  
   
?>
            </ul>
          </li>
        </ul>
        <div class="container-fluid" id="inf" >
    <form class="d-flex" action="search.php" method="POST" >
      <input class="form-control me-2"  type="search" placeholder="Chercher produit par nom" aria-label="Search" name="recherche">
      <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
      </div>
    </div>
  </div>
</nav>

</section>




