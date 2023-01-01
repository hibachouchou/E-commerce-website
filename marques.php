<?php

session_start();
include "functions.php";
$marque=getAllMarques();
$cordsite=AfficherCordSite();

$page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);

 
 if(isset($page)&&(!empty($page))&&($page>0)){
    //pagination
 //1-connection de la base donnee
 $conn=connect();
 //2-nombre d'element par page 
 $results=100;
 //3-les nombres de produits dans la base
  $page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
 $nbrresults=$conn->prepare("SELECT * FROM marque  ");
 $nbrresults->execute();
 $nbrresults=$nbrresults->rowCount();
 //4-nombre de ma page actuelle 
 if(!isset($page)){
  $page=1;

}else if($page){
  $page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
}

//5-determiner les pages avaibles
 $totalpages=ceil($nbrresults/$results);
 //6-
 //7-determiner sql limit starting
 $resultspg=$conn->prepare("SELECT * FROM marque  LIMIT ".$results."  OFFSET  ".($page-1)* $results);
 $resultspg->execute();
 }else{
  echo "ID INVALIDE !!";
}

?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MARQURES MHD PARA</title>
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
    .col{
       padding: 5px;
       
    }
    .row{
        margin:40px;
    }
    .card{
      padding-bottom: 10px;
    }
    .pge{
       margin-top: 20px;
      margin-bottom: 20px;
      margin-left: 20px;
   }
 
</style>
        
	</head>
	<body>
        <!--Nav section-->
        <?php

include"header.php";

?>
<section id="produit1" class="section-p1">
    <div class="title-box">
<h2>NOS MARQUES</h2>
</div>
</section>

  <section>
  <div class='row'>
 <?php
  if(isset($page)&&(!empty($page))&&($page>0) ) {    
 foreach($resultspg as $index=>$mq){
 echo"
  <div class='col-sm-3'>
    <div class='card'>
      <div class='card-body'>
       <img src="."img/Marque/".$mq['img_mq']." class='card-img-top' >
        <h3 class='card-title'>".$mq['nom_mq']."</h3>
      
      </div>
    </div>
  </div>
";}
?>
  </div>
  </section>

 
 <?php } ?>
 <!--Pagination-->
<div class="pge">
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-begin"> <?php 
  if($page>1){echo"  <li class='page-item '>
    <a class='page-link' href='marques.php?page=".($page-1)."'>Precidant</a></li>";}else{
    echo"  <li class='page-item disabled'>
    <a class='page-link' disabled href='#'>Precidant</a></li>";
  }
          ?>
  <?php  //creation des pages de pagination
 
   for($count=1;$count<=$totalpages;$count++){
     //-8 la page active
if($page==$count){
  echo "   <li class='page-item active'><a class='page-link' href='marques.php?page=".$count."'>".$count."</a></li>
";
}else{
echo "  
<li class='page-item'><a class='page-link' href='marques.php?page=".$count."'>".$count."</a></li> 
";
 
 }  }    ?><?php echo" <li class='page-item'>
 <a class='page-link' href='marques.php?page=".($page+1)."'>Suivant</a>
</li>";      ?>
 </ul>
 </nav>
 </div>
</div>


  
  <!--footer section-->
  <section id="ft">
<!--footer section-->
<footer  id="fot">
<div class="col">
    <a href="#"><img src="img/Marque/logo.jpg" class="logo" style="padding-left: 10%; margin-bottom: 30px;"></a> 
    <h4>CONTACT</h4><br>
   <p> <i class="fas fa-search-location"></i> <?php echo $cordsite['adrss'] ;?></p>
   <p> <i class="fas fa-phone-alt"></i>  <?php echo $cordsite['telephone'] ;?></p>
  <!-- <p> <i class="fas fa-tty"></i> </p>
    <p><i class="fas fa-mobile-alt"></i>  </p>-->
    <p><i class="fas fa-clock"></i> 8H-18H</p> 
<div class="follow">
    <h4>SUIVEZ-NOUS</h4>
    <div class="icone">
       <a href="<?php echo $cordsite['facebook'] ;?>"> <i class="fab fa-facebook-f"></i></a>
       <a href="<?php echo $cordsite['insta'] ;?>"> <i class="fab fa-instagram"></i></a>
       <a href="mailto:<?php echo $cordsite['email'] ;?>"> <i class="fas fa-envelope"></i></a>
    </div>
</div>
</div>

<div class="col">
    <h4>A PROPOS</h4>
    <a href="about.php">A propos de MHD PARA</a>
    <a href="livration.php">Information de livraison</a>
    <a href="droit.ph">Politique de confidentialite</a>
    <a href="termes et conditions">Termes et conditions</a>
    <a href="contact.php">Contactez-nous</a>
  
    
</div>   


<div class="col">
    <h4>MON COMPTE</h4>
    <a href="inscrit.php">S'identifier</a>
    <a href="cart.php">Voir le panier</a>
    <a href="cart.php">Suivre ma commande</a>
    <a href="help.php">Aide</a>
    <a href="deconnexion.php">Deconnexion</a>
 </div>

<div class="col cath">
    <h4>Paiement</h4>
    <div class="carta">
    <a href="#"><img src="img/master.png" alt=""></a>
   <a href="#"> <img src="img/edinar.jpg" alt=""></a>
    <a href="#"><img src="img/visa.png" alt=""></a>
</div>
</footer>
<footer  id="fot1">

<div class="col1">
    <div class="mhd">
    <i class="fas fa-shipping-fast"></i>
        <h4>LIVRAISON GRATUITES</h4>
        <h6>GRATUITE DES 99DT D'ACHAT</h6>
        <h6>En 24h a 48h dans toute la Tunisie</h6>
        </div>  
</div>
<div class="col1">
   <div class="mhd2">
        <i class="fas fa-clinic-medical"></i>
        <h4>PRODUITS AUTHENTIQUES</h4>
        <h6>Produits commercialises a 100%</h6>
        <h6>par des pharmacies Tunisiennes</h6>
        </div>
</div>
</div>
<div class="col1">
    <div class="mhd3">
        <i class="fas fa-check-circle"></i>
        <h4>DES GRANDES MARQUES</h4>
        <h6>Produits qui ont eu l'AMM aupres des autorites sanitaires</h6>  
</div>
</div>
</footer></section>
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="script.js"></script>
      </body>
      </html>