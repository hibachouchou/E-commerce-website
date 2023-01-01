<?php

session_start();

if(!isset($_SESSION['nom_admin'])){
    header('location:cnxadmin.php'); //redirection vers page profil
}

?>

<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>ESPACE ADMIN</title>
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
    *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}

#bt{
    margin-left:700px;
    margin-top:0px;
}
    #space{
        margin-top:60px;
        margin-left:20px;
        margin-right:30px;
    }
    #space .row{
        margin: 5px;
        width:1000px;
        margin-left:150px;
       
    }
    #space .row i{
        font-size:50px;
    }
    #perso h1,h4{
        margin-left:0px; 
        text-align:center;
       
    }
   
    #perso .hh{
        margin-top:60px;
    }
</style>

	</head>
	<body>
                <!--Nav section-->


                <section id="header">
<a href="index.php?page=1"><img src="img/Marque/logo.jpg" class="logo" alt=""></a>

  <div id="bt">
<a href=" deconnexion.php"><button  class="btn btn-success">DECONNEXION  <i class="fas fa-user-alt-slash"></i></button></a>
</div>


</section>
<!--first section-->

<section id="perso">
    <div class="hh">
<h1 style="color:green;"><?php echo $_SESSION['nom_admin'];?></h1>
<h1>ESPACE ADMIN</h1>
</div>
<!--h4> Vous pouvez y gerer vos informations personnelles ainsi que de vos clients.</h4-->
</section>

<section id="space">
<div class="row">
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-cogs"></i><h3 class="card-title">PARAMETRES</h3>
        <p class="card-text"></p>
        <a href="setting.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-chart-line"></i> <h3 class="card-title">STATISTIQUES</h3>
        <p class="card-text"></p>
        <a href="stat.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-tags"></i>   <h3 class="card-title">FAMILLES</h3>
        <p class="card-text"></p>
        <a href="famille.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-tag"></i>  <h3 class="card-title">CATEGORIES</h3>
        <p class="card-text"></p>
        <a href="cathegories.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
    <div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-sticky-note"></i> <h3 class="card-title">SOUS CATEGORIES</h3>
        <p class="card-text"></p>
        <a href="souscatheg.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-tshirt"></i><h3 class="card-title">PRODUITS</h3>
        <p class="card-text"></p>
        <a href="allproduits.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
<div></div></div>
<div class="row"> 
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-database"></i> <h3 class="card-title">STOCK</h3>
        <p class="card-text"></p>
        <a href="stock.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-book-reader"></i>  <h3 class="card-title">ARTICLES</h3>
        <p class="card-text"></p>
        <a href="articles.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
</div></div></div>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-paperclip"></i>  <h3 class="card-title">LES MARQUES</h3>
        <p class="card-text"></p>
        <a href="listesmarques.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class='fas fa-shopping-cart'></i> <h3 class="card-title">PANIER</h3>
        <p class="card-text"></p>
        <a href="gestionpanier.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div></div>
<div class="row"> 
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fa fa-user-secret" aria-hidden="true"></i> <h3 class="card-title">ABONNES</h3>
        <p class="card-text"></p>
        <a href="abonnes.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
  
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-users-cog"></i> <h3 class="card-title">CLIENTS</h3>
        <p class="card-text"></p>
        <a href="clients.php" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>

</div>


</section>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>






