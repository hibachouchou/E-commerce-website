<?php

function connect(){
 // 1-Connection vers la BD
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-commerce";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
} 
 return $conn ;
}


function getAllFamilles(){
    $conn=connect();
    // 2-creation de la requette 
    $requete=$conn->prepare("SELECT * FROM famille") ;
    //3-execution de la requette
   $requete->execute();
    //4-resultat de la requette
    $famille =$requete->fetchAll();
    //5-var_dump($product);
    return $famille ;
}

function getFamilleByID($idf){
   
  // 1-Connection vers la BD
  $conn=connect();
   // 2-creation de la requette 
   $requete=$conn->prepare("SELECT * FROM famille WHERE id=$idf") ;
    //3-execution de la requette
  $requete->execute();
  //
  //4-resultat de la requette
  $famille =$requete->fetch();
   //5-resultat
  return $famille ;

}


function getAllCathegories(){
  $conn=connect();
  // 2-creation de la requette 
  $requete=$conn->prepare("SELECT * FROM categorie") ;
  //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $cathegorie =$requete->fetchAll();
  //5-var_dump($product);
  return $cathegorie ;
}


function getCathegByIDFam($idfm){
   
  // 1-Connection vers la BD
  
   $conn=connect();
   // 2-creation de la requette 


   
   $requete=$conn->prepare("SELECT * FROM categorie INNER JOIN famille ON categorie.famille=famille.id WHERE famille=$idfm");
    //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $famillec =$requete->fetchAll();
   //5-resultat
  return $famillec ;
}
function getCathegoryByID($idc){
   
  // 1-Connection vers la BD
   $conn=connect();
    // 2-creation de la requette 
   $requete=$conn->prepare("SELECT * FROM categorie WHERE id_cat=$idc") ;
    //3-execution de la requette
 $requete->execute();
  //4-resultat de la requette
  $cathg=$requete->fetch();
   //5-resultat
  return $cathg ;
}


function getAllSOUSCATEHG(){
  // 1-Connection vers la BD
  $conn=connect();
  // 2-creation de la requette 
  $requete=$conn->prepare("SELECT * FROM souscatheg") ;
  //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $products =$requete->fetchAll();
  //5-resultat
  return $products ;
}
function getSOUSCathegByIDCat($idcat){
   
  // 1-Connection vers la BD
   // 1-Connection vers la BD
   $conn=connect();
   // 2-creation de la requette 
   $requete=$conn->prepare("SELECT * FROM souscatheg INNER JOIN categorie ON souscatheg.catheg=categorie.id_cat WHERE catheg=$idcat") ;
    //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $souscat =$requete->fetchAll();
   //5-resultat
  return $souscat ;
}
function getSOUSCATHGByID($idsc){
    // 1-Connection vers la BD
    $conn=connect();
   // 2-creation de la requette 
   $requete=$conn->prepare("SELECT * FROM souscatheg WHERE idscatheg=$idsc");
    //3-execution de la requette
 $requete->execute();
  //4-resultat de la requette
  $souscathg =$requete->fetch();
   //5-resultatg
  return $souscathg ;
}

function getAllProduits(){
    // 1-Connection vers la BD
    $conn=connect();
    // 2-creation de la requette 
    $requete=$conn->prepare("SELECT * FROM produit");
    //3-execution de la requette
    $requete->execute();
    //4-resultat de la requette
    $products =$requete->fetchAll();
    //5-resultat
    return $products ;
}


function getProduitByID($id){
   
      // 1-Connection vers la BD
      $conn=connect();
        // 2-creation de la requette 
     $requete=$conn->prepare("SELECT * FROM produit WHERE id_p=$id") ;
      //3-execution de la requette
  $requete->execute();
    //4-resultat de la requette
    $product =$requete->fetch();
     //5-resultat
    return $product ;
}
function getProduitByIDFam($idp1){
   
    // 1-Connection vers la BD
    $conn=connect();
      // 2-creation de la requette 
   $requete=$conn->prepare("SELECT * FROM  produit INNER JOIN famille ON produit.id_fam=famille.id WHERE id_fam=$idp1") ;
    //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $r1 =$requete->fetchAll();
   //5-resultat
  return $r1 ;
}

function getProduitByIDCath($idp2){
   
    // 1-Connection vers la BD
    $conn=connect();
   // 2-creation de la requette 
   $requete=$conn->prepare("SELECT * FROM  produit INNER JOIN categorie ON produit.id_cat=categorie.id_cat WHERE produit.id_cat=$idp2") ;
    //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $r2 =$requete->fetchAll();
   //5-resultat
  return $r2 ;
}
function getProduitByIDSOUSCath($idp3){
   
    // 1-Connection vers la BD
    $conn=connect();
   // 2-creation de la requette 
 
   $requete=$conn->prepare("SELECT * FROM  produit INNER JOIN  souscatheg ON produit.souscathg= souscatheg.idscatheg WHERE souscathg=$idp3") ;
    //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $r2 =$requete->fetchAll();
   //5-resultat
  return $r2 ;
 
}

