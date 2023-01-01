<?php

session_start();

 //1-recuperation des donnees
  if(isset($_POST["idart"])){
     $idart=trim($_POST['idart']);
      $IDART=filter_var($idart,FILTER_SANITIZE_NUMBER_INT);
      $TITART=$_POST['titart'];
      $CTNART=$_POST['ctart'];
    
     
  }




//Secure Upload Files
//1-rename files Completly 
//2-check files extension 
if($_SERVER['REQUEST_METHOD']== 'POST'):
  $imgname=$_FILES["imgart"]["name"];
  $imgsize=$_FILES["imgart"]["size"];
  $imgtemp=$_FILES["imgart"]["tmp_name"];
  $imgtype=$_FILES["imgart"]["type"];
  $imgextens=end(explode('.',$imgname));
  $image=rand(0,100000).'.'.$imgextens;
  $allowedextens=array('jpg','gif','png','jpeg','webp');
  //3-Allowed Mime Type
  //4-Check files size
  if(in_array($imgextens,$allowedextens)):
  
if($imgsize > (108*1920)){
  echo "Image is TOO LARGE!" ;}
else{
//upload image 
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["imgart"]["name"]);

if (move_uploaded_file($_FILES["imgart"]["tmp_name"], $target_file)) {
  
  $IMGART=$_FILES["imgart"]["name"];
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
   $requete=$conn->prepare("INSERT INTO `e-commerce`.`article` (`id_art` ,`titre` , `contenu`, `image_art` ) VALUES ( '$IDART' , '$TITART', '$CTNART','$IMGART' );") ;
  
   //4-execution de la requette
 $resultat=$requete->execute();

//5-resultat de la requette
if($resultat){
 


    header('location:../admin/articles.php?ajout=ok'); //redirection vers page produit
 }
 

 






?>


