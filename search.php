<?php

session_start();
include "functions.php";

if(!empty($_POST)){ //button search click
    $nomp=searchProduit($_POST['recherche']);
    }
    else{
    $nomp=getAllProduits();
    }


    $marque=getAllMarques();
    $stock=getStockProduits();

?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
	
		<title>MHD PARA</title>
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
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

include "header.php"

?>

<!--first section-->
<section id="produit1" class="section-p1">
   

<div class="pro-container"> 


<?php    

foreach($nomp as $key=> $rechp){?>

<?php 

  if($rechp['promo']==0){ 
     echo"<div class='pro'>
    <img src="."img/produits/".$rechp['image_p']." alt=''>
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
       if($rechp['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
       }}
    foreach($stock as $index=>$st){
      
     if($rechp['id_p']==$st['produit']){
       if($st['qantite']==0){
        echo " <br><button type='button' class='btn btn-outline-danger'>HORS STOCK</button>" ;
     }}}
    
   
 
  echo "</span>
    <h4>".$rechp['nom_p']."</h4>
   
    <h5 style='color:gray;'>".$rechp['prix']." DT TTC</h5>
   </div>
   <form action='commande.php?id=".$rechp['id_p']."' method='POST'>
   <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
   <input type='hidden' value='".$rechp['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
   <div>
   <button ";?><?php  foreach($stock as $index=>$st){
    if($rechp['id_p']==$st['produit']){
    if($st['qantite']==0){
  echo "disabled" ;
    }}}?><?php echo" type='submit' class='cart2' > <i class='fas fa-shopping-cart'></i></button>
    <a href='produit.php?id=".$rechp['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
    </div>
</form></div>";
}  


 if($rechp['promo']==1){
    echo "  <div class='pro'>
    <button type='button' class='btn btn-outline-success'>- ".$rechp['pct_promo']." %</button>
    <img src="."img/produits/".$rechp['image_p']." alt=''>
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
  if($rechp['marque']==$mq['id_mq']){
echo $mq['nom_mq'];
  }}
    foreach($stock as $index=>$st){
      if($rechp['id_p']==$st['produit']){
      if($st['qantite']==0){
        echo " <br><button type='button' class='btn btn-outline-danger'>HORS STOCK</button>" ;
      }}}
    


    
    echo "</span>
    <h4>".$rechp['nom_p']."</h4>
    <h5 style='color:gray;'><del>".$rechp['prix']." DT TTC</del></h5>
    <h5 style='color:black;'>".$rechp['new_price']." DT TTC</h5>
    </div>
    <form action='commande.php?id=".$rechp['id_p']."' method='POST'>
    <div ><input type='number' value='1'class='form-control w-25 pl-1' id='exampleInputPassword1' name='qtt' >
    <input type='hidden' value='".$rechp['id_p']."'class='form-control w-25 pl-1' id='exampleInputPassword1' name='prod' ></div>
    <div>
    <button type='submit' class='cart2'";?><?php  foreach($stock as $index=>$st){
      if($rechp['id_p']==$st['produit']){
      if($st['qantite']==0){
    echo "disabled" ;
      }}}?><?php echo" > <i class='fas fa-shopping-cart'></i></button>
     <a href='produit.php?id=".$rechp['id_p']."' class='cart1'><i class='fas fa-eye'></i></a>
     </div>
  </form></div>";
    }
?>
<?php
  
}


?>

</div>
</section>

<?php

include "footer.php";

?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>