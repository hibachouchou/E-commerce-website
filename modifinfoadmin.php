<?php

session_start();

 //1-recuperation des donnees
 //effacer les espaces 
  if(isset($_POST["myid"])){
     $myid =trim($_POST['myid']);
     $name= $_POST['myname'];
     $mymail  =trim($_POST['mymail']);
     $pwd =trim($_POST['mypwd']);
     $oldpwd=trim($_POST['oldpwd']);

//filtrer les donnée 
$NAME=filter_var($name,FILTER_SANITIZE_STRING);
$ID=filter_var($myid,FILTER_SANITIZE_NUMBER_INT);
$MAIL=filter_var($mymail,FILTER_SANITIZE_EMAIL);
$PWD=filter_var($pwd,FILTER_SANITIZE_STRING);
}

if($oldpwd==$_SESSION['mp']){
   // 2-Connection vers la BD
   include "functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("UPDATE `e-commerce`.`administrateur` SET `nom_admin` = '$NAME',`emai_ladmin` = '$MAIL',`mp` = '$PWD'  LIMIT 1 ;") ;
   //4-execution de la requette
 $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){
    $_SESSION['emai_ladmin']=$MAIL ;
    $_SESSION['mp']=$PWD ;
    $_SESSION['nom_admin']=$NAME ;
 header('location:admin/profil.php?modif=ok'); //redirection vers page infopersonelle
}else{
echo "mot de passe incorrecte !!! ";
header('location: '.$_SERVER["HTTP_REFERER"]); //redirection vers page profile
}
 
}
?>