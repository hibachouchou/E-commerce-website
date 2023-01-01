<?php

//echo "ID DE CATHEGTHORIE EGALE"." ".$_GET['id'];

session_start();


$CMD=$_GET['id'];
  // 1-Connection vers la BD
//include "functions.php";
//$conn=connect();


$diminiuer_total=$_SESSION['panier'][3][$CMD][2];
$_SESSION['panier'][1]-=$diminiuer_total;
//if(empty($_SESSION['panier'][3])){
 // $_SESSION['panier'][1]=0; 
//}
    unset($_SESSION['panier'][3][$CMD]);
header('location:cart.php');
?>