<?php

session_start();

 //1-recuperation des donnees
  if(isset($_POST["idfm"])){
      $idfm=trim($_POST['idfm']);
      $IDFM=filter_var($idfm,FILTER_SANITIZE_NUMBER_INT);
      $NOMFM=$_POST['nomfm'];
      $DESCFM=$_POST['descfm'];
      $CSSCLASS=$_POST['classfamm'];
      $CSSID=$_POST['idcfamm'];
  }
   // 2-Connection vers la BD
   include "../functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("UPDATE `e-commerce`.`famille` SET `nom` = '$NOMFM',`desc` = '$DESCFM' ,  `class` = '$CSSCLASS', `classid` = '$CSSID' WHERE `famille`.`id` = $IDFM  ; ") ;
   //4-execution de la requette
 $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){
  header('location:../admin/famille.php?page=1?modif=ok'); //redirection vers page famille
}







?>


