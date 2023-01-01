<?php

session_start();

include "functions.php";
$cordsite=AfficherCordSite();
if(!isset($_SESSION['id_user'])){
    header('location:inscrit.php'); //redirection vers page d'inscription
}
?>

<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Profil</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width" initial-scale=1.0>
<style>
    *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
    #space{
        margin-top:60px;
        margin-left:20px;
        margin-right:20px;
    }
    #space .row{
        margin: 20px;
    }
    #perso h1,h4{
        margin-left:0px; 
        text-align:center;
       
    }
   
    #perso .hh{
        margin-top:60px;
    }
    #space .row i{
        font-size:50px;
    }
    /*             Respective Mobile Version                  */

@media all and  (max-width:920px){

  #space{
        margin-top:30px;
        margin-left:20px;
        margin-right:20px;
    }
    #space .row{
        margin: 0px;
    }
    #perso h1,h4{
        margin-left:0px; 
        text-align:center;
        font-size: 16px;
       
    }
   
    #perso .hh{
        margin-top:30px;
    }
    #space .row i{
        font-size:40px;
    }

}







</style>

	</head>
	<body>

        <!--navbar section section-->
        <?php
include "header.php";
      ?>

<!--first section-->
<section id="perso">
    <div class="hh">
<h1 style="color:green;"><?php echo $_SESSION['username']." ".$_SESSION['prenom'] ;?></h1>
<h1>BIENVENU DANS VOTRE COMPTE</h1>
</div>
<h4> Vous pouvez y gerer vos informations personnelles ainsi que vos commandes.</h4>
</section>

<section id="space">
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-user-cog"></i>  <h3 class="card-title">MES INFORMATIONS PERSONNELLES</h3>
        <p class="card-text"></p>
        <a href="info.php"  type="submit"class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-shopping-cart"></i>  <h3 class="card-title">HISTORIQUES ET DELAIS DE MES COMMANDES</h3>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-gifts"></i>  <h3 class="card-title">MES BON DE REDUCTION</h3>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-envelope"></i> <h3 class="card-title">MES ALERTES</h3>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">VOIR</a>
      </div>
    </div>
  </div>
</div>
<div>
<a href=" deconnexion.php"><button  class="btn btn-success">DECONNEXION  <i class="fas fa-user-alt-slash"></i></button></a>
</div>
</section>

<!--footer section-->
<?php


include "footer.php";


?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>





