<?php
session_start();


?>
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