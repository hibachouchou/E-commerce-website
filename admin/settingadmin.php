<?php
session_start();


include "../functions.php" ;
$cordsite=AfficherCordSite();
if(!isset($_SESSION['emai_ladmin'])){
    header('location:logadmin.php'); //redirection vers page d'inscription
}
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 13:36:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Parametres</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
                        <li class="active" > 
                            <a href="settingadmin.php"><i class="fas fa-cogs"></i>  <span>Parametres</span></a>
                        </li>
                        <li><a href="famille.php?page=1"><i class="fas fa-tags"></i>  <span> Familles</span></a></li>
                        <li  ><a href="cathegories.php?page=1"><i class="fas fa-tag"></i> <span>categories</span></a></li>
                        <li ><a href="souscatheg.php?page=1"><i class="fas fa-sticky-note"></i> <span>Sous categories</span></a></li>
                        <li><a href="allproduits.php?page=1"><i class="fas fa-tshirt"></i> <span>Produits</span></a></li>
                        <li ><a href="stock.php?page=1"><i class="fas fa-database"></i> <span>Stock</span></a></li>
                        <li><a href="articles.php?page=1"> <i class="fas fa-book-reader"></i> <span>Articles</span></a></li>
                        <li><a href="listesmarques.php?page=1"><i class="fas fa-paperclip"></i> <span>Les marques</span></a></li>
                        <li><a href="gestionpanier.php?page=1"> <i class='fas fa-shopping-cart'></i> <span>Paniers</span></a></li>
                        <li ><a href="abonnes.php?page=1"><i class="fa fa-user-secret" aria-hidden="true"></i> <span>Abonnes</span></a></li>
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
								<h3 class="page-title">Coordonnees de site</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">ACCUEIL</a></li>
									<li class="breadcrumb-item active">Coordonnees de site</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab"><i class='fas fa-eye'></i>  Afficher</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">   <i class='fe fe-pencil'></i> Modifier</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
								
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Telephone :</p>
														<p class="col-sm-10"><?php echo $cordsite['telephone'] ;?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email :</p>
														<p class="col-sm-10"><?php echo $cordsite['email'] ;?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Facebook :</p>
														<p class="col-sm-10"><?php echo $cordsite['facebook'] ;?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Instagram :</p>
														<p class="col-sm-10"><?php echo $cordsite['insta'] ;?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Adresse :</p>
														<p class="col-sm-10 mb-0"> <?php echo $cordsite['adrss'] ;?><br>
														
													</div>
                                                    <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">A Propos :</p>
														<p class="col-sm-10 mb-0">  <?php echo $cordsite['propos'] ;?></p>
														
													</div>
												</div>
											</div>
											
											
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Modifier infos de site :</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="../modifinfosite.php" method="POST">
														<div class="form-group">
															<label>Telephone :</label>
															<input type="number"  minlength="8"  class="form-control" value="<?php echo $cordsite['telephone']  ;?>" name="tel">
														</div>
														<div class="form-group">
															<label>Email</label>
															<input type="email" class="form-control" value="<?php echo $cordsite['email'] ;?>" name="mail">
														</div>
														<div class="form-group">
															<label>Facebook :</label>
															<input type="text" class="form-control"value="<?php echo $cordsite['facebook'] ;?>" name="fb">
														</div>
                                                        <div class="form-group">
															<label>Instagram :</label>
															<input type="text" class="form-control" value="<?php echo $cordsite['insta'] ;?>" name="insta">
														</div>
                                                        <div class="form-group">
															<label>Adresse :</label>
															<input type="text" class="form-control" value="<?php echo $cordsite['adrss'] ;?>" name="adr">
														</div>
                                                        <div class="form-group">
															<label>A propos:</label>
															<textarea class="form-control"cols="30" rows="30"><?php echo $cordsite['propos'] ;?></textarea>
														</div>
														<button class="btn btn-primary" type="submit">Enregister les changements</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
</div>		
			<!-- /Page Wrapper -->
		
        </div>
        <?php 
if  (isset($_GET['modif']) && $_GET['modif']=="ok"){
  echo "<div class='alert alert-warning'>
  Inforamtions modifiee avec success 
  </div>";
}
?>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<script src="assets/plugins/raphael/raphael.min.js"></script>    
		<script src="assets/plugins/morris/morris.min.js"></script>  
		<script src="assets/js/chart.morris.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
		
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 13:36:34 GMT -->
</html>