<?php
include "../functions.php";

if(!empty($_POST)){ //clicker sur le bouton connecter
    $admin = ConnectAdmin($_POST);
}


if($admin==true){ //utilisateur connectée

    session_start();
    $_SESSION['emai_ladmin']= $admin['emai_ladmin'];
    $_SESSION['mp']= $admin['mp'];
    $_SESSION['nom_admin']= $admin['nom_admin'];

    header('location:dashbord.php'); //redirection vers page profil
}
if(isset($_SESSION['nom_admin'])){//utilisateur connecté
    header('location:dashbord.php'); //redirection vers page profil
}



?>
<!DOCTYPE html>
<html lang="fr">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 13:36:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin Connexion</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../img/Marque/logo.jpg" >
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>CONNEXION ADMIN</h1>
								<p class="account-subtitle">Acceder a votre espace</p>
								
								<!-- Form -->
								<form method="POST">
									<div class="form-group">
										<input class="form-control" required type="text" placeholder="Email" name="mailad">
									</div>
									<div class="form-group">
										<input class="form-control"  required type="password" required minlength="6" maxlength="14"  pattern="[A-Z][a-z 0-9]+" placeholder="Mot de passe"  name="mpad">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">CONNECTER</button>
									</div>
								</form>
								<!-- /Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="../script.js"></script>
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 13:36:49 GMT -->
</html>