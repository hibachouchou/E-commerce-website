<?php

session_start();

 //1-recuperation des donnees
  if(isset($_POST["idp"])){
      $idp=trim($_POST['idp']);
      $IDP=filter_var($idp,FILTER_SANITIZE_NUMBER_INT);
      $NOMP=$_POST['nomp'];
      $MQ=$_POST['mc'];
      $DESCP=$_POST['descp'];
      $DESC2P=$_POST['desc2'];
      $DESC3P=$_POST['desc3'];
      $PRIXP=$_POST['prix'];
      $FAMP=$_POST['fam'];
      $CATHP=$_POST['cathg'];
      $SCATHP=$_POST['souscathg'];
      $PROMO=$_POST['promo'];
      $NEW=trim($_POST['new']);
      $QT=$_POST['qtt'];
      $NEWPRICE=$_POST['newprixpromo'];
      $PCTPROMO=$_POST['pct'];
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
if($_SERVER['REQUEST_METHOD']== 'POST'){
  $imgname=$_FILES["imgp"]["name"];
  $imgsize=$_FILES["imgp"]["size"];
  $imgtemp=$_FILES["imgp"]["tmp_name"];
  $imgtype=$_FILES["imgp"]["type"];
  $imgextens=end(explode('.',$imgname));
  $image=rand(0,100000).'.'.$imgextens;
  $allowedextens=array('jpg','gif','png','jpeg','webp');
  //3-Allowed Mime Type
  //4-Check files size
  if(in_array($imgextens,$allowedextens)){
  //  echo 'OK ! Extension Valide';
if($imgsize > (108*1920)){
  echo "Image is TOO LARGE!" ;}
else{
//upload image 
$target_dir = "../img/produits/";
$target_file = $target_dir . basename($_FILES["imgp"]["name"]);

if (move_uploaded_file($_FILES["imgp"]["tmp_name"], $target_file)) {
 // echo "The file ". htmlspecialchars( basename( $_FILES["imgp"]["name"])). " has been uploaded.";
  $IMGP=$_FILES["imgp"]["name"];
} else {
  echo "Sorry, there was an error uploading your file.";
}
}
  }}
 


   // 2-Connection vers la BD
   include "../functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("INSERT INTO `e-commerce`.`produit` ( `id_p` , `nom_p` ,`image_p` , `marque` , `desc_p` , `desc2` , `desc_f` ,`prix` , `id_cat` , `id_fam`, `souscathg`, `promo`, `new`, `new_price`, `pct_promo`)VALUES ('$IDP', '$NOMP', '$IMGP', '$MQ', '$DESCP', '$DESC2P', '$DESC3P', '$PRIXP', ' $CATHP', '$FAMP','$SCATHP','$PROMO',' $NEW','$NEWPRICE',' $PCTPROMO')") ;
  
   //4-execution de la requette
 $resultat=$requete->execute();

//5-resultat de la requette
if($resultat){
 
$prodid=$conn->lastInsertId();
$requete2=$conn->prepare("INSERT INTO `e-commerce`.`stock`(`produit`, `qantite`  ) VALUES ('$prodid','$QT') ;");
 $requete2->execute(); 
  header('location:../admin/allproduits.php?page=1?ajout=ok'); //redirection vers page produit
} else{
   echo "impossible d'ajouter le produit en stock";
 }


 






?>


