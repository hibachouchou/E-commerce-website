<?php
include "functions.php";
$panier=getAllComPanier();
$visiteur=getAllClients();
session_start();



?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>LISTE DES PANIERS</title>
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
    .table{
        margin-top:70px;
        margin-left:80px;
        width:1300px
    }
    h2{
        margin-top:30px;
        margin-left:350px;
        color:green;
        text-decoration: underline;
    }
    button{
        margin:5px;
    }
    #A i{
      margin-top:20px;
      margin-left:20px;
      font-size:60px;
      color:green;
    }
    #B i{
      margin-top:0px;
      margin-left:1400px;
      font-size:60px;
      color:black;
    }
    .alert{
      margin:20px;
    }
    #cssstyle{
      margin:10px;
      border: solid 1px black;
      padding:7px;
    }
</style>

<!---->
</head>
<body>
<div id="B">
<a href="DashbordAdmin.php"><i class="fas fa-chalkboard-teacher"></i></a></div>




    


<h2>LISTE DES PANIERS</h2>


<section>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col"> NOM CLIENT</th>
      <th scope="col"> PRENOM CLIENT</th>
      <th scope="col"> TELEPHONE</th>
      <th scope="col">TOTAL</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>

  <?php
foreach($panier as $pan){

    echo " <tr>
    <th scope='row'>".$pan['id_panier']."</th>
   ";
    foreach($visiteur as $index=>$user){
        if($pan['visiteur']==$user['id_user']){
       echo " <td>".$user['username']."</td>
       <td>".$user['prenom']."</td>
       <td>".$user['telephone']."</td>
       
       "; 
      }
    } 
    echo"
   
    <td>".$pan['total']."</td>
   
    <td>
     <a href='details.php?id=".$art['id_art']."' ><button type='button' class='btn btn-info'>AFFICHER DETAILS COMMANDE</button></a>
    </td>
  </tr>
  <tr>";
}


?>
   


  </tbody>

  
</table>


</section>




















<script>

</script>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>
