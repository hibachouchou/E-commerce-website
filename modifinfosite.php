<?php

session_start();

 //1-recuperation des donnees
 //effacer les espaces 
  if(isset($_POST["tel"])){
     $tel =trim($_POST['tel']);
     $mail= $_POST['mail'];
     $face=trim($_POST['fb']);
     $insa=trim($_POST['insta']);
     $adrr =trim($_POST['adr']);
     $propos =trim($_POST['propos']);

//filtrer les donnée 
$TEL=filter_var($tel,FILTER_SANITIZE_NUMBER_INT);
$ADR=filter_var($adrr,FILTER_SANITIZE_STRING);
$MAIL=filter_var($mail,FILTER_SANITIZE_EMAIL);
$PROPOS=filter_var($propos,FILTER_SANITIZE_STRING);
$INSTA=filter_var($insa,FILTER_SANITIZE_STRING);
$FB=filter_var($face,FILTER_SANITIZE_STRING);
}
   // 2-Connection vers la BD
   include "functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("UPDATE `e-commerce`.`infosite` SET `telephone` = '$TEL',`email` = '$MAIL',`facebook` = '$PWD',`adrss` = '$ADR',`insta` = '$INSTA',`propos` = '$PROPOS'  LIMIT 1 ;") ;
   //4-execution de la requette
 $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){
  header('location:admin/settingadmin.php?modif=ok'); //redirection vers page principale
}

?>