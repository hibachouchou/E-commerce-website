<?php
include "functions.php";
session_start();

$prodid=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

if(isset($prodid)&&(!empty($prodid))){
   $produit=getProduitByIDSOUSCath($prodid);
}

$cathegorie=getAllCathegories();
$famille=getAllFamilles();
$souscathegorie=getAllSOUSCATEHG();

if(isset($prodid)&&(!empty($prodid))){
    $souscathg=getSOUSCATHGByID($prodid);
}
$marque=getAllMarques();
$stock=getStockProduits();
$cordsite=AfficherCordSite();
//pagination
$page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
if(isset($page)&&(!empty($page))&&($page>0)){
 //1-connection de la base donnee
 $conn=connect();
 //2-nombre d'element par page 
 $results=12;
 //3-les nombres de produits dans la base
  $page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
 $nbrresults=$conn->prepare("SELECT * FROM  produit INNER JOIN  souscatheg ON produit.souscathg= souscatheg.idscatheg WHERE souscathg=$prodid ");
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
$resultspg=$conn->prepare("SELECT * FROM  produit INNER JOIN  souscatheg ON produit.souscathg= souscatheg.idscatheg WHERE souscathg=$prodid LIMIT ".$results."  OFFSET  ".($page-1)* $results);
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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SOUS CATEGORIE<?php echo $souscathg['idscatheg'] ; ?> </title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width" initial-scale=1.0>
        <link rel="stylesheet" type="text/css" href="css/style.css">
     
     
     <style> 
     *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
     #space{
        margin-top:60px;
        margin-left:20px;
        margin-right:20px;
    }
    #space .row{
        margin: 20px;
        width:1400px;
        margin-left:150px;
        
       
    }
    .sc{
padding:5px;
    }
    #path{
        margin-top:50px;
        margin-left:20px;
    }
    #path a{
        text-decoration: none;
        color :black ;
    }
    .promo{
  padding-left: 0px;
  font-size: 20px;
  color: green;
}
.alert{
      margin:40px;
    }
    .pge{
       margin-top: 20px;
      margin-bottom: 20px;
      margin-left: 20px;
     
      
   }

        </style> 


	</head>
	<body>
        
        <!--Nav section-->
      <?php

