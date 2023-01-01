<?php
include "functions.php";


    // 1-Connection vers la BD
    $conn=connect();
    if(!empty($_POST["mail"])){
    if(isset($_POST["mail"])){
      $mail=trim($_POST['mail']);
       $EMAIL=filter_var($mail,FILTER_SANITIZE_EMAIL) ;
    } 
   
     // 2-creation de la requette 
     $requete=$conn->prepare("INSERT INTO `e-commerce`.`abonne` (`e-mail`) VALUES ('$EMAIL')") ;
     //3-execution de la requette
  $resultat=$requete->execute();
   //4-resultat de la requette
 // return $resultat;
    
  
  if($resultat){
    header('location:index.php?page=1');
  }
   
}

header('location:index.php?page=1');

?>