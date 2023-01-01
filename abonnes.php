<?php
include "functions.php";
$abonne= getAllAbonnes();
session_start();



?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>LISTE ABONNES</title>
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
        width:1100px
    }
    h2{
        margin-top:30px;
        margin-left:320px;
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





    


<h2>LISTE DES ABONNES</h2>

<section>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">EMAIL</th>
    </tr>
  </thead>
  <tbody>

  <?php
foreach($abonne as $index=> $ab){

    echo " <tr>
    <th scope='row'>".$ab['id_ab']."</th>
    <td>".$ab['e-mail']."</td>
  </tr>
  ";
}


?>
   


  </tbody>

  
</table>


</section>




<footer class="section-p1" id="fot">
<a href=" deconnexion.php"><button  class="btn btn-success">DECONNEXION  <i class="fas fa-user-alt-slash"></i></button></a>
</div>
</footer>





















<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>