include "header.php";
?>
<!--first section-->
<?php if(isset($prodid)&&(!empty($prodid))){ ?>

<section id="path">
    
 <p><u>
<a href="index.php?page=1"> ACCEUIL</a>/
<?php foreach($famille as $index=>$fam){?><?php
      if($fam['id']==$souscathg['family']){
 echo  "<a href='family.php?id=";?><?php echo $fam['id']  ;?><?php echo "&&page=1'>"; ?><?php echo $fam['nom'] ;?><?php echo" </a>";?> 
 
<?php
} }
?>
 
 /
  <?php foreach($cathegorie as $index=>$cath){?><?php
    if($cath['id_cat']==$souscathg['catheg']){
        echo  "<a href='cathegory.php?id=";?><?php echo  $cath['id_cat'] ; ?><?php echo "&&page=1'>"; ?><?php echo $cath['nom_cat'] ;?><?php echo" </a>  ";?>
 
<?php
    }

}
 ?>
/<?php echo  "<a href='#' style='color:green;'>";  ?>
<?php echo $souscathg['nomscathg'] ; ?><?php echo "</a>"; ?>
</u></p>
</section>
    <section id="produit1" class="section-p1">
        <div class="title-box">
            <h2>NOS PRODUITS</h2>
           </div>
      </section>
    


      <section id="produit1" class="section-p1">
      <div class="pro-container"> 
      <?php   if(isset($page)&&(!empty($page))&&($page>0) ) {   
foreach($resultspg as $prod){ 
    if($prod['promo']==0){
    echo "  <div class='pro'>
    <img src="."img/produits/".$prod['image_p']." alt=''>
     <div class='desc'>
        <div class='star'>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            </div>
    <span>";
   
   
foreach($marque as $index=>$mq){
   if($prod['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
   }}
 foreach($stock as $index=>$st){
      if($prod['id_p']==$st['produit']){
        if($st['qantite']==0){
    echo " <br><button type='button' class='btn btn-outline-danger'>HORS STOCK</button>";
      }}}
    
    echo "</span>
    <h4>".$prod['nom_p']."</h4>
   
    <h5 style='color:black;'>".$prod['prix']." DT TTC</h5>
    </div>
    <form action='commande.php' method='POST'>
    <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
    <input type='hidden' value='".$prod['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
    <div>
    <button type='submit' class='cart2'";?><?php  foreach($stock as $index=>$st){
      if($prod['id_p']==$st['produit']){
      if($st['qantite']==0){
    echo "disabled" ;
      }}}?><?php echo" > <i class='fas fa-shopping-cart'></i></button>
     <a href='produit.php?id=".$prod['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
     </div>
  </form></div>";
}


if($prod['promo']==1){
  echo "  <div class='pro'>
  <img src="."img/produits/".$prod['image_p']." alt=''>
   <div class='desc'>
      <div class='star'>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          </div>
  <span>";
 
 
foreach($marque as $index=>$mq){
 if($prod['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
 }}
 foreach($stock as $index=>$st){
    if($prod['id_p']==$st['produit']){
      if($st['qantite']==0){
  echo " <br><button type='button' class='btn btn-outline-danger'>HORS STOCK</button>";
    }}}
  
  echo "</span>
  <h4>".$prod['nom_p']."</h4>
  <div class='promo'>-".$prod['pct_promo']."<i class='fas fa-percent' style=' font-size:20px; color: green;' ></i></div>
  <h5 style='color:gray;'><del>".$prod['prix']." DT TTC</del></h5>
  <h5 style='color:black;'>".$prod['new_price']." DT TTC</h5>
  </div>
  <form action='commande.php' method='POST'>
  <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
  <input type='hidden' value='".$prod['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
  <div>
  <button type='submit' class='cart2'";?><?php  foreach($stock as $index=>$st){
    if($prod['id_p']==$st['produit']){
    if($st['qantite']==0){
  echo "disabled" ;
    }}}?><?php echo" > <i class='fas fa-shopping-cart'></i></button>
   <a href='produit.php?id=".$prod['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
   </div>
</form></div>";
}}
     
  ?> 
      </div>
      </section>
         
      <?php }else{
  echo "ID Invalid !";
}  ?>

<!--Pagination-->
<div class="pge">

 <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-begin"> <?php 
  if($page>1){echo"  <li class='page-item '>
    <a class='page-link' href='souscat.php?id=".$prodid."&&page=".($page-1)."'>Precidant</a></li>";}else{
    echo"  <li class='page-item disabled'>
    <a class='page-link' disabled href='#'>Precidant</a></li>";
  }
          ?>
    
  <?php  //creation des pages de pagination
 
   for($count=1;$count<=$totalpages;$count++){
     //-8 la page active
if($page==$count){
  echo "   <li class='page-item active'><a class='page-link' href='souscat.php?id=".$prodid."&&page=".$prodid."&&page=".$count."'>".$count."</a></li>
";
}else{
echo "  
<li class='page-item'><a class='page-link' href='souscat.php?id=".$prodid."&&page=".$count."'>".$count."</a></li> 
";
 
 }  }    ?><?php echo" <li class='page-item'>
 <a class='page-link' href='souscat.php?id=".$prodid."&&page=".($page+1)."'>Suivant</a>
</li>";      ?>
 </ul>
 </nav>
 </div>
 </div>
 <?php } ?>

 

      <!--footer section-->
     
     <?php

include "footer.php";
?>
        
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="script.js"></script>
            </body>
            </html>
        
        
        
        
       