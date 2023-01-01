<?php
include "functions.php";

if(!empty($_POST)){ //clicker sur le bouton connecter
    $admin = ConnectAdmin($_POST);
}


if($admin==true){ //utilisateur connectée

    session_start();
    $_SESSION['emai_ladmin']= $admin['emai_ladmin'];
    $_SESSION['mp']= $admin['mp'];
    $_SESSION['nom_admin']= $admin['nom_admin'];

    header('location:DashbordAdmin.php'); //redirection vers page profil
}
if(isset($_SESSION['nom_admin'])){//utilisateur connecté
    header('location:DashbordAdmin.php'); //redirection vers page profil
}




?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Admin connexion</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
    #myad{
        margin-top:150px;
        margin-left:450px;
    }
    #myad input{
        width:500px;
    }
    #myad button{
        margin-left:170px
    }
    #myad h2{
        padding-left:70px;
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
</style>

	</head>
	<body>

<section id="myad">
    <h2>CONNEXION ADMIN</h2>
<form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email: </label>
    <input type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mailad">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">Mot de passe:</label>
    <input type="password"  required minlength="6" maxlength="14"  pattern="[A-Z][a-z 0-9]+" class="form-control" id="exampleInputPassword1" name="mpad">
  </div>
  <button type="submit" class="btn btn-primary" onclick="verifadmin()">CONNECTER</button>
</form>

</section>


<?php
function verifadmin(){

if(($_SESSION['emai_ladmin'] ==true)&&($_SESSION['mp']==true)){
    echo "<script>
alert('COMPTE EXISTE !');
    </script>";
}else{
 
    echo "<script>
    alert('COORDONNEES INVALIDES !'); 
        </script>";
}

}

?>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
    </body>
	</html>