<?php

session_start();

 //1-recuperation des donnees
 //effacer les espaces 
  if(isset($_POST["myid"])){
     $myid =trim($_POST['myid']);
      $MYNAME=$_POST['myname'];
      $MYPN=$_POST['mypn'];
     $mymail  =trim($_POST['mymail']);
     $tel =trim($_POST['mytel']);
     $pwd =trim($_POST['mypwd']);

//filtrer les donnée 

$MYID=filter_var($myid,FILTER_SANITIZE_NUMBER_FLOAT);
$MYMAIL=filter_var($mymail,FILTER_SANITIZE_EMAIL);
$MYTEL =  filter_var($tel ,FILTER_SANITIZE_NUMBER_FLOAT);  
$MYPWD=filter_var($pwd,FILTER_SANITIZE_STRING);
}
   // 2-Connection vers la BD
   include "functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("UPDATE `e-commerce`.`visiteur` SET `username` = '$MYNAME', `prenom`='$MYPN' ,`user_mail` = '$MYMAIL', `telephone`='$MYTEL' ,`pwd` = '$MYPWD' WHERE `visiteur`.`id_user` = $MYID LIMIT 1 ; ") ;
   //4-execution de la requette
 $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){
    $_SESSION['user_mail']=$MYMAIL ;
    $_SESSION['pwd']=$MYPWD ;
    $_SESSION['username']=$MYNAME ;
    $_SESSION['prenom']=$MYPN ;
    $_SESSION['telephone']=$MYTEL ;
  header('location:info.php?modif=ok'); //redirection vers page infopersonelle
}

?>