function getAllPromoProducts(){
  // 1-Connection vers la BD
  $conn=connect();
  // 2-creation de la requette 
  $requete=$conn->prepare("SELECT * FROM produit WHERE promo=1") ;
  //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $promo =$requete->fetchAll();
  //5-resultat
  return $promo ;
}
function getAllNewsProducts(){
  // 1-Connection vers la BD
  $conn=connect();
  // 2-creation de la requette 
  $requete=$conn->prepare("SELECT * FROM produit WHERE new=1") ;
  //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $new =$requete->fetchAll();
  //5-resultat
  return $new ;


}
function getAllMarques(){
  // 1-Connection vers la BD
  $conn=connect();
  // 2-creation de la requette 
  $requete=$conn->prepare("SELECT * FROM marque") ;
  //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $marque =$requete->fetchAll();
  //5-resultat
  return $marque ;
}



function searchProduit($keyword){
   // 1-Connection vers la BD
    $conn=connect();
   // 2-creation de la requette 
   $requete=$conn->prepare("SELECT * FROM produit WHERE nom_p LIKE '%$keyword%'") ;
    //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $nomProd =$requete->fetchAll();
   //5-resultat
  return $nomProd ;
}
function ADDVisiteur($data){
    // 1-Connection vers la BD
    $conn=connect();
    if(isset($_POST["nom"])){
//supprimer les espaces 
$nom=$_POST['nom'];
$prenom=$_POST['pn'];
$mail=trim($_POST['mail']);
$numtel=trim($_POST['tel']);
$pass=trim($_POST['mdp']);
//filtrer les données pour eviter des valeurs de code 
     $NOM=filter_var($nom,FILTER_SANITIZE_STRING);
     $PN=filter_var($prenom,FILTER_SANITIZE_STRING);
     $MAIL=filter_var($mail,FILTER_SANITIZE_EMAIL) ;
     $TEL= filter_var($numtel,FILTER_SANITIZE_NUMBER_INT) ;
     $PWD=filter_var($pass,FILTER_SANITIZE_STRING) ;

     //hashage password
     //$hashpwd= crypt($PWD,PASSWORD_DEFAULT);
    }
  
     // 2-creation de la requette 
     $requete=$conn->prepare("INSERT INTO `e-commerce`.`visiteur` (`username` ,`prenom`, `user_mail` , `telephone` , `pwd`) VALUES ('$NOM','$PN','$MAIL','$TEL','$PWD')") ;
     //3-execution de la requette
   $resultat= $requete->execute();
   //4-resultat de la requette
  if($resultat){
    return true ;
      header('location:connexion.php');
  }else{
     return false ;
   }
    //5-resultat
  // return $ListeUser ;
   
   }
 
   
   function ConnectVisiteur($data){
    // 1-Connection vers la BD
    $conn=connect();
   // $visiteur=getAllClients();
    if(isset($_POST["email"])){

      $email=trim($_POST['email']);
      $pass=trim($_POST['passwd']);

        $EMAIL=filter_var($email,FILTER_SANITIZE_EMAIL);
        $MDP1=filter_var($pass,FILTER_SANITIZE_STRING);
        //$MDP=crypt($MDP1,PASSWORD_DEFAULT);


        //verification de password hashee
      //  $hashmdp= crypt($MDP,PASSWORD_DEFAULT);
       
     
           // 2-creation de la requette 
     $requete=$conn->prepare("SELECT * FROM visiteur WHERE user_mail='$EMAIL' AND pwd='$MDP1';");
     //3-execution de la requette
     $requete->execute();
   
   //4-resultat de la requette
   $user =$requete->fetch();
   //5-resultat
   return $user;
   //var_dump($user); 
        
      
    }
    
    
  
   

   
   }

   function ConnectAdmin($data){
    // 1-Connection vers la BD
    $conn=connect();
    if(isset($_POST["mailad"])){
       $email=trim($_POST['mailad']) ;
      $pass= trim($_POST['mpad']) ;
    }
      $EMAIL1=filter_var($email,FILTER_SANITIZE_EMAIL);
      $MDP1=filter_var($pass,FILTER_SANITIZE_STRING);
     // 2-creation de la requette 
     $requete=$conn->prepare("SELECT * FROM administrateur WHERE emai_ladmin='$EMAIL1' AND mp='$MDP1'") ;
     //3-execution de la requette
   $requete->execute();
   
   //4-resultat de la requette
   $admin =$requete->fetch();
   //5-resultat
   return $admin;
   //var_dump($user);

   
   }
   function getAllClientsNONVALIDE(){
    // 1-Connection vers la BD
    $conn=connect();
    // 2-creation de la requette 
    $requete= $conn->prepare("SELECT * FROM visiteur WHERE etat=0 ");
    //3-execution de la requette
    $requete->execute();
    //4-resultat de la requette
    $clients =$requete->fetchAll();
    //5-resultat
    return $clients ;
  }
  function getAllClients(){
    // 1-Connection vers la BD
    $conn=connect();
    // 2-creation de la requette 
    $requete= $conn->prepare("SELECT * FROM visiteur ");
    //3-execution de la requette
    $requete->execute();
    //4-resultat de la requette
    $clients =$requete->fetchAll();
    //5-resultat
    return $clients ;
  }
  function getStockProduits(){
    // 1-Connection vers la BD
    $conn=connect();
    // 2-creation de la requette 
    $requete=$conn->prepare("SELECT * FROM stock ") ;
    //3-execution de la requette
    $requete->execute();
    //4-resultat de la requette
    $clients =$requete->fetchAll();
    //5-resultat
    return $clients ;
  }

  function getAllAdresses(){
    // 1-Connection vers la BD
    $conn=connect();
    // 2-creation de la requette 
    $requete=$conn->prepare("SELECT * FROM adressepanier  ") ;
    //3-execution de la requette
    $requete->execute();
    //4-resultat de la requette
    $adresse =$requete->fetchAll();
    //5-resultat
    return $adresse ;
  }
  function AfficherCordSite(){
    // 1-Connection vers la BD
    $conn=connect();
    // 2-creation de la requette 
    $requete=$conn->prepare("SELECT * FROM infosite ") ;
    //3-execution de la requette
    $requete->execute();
    //4-resultat de la requette
    $site =$requete->fetch();
    //5-resultat
    return $site ;
  }




  function getAllCommandes(){
    // 1-Connection vers la BD
    $conn=connect();
    // 2-creation de la requette 
    $requete=$conn->prepare("SELECT * FROM commande  ") ;
    //3-execution de la requette
   $requete->execute();
    //4-resultat de la requette
    $com =$requete->fetchAll();
    //5-resultat
    return $com ;
  }
  


  function getAllComPanier(){
    // 1-Connection vers la BD
    $conn=connect();
    // 2-creation de la requette 
    $requete=$conn->prepare( "SELECT * FROM panier  WHERE etat=0");
    //3-execution de la requette
   $requete->execute();
    //4-resultat de la requette
    $com =$requete->fetchAll();
    //5-resultat
    return $com ;
  }
  function getPanierByID($idf){
   
    // 1-Connection vers la BD
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "e-commerce";
  try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
  } catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  }
     // 2-creation de la requette 
     
    
    
     $requete=$conn->prepare("SELECT * FROM panier WHERE id_panier=$idf") ;
      //3-execution de la requette
    $requete->execute();
    //
    //4-resultat de la requette
    $panier =$requete->fetch();
     //5-resultat
    return $panier ;
  
  }
  
