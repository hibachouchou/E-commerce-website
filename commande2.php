<?php

session_start();
include "functions.php";
//test user connectee

if(!$_SESSION['username']) {//user non connectee ou non validee

    header('location:inscrit.php'); //redirection vers page login
}else{

//1-creation de panier


  // 2-Connection vers la BD
  
   $conn=connect();

 //3-recuperation des donnees
  if(isset($_POST["prod1"])){
      $IDP=$_POST['prod1'];
      $QTTP=$_POST['qtt1'];
    
    
  }
 
if($QTTP>0){

 
   // 4-creation de la requette 
   $requete=$conn->prepare("SELECT * FROM produit WHERE id_p='$IDP'  ;") ;
   //5-execution de la requette
   $resultat= $requete->execute();
   //resultat
   $produit=$requete->fetch();
   
  

   $promo=$produit['promo'];
   if($promo==1){
  $total= $QTTP *($produit['new_price']) ;}
  else{
   $total= $QTTP *($produit['prix']) ; 
  }

  $visiteur=$_SESSION['id_user'];

//requete panier

if(!isset($_SESSION['panier'])){//panier n'existe pas
$_SESSION['panier']=array($visiteur,0,array()); //creation panier
}
$_SESSION['panier'][1]=$total+($_SESSION['panier'][1]);
$_SESSION['panier'][3][]=array($IDP,$QTTP,$total);







header('location: '.$_SERVER["HTTP_REFERER"]); //redirection vers page panier
}
else{
    echo "La quantite doit etre une valeur positive !";
}

}
  


    




?>


