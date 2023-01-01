<?php

include "functions.php";
session_start();
$newproduits=getAllNewsProducts();
$marque=getAllMarques();
$stock=getStockProduits();
$cordsite=AfficherCordSite();
$page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);

 
 if(isset($page)&&(!empty($page))&&($page>0)){
    //pagination
 //1-connection de la base donnee
 $conn=connect();
 //2-nombre d'element par page 
 $results=10;
 //3-les nombres de produits dans la base
  $page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
 $nbrresults=$conn->prepare("SELECT * FROM produit WHERE new=1 ");
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
 $resultspg=$conn->prepare("SELECT * FROM produit WHERE new=1 LIMIT ".$results."  OFFSET  ".($page-1)* $results);
 $resultspg->execute();
 }else{
    header("location:newss.php?page=1");
 }
?>

<!Doctype html>
	<html>
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
		<title>MHD PARA NEWS</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <style>
          *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
.pct{
  font-size:20px;
  color: green;
}
.promo{
  padding-left: 0px;
  font-size: 20px;
  color: green;
}
.alert{
      margin:40px;
    }  
    
  @media screen and (max-width:920px) {

*{
	margin: 0;
	padding: 0;
	font-family: cursive;
   }
   #pr{

   }
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


 <!--4th section-->
<section id="produit1" class="section-p1">
<div class="title-box">
    <h2>NOUVEAU ARRIVAGE</h2>
   
    </div><?php 
    
    if(isset($page)&&(!empty($page))&&($page>0) ) {    ?>
    <div class="pro-container"> 
    <?php
foreach($resultspg as $newp){ ?>
<?php
  if($newp['promo']==0){
    echo "  <div class='pro'>
    <button type='button' class='btn btn-outline-warning'>NEW</button>
    <img src="."img/produits/".$newp['image_p']." alt=''>
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
       if($newp['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
       }}
       foreach($stock as $index=>$st){
        if($newp['id_p']==$st['produit']){
        if($st['qantite']==0){
      echo " <br><button type='button' class='btn btn-outline-danger'>HORS STOCK</button>" ;
        }}}
  echo "</span>
    <h4>".$newp['nom_p']."</h4>
   
    <h5 style='color:black;'>".$newp['prix']." DT TTC</h5></div>
    <form action='commande.php' method='POST'>
    <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
    <input type='hidden' value='".$newp['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
    <div>
    <button type='submit' class='cart2'";?><?php  foreach($stock as $index=>$st){
      if($newp['id_p']==$st['produit']){
      if($st['qantite']==0){
    echo "disabled" ;
      }}}?><?php  echo" > <i class='fas fa-shopping-cart'></i></button>
     <a href='produit.php?id=".$newp['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
     </div>
  </form></div>";
}
  if($newp['promo']==1){
    echo "  <div class='pro'>
    <button type='button' class='btn btn-outline-warning'>NEW</button>
    <button type='button' class='btn btn-outline-success'>- ".$newp['pct_promo']." %</button>
    <img src="."img/produits/".$newp['image_p']." alt=''>
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
   if($newp['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
   }}
   foreach($stock as $index=>$st){
    if($newp['id_p']==$st['produit']){
    if($st['qantite']==0){
  echo " <br><button type='button' class='btn btn-outline-danger'>HORS STOCK</button>" ;
    }}}
    
    echo "</span>
    <h4>".$newp['nom_p']."</h4>
    <h5 style='color:black;'><del>".$newp['prix']." DT TTC</del></h5>
    <h5 style='color:gray;'>".$newp['new_price']." DT TTC</h5>
    </div>
    <form action='commande.php' method='POST'>
    <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
    <input type='hidden' value='".$newp['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
    <div>
    <button type='submit' class='cart2'";?><?php  foreach($stock as $index=>$st){
      if($newp['id_p']==$st['produit']){
      if($st['qantite']==0){
    echo "disabled" ;
      }}}?><?php  echo" > <i class='fas fa-shopping-cart'></i></button>
     <a href='produit.php?id=".$newp['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
     </div>
  </form></div>";
}?>

<?php }   ?>
       
    </div>
    </section>

<!--Pagination-->
<div class="pge">
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-begin"> <?php 
  if($page>1){echo"  <li class='page-item '>
    <a class='page-link' href='newss.php?page=".($page-1)."'>Precidant</a></li>";}else{
    echo"  <li class='page-item disabled'>
    <a class='page-link' disabled href='#'>Precidant</a></li>";
  }
          ?>
  <?php  //creation des pages de pagination
 
   for($count=1;$count<=$totalpages;$count++){
     //-8 la page active
if($page==$count){
  echo "   <li class='page-item active'><a class='page-link' href='newss.php?page=".$count."'>".$count."</a></li>
";
}else{
echo "  
<li class='page-item'><a class='page-link' href='newss.php?page=".$count."'>".$count."</a></li> 
";
 
 }  }    ?><?php echo" <li class='page-item'>
 <a class='page-link' href='newss.php?page=".($page+1)."'>Suivant</a>
</li>";      ?>
 </ul>
 </nav>
 </div>
 </div>
 
 <?php } ?>
</div>
  <!--footer section-->
  <?php

include"footer.php";



?>
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="script.js"></script>
        </body>
        </html>