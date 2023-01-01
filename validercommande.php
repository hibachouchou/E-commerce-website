<?php

//echo "ID DE CATHEGTHORIE EGALE"." ".$_GET['id'];

$v=$_GET['id'];
  // 1-Connection vers la BD
include "functions.php";
$conn=connect();

    // 2-creation de la requette 
     $requete=$conn->prepare("UPDATE `e-commerce`.`panier` SET  `etat` = '1' WHERE `panier`.`id_panier` ='$v' LIMIT 1 ;") ;
     //3-execution de la requette
    $resultat=$requete->execute();
   //4-resultat de la requette
if($resultat){
    header('location:admin/gestionpanier.php?verif=ok'); //redirection vers page famille
}
  


?>