<?php
include "../functions.php";
$produits=getAllProduits();
session_start();
if(!isset($_SESSION['emai_ladmin'])){
  header('location:logadmin.php'); //redirection vers page d'inscription
}
$cathegorie=getAllCathegories();
$famille=getAllFamilles();
$souscathegorie=getAllSOUSCATEHG();
$marques=getAllMarques();
$stocks=getStockProduits();

$page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);

if(isset($page)&&(!empty($page))&&($page>0)){
  //pagination
//1-connection de la base donnee
$conn=connect();
//2-nombre d'element par page 
$results=15;
//3-les nombres de produits dans la base
$page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
$nbrresults=$conn->prepare("SELECT * FROM produit");
$nbrresults->execute();
$nbrresults=$nbrresults->rowCount();
//4-nombre de ma page actuelle 
if(!isset($page)){
$page=1;

}else if($page){
$page=filter_var($_GET['page'],FILTER_SANITIZE_NUMBER_INT);
}

//5-determiner les pages avaibles
$totalpages=ceil($nbrresults/$results);
//6-
//7-determiner sql limit starting
$resultspg=$conn->prepare("SELECT * FROM produit LIMIT ".$results."  OFFSET  ".($page-1)* $results);
$resultspg->execute();
}else{
  header("location:allproduits.php?page=1");
}


?>
<!DOCTYPE html>
<html lang="fr">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 13:37:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Liste des produits</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
        <style>
            a{
                text-decoration:none;
            }
            .pge{
       margin-top: 0px;
      margin-bottom: 0px;
      margin-left: 10px;
     
      
   }
        </style>
    </head>
    <body>
	
			<!-- Main Wrapper -->
            <div class="main-wrapper">
		
        <!-- Header -->
        <div class="header">
        
            
            
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>
            
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Chercher ici ">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            
            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->
            
            <!-- Header Right Menu -->
            <ul class="nav user-menu">

                <!-- Notifications -->
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Supprimer tous </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/doctors/doctor-thumb-01.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/patients/patient1.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/patients/patient2.jpg">
                                            </span>
                                            <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/patients/patient3.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">VOir tous </a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->
                
                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="../img/Marque/logo.jpg" width="31" ></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="../img/Marque/logo.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?php echo $_SESSION['nom_admin'];?></h6>
                                <p class="text-muted mb-0">Administrateur</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profil.php">Profil</a>
            
                        <a class="dropdown-item" href="../deconnexion.php">Deconnexion</a>
                    </div>
                </li>
                <!-- /User Menu -->
                
            </ul>
            <!-- /Header Right Menu -->
            
        </div>
        <!-- /Header -->
        
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                        <li > 
                            <a href="dashbord.php"><i class="fe fe-home"></i> <span>Accueil</span></a>
                        </li>
                        <li  > 
                            <a href="settingadmin.php"><i class="fas fa-cogs"></i>  <span>Parametres</span></a>
                        </li>
                        <li><a href="famille.php?page=1"><i class="fas fa-tags"></i>  <span> Familles</span></a></li>
                        <li  ><a href="cathegories.php?page=1"><i class="fas fa-tag"></i> <span>categories</span></a></li>
                        <li ><a href="souscatheg.php?page=1"><i class="fas fa-sticky-note"></i> <span>Sous categories</span></a></li>
                        <li class="active"><a href="allproduits.php?page=1"><i class="fas fa-tshirt"></i> <span>Produits</span></a></li>
                        <li ><a href="stock.php?page=1"><i class="fas fa-database"></i> <span>Stock</span></a></li>
                        <li><a href="articles.php?page=1"> <i class="fas fa-book-reader"></i> <span>Articles</span></a></li>
                        <li><a href="listesmarques.php?page=1"><i class="fas fa-paperclip"></i> <span>Les marques</span></a></li>
                        <li><a href="gestionpanier.php?page=1"> <i class='fas fa-shopping-cart'></i> <span>Paniers</span></a></li>
                        <li><a href="abonnes.php?page=1"><i class="fa fa-user-secret" aria-hidden="true"></i> <span>Abonnes</span></a></li>
                        <li><a href="clients.php?page=1"><i class="fas fa-users-cog"></i> <span>Clients</span></a></li>
                        <li><a href="gestionlivrations.php?page=1"><i class="fas fa-shipping-fast"></i> <span>Livraisons</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->
					<!-- Page Wrapper -->
                    <div class="page-wrapper">
			
            <div class="content container-fluid">
                
                <!-- Page Header -->
                <div class="page-header">
                <div class="row">
                        <div class="col">
                            <h3 class="page-title">Liste des produits</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashbord.php">ACCUEIL</a></li>
                                <li class="breadcrumb-item active">Liste des produits</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-success float-right mt-2">Ajouter produit</a>
							</div>
                    </div>
                </div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0" >
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
  Produit supprimee avec success 
  </div>";
}
?>
<?php 
if  (isset($_GET['modif']) && $_GET['modif']=="ok"){
  echo "<div class='alert alert-warning'>
  Produit modifiee avec success 
  </div>";
}
?>

											<thead>
												<tr>
													<th>ID</th>
													<th>Nom</th>
                          <th>Image</th>
													<th >Prix</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
                      <?php      if(isset($page)&&(!empty($page))&&($page>0) ) {    ?>   
                                            <?php
foreach($resultspg as $prod){

    echo " <tr>
    <th scope='row'>".$prod['id_p']."</th>
    <td>".$prod['nom_p']."</td>
    <td><img src="."../img/produits/".$prod['image_p']." width='100px;' ></td>
    <td>".$prod['prix']."</td>


    <td class='text-right'>
    <div class='actions'>
    <a class='btn btn-sm bg-info-light' data-toggle='modal' data-target='#edit_specialities_details1".$prod['id_p']."'>
    <i class='fas fa-eye'></i> Afficher Details
</a>
        <a class='btn btn-sm bg-primary-light' data-toggle='modal' data-target='#edit_specialities_details".$prod['id_p']."'>
            <i class='fe fe-pencil'></i> Modifier
        </a>
        <a  data-toggle='modal' href='#delete_modal".$prod['id_p']."'  class='btn btn-sm bg-danger-light'>
        <i class='fe fe-trash'></i> Supprimer
    </a>
</div>
    </td>
  </tr>
  <tr>";
}
?>
																		
												
														
													
</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
                              <!--Pagination-->
<div class="pge">
  <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-begin"> <?php 
  if($page>1){echo"  <li class='page-item '>
    <a class='page-link' href='allproduits.php?page=".($page-1)."'>Precidant</a></li>";}else{
    echo"  <li class='page-item disabled'>
    <a class='page-link' disabled href='#'>Precidant</a></li>";
  }
          ?>
 <?php  //creation des pages de pagination
 
 for($count=1;$count<=$totalpages;$count++){
   //-8 la page active
if($page==$count){
echo "   <li class='page-item active'><a class='page-link'  href='allproduits.php?page=".$count."'>".$count."</a></li>
";
}else{
echo "  
<li class='page-item'><a class='page-link' href='allproduits.php?page=".$count."'>".$count."</a></li> 
";

}  }    ?>


 <?php echo" <li class='page-item'>
 <a class='page-link' href='allproduits.php?page=".($page+1)."'>Suivant</a>
</li>";      ?>
 </ul>
 </nav>
 </div>
</div>
 <?php
    }

