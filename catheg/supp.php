<?php


$Cathg=$_GET['id'];
  // 1-Connection vers la BD
include "../functions.php";
$conn=connect();

    // 2-creation de la requette 
     $requete=$conn->prepare("DELETE FROM categorie WHERE id_cat='$Cathg'") ;
     //3-execution de la requette
    $resultat=$requete->execute();
   //4-resultat de la requette
if($resultat){
    header('location:../admin/cathegories.php?page=1?delete=ok'); //redirection vers page famille
}
  


?>