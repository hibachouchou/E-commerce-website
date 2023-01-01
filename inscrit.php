<?php

include "functions.php";

if(!empty($_POST)){ //clicker sur le bouton inscrir
   ADDVisiteur($_POST);
   header('location:connexion.php');
}
//if(ADDVisiteur($_POST)){
//	header('location:connexion.php');	
//}
session_start();
if(isset($_SESSION['username'])){//utilisateur connecté
    header('location:profil.php'); //redirection vers page profil
}
?>
	<!DOCTYPE html>
	<html>
	<head>
		
		<title>form d'inscription</title>
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
		 
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<style>
    h2{
        padding-left: 40px;
        padding-top: 5px;
		padding-bottom: 20px;
    }
    .her{
        width: 500px;
    
        margin-top: 50px;
        margin-left: 100px;
        background-color: transparent;
    }
    .ins{
	height: 110%;
	width: 100%;
	background-image: linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)),url("img/Visage/femme3.jpg");
	background-position: center;
	background-size:cover ;
	position: absolute;
    }
    *{
	margin: 0;
	padding: 0;
	font-family: cursive;
	

}
.mybtn{
 width: 45%;
padding: 10px 30px;
cursor: pointer;
display: block;
margin: auto;
background-color:  rgb(196, 51, 75);
border: 0;
outline: none;
border-radius: 30px;
}
#cheks{
	padding-left: 150px;
	padding-bottom: 10px;
	padding-top: 10px;}
  .error{
      color: red;
       display: none;
      }
  
input:invalid{
  border: red 1px solid;
}
input:valid{
  border: green 1px solid;
}
@media screen and (max-width:920px) {
  h2{
        padding-left: 10px;
        padding-top: 5px;
		padding-bottom: 20px;
    }
    .her{
        width: 300px;
        margin-top: 80px;
        margin-left: 50px;
        background-color: transparent;
    }
    .ins{
	height: 120%;
	width: 420px;
	background-image: linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)),url("img/Visage/femme3.jpg");
	background-position: center;
	background-size:cover ;
	position: absolute;
    }
    *{
	margin: 0;
	padding: 0;
	font-family: cursive;
	

}
.mybtn{
 width: 45%;
padding: 10px 30px;
cursor: pointer;
display: block;
margin: auto;
background-color:  rgb(196, 51, 75);
border: 0;
outline: none;
border-radius: 30px;
}
#cheks{
	padding-left: 50px;
	padding-bottom: 10px;
	padding-top: 10px;}


}

</style>
	</head>
	<body>

	
	
	 
		<div class="ins">
<div  class="her">  

		<h2>FORM D' INSCRIPTION</h2>
		
    <form action="inscrit.php" method="POST" name="form" id="form">
  <div class="mb-3" id="blocknom">
    <input  type="text" placeholder=" Nom " minlength="3" required  name="nom" id="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" data-bs-toggle="tooltip" data-bs-placement="top" title="Veuillez saisir votre nom!">
   
  </div>
  <div class="mb-3">
    <input type="text"  placeholder=" Prenom" minlength="3" required name="pn" id="pnom" class="form-control" id="exampleInputPassword1" data-bs-toggle="tooltip" data-bs-placement="top" title="Veuillez saisir votre prenom!">
   
  </div>
 
  <div class="mb-3">
    <input  type="email"placeholder="Email" required name="mail" id="mail" class="form-control" id="exampleInputPassword1" data-bs-toggle="tooltip" data-bs-placement="top" title="Veuillez saisir votre mail qui doit comporte @!">
    
  </div>
  <div class="mb-3">
    <input  type="text" placeholder="Telephone" maxlength="8" minlength="8" pattern="[0-9]{8}" required name="tel" id="tel" class="form-control" id="exampleInputPassword1" data-bs-toggle="tooltip" data-bs-placement="top" title="Veuillez saisir ton numero valid de 8 chiffres!">
   
  </div>

 <div class="mb-3">
    <input type="password" placeholder="Entrer mot de passe" minlength="6" maxlength="8" required  pattern="[A-Z][a-z 0-9]+"  name="mdp" id="mdp"  class="form-control" id="exampleInputPassword1" data-bs-toggle="tooltip" data-bs-placement="top" title="Veuillez saisir votre mot de passe qui doit etre composee d'une lettre majuscule des lettres  miniscules et au mois un chiffre chiffre de longeur max 8 et min 6 !">
   <span style="color:white">Votre mot de passe doit comporter entre 6 et 8 caracteres et doit commancer par une lettre Majuscule suivie par des chiffres et des lettres miniscules ! </span>
    

  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" required class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">J'accepte les termes et les  conditions</label>
  </div>
  <button type="submit" class="mybtn" onclick="verifinscrit()" id="submit">S'INSCRIR</button>
 
</form>
 <label class="form-check-label" id="cheks" for="exampleCheck1">Avez-vous deja un compte </label>
 <a href="connexion.php" style="text-decoration: none;"> <button type="submit" class="mybtn" onclick="return verifinscrit() " >CONNECTER</button></a>
		</div>
	</div>

    
   <?php 
echo"        
<script>
function verifinscrit(){
	if(ADDVisiteur($_POST)){
	alert('INSCRIPTION REUSSITE !');	
	}else{
		alert('INSCRIPTION ECHOUE !');	
	}
}
</script>";




    ?>
     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="js1/script.js"></script>
	</body>
	</html>