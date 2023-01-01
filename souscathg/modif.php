<?php

session_start();

 //1-recuperation des donnees
  if(isset($_POST["idscm"])){
     $idsc= trim($_POST['idscm']);
      $IDFM=filter_var($idsc,FILTER_SANITIZE_NUMBER_INT);
      $NOMFM=$_POST['nomsc'];
      $FAMC=$_POST['famsc'];
      $CATHEG=$_POST['cat'];
     
  }
   // 2-Connection vers la BD
   include "../functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare( "UPDATE `e-commerce`.`souscatheg` SET `nomscathg` = '$NOMFM', `family`='$FAMC' ,`catheg` = '$CATHEG' WHERE `souscatheg`.`idscatheg` = $IDFM LIMIT 1 ; ");
   //4-execution de la requette
 $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){
  header('location:../admin/souscatheg.php?page=1?modif=ok'); //redirection vers page famille
}







?>


