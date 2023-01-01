<?php
include "functions.php";
$cathegorie=getAllCathegories();
$famille=getAllFamilles();
session_start();



?>
<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>LISTE DES CATHEGORIES</title>
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
        margin-left:280px;
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
        <h4 class="modal-title" id="staticBackdropLabel">AJOUTER CATHEGORIE</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section>
<form id="f1" action="catheg/ajout.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="idc">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">NOM:</label>
    <input type="text" required class="form-control" id="exampleInputPassword1" name="nomc">
  </div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION:</label>
  <textarea  class="form-control" id="exampleFormControlTextarea1" rows="5" name="descc"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">FAMILLE:</label>
  <select required name="fam" id=""  class="form-control">
    <?php foreach($famille as $index=>$fam){
   echo" <option value='".$fam['id']."'>".$fam['nom']."</option> ";}
    ?>
  </select>
</div>
<!--section id="cssstyle">
  <h4>ESPACE DEVELOPPEUR </h4>
  <h5>(NE TOUCHER PAS!)</h5>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">class:</label-->
  <input type="hidden" class="form-control" id="exampleFormControlInput1" name="classcathg" >
<!--/div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">id_classe:</label-->
  <input type="hidden" class="form-control" id="exampleFormControlInput1" name="idcss" >
<!--/div>
</section-->
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

foreach($cathegorie as $index=>$cath){?>


<!-- Modal Modif -->
<section>
<div class="modal fade" id="editmodal<?php echo $cath['id_cat'] ; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">MODIFIER CATHEGORIE</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section>
<form id="f1" action="catheg/modif.php" method="POST">
<div class="mb-3">
    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $cath['id_cat'] ;?>" name="idcm">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">NOM:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $cath['nom_cat'] ;?>" name="nomcm">
  </div>
 
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION:</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"   name="desccm"><?php echo $cath['desc_cat'] ;?></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">FAMILLE:</label>
  <select name="famc" id=""  class="form-control">
    <?php foreach($famille as $fam){
   echo" <option value='".$fam['id']."' >".$fam['nom']."</option> ";}
    ?>
  </select>
</div>
<!--section id="cssstyle">
  <h4>ESPACE DEVELOPPEUR </h4>
  <h5>(NE TOUCHER PAS!)</h5>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">class:</label-->
  <input type="hidden" class="form-control" id="exampleFormControlInput1" value="<?php echo $cath['classc'] ;?>" name="classcathm" >
<!--/div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">id_classe:</label-->
  <input type="hidden" class="form-control" id="exampleFormControlInput1" value="<?php echo $cath['idclassc'] ;?>" name="idcsscm" >
<!--/div>
</section-->
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


    


<h2>LISTE DES CATHEGORIES</h2>
<?php 
if  (isset($_GET['ajout']) && $_GET['ajout']=="ok"){
  echo "<div class='alert alert-success'>
  Categorie ajoutee avec success 
  </div>";
}
?>
<?php 
if  (isset($_GET['delete']) && $_GET['delete']=="ok"){
  echo "<div class='alert alert-info'>
  Categorie supprimee avec success 
  </div>";
}
?>
<?php 
if  (isset($_GET['modif']) && $_GET['modif']=="ok"){
  echo "<div class='alert alert-warning'>
  Categorie modifiee avec success 
  </div>";
}
?>

<section>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOM</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">FAMILLE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>

  <?php
foreach($cathegorie as $index=> $cath){

    echo " <tr>
    <th scope='row'>".$cath['id_cat']."</th>
    <td>".$cath['nom_cat']."</td>
    <td>".$cath['desc_cat']."</td>
   ";
   foreach($famille as $index=>$fam){
      if($fam['id']==$cath['famille']){
     echo ' <td>'.$fam['nom'].'</td>'; 
    }
  } 
  
   echo" <td>
        <button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#editmodal".$cath['id_cat']."' >MODIFIER</button><a onclick='return popUpDelete()' href='catheg/supp.php?id_cat=".$cath['id_cat']."'><button type='button' class='btn btn-danger'>SUPPRIMER</button></a>
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
return confirm("Voulez vous vraiment supprimer cette categorie !");
  }
</script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
	</body>
	</html>
