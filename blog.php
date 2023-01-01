<?php
session_start();
include "functions.php";
$cordsite=AfficherCordSite();
$article=getAllArticles();
$page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);

 
 if(isset($page)&&(!empty($page))&&($page>0)){
    //pagination
 //1-connection de la base donnee
 $conn=connect();
 //2-nombre d'element par page 
 $results=10;
 //3-les nombres de produits dans la base
  $page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
 $nbrresults=$conn->prepare("SELECT * FROM article  ");
 $nbrresults->execute();
 $nbrresults=$nbrresults->rowCount();
 //4-nombre de ma page actuelle 
 if(!isset($page)){
  $page=1;

}else if($page){
  $page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
}

//5-determiner les pages avaibles
 $totalpages=ceil($nbrresults/$results);
 //6-
 //7-determiner sql limit starting
 $resultspg=$conn->prepare("SELECT * FROM article   LIMIT ".$results."  OFFSET  ".($page-1)* $results);
 $resultspg->execute();
 }else{
  echo "ID INVALIDE !!";
}
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>BLOG MHD PARA</title>
     <meta name="viewport" content="width=device-width" initial-scale=1.0>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <style>
          /*             Respective Mobile Version                  */
            .article{
              padding: 0px;
                margin-top: 60px;
                margin-left: 50px;
                width:1200px;
            }
            .article img{
              height: 500px;
              margin-left: 10px;
              margin-bottom: 10px;
              padding-right: 20px;
            
            }
 @media screen and (max-width:920px) {
 /* blog d'articles*/
 .article{
  padding: 0px;
   margin-top: 20px;
   margin-left: 10px;
   width:400px;
}
.article img{
 height: 250px;
}
*{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
}
            .pge{
       margin-top: 20px;
      margin-bottom: 20px;
      margin-left: 20px;
   }

  
           
        </style>


	</head>
	<body>
        <!--Nav section-->
      <?php
include "header.php";

?>

<section id="produit1" class="section-p1">
    <div class="title-box">
<h2>NOS ARTICLES</h2>
</div>


  <section id="org" >
      
<?php
if(isset($page)&&(!empty($page))&&($page>0) ) { 
foreach($resultspg as $index=>$art){
  echo"<div class='article'><div class='card'>
  <div class='card-body'>
    <h2 class='card-title'>".$art['titre'].":</h2>
    <p class='card-text'>".$art['contenu']."</p>
  </div>
  <img src="."img/".$art['image_art']." class='card-img-bottom' >
</div></div>";
}

?>

  </section>

</section>

  <!--Pagination-->
<div class="pge">
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-begin"> <?php 
  if($page>1){echo"  <li class='page-item '>
    <a class='page-link' href='blog.php?page=".($page-1)."'>Precidant</a></li>";}else{
    echo"  <li class='page-item disabled'>
    <a class='page-link' disabled href='#'>Precidant</a></li>";
  }
          ?>
  <?php  //creation des pages de pagination
 
   for($count=1;$count<=$totalpages;$count++){
     //-8 la page active
if($page==$count){
  echo "   <li class='page-item active'><a class='page-link' href='blog.php?page=".$count."'>".$count."</a></li>
";
}else{
echo "  
<li class='page-item'><a class='page-link' href='blog.php?page=".$count."'>".$count."</a></li> 
";
 
 }  }    ?><?php echo" <li class='page-item'>
 <a class='page-link' href='blog.php?page=".($page+1)."'>Suivant</a>
</li>";      ?>
 </ul>
 </nav>
 </div>
 <?php } ?>
</div>

  
  <!--footer section-->
  
<!--footer section-->
<?php
include "footer.php";

?>
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="script.js"></script>
      </body>
      </html>