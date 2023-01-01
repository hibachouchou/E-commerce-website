<?php

session_start();

 //1-recuperation des donnees
  if(isset($_POST["idcm"])){
     $idfm=trim($_POST['idcm']);
      $IDFM=filter_var($idfm,FILTER_SANITIZE_NUMBER_INT);
      $NOMFM=$_POST['nomcm'];
      $DESCFM=$_POST['desccm'];
      $FAMC=$_POST['famc'];
      $CSSCLASS=$_POST['classcathm'];
      $CSSID=$_POST['idcsscm'];
  }
   // 2-Connection vers la BD
   include "../functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("UPDATE `e-commerce`.`categorie` SET `nom_cat` = '$NOMFM',`desc_cat` = '$DESCFM', `famille`='$FAMC' ,`classc` = '$CSSCLASS',`idclassc` = '$CSSID' WHERE `categorie`.`id_cat` = $IDFM LIMIT 1 ; ") ;
   //4-execution de la requette
 $resultat=$requete->execute();
//5-resultat de la requette

if($resultat){
  header('location:../admin/cathegories.php?page=1?modif=ok'); //redirection vers page famille
}







?>


