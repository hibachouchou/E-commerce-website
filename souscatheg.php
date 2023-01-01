<?php
include "functions.php";
$cathegorie=getAllCathegories();
$famille=getAllFamilles();
$souscathegorie=getAllSOUSCATEHG();
session_start();



?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>LISTE DES SOUS CATHEGORIES</title>
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
        margin-left:100px;
        width:1200px
    }
    h2{
        margin-top:30px;
        margin-left:200px;
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
                <!--Nav section-->


  


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
        <h4 class="modal-title" id="staticBackdropLabel">AJOUTER  SOUS CATHEGORIE</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section>
<form id="f1" action="souscathg/ajout.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID:</label>
    <input type="number"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="idsc">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">NOM:</label>
    <input type="text" required class="form-control" id="exampleInputPassword1" name="nomsc">
  </div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">FAMILLE:</label>
  <select required name="fam1" id=""  class="form-control">
    <?php foreach($famille as $index=>$fam){
   echo" <option value='".$fam['id']."'>".$fam['nom']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">CATEGORIE:</label>
  <select required name="cat1" id=""  class="form-control">
    <?php foreach($cathegorie as $index=>$cath){
   echo" <option value='".$cath['id_cat']."'>".$cath['nom_cat']."</option> ";}
    ?>
  </select>
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

foreach($souscathegorie as $index=>$souscath){?>


<!-- Modal Modif -->
<section>
<div class="modal fade" id="editmodal<?php echo $souscath['idscatheg'] ; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">MODIFIER SOUS CATHEGORIE</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section>
<form id="f1" action="souscathg/modif.php" method="POST">
<div class="mb-3">
    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $souscath['idscatheg'] ;?>" name="idscm">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">NOM:</label>
    <input type="text" required class="form-control" id="exampleInputPassword1" value="<?php echo $souscath['nomscathg'] ;?>" name="nomsc">
  </div>
 
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">FAMILLE:</label>
  <select required name="famsc" id=""  class="form-control">
    <?php foreach($famille as $fam){
   echo" <option value='".$fam['id']."' >".$fam['nom']."</option> ";}
    ?>
  </select>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">CATEGORIE:</label>
  <select required name="cat" id=""  class="form-control">
    <?php foreach($cathegorie as $cath){
   echo" <option value='".$cath['id_cat']."' >".$cath['nom_cat']."</option> ";}
    ?>
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


    


<h2>LISTE DES SOUS CATHEGORIES</h2>
<?php 
if  (isset($_GET['ajout']) && $_GET['ajout']=="ok"){
  echo "<div class='alert alert-success'>
  SousCategorie ajoutee avec success 
  </div>";
}
?>
<?php 
if  (isset($_GET['delete']) && $_GET['delete']=="ok"){
  echo "<div class='alert alert-info'>
  SousCategorie supprimee avec success 
  </div>";
}
?>
<?php 
if  (isset($_GET['modif']) && $_GET['modif']=="ok"){
  echo "<div class='alert alert-warning'>
  SousCategorie modifiee avec success 
  </div>";
}
?>

<section>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOM</th>
      <th scope="col">FAMILLE</th>
      <th scope="col">CATEGORIE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>

  <?php
foreach($souscathegorie as $index=> $souscath){

    echo " <tr>
    <th scope='row'>".$souscath['idscatheg']."</th>
    <td>".$souscath['nomscathg']."</td>
   ";
   foreach($famille as $index=>$fam){
      if($fam['id']==$souscath['family']){
     echo ' <td>'.$fam['nom'].'</td>'; 
    }
  } 
  foreach($cathegorie as $index=>$cath){
    if($cath['id_cat']==$souscath['catheg']){
   echo ' <td>'.$cath['nom_cat'].'</td>'; 
  }
} 
  
   echo" <td>
        <button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#editmodal".$souscath['idscatheg']."' >MODIFIER</button><a onclick='return popUpDelete()' href='souscathg/supp.php?idscatheg=".$souscath['idscatheg']."'><button type='button' class='btn btn-danger'>SUPPRIMER</button></a>
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
return confirm("Voulez vous vraiment supprimer cette sous categorie !");
  }
</script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>
