<?php

session_start();

 //1-recuperation des donnees
 if(isset($_POST["idmqm"])){
    $idm=trim($_POST['idmqm']);
    $IDM=filter_var($idm,FILTER_SANITIZE_NUMBER_INT);
    $nomm =$_POST['nommqm'];
   $NOMM=filter_var($nomm,FILTER_SANITIZE_STRING) ;
   
  }



//Secure Upload Files
//1-rename files Completly 
//2-check files extension 
if($_SERVER['REQUEST_METHOD']== 'POST'):
  $imgname=$_FILES["imgmqm"]["name"];
  $imgsize=$_FILES["imgmqm"]["size"];
  $imgtemp=$_FILES["imgmqm"]["tmp_name"];
  $imgtype=$_FILES["imgmqm"]["type"];
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
$target_dir = "../img/Marque/";
$target_file = $target_dir . basename($_FILES["imgmqm"]["name"]);

if (move_uploaded_file($_FILES["imgmqm"]["tmp_name"], $target_file)) {
  
  $IMGM=$_FILES["imgmqm"]["name"];
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
   $requete=$conn->prepare("UPDATE `e-commerce`.`marque` SET `nom_mq` = '$NOMM',`img_mq` = '$IMGM' WHERE `marque`.`id_mq` =$IDM LIMIT 1 ;") ;
   //4-execution de la requette
 $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){

  
  header('location:../admin/listesmarques.php?page=1?modif=ok'); //redirection vers page marque
}







    


?>


