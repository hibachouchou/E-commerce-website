<?php
include "functions.php";
session_start();

$prod=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

$produit=getAllProduits();
if(isset($prod)&&(!empty($prod))){
    $product=getProduitByID($prod);
}

$marque=getAllMarques();
$cathegorie=getAllCathegories();
$famille=getAllFamilles();
$souscathegorie=getAllSOUSCATEHG();
$stock=getStockProduits();
$cordsite=AfficherCordSite();

?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Produit Details</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
           *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
   .small-img-group{
       display: flex;
       justify-content: space-between;
   }
       
.img-fluid{
    border: 1px solid black;
    width: 100%;

   } 
   .small-img-col{
       flex-basis: 24%;
       cursor: pointer;
       border: 1px solid black;
   }
   .sprod select{
       display: block;
       padding: 5px 10px;
   }
   .sprod input{
       width: 50px;
       height: 40px;
       padding-left: 10px;
       font-size: 16px;
       margin-right: 10px;
   }
   .sprod input:focus{
       outline: none;
   }
   .buy-btn{
       background-color: #045474;
       opacity: 1;
       transition: 0.2s;
   }
   .sprod #fix {
       display: flex;
       flex-wrap: wrap;
       justify-content: space-between;
   }
   .qt{
       margin-left: 80px;
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
.promo1{
  padding-left: 80px;
  font-size: 20px;
  color: green;
}
.alert{
      margin:40px;
    }
</style>
        
	</head>
	<body>
        <!--navbar section section-->
      <?php
include "header.php";
      ?>
      <?php if(isset($prod)&&(!empty($prod))){ ?>
<section id="path">
    
    <p><u>
   <a href="index.php?page=1"> ACCEUIL</a>/
   <?php foreach($famille as $index=>$fam){
         if($fam['id']==$product['id_fam']){
    echo  "<a href='family.php?id=".$fam['id']."&&page=1'>". $fam['nom']." </a>";
    
 
   } }
   ?>/
     <?php foreach($cathegorie as $index=>$cath){?><?php
       if($cath['id_cat']==$product['id_cat']){
           echo  "<a href='cathegory.php?id=";?><?php echo  $cath['id_cat'] ; ?><?php echo "&&page=1'>"; ?><?php echo $cath['nom_cat'] ;?><?php echo" </a>  ";?>
    
   <?php
       }
   
   }
    ?>
    /
      <?php foreach($souscathegorie as $index=>$souscathg){?><?php
       if($product['souscathg']==$souscathg['idscatheg']){
           echo  "<a href='souscat.php?id=";?><?php echo  $souscathg['idscatheg'] ; ?><?php echo "&&page=1'>"; ?><?php echo $souscathg['nomscathg'] ;?><?php echo" </a>  ";?>
    
   <?php
       }
   
   }
    ?>
  /
   <?php echo  "<a href='#' style='color:green;'>";  ?>
   <?php echo $product['nom_p'] ; ?><?php echo "</a>"; ?>
   </u></p>
   </section>
 



   <?php           
   if($product['promo']==0){ ?>
    <section class='container sprod my-5 pt-5'>
    <div id='fix'>
    <div class='row mt-5'>
        <div class='col-lg-5 col-md-12 col-12'>
            <img  class='img-fluid  pb-3' src='img/produits/<?php echo $product['image_p'] ; ?>'  alt=''>
           
        </div>
       
        <div class='col-lg-6 col-md-12 col-12'>
       
            <h2 class='py-4'><u><?php echo $product['nom_p']; ?></u></h2>   <?php   foreach($stock as $index=>$st){
     if($product['id_p']==$st['produit']){
       if($st['qantite']==0){
   echo "<h4 style='color:red;'>HORS STOCK</h4>" ;
     }}}                        ?><h4 style="color: grey;">(<?php    foreach($marque as $index=>$mq){
       if($product['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
       }}?>)</h4>
            <h3 style='color:black;'><?php echo $product['prix'] ; ?>  DT TTC</h3>
            <?php echo"
            <form action='commande2.php' method='POST'>
            <input type='number' value='1' class='qt' name='qtt1'><br><br>
            <input type='hidden' value='";?><?php echo  $product['id_p'] ;?><?php echo"'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod1' >
            <button type='submit' class='normal2'";?><?php  foreach($stock as $index=>$st){
              if($product['id_p']==$st['produit']){
              if($st['qantite']==0){
              echo"  disabled" ;
              }}}?><?php echo">Ajouter au Panier   <i class='fas fa-shopping-cart'></i></button>";?>
            <h4 class='mt-5 mb-5'>Details sur le Produits:</h4>
            <p><b>Description</b>
            <?php echo $product['desc_p'] ; ?> <br>
                <b>Conseils d'utilisation</b>
                <?php echo $product['desc2'] ; ?> .<br>
                
                <b>Composition</b>
                <?php echo $product['desc_f']; ?> </p>
        </div>
        </div>
    </div>
    </section>
    <?php           
  } ?>

<?php           
   if($product['promo']==1){ ?>
    <section class='container sprod my-5 pt-5'>
    <div id='fix'>
    <div class='row mt-5'>
        <div class='col-lg-5 col-md-12 col-12'>
            <img  class='img-fluid  pb-3' src='img/produits/<?php echo $product['image_p'] ; ?>'  alt=''>
           
        </div>
       
        <div class='col-lg-6 col-md-12 col-12'>
          
            <h2 class='py-4'><u><?php echo $product['nom_p']; ?></u></h2> <?php   foreach($stock as $index=>$st){
     if($product['id_p']==$st['produit']){
       if($st['qantite']==0){
   echo " <br><button type='button' class='btn btn-outline-danger'>HORS STOCK</button>" ;
     }}}                        ?><h4 style="color: grey;">(<?php   foreach($marque as $index=>$mq){
       if($product['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
       }}?>)</h4>
               <button type='button' class='btn btn-outline-success'>- <?php echo $product['pct_promo'] ;?> %</button> 
            <h5 style='color:gray;'><del><?php echo $product['prix']; ?> DT TTC</del></h5>
            <h3 style='color:black;'><?php echo $product['new_price'] ; ?>  DT TTC</h3>
            <?php echo"
            <form action='commande2.php' method='POST'>
            <input type='number' value='1' class='qt' name='qtt1'><br><br>
            <input type='hidden' value='";?><?php echo  $product['id_p'] ;?><?php echo"'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod1' >
            <button type='submit' class='normal2'";?><?php  foreach($stock as $index=>$st){
              if($product['id_p']==$st['produit']){
              if($st['qantite']==0){
           echo "disabled";
              }}}?><?php echo">Ajouter au Panier   <i class='fas fa-shopping-cart'></i></button>";?>
            <h4 class='mt-5 mb-5'>Details sur le Produits:</h4>
            <p><b>Description</b>
            <?php echo $product['desc_p'] ; ?> <br>
                <b>Conseils d'utilisation</b>
                <?php echo $product['desc2'] ; ?> .<br>
                
                <b>Composition</b>
                <?php echo $product['desc_f']; ?> </p>
        </div>
        </div>
    </div>
    </section>
    <?php           
  } ?>
<?php
if(isset($product['souscathg'])&&(!empty($product['souscathg']))){
  ?>

    <section id="produit1" class="section-p1">
        <div class="title-box3">
        <h2>AUTRES PRODUITS SIMILAIRES</h2>
      </div>
        <p></p>
        <div class="pro-container"> 
        </div>

  
<?php if(isset($prod)&&(!empty($prod))){
  if(isset($product['souscathg'])&&(!empty($product['souscathg']))){
$produits=getProduitByIDSOUSCath2($product['souscathg'],$prod);
}} ?>

<div class="pro-container"> 


<?php      
foreach($produits as $key=>$produit){
  
  if($key<3){
  if($produit['promo']==0){  echo"<div class='pro'>
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
   <form action='commande.php?id=".$produit['id_p']."' method='POST'>
   <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
   <input type='hidden' value='".$produit['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
   <div>
   <button ";?><?php  foreach($stock as $index=>$st){
    if($produit['id_p']==$st['produit']){
    if($st['qantite']==0){
  echo "disabled" ;
    }}}?><?php echo" type='submit' class='cart2' > <i class='fas fa-shopping-cart'></i></button>
    <a href='produit.php?id=".$produit['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
    </div>
 </form></div>";}
 ?> 

   <?php
       
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
    <form action='commande.php?id=".$produit['id_p']."' method='POST'>
    <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
    <input type='hidden' value='".$produit['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
    <div>
    <button type='submit' class='cart2'";?><?php  foreach($stock as $index=>$st){
      if($produit['id_p']==$st['produit']){
      if($st['qantite']==0){
    echo "disabled" ;
      }}}?><?php echo" > <i class='fas fa-shopping-cart'></i></button>
     <a href='produit.php?id=".$produit['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
     </div>
  </form></div>";
}}}
?>
   </div>


    </section>
   

   
    <?php }else{
  echo "ID Invalid !";
}  ?>

<?php  }else{
  echo "ID Invalid !";
}   ?>

<!--footer section-->

   <?php
   include "footer.php";
         ?>


    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="script.js"></script>
        </body>
        </html>