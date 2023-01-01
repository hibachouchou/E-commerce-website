<?php
include "functions.php";


if(!empty($_POST)){ //clicker sur le bouton connecter
$user= ConnectVisiteur($_POST);
   
 }
if($user==true){ //utilisateur connectée

    session_start();
	  $_SESSION['id_user']= $user['id_user'];
    $_SESSION['user_mail']= $user['user_mail'];
    $_SESSION['pwd']= $user['pwd'];
    $_SESSION['username']= $user['username'];
    $_SESSION['prenom']= $user['prenom'];
    $_SESSION['telephone']= $user['telephone'];
    $_SESSION['etat']= $user['etat'];
    

    header('location:profil.php'); //redirection vers page profil
}
if(isset($_SESSION['username'])){//utilisateur connecté
    header('location:profil.php'); //redirection vers page profil
}
?>
	<!DOCTYPE html>
	<html>
	<head>
		
		<title>form de connexion</title>
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<style>
    h2{
        padding-left: 120px;
        padding-top: 10px;
		padding-bottom: 20px;
    }
    .her{
        width: 500px;
        margin-top: 220px;
        margin-left: 100px;
        background-color: transparent;
    }
    .ins{
	height: 100%;
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
#l{
  margin-left: 170px;
  padding-top: 60px;
}
@media screen and (max-width:920px) {
  h2{
        padding-left: 120px;
        padding-top: 10px;
		padding-bottom: 20px;
    }
    .her{
        width: 300px;
        margin-top: 250px;
        margin-left: 40px;
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
#l{
  margin-left: 60px;
  padding-top: 60px;
}
}

</style>
	</head>
	<body>
		<div class="ins">
<div  class="her">  

		<h2>CONNEXION</h2>
		
    <form action="connexion.php" method="POST">

  <div class="mb-3">
    <input  type="email"placeholder="Email" required name="email" class="form-control">
  </div>
 
 <div class="mb-3">
    <input type="password" placeholder="Entrer mot de passe" required name="passwd" minlength="6" maxlength="8" pattern="[A-Z][a-z 0-9]+"  class="form-control">
  </div>

  <button type="submit" class="mybtn" onclick="return verifcnx()" >CONNECTER</button>
</form>
<!--a id="l" style ="color:aliceblue;"href="forget.php">mot de passe oubliee ?</a-->
		</div>
	</div>

    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>