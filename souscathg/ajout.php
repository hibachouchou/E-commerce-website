<?php

session_start();

 //1-recuperation des donnees
  if(isset($_POST["idsc"])){
      $idsc=trim($_POST['idsc']);
      $IDC=filter_var($idsc,FILTER_SANITIZE_NUMBER_INT);
      $NOMC=$_POST['nomsc'];
      $F=$_POST['fam1'];
      $CATHG=$_POST['cat1'];
    
  }
   // 2-Connection vers la BD
   include "../functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("INSERT INTO `e-commerce`.`souscatheg` (`idscatheg` , `nomscathg` , `family`,`catheg`  ) VALUES( '$IDC', '$NOMC', '$F','$CATHG')");
   //4-execution de la requette
   $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){
  header('location:../admin/souscatheg.php?page=1?ajout=ok'); //redirection vers page famille
}
   







?>


