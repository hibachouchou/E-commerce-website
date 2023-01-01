<?php

session_start();
include "functions.php";
$cordsite=AfficherCordSite();

?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>A PROPOS MHD PARA</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.article{
               padding: 0px;
                margin-top: 60px;
                margin-left: 270px;
                width:900px;
                margin-bottom: 100px;
            }
            .article img{
              height: 500px;
            }
            
            @media screen and (max-width:950px) {

              .article{
               padding: 0px;
                margin-top: 30px;
                margin-left: 0px;
                width:350px;
                margin-bottom: 3px;
            }
            .article img{
              height: 200px;
            }
            #fot1  .mhd{

margin-left: 30px;
}
#fot1  .mhd2{

margin-left: 30px;
}
#fot1  .mhd3{

margin-left: 30px;
}
#fot  .col{

margin-left: 60px;
}

#fot .follow .icone{
padding-left: 85px;
}
.carta{
  padding-left: 5% ;
}

#ft{
margin-left: 30px;
}

*{
	margin: 0;
	padding: 0;

   }
}
            </style>
        
	</head>
	<body>
        <!--Nav section-->
 <?php

include "header.php";


?>

  <section>
  <div class='article'><div class='card'>
  <div class='card-body'>
    <h2 class='card-title'>A PROPOS :</h2>
    <p class='card-text'><?php echo $cordsite['propos'] ;?></p>
  </div>
  <img src="img/produits/produits.jpg" class='card-img-bottom' >
</div></div>  
  </section>



  
  <!--footer section-->
  <?php

include "footer.php";


?>
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="script.js"></script>
      </body>
      </html>