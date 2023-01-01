<?php
session_start();
include "functions.php";
$panier=getAllComPanier();
$visiteur=getAllClients();
$adresse=getAllAdresses();




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
        width:1200px;
        font-size:12px;
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

    #B i{
      margin-top:0px;
      margin-left:800px;
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
    #bt{
    margin-left:700px;
    margin-top:10px;
}
</style>

<!---->
</head>
<body>

<section id="header">
<a href="index.php?page=1"><img src="img/Marque/logo.jpg" class="logo" alt=""></a>

<div id="B">
<a href="DashbordAdmin.php"><i class="fas fa-chalkboard-teacher"></i></a></div>

</section>







    


<h2>LISTE DES PANIERS</h2>
<?php 
if  (isset($_GET['verif']) && $_GET['verif']=="ok"){
  echo "<div class='alert alert-success'>
  Panier validee avec success 
  </div>";
}
?>

<section>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col"> NOM CLIENT</th>
      <th scope="col"> PRENOM CLIENT</th>
      <th scope="col"> TELEPHONE</th>
      <th scope="col">TOTAL</th>
      <th scope="col">DATE COMMANDE</th>
      <th scope="col">Num ID</th>
      <th scope="col">PROVINCE</th>
      <th scope="col">DELEGATION</th>
      <th scope="col">ADRESSE</th>
      <th scope="col">CODE POSTALE</th>
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
   
    <td>".$pan['total']." DT</td>
    <td>".$pan['date_commande']."</td> ";

    foreach($adresse as $index=>$adr){
      if($pan['id_panier']==$adr['panier']){
     echo " <td>".$adr['NumID']."</td>
     <td>".$adr['province']."</td>
     <td>".$adr['delegation']."</td>
      <td>".$adr['adresse']."</td>
     <td>".$adr['code postal']."</td>
    
     
     "; 
    }
  } echo"
    <td>
<a href='details.php?id=".$pan['id_panier']."'> <button type='button' class='btn btn-info' >AFFICHER DETAILS COMMANDE</button></a>
<a href='validercommande.php?id=".$pan['id_panier']."'> <button type='button' class='btn btn-success' onclick='return popUpDelete()'>VALIDER PANIER</button></a>
    </td>
  </tr>
  <tr>";
}


?>
   


  </tbody>

  
</table>


</section>


<script>
  function popUpDelete(){
return confirm("Voulez vous vraiment valider Cette panier?");
  }
</script>






<footer class="section-p1" id="fot">
<a href=" deconnexion.php"><button  class="btn btn-success">DECONNEXION  <i class="fas fa-user-alt-slash"></i></button></a>
</div>
</footer>
















<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>
