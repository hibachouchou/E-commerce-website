<?php
include "functions.php";

session_start();
$stocks=getStockProduits();
$produits=getAllProduits();

?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>STOCK</title>
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
        margin-left:120px;
        width:1100px
    }
    h2{
        margin-top:30px;
        margin-left:300px;
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





<?php  

foreach($stocks as $index=>$stock){?>


<!-- Modal Modif -->
<section>
<div class="modal fade" id="editmodal<?php echo $stock['id'] ; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">MODIFIER STOCK</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section>
<form id="f1" action="modifstock.php" method="POST">
<div class="mb-3">
    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $stock['id'] ;?>" name="ids">
    
  </div>
  <div class="mb-3">
    <input type="hidden" placeholder="PRODUIT" class="form-control" id="exampleInputPassword1" value="<?php echo $stock['produit'] ;?>" name="prod">
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">QUANTITE:</label>
    <input type="number" required class="form-control" id="exampleInputPassword1" value="<?php echo $stock['qantite'] ;?>" name="qtts">
  </div>
<div class="modal-footer">
      <button type="submit" class="btn btn-info">MODIFIER</button>
      </div>
</form>
  </section>
  </div>
     
     </div>
   </div>
 </div>
   </section>
 

<?php
}

?>


    


<h2>STOCK DES PRODUITS</h2>


<?php 
if  (isset($_GET['modif']) && $_GET['modif']=="ok"){
  echo "<div class='alert alert-warning'>
  Quantite en stock de produit modifiee avec success 
  </div>";
}
?>

<section>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">PRODUIT</th>
      <th scope="col">QUANTITE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>

  <?php
foreach($stocks as $stock){

    echo " <tr>
    <th scope='row'>".$stock['id']."</th> ";

    
    foreach($produits as $index=>$prod){
        if($stock['produit']==$prod['id_p']){
       echo ' <td>'.$prod['nom_p'].'</td>'; 
      }
      }
 echo   " <td>".$stock['qantite']."</td>
    <td>
        <button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#editmodal".$stock['id']."' >MODIFIER</button>
    </td>
  </tr>
  <tr>";
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
