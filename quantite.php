<?php

session_start();
//test user connectee

if(!$_SESSION['username']) {//user non connectee ou non validee

    header('location:inscrit.php'); //redirection vers page login
}else{

//1-creation de panier


  // 2-Connection vers la BD
   include "functions.php";
   $conn=connect();

 //3-recuperation des donnees
  if(isset($_POST["plus"])){

   
  }
  header('location: '.$_SERVER["HTTP_REFERER"]); //redirection vers page panier
}





?>