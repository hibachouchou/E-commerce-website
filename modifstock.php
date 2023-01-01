<?php

session_start();

 //1-recuperation des donnees
  if(isset($_POST["ids"])){
     $ids= trim($_POST['ids']);
      $IDS=filter_var($ids,FILTER_SANITIZE_NUMBER_INT);
      $PROD=$_POST['prod'];
      $qts=$_POST['qtts'];
      $QTS=filter_var($qts,FILTER_SANITIZE_NUMBER_INT);
  }
   // 2-Connection vers la BD
   include "functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("UPDATE `e-commerce`.`stock` SET `qantite` = '$QTS' WHERE `stock`.`id` = $IDS LIMIT 1 ; ") ;
   //4-execution de la requette
 $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){
  header('location:admin/stock.php?modif=ok'); //redirection vers page famille
}







?>


