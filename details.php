<?php

session_start();
include "functions.php";

$panier=$_GET['id'];
   $commande =getAllCommandes();

$produit=getAllProduits();
?>

<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>COMMANDES CLIENT</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
        *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
    .table{
        margin-top:70px;
        margin-left:80px;
        width:1200px
    }
    h2{
        margin-top:80px;
        margin-left:300px;
        color:green;
        text-decoration: underline;
    }
    button{
        margin:5px;
    }

   
    
    #cssstyle{
      margin:10px;
      border: solid 1px black;
      padding:7px;
    }
</style>

<!---->
</head>
<body>








    


<h2>COMMANDES CLIENT</h2>


<section>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID COMMANDE</th>
       <th scope="col">ID PRODUIT</th>
      <th scope="col"> PRODUIT</th>
      <th scope="col">IMAGE PRODUIT</th>
      <th scope="col"> QUANTITE</th>
      <th scope="col">TOTAL</th>
    </tr>
  </thead>
  <tbody>  

  <?php
 
foreach($commande as  $cmd){
 if($cmd['panier']==$panier){
    echo " <tr>
    <th scope='row'>".$cmd['id_cmd']."</th>
    <td>".$cmd['produit_c']."</td>
   ";
    foreach($produit as $index=>$prod){
        if($cmd['produit_c']==$prod['id_p']){
       echo " <td>".$prod['nom_p']."</td>
       <td><img src="."img/produits/".$prod['image_p']." width='100px;' ></td>";}
    }echo"
       <td>".$cmd['qte']."</td>
       <td>".$cmd['total']." DT</td>
       ";
        }}
       ?>
 

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
  </body>
  </html>