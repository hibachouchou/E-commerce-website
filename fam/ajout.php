<?php




session_start();

 //1-recuperation des donnees
  if(isset($_POST["idf"])){
      $idf=trim($_POST['idf']);
      $IDF=filter_var($idf,FILTER_SANITIZE_NUMBER_INT);
      $NOMF=$_POST['nomf'];
      $DESCF=$_POST['descf'];
      $CSSCLASS=$_POST['classfam'];
      $CSSID=$_POST['idcfam'];
      
  }
   // 2-Connection vers la BD
   include "../functions.php";
   $conn=connect();
   // 3-creation de la requette 
   $requete=$conn->prepare("INSERT INTO `e-commerce`.`famille`(`id`, `nom`, `desc`, `class`, `classid`) VALUES ('$IDF', '$NOMF', '$DESCF', '$CSSCLASS', '$CSSID');") ;
   
   //4-execution de la requette
   $resultat= $requete->execute();
//5-resultat de la requette

if($resultat){
  header('location:../admin/famille.php?page=1?ajout=ok'); //redirection vers page famille
}else{
  echo "Error d'insersion";
}






?>


