<?php

session_start();

 //1-recuperation des donnees
 if(isset($_POST["idartm"])){
    $IDART=$_POST['idartm'];
    $TITART=$_POST['titrem'];
    $CTNART=$_POST['ctnartm'];
  
   
}



//Secure Upload Files
//1-rename files Completly 
//2-check files extension 
if($_SERVER['REQUEST_METHOD']== 'POST'):
  $imgname=$_FILES["imgartm"]["name"];
  $imgsize=$_FILES["imgartm"]["size"];
  $imgtemp=$_FILES["imgartm"]["tmp_name"];
  $imgtype=$_FILES["imgartm"]["type"];
  $imgextens=end(explode('.',$imgname));
  $image=rand(0,100000).'.'.$imgextens;
  $allowedextens=array('jpg','gif','png','jpeg','webp');
  //3-Allowed Mime Type
  //4-Check files size
  if(in_array($imgextens,$allowedextens)):
   // echo 'OK ! Extension Valide';
if($imgsize > (108*1920)){
  echo "Image is TOO LARGE!" ;}
else{
//upload image 
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["imgartm"]["name"]);

if (move_uploaded_file($_FILES["imgartm"]["tmp_name"], $target_file)) {
  
  $IMGART=$_FILES["imgartm"]["name"];
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
   $requete=$conn->prepare("UPDATE `e-commerce`.`article` SET `titre` = '$TITART',`contenu` = '$CTNART',`image_art` = '$IMGART' WHERE `article`.`id_art` =$IDART LIMIT 1 ;") ;
   //4-execution de la requette
 $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){

  
  header('location:../admin/articles.php?modif=ok'); //redirection vers page marque
}







    


?>


