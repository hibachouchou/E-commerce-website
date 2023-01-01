<?php

session_start();

 //1-recuperation des donnees
  if(isset($_POST["idc"])){
     $idc=trim($_POST['idc']);
      $IDC=filter_var($idc,FILTER_SANITIZE_NUMBER_INT);
      $NOMC=$_POST['nomc'];
      $DESCC=$_POST['descc'];
      $F=$_POST['fam'];
      $CSSCLASS=$_POST['classcathg'];
      $CSSID=$_POST['idcss'];
  }
   // 2-Connection vers la BD
   include "../functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("INSERT INTO `e-commerce`.`categorie` (`id_cat` , `nom_cat` , `desc_cat` , `famille`,`classc` ,`idclassc` ) VALUES( '$IDC', '$NOMC', '$DESCC', '$F','$CSSCLASS','$CSSID');") ;
   //4-execution de la requette
   $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){
  header('location:../admin/cathegories.php?page=1?ajout=ok'); //redirection vers page famille
}
   







?>


