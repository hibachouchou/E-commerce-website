<?php

session_start();
include "functions.php";
$cordsite=AfficherCordSite();

?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CONTACT MHD PARA</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.article{
              padding: 0px;
                margin-top: 60px;
                margin-left: 250px;
                width:900px;
                padding-bottom: 80px;
            }
            .article img{
              height: 500px;
            }
            .article i{
                font-size: 55px;
                color: green;
                margin-left: 170px;
            }
            .contact{
                padding-top: 40px;
                padding-bottom: 40px;
            }
            @media screen and (max-width:920px) {
             
              .article{
              padding: 0px;
                margin-top: 30px;
                margin-left: 10px;
                width:350px;
                padding-bottom: 40px;
            }
            .article img{
              height: 300px;
            }
            .article i{
                font-size: 35px;
                color: green;
                margin-left: 50px;
            }
            .contact{
                padding-top: 40px;
                padding-bottom: 40px;
            }
*{
  padding: 0;
  margin: 0;
 
}

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
  <h2>CONTACT</h2>
  </div>
  </section>
  <section>
  <div class='article'><div class='card'>
  <div class='card-body'>
      <div class="contact">
      <ul>
   <li> <h4> TELEPHONE :     <?php echo $cordsite['telephone'] ;?></h4></li>
   <li>  <h4> ADRESSE:       <?php echo $cordsite['adrss'] ;?> </h4></li>
   <li>  <h4> EMAIL:          <?php echo $cordsite['email'] ;?></h4></li>
  </div>
</ul>
    <p class='card-text'></p>
        <a href="<?php echo $cordsite['facebook'] ;?>"><i class="fab fa-facebook-f"></i></a>
        <a href="<?php echo $cordsite['insta'] ;?>"> <i class="fab fa-instagram"></i></a>
        <a href="mailto:<?php echo $cordsite['email'] ;?>"><i class="fas fa-envelope"></i></a>
  </div>
  <img src="img/Marque/logo.jpg" class='card-img-bottom' >
</div></div>  
  </section>



  
  <!--footer section-->

    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="script.js"></script>
      </body>
      </html>