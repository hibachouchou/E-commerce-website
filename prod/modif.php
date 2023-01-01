<?php

session_start();

 //1-recuperation des donnees
 if(isset($_POST["idpm"])){
    $idp=trim($_POST['idpm']);
    $IDP=filter_var($idp,FILTER_SANITIZE_NUMBER_INT);
    $NOMP=$_POST['nompm'];
    $MQ=$_POST['mqm'];
    $DESCP=$_POST['descpm'];
    $DESC2P=$_POST['desc2pm'];
    $DESC3P=$_POST['desc3pm'];
    $PRIXP=$_POST['prixpm'];

    $FAMP=$_POST['famm'];
    $CATHP=$_POST['cathgm'];
    $SCATHP=$_POST['scathgm'];
    $PROMO=$_POST['promom'];
    $NEW=$_POST['newm'];
    $NEWPRICE=$_POST['prixprom'];
    $PCTPROMO=$_POST['pctm'];

  }

  if($PROMO=="OUI"){
    $PROMO=1;
  }else{
    $PROMO=0;
  }
  if($NEW=="OUI"){
    $NEW=1;
  }else{
    $NEW=0;
  }
//Secure Upload Files
//1-rename files Completly 
//2-check files extension 
if($_SERVER['REQUEST_METHOD']== 'POST'):
  $imgname=$_FILES["imgpm"]["name"];
  $imgsize=$_FILES["imgpm"]["size"];
  $imgtemp=$_FILES["imgpm"]["tmp_name"];
  $imgtype=$_FILES["imgpm"]["type"];
  $imgextens=end(explode('.',$imgname));
  $image=rand(0,100000).'.'.$imgextens;
  $allowedextens=array('jpg','gif','png','jpeg','webp');
  //3-Allowed Mime Type
  //4-Check files size
  if(in_array($imgextens,$allowedextens)):
  //  echo 'OK ! Extension Valide';
if($imgsize > (108*1920)){
  echo "Image is TOO LARGE!" ;}
else{
//upload image 
$target_dir = "../img/produits/";
$target_file = $target_dir . basename($_FILES["imgpm"]["name"]);

if (move_uploaded_file($_FILES["imgpm"]["tmp_name"], $target_file)) {
  //echo "The file ". htmlspecialchars( basename( $_FILES["imgp"]["name"])). " has been uploaded.";
  $IMGP=$_FILES["imgpm"]["name"];
} else {
  echo "Sorry, there was an error uploading your file.";
}
}
endif;
endif;

   // 2-Connection vers la BD
   include "../functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("UPDATE `e-commerce`.`produit` SET `nom_p` = '$NOMP',`image_p` = '$IMGP',`marque` = '$MQ',`desc_p` = '$DESCP',`desc2` = '$DESC2P',`desc_f` = '$DESC3P',`prix` = '$PRIXP',`id_cat` = '$CATHP',`id_fam` = '$FAMP',`souscathg` = '$SCATHP',`promo` = '$PROMO',`new` = '$NEW',`pct_promo` = '$PCTPROMO',`new_price` = '$NEWPRICE'   WHERE `produit`.`id_p` =$IDP LIMIT 1 ;") ;
   //4-execution de la requette
 $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){

  
  header('location:../admin/allproduits.php?page=1?modif=ok'); //redirection vers page famille
}





    


?>


