<?php

//echo "ID DE CATHEGTHORIE EGALE"." ".$_GET['id'];

$Prod=$_GET['id_p'];
  // 1-Connection vers la BD
include "../functions.php";
$conn=connect();

    // 2-creation de la requette 
     $requete=$conn->prepare("DELETE FROM  produit  WHERE id_p='$Prod'") ;
     //3-execution de la requette
    $resultat= $requete->execute();
   //4-resultat de la requette
if($resultat){
    header('location:../admin/allproduits.php?page=1?delete=ok'); //redirection vers page famille
}
  


?>