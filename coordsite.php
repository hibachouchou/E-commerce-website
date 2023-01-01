<?php

session_start();
include "functions.php";
$cordsite=AfficherCordSite();
?>

<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>INFOS SITE</title>
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
  
    #perso {
        margin-top:150px; 
        margin-left: 70px;
        margin-right: 70px;
        margin-bottom: 70px;
        border: solid 1px black ;
        padding: 30px; 
    }
   
    #perso .hh{
        margin-top:60px;
    }
    button{
        margin-left: 70px;
        margin-bottom: 30px;
    }
    .alert{
      margin:20px;
    }
    #B i{
      margin-top:0px;
      margin-left:20px;
      font-size:60px;
      color:black;
    }
    #bt{
    margin-left:600px;
    margin-top:0px;
}
</style>

	</head>
	<body>
                <!--Nav section-->

                <!--Nav section-->
                <section id="header">

                <a href="index.php?page=1"><img src="img/Marque/logo.jpg" class="logo" alt=""></a>
<div id="B">
<a href="DashbordAdmin.php"><i class="fas fa-chalkboard-teacher"></i></a></div>
  <div id="bt">
<a href=" deconnexion.php"><button  class="btn btn-success">DECONNEXION  <i class="fas fa-user-alt-slash"></i></button></a>
</div>



</section>
<!--first section-->
<section id="perso">
<h3><b><u> COORDONNES DE SITE:</u></b></h3>
<div class="hh">
<h3 style="color: green;">TELEPHONE:</h3> <h4> <?php echo $cordsite['telephone'] ;?></h4> 
<h3 style="color: green;">EMAIL: </h3> <h4>   <?php echo $cordsite['email'] ;?> </h4>
<h3 style="color: green;">FACEBOOK:  </h3> <h4>  <?php echo $cordsite['facebook'] ;?> </h4>
<h3 style="color: green;">INSTAGRAM: </h3> <h4>   <?php echo $cordsite['insta'] ;?> </h4>
<h3 style="color: green;">ADRESSE:</h3> <h4>    <?php echo $cordsite['adrss'] ;?> </h4>
<h3 style="color: green;">A PROPOS: </h3> <h4>   <?php echo $cordsite['propos'] ;?> </h4>
<a href="modifcord.php"><button type='button' class='btn btn-success' style="margin-top: 20px;" >MODIFIER</button></a>
</section>
</div>

</section>

<?php 
if  (isset($_GET['modif']) && $_GET['modif']=="ok"){
  echo "<div class='alert alert-warning'>
  Inforamtions modifiee avec success 
  </div>";
}
?>
<!--footer section-->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>