?>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-scrollable" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Ajouter produit</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						<form id="f1" action="../prod/ajout.php" method="POST"  enctype="multipart/form-data">
  <div class="mb-3">
    <label  class="form-label">ID:</label>
    <input type="number" class="form-control"  name="idp">
    
  </div>
  <div class="mb-3">
    <label  class="form-label">NOM:</label>
    <input type="text" required class="form-control"  name="nomp">
  </div>
 
  <div class="mb-3">
  <label  class="form-label">IMAGE URL:</label>
  <input type="file" required class="form-control"  name="imgp" >
</div>
<div class="mb-3">
  <label  class="form-label">MARQUE:</label>
  <select required name="mc" id=""  class="form-control">
    <?php foreach($marques as $index=>$mq){
   echo" <option value='".$mq['id_mq']."'>".$mq['nom_mq']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label  class="form-label">DESCRIPTION:</label>
  <textarea  class="form-control"  rows="5" name="descp"></textarea>
</div>
<div class="mb-3">
  <label  class="form-label">CONSEILS D'UTILISATION:</label>
  <textarea class="form-control"  rows="5" name="desc2"></textarea>
</div>
<div class="mb-3">
  <label  class="form-label">COMPOSITION:</label>
  <textarea class="form-control"  rows="5" name="desc3"></textarea>
</div>
<div class="mb-3">
  <label  class="form-label">PRIX:</label>
  <input type="text" class="form-control" step="0.1"  name="prix" >
</div>
<div class="mb-3">
  <label   class="form-label">FAMILLE:</label>
  <select required name="fam" id=""  class="form-control">
    <?php foreach($famille as $index=>$fam){
   echo" <option value='".$fam['id']."'>".$fam['nom']."</option> ";}
    ?>
    </select>
</div>
<div class="mb-3">
  <label  class="form-label">CATEGORIE:</label>
  <select  required name="cathg" id=""  class="form-control">
    <?php foreach($cathegorie as $index=>$cath){
   echo" <option value='".$cath['id_cat']."'>".$cath['nom_cat']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label  class="form-label">SOUS CATEGORIE:</label>
  <select required name="souscathg" id=""  class="form-control">
    <?php foreach($souscathegorie as $index=>$souscath){
   echo" <option value='".$souscath['idscatheg']."'>".$souscath['nomscathg']."</option> ";}
   echo "<option></option>";
    ?>
  </select>
  
</div>
<div class="mb-3">
  <label  class="form-label"> EN PROMOTION:</label>

 <select required name="promo" id=""  class="form-control">
  
  <option  value='OUI' >OUI</option>
  <option  value='NON' >NON</option>
   
  </select>
  <div class="mb-3">
  <label  class="form-label">PCT PROMO:</label>
  <input type="text" class="form-control" step="0.1"  name="pct" >
</div>
<div class="mb-3">
  <label  class="form-label">PRIX PROMO:</label>
  <input type="text" step="0.1" class="form-control"  name="newprixpromo" >
</div>

</div>
<div class="mb-3">
<label  class="form-label"> NOUVEAU:</label>

<select required name="new" id=""  class="form-control">
 
 <option  value='OUI' >OUI </option>
 <option  value='NON' >NON</option> 
  
 </select>
 </div>
 <div class="mb-3">
  <label  class="form-label">QUANTITE:</label>
  <input type="number" required class="form-control "  name="qtt" >
</div>


 

									
								
								<button type="submit" class="btn btn-primary btn-block">Enregister les modifications</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			<?php  

foreach($produits as $prod){?>
			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_specialities_details<?php echo $prod['id_p'] ; ?>" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-scrollable" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Modifier produit</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <form id="f1" action="../prod/modif.php" method="POST"  enctype="multipart/form-data">
      <div class="mb-3">
    <input type="hidden" class="form-control"  value="<?php echo $prod['id_p'] ;?>" name="idpm">
    
  </div>
  <div class="mb-3">
    <label  class="form-label">NOM:</label>
    <input type="text" class="form-control" required  value="<?php echo $prod['nom_p'] ;?> " name="nompm">
  </div>
 
  <div class="mb-3">
  <label  class="form-label">IMAGE URL:</label>
  <p style="color: red;">Vous devez selectionner l'image de nouveau : </p>
  <input type="file" class="form-control" required   value="../img/produits/<?php echo $prod['image_p'] ;?> " name="imgpm" >
</div>
<div class="mb-3">
  <label  class="form-label">MARQUE:</label>
  <select name="mqm" id="" required class="form-control">
    <?php foreach($marques as $mq){
   echo" <option value='".$mq['id_mq']."' >".$mq['nom_mq']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label  class="form-label">DESCRIPTION:</label>
  <textarea class="form-control" required   rows="5"  name="descpm"><?php echo $prod['desc_p'] ;?></textarea>
</div>
<div class="mb-3">
  <label  class="form-label">CONSEILS D'UTILISATION:</label>
  <textarea class="form-control"  required  rows="5"   name="desc2pm"><?php echo $prod['desc2'] ;?></textarea>
</div>
<div class="mb-3">
  <label  class="form-label">COMPOSITION:</label>
  <textarea class="form-control" required  rows="5"   name="desc3pm"><?php echo $prod['desc_f'] ;?></textarea>
</div>
<div class="mb-3">
  <label  class="form-label">PRIX:</label>
  <input type="text"   class="form-control" required   value="<?php echo $prod['prix'] ;?>" name="prixpm" >
</div>

<div class="mb-3">
  <label  class="form-label">FAMILLE:</label>
 
  <select name="famm" id="" required class="form-control">
    <?php foreach($famille as $fam){
      if($fam['id']==$prod['id_fam']){
        echo" <option value='".$fam['id']."' selected>".$fam['nom']."</option> "; 
      }
   echo" <option value='".$fam['id']."' >".$fam['nom']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label  class="form-label">CATEGORIE:</label>

  <select name="cathgm" id="" required class="form-control">
    <?php foreach($cathegorie as $cath){
       if($cath['id_cat']==$prod['id_cat']){
        echo"  <option value='".$cath['id_cat']."' selected >".$cath['nom_cat']."</option>  "; 
      }
   echo" <option value='".$cath['id_cat']."' >".$cath['nom_cat']."</option> ";}
    ?>
  </select>
</div>
<div class="mb-3">
  <label  class="form-label"> SOUS CATEGORIE:</label>
 
 <select name="scathgm" id="" required class="form-control">
    <?php foreach($souscathegorie as $souscath){
       if($souscath['idscatheg']==$prod['souscathg']){
        echo "<option value='".$souscath['idscatheg']."' selected >".$souscath['nomscathg']."</option> "; 
      }
   echo" <option value='".$souscath['idscatheg']."' >".$souscath['nomscathg']."</option> ";}
   echo "<option></option>";
    ?>
  </select>
</div>
<div class="mb-3">
  <label  class="form-label"> EN PROMOTION:</label>

 <select name="promom" id="" required  class="form-control">
  
 <?php 
if($prod['promo']==0)
echo "<option value='NON' selected >NON</option>
<option value='OUI' >OUI</option>  ";
else
echo  "<option value='OUI' selected >OUI</option>
<option value='NON' >NON</option>  ";
?> 
   
  </select>
</div>
<div class="mb-3">
  <label  class="form-label">PCT PROMO:</label>
  <input type="text"  class="form-control" step="0.1"  value="<?php echo $prod['pct_promo'] ;?> " name="pctm" >
</div>
<div class="mb-3">
  <label  class="form-label">PRIX PROMO:</label>
  <input type="text"  class="form-control" step="0.1" value="<?php echo $prod['new_price'] ;?> " name="prixprom" >
</div>
<div class="mb-3">
<label   class="form-label"> NOUVEAU:</label>

<select name="newm"  required class="form-control">

 <?php 
if($prod['new']==0)
echo "<option value='NON' selected >NON</option>
<option value='OUI' >OUI</option>  ";
else
echo  "<option value='OUI' selected >OUI</option>
<option value='NON' >NON</option>  ";
?>
  
 </select>
 
</div>


								<button type="submit" class="btn btn-primary btn-block">Enregister les modifications</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
			<?php
}

?>
			<?php  

foreach($produits as $prod){?>
			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal<?php echo  $prod['id_p']; ?>" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Supprimer produit</h4>
								<p class="mb-4">Voulez vous vraiment supprimer ce produit ?</p>
								<a href='../prod/supp.php?id=<?php echo  $prod['id_p']; ?>'><button type="button" class="btn btn-danger" >Supprimer </button></a>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
            <?php
}


foreach($produits as $prod){?>
			<!--  Details Modal -->
			<div class="modal fade" id="edit_specialities_details1<?php echo $prod['id_p'] ; ?>" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-scrollable" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Details produit</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
 

 
 
<div class="mb-3">
  <h5>MARQUE:</h5>
 <p>
    <?php foreach($marques as $mq){
      if($mq['id_mq']==$prod['marque'])
   echo $mq['nom_mq'] ;}
    ?>
  </p>
</div>
<div class="mb-3">
  <h5>DESCRIPTION:</h5>
  <p><?php echo $prod['desc_p'] ;?></p>
</div>
<div class="mb-3">
  <h5>CONSEILS D'UTILISATION:</h5>
  <p><?php echo $prod['desc2'] ;?></p>
</div>
<div class="mb-3">
  <h5>COMPOSITION:</h5>
  <p><?php echo $prod['desc_f'] ;?></p>
</div>

<div class="mb-3">
  <h5>FAMILLE:</h5>

    <?php foreach($famille as $fam){
      if($fam['id']==$prod['id_fam'])
   echo" <p>".$fam['nom']."</p> ";}
    ?>

</div>
<div class="mb-3">
  <h5>CATEGORIE:</h5>

  
    <?php foreach($cathegorie as $cath){
      if($cath['id_cat']==$prod['id_cat'])
   echo" <p>".$cath['nom_cat']."</p> ";}
    ?>

</div>
<div class="mb-3">
  <h5> SOUS CATEGORIE:</h5>
 
 
    <?php foreach($souscathegorie as $souscath){
      if($souscath['idscatheg']==$prod['souscathg'])
   echo" <p>".$souscath['nomscathg']."</p> ";}

    ?>

</div>
<div class="mb-3">
  <h5> EN PROMOTION:</h5>
<?php 
if($prod['promo']==0)
echo "Non";
else
echo "Oui";
?>
</div>
<div class="mb-3">
  <h5>PCT PROMO:</h5>
  <p><?php echo $prod['pct_promo'] ;?></p >
</div>
<div class="mb-3">
  <h5>PRIX PROMO:</h5>
  <p><?php echo $prod['new_price'] ;?></p>
</div>
<div class="mb-3">
<h5> NOUVEAU:</h5>

<?php 
if($prod['new']==0)
echo "Non";
else
echo "Oui";
?>
 
</div>

						</div>
					</div>
				</div>
			</div>
			<!-- / Details Modal -->
			<?php
}

?>
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 13:37:01 GMT -->
</html>