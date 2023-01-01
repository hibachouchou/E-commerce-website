<?php
include "functions.php";
$produits=getAllProduits();
session_start();
$cathegorie=getAllCathegories();
$famille=getAllFamilles();
$souscathegorie=getAllSOUSCATEHG();
$marques=getAllMarques();
$stocks=getStockProduits();

?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>LISTE DES PRODUITS</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">

<style>
        *{
	margin: 0;
	padding: 0;
	font-family: cursive;
  font-size:11px;

}
    .table{
        margin-top:70px;
        margin-left:10px;
        width:800px
    }
    .table td{
        margin-left:0px;
        width:20px
    }
    .table th{
        margin-left:0px;
        width:20px
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
      margin-top:0px;
      margin-left:800px;
      font-size:60px;
      color:green;
    }
    #B i{
      margin-top:0px;
      margin-left:20px;
      font-size:60px;
      color:black;
    }
    .alert{
      margin:20px;
    }
    .alert{
      margin:20px;
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

 
<div id="A">
<i class="fas fa-plus-circle" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i>
</div>
<div id="B">
<a href="DashbordAdmin.php"><i class="fas fa-chalkboard-teacher"></i></a></div>


</section>

<!-- Modal Ajout -->
<section>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">AJOUTER PRODUIT</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section>
<form id="f1" action="prod/ajout.php" method="POST"  enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="idp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">NOM:</label>
    <input type="text" required class="form-control" id="exampleInputPassword1" name="nomp">
  </div>
 
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">IMAGE URL:</label>
  <input type="file" required class="form-control" id="exampleFormControlInput1" name="imgp" >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">MARQUE:</label>
  <select required name="mc" id=""  class="form-control">
    <?php foreach($marques as $index=>$mq){
   echo" <option value='".$mq['id_mq']."'>".$mq['nom_mq']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION:</label>
  <textarea  class="form-control" id="exampleFormControlTextarea1" rows="5" name="descp"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">CONSEILS D'UTILISATION:</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="desc2"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">COMPOSITION:</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="desc3"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">PRIX:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="prix" >
</div>
<div class="mb-3">
  <label  for="exampleFormControlInput1" class="form-label">FAMILLE:</label>
  <select required name="fam" id=""  class="form-control">
    <?php foreach($famille as $index=>$fam){
   echo" <option value='".$fam['id']."'>".$fam['nom']."</option> ";}
    ?>
    </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">CATEGORIE:</label>
  <select  required name="cathg" id=""  class="form-control">
    <?php foreach($cathegorie as $index=>$cath){
   echo" <option value='".$cath['id_cat']."'>".$cath['nom_cat']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">SOUS CATEGORIE:</label>
  <select required name="souscathg" id=""  class="form-control">
    <?php foreach($souscathegorie as $index=>$souscath){
   echo" <option value='".$souscath['idscatheg']."'>".$souscath['nomscathg']."</option> ";}
   echo "<option></option>";
    ?>
  </select>
  
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> EN PROMOTION:</label>

 <select required name="promo" id=""  class="form-control">
  
  <option  value='OUI' >OUI</option>
  <option  value='NON' >NON</option>
   
  </select>
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">PCT PROMO:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="pct" >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">PRIX PROMO:</label>
  <input type="number" class="form-control" id="exampleFormControlInput1" name="newprixpromo" >
</div>

</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"> NOUVEAU:</label>

<select required name="new" id=""  class="form-control">
 
 <option  value='OUI' >OUI </option>
 <option  value='NON' >NON</option> 
  
 </select>
 </div>
 <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">QUANTITE:</label>
  <input type="number" required class="form-control " id="exampleFormControlInput1" name="qtt" >
</div>
</div>
<div class="modal-footer">
      <button type="submit" class="btn btn-success">AJOUTER</button>
      </div>

</form>
  </section>
      </div>
     
    </div>
  </div>
</div>
  </section>


<?php  

foreach($produits as $index=>$prod){?>


<!-- Modal Modif -->
<section>
<div class="modal fade" id="editmodal<?php echo $prod['id_p'] ; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">MODIFIER PRODUIT</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section>
      <form id="f1" action="prod/modif.php" method="POST"  enctype="multipart/form-data">
      <div class="mb-3">
    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $prod['id_p'] ;?>" name="idpm">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">NOM:</label>
    <input type="text" class="form-control" required id="exampleInputPassword1"  value="<?php echo $prod['nom_p'] ;?> " name="nompm">
  </div>
 
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">IMAGE URL:</label>
  <input type="file" class="form-control" required id="exampleFormControlInput1"  value="<?php echo $prod['image_p'] ;?> " name="imgpm" >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">MARQUE:</label>
  <select name="mqm" id="" required class="form-control">
    <?php foreach($marques as $mq){
   echo" <option value='".$mq['id_mq']."' >".$mq['nom_mq']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION:</label>
  <textarea class="form-control" required id="exampleFormControlTextarea1"  rows="5"  name="descpm"><?php echo $prod['desc_p'] ;?></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">CONSEILS D'UTILISATION:</label>
  <textarea class="form-control"  required id="exampleFormControlTextarea1" rows="5"   name="desc2pm"><?php echo $prod['desc2'] ;?></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">COMPOSITION:</label>
  <textarea class="form-control" required id="exampleFormControlTextarea1" rows="5"   name="desc3pm"><?php echo $prod['desc_f'] ;?></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">PRIX:</label>
  <input type="text"   class="form-control" required id="exampleFormControlInput1"  value="<?php echo $prod['prix'] ;?> " name="prixpm" >
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">FAMILLE:</label>
 
  <select name="famm" id="" required class="form-control">
    <?php foreach($famille as $fam){
   echo" <option value='".$fam['id']."' >".$fam['nom']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">CATEGORIE:</label>

  <select name="cathgm" id="" required class="form-control">
    <?php foreach($cathegorie as $cath){
   echo" <option value='".$cath['id_cat']."' >".$cath['nom_cat']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> SOUS CATEGORIE:</label>
 
 <select name="scathgm" id="" required class="form-control">
    <?php foreach($souscathegorie as $souscath){
   echo" <option value='".$souscath['idscatheg']."' >".$souscath['nomscathg']."</option> ";}
   echo "<option></option>";
    ?>
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> EN PROMOTION:</label>

 <select name="promom" id="" required  class="form-control">
  
  <option value="OUI"  >OUI</option> 
  <option value="NON"  >NON</option> 
   
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">PCT PROMO:</label>
  <input type="text"  class="form-control" id="exampleFormControlInput1"  value="<?php echo $prod['pct_promo'] ;?> " name="pctm" >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">PRIX PROMO:</label>
  <input type="text"  class="form-control" id="exampleFormControlInput1"  value="<?php echo $prod['new_price'] ;?> " name="prixprom" >
</div>
<div class="mb-3">
<label for="exampleFormControlInput1"  class="form-label"> NOUVEAU:</label>

<select name="newm" id="" required class="form-control">
 
 <option value="OUI" >OUI</option> 
 <option value="NON" >NON</option> 
  
 </select>
 
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


    


<h2>LISTE DES PRODUITS</h2>
<?php 
if  (isset($_GET['ajout']) && $_GET['ajout']=="ok"){
  echo "<div class='alert alert-success'>
 Produit ajoutee avec success 
  </div>";
}
?>
<?php 
if  (isset($_GET['delete']) && $_GET['delete']=="ok"){
  echo "<div class='alert alert-info'>
  Produit  supprimee avec success 
  </div>";
}
?>
<?php 
if  (isset($_GET['modif']) && $_GET['modif']=="ok"){
  echo "<div class='alert alert-warning'>
  Produit  modifiee avec success 
  </div>";
}
?>

<section>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOM</th>
      <th scope="col">MARQUE</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">CONSEILS D'UTILISATION</th>
      <th scope="col">COMPOSITION</th>
      <th scope="col">IMAGE</th>
      <th scope="col">PRIX</th>
      <th scope="col">FAMILLE</th>
      <th scope="col">CATEGORIE</th>
      <th scope="col"> SOUS CATEGORIE</th>
      <th scope="col"> EN PROMOTION</th>
      <th scope="col"> NOUVEAU</th>
      <th scope="col"> PRIX PRMO</th>
      <th scope="col"> PCT PROMO</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>

  <?php
foreach($produits as $prod){

    echo " <tr>
    <th scope='row'>".$prod['id_p']."</th>
    <td>".$prod['nom_p']."</td>";
 // <td>".$prod['marque']."</td>
 foreach($marques as $index=>$mq){
  if($mq['id_mq']==$prod['marque']){
 echo ' <td>'.$mq['nom_mq'].'</td>'; 
}
} 
    echo"
    <td>".$prod['desc_p']."</td>
    <td>".$prod['desc2']."</td>
    <td>".$prod['desc_f']."</td>
    <td>".$prod['image_p']."</td>
    <td>".$prod['prix']."</td>"; ?>
    <?php
    foreach($famille as $index=>$fam){
      if($fam['id']==$prod['id_fam']){
     echo ' <td>'.$fam['nom'].'</td>'; 
    }
  } 
  foreach($cathegorie as $index=>$cath){
    if($cath['id_cat']==$prod['id_cat']){
   echo ' <td>'.$cath['nom_cat'].'</td>'; 
  }
} 


foreach($souscathegorie as $index=>$souscath){
  if($souscath['idscatheg']==$prod['souscathg']){
 echo ' <td>'.$souscath['nomscathg'].'</td>'; 
}
}

if($prod['promo']==1){
  echo"<td>OUI</td>";
}else{
  echo "<td>NON</td>";
}

if($prod['new']==1){
  echo"<td>OUI</td>";
}else{
  echo "<td>NON</td>";
}


echo"<td>".$prod['new_price']."</td>
<td>".$prod['pct_promo']."</td>
   
    <td>
        <button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#editmodal".$prod['id_p']."' >MODIFIER</button><a onclick='return popUpDelete()'   href='prod/supp.php?id_p=".$prod['id_p']."'><button type='button' class='btn btn-danger'>SUPPRIMER</button></a>
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












<script>
  function popUpDelete(){
return confirm("Voulez vous vraiment supprimer ce produit !");
  }
</script>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>
