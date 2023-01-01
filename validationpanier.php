<?php

session_start();
//test user connectee

if(!$_SESSION['username']){//user non connectee

    header('location:inscrit.php'); //redirection vers page login
}else{

//1-creation de panier


  // 2-Connection vers la BD
   include "functions.php";
   $conn=connect();



 if(empty($_SESSION['panier'][3])){
  header('location:cart.php'); //redirection vers page panier
 }


 
 

$visiteur=$_SESSION['id_user'];
 $commande=$_SESSION['panier'][3];
 $TOTAL=$_SESSION['panier'][1];
$datecourante=date("Y-m-d");

//requete panier
   $requete1=$conn->prepare("INSERT INTO `e-commerce`.`panier` ( `visiteur` ,`total`,`date_commande` ) VALUES ( '$visiteur', '$TOTAL','$datecourante' );");
//execusion requete
  $requete1->execute();
  $panier=$conn->lastInsertId();
//2 eme requette commande
foreach($commande as $index=>$cmd){
    $idp=$cmd[0];
    $qte=$cmd[1];
    $total=$cmd[2];
  $requete2=$conn->prepare("INSERT INTO `e-commerce`.`commande` ( `produit_c` , `qte` ,`panier` , `total` )VALUES ( '$idp', '$qte', '$panier', '$total' );");
  //-execution de la requette
$requete2->execute();  
}
$_SESSION['panier']=null;
$_SESSION['panier'][1]=0;

if(isset($_POST['idnum'])){
  $numid=$_POST['idnum'];
  $ad1=$_POST['sel'];
   $ad2=$_POST['del'];
   $ad3=$_POST['adrss'];
  $code=$_POST['post'];
  }

//requete panier
   $requete3=$conn->prepare("INSERT INTO `e-commerce`.`adressepanier` (`NumID` ,`panier` ,`province` , `delegation` ,`code postal` , `adresse` )VALUES ('$numid','$panier','$ad1','$ad2','$code','$ad3');");
//execusion requete

  $resulat3=$requete3->execute();

 if($resulat3){
   header('location:cart.php'); //redirection vers page panier  
 }

     


}
  







?>