function getAllArticles(){
    // 1-Connection vers la BD
    $conn=connect();
    // 2-creation de la requette 
    $requete=$conn->prepare("SELECT * FROM article  ") ;
    //3-execution de la requette
    $requete->execute();
    //4-resultat de la requette
    $article =$requete->fetchAll();
    //5-resultat
    return $article ;
}

function getAllAbonnes(){
  // 1-Connection vers la BD
  $conn=connect();
  // 2-creation de la requette 
  $requete= $conn->prepare("SELECT * FROM abonne  ");
  //3-execution de la requette
 $requete->execute();
  //4-resultat de la requette
  $ab =$requete->fetchAll();
  //5-resultat
  return $ab ;
}


function getData(){
$data=array();
$conn=connect();

$requete="SELECT COUNT(*) FROM  produit ;";
 $resultat=$conn->query($requete);
$nbprod=$resultat->fetch();

$requete1="SELECT COUNT(*) FROM  visiteur ;";
$resultat1=$conn->query($requete1);
$nbclient=$resultat1->fetch();

$requete2="SELECT COUNT(*) FROM  abonne ;" ;
$resultat2=$conn->query($requete2);
$nbabonne=$resultat2->fetch();

$requete3="SELECT COUNT(*) FROM  panier WHERE etat=0 ;";
$resultat3=$conn->query($requete3);
$nbpaniers=$resultat3->fetch();

$requete4="SELECT COUNT(*) FROM   panier WHERE etat=1 ;";
$resultat4=$conn->query($requete4);
$nbdelevery=$resultat4->fetch();

$data["produit"]=$nbprod[0];
$data["visiteur"]=$nbclient[0];
$data["abonne"]=$nbabonne[0];
$data["panier"]=$nbpaniers[0];
$data["panier2"]=$nbdelevery[0];

return $data;



}

function getProduitByIDSOUSCath2($idpp,$idpp2){
   
  // 1-Connection vers la BD
   // 1-Connection vers la BD
   $conn=connect();
   // 2-creation de la requette 
 
   $requete=$conn->prepare("SELECT * FROM  produit INNER JOIN  souscatheg ON produit.souscathg= souscatheg.idscatheg WHERE souscathg=$idpp AND id_p!=$idpp2 ") ;
    //3-execution de la requette
  $requete->execute();
  //4-resultat de la requette
  $r2 =$requete->fetchAll();
   //5-resultat
  return $r2 ;
 
}

?>