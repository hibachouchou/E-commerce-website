<?php

session_start();

?>

<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>MES INFOS PERSONELLES</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width" initial-scale=1.0>
<style>
    *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
  
    #perso {
        margin-top:0px; 
        border: solid 1px black ;
        padding: 30px; 
    }
   
    #perso .hh{
        margin-top:60px;
    }
    button{
        margin-left: 70px;
        margin-bottom: 30px;
    }
    .alert{
      margin:20px;
    }

    @media all and  (max-width:920px){

      #perso {
        margin-top:0px; 
        border: solid 1px black ;
        padding: 10px; 
    }

    }
</style>

	</head>
	<body>
                <!--Nav section-->
               <?php
include "header.php" ;

?>

<!--first section-->
<section id="perso">
<h3><b><u>VOS INFORMATIONS PERSONELLES :</u></b></h3>
<div class="hh">
<h4>NOM:   <?php echo $_SESSION['username'] ;?></h4>
<h4>PRENOM:   <?php echo $_SESSION['prenom'] ;?> </h4>
<h4>EMAIL:   <?php echo $_SESSION['user_mail'];?> </h4>
<h4>TELEPHONE  :<?php echo $_SESSION['telephone'];?> </h4>
<a href="modifinfopers.php?id=<?php echo $_SESSION['id_user'] ; ?>"><button type='button' class='btn btn-info' >MODIFIER</button></a>
</section>
</div>

</section>

<?php 
if  (isset($_GET['modif']) && $_GET['modif']=="ok"){
  echo "<div class='alert alert-warning'>
  Inforamtions modifiee avec success 
  </div>";
}
?>
<!--footer section-->
<?php

include "footer.php";

?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>






