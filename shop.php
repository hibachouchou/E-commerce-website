<?php


include "functions.php";
session_start();
$produits=getAllProduits();
if(!empty($_POST)){ //button search click
    $nomp=searchProduit($_POST['recherche']);
    }
    else{
    $nomp=getAllProduits();
    }
$marque=getAllMarques();
$cordsite=AfficherCordSite();

$stock=getStockProduits();

$page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);

 
 if(isset($page)&&(!empty($page))&&($page>0)){
    //pagination
 //1-connection de la base donnee
 $conn=connect();
 //2-nombre d'element par page 
 $results=18;
 //3-les nombres de produits dans la base
  $page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
 $nbrresults=$conn->prepare("SELECT * FROM produit  ");
 $nbrresults->execute();
 $nbrresults=$nbrresults->rowCount();
 //4-nombre de ma page actuelle 
 if(!isset($page)){
  $page=1;

}else if($page){
  $page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
}

//5-determiner les pages avaibles
 $totalpages=ceil($nbrresults/$results);
 //6-
 //7-determiner sql limit starting
 $resultspg=$conn->prepare("SELECT * FROM produit LIMIT ".$results."  OFFSET  ".($page-1)* $results);
 $resultspg->execute();
 }else{
  echo "ID INVALIDE !!";
}

 

?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>BOUTIQUE MHD PARA</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
    *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
.promo{
  padding-left: 0px;
  font-size: 20px;
  color: green;
}
.alert{
      margin:40px;
    }
    .pag{
       margin-top: 120px;
      margin-bottom: 80px;
      margin-left: 60px;
     
      
   }
   .lien{
     font-size:20px;
     color:black;
     text-decoration: none;
     padding: 15px;
     border: 1px solid black;
     

   }
</style>
        
	</head>
  <body>
      <!--Nav section-->
<?php


include "header.php";


?>

  <section id="produit1" class="section-p1">
    <div class="title-box">
    <h2>NOS PRODUITS</h2>
    </div> <?php
    if(isset($page)&&(!empty($page))&&($page>0) ) {    ?>

    <div class="pro-container"> 
    <?php
foreach($resultspg as $produit){ 
  if($produit['promo']==0){
    echo "  <div class='pro'>
    <img src="."img/produits/".$produit['image_p']." alt=''>
     <div class='desc'>
        <div class='star'>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            </div>
    <span>";
    foreach($stock as $index=>$st){
      if($produit['id_p']==$st['produit']){
      if($st['qantite']==0){
    echo "<h4 style='color:red;'>HORS STOCK</h4>" ;
      }}}
    foreach($marque as $index=>$mq){
      if($produit['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
       }}
  echo "</span>
    <h4>".$produit['nom_p']."</h4>
   
    <h5>".$produit['prix']." DT TTC</h5>
    </div>
    <form action='commande.php' method='POST'>
    <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
    <input type='hidden' value='".$produit['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
    <div>
    <button type='submit' class='cart2' ";?><?php  foreach($stock as $index=>$st){
      if($produit['id_p']==$st['produit']){
      if($st['qantite']==0){
    echo "disabled" ;
      }}}?><?php  echo"> <i class='fas fa-shopping-cart'></i></button>
     <a href='produit.php?id=".$produit['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
     </div>
  </form></div>";
}

if($produit['promo']==1){
  echo "  <div class='pro'>
  <img src="."img/produits/".$produit['image_p']." alt=''>
   <div class='desc'>
      <div class='star'>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          </div>
  <span>";
 
  foreach($stock as $index=>$st){
    if($produit['id_p']==$st['produit']){
    if($st['qantite']==0){
  echo "<h4 style='color:red;'>HORS STOCK</h4>" ;
    }}}
foreach($marque as $index=>$mq){
 if($produit['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
 }}

  
  echo "</span>
  <h4>".$produit['nom_p']."</h4>
  <div class='promo'>-".$produit['pct_promo']."<i class='fas fa-percent' style=' font-size:20px; color: green;' ></i></div>
  <h5 style='color:red;'><del>".$produit['prix']." DT TTC</del></h5>
  <h5>".$produit['new_price']." DT TTC</h5>
  </div>
  <form action='commande.php' method='POST'>
  <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
  <input type='hidden' value='".$produit['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
  <div>
  <button type='submit' class='cart2'";?><?php  foreach($stock as $index=>$st){
    if($produit['id_p']==$st['produit']){
    if($st['qantite']==0){
  echo "disabled" ;
    }}}?><?php  echo" > <i class='fas fa-shopping-cart'></i></button>
   <a href='produit.php?id=".$produit['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
   </div>
</form></div>";
}}
     
  ?>    


    </div>
    </section>


    <div class="pag"> <?php 
  if($page>1){echo"<a style='color:green;' class='lien' href='shop.php?page=".($page-1)."'>PRECIDANTE</a>";}else{
    echo"<a style='color:green;' class='lien' disabled href='#'>PRECIDANTE</a>";
  }
          ?>
    
  <?php  //creation des pages de pagination
 
   for($count=1;$count<=$totalpages;$count++){
     //-8 la page active
if($page==$count){
  echo "
<a style='color:white;background-color: green;' class='lien' href='shop.php?page=".$count."'>".$count."</a>

";
}else{
echo "   
<a class='lien'href='shop.php?page=".$count."'>".$count."</a>

";
 
 }  }    ?><?php echo"<a style='color:green;' class='lien' href='shop.php?page=".($page+1)."'>SUIVANTE</a>";      ?>
 
  
 </div>
<?php

    }
?>

<!--footer section-->
<?php
include "footer.php";

?>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="script.js"></script>
      </body>
      </html>