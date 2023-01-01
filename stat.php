<?php
session_start();


include "functions.php" ;
$data=getData();


?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>INFOS ADMIN</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
    *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
  
    #perso {
        margin-top:150px; 
        margin-left: 70px;
        margin-right: 70px;
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
  
    #C i{
      margin-top:0px;
      margin-left:20px;
      font-size:60px;
      color:black;
    }
    #bt{
    margin-left:600px;
    margin-top:0px;
}
#space{
        margin-top:60px;
        margin-left:20px;
        margin-right:30px;
        margin-bottom: 50px;
    }
    #space .row{
        margin: 5px;
        width:1000px;
        margin-left:170px;
       
    }
    #space .row i{
        font-size:80px;
        color: gray;
        margin-left: 190px;
    }
   h2 {
        margin-left: 110px;
        color: blue;
        
    }
    h3{
        margin-left: 100px;  
        color: green;
    }
</style>

	</head>
	<body>
                <!--Nav section-->

                <!--Nav section-->
                <section id="header">

                <a href="index.php?page=1"><img src="img/Marque/logo.jpg" class="logo" alt=""></a>
<div id="C">
<a href="DashbordAdmin.php"><i class="fas fa-chalkboard-teacher"></i></a></div>
  <div id="bt">
<a href="deconnexion.php"><button  class="btn btn-success">DECONNEXION  <i class="fas fa-user-alt-slash"></i></button></a>
</div>

</section>
<section> 
<section id="space">
<div class="row">
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-tshirt"></i><h2 class="num" ><?php echo $data["produit"]; ?></h2><h3 class="card-title">PRODUITS</h3>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-users-cog"></i><h2 class="num" ><?php echo $data["visiteur"]; ?></h2> <h3 class="card-title">CLIENTS</h3>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
</div>

<div class="row">
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fa fa-user-secret" aria-hidden="true"></i> <h2 class="num" ><?php echo $data["abonne"]; ?></h2> <h3 class="card-title">ABONNES</h3>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class='fas fa-shopping-cart'></i> <h2 class="num" ><?php echo $data["panier"]; ?></h2> <h3 class="card-title">PANIERS</h3>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
</div>

<div class="row">
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <i class="fas fa-shipping-fast"></i><h2 class="num" ><?php echo $data["panier2"]; ?></h2><h3 class="card-title">DELEVERY</h3>
        <p class="card-text"></p>
      </div>
    </div>
  </div>

</div>
</section>


</section>
<script>

</script>

    </body>
    </html>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>