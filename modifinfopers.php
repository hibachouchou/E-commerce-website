<?php

session_start();



?>

<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>MES INFOS PERSONELLES</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width" initial-scale=1.0>
<style>
    *{
	margin: 0;
	padding: 0;
	font-family: cursive;

}
    #space{
        margin-top:60px;
        margin-left:20px;
        margin-right:20px;
    }
    #space .row{
        margin: 20px;
    }
    #perso {
        margin-top:50px; 
        border: solid 1px black ;
        
       
    }
   
    #perso .hh{
        margin-top:60px;
    }
    button{
        margin-left: 70px;
        margin-bottom: 30px;
    }
    #mine{
      width: 500px;
        margin-top: 120px;
        margin-left: 500px;
      
    }
    @media all and  (max-width:920px){
  #mine{
      width: 300px;
        margin-top: 50px;
        margin-left: 50px;
      
    } 
    #bt{
    margin-left:60px;
    margin-top:0px;
}

}
   
</style>

	</head>
	<body>
          <!-- Modal Modif -->
 
      <section id="mine">

<form id="f1" action="modifmyinfo.php" method="POST">
<div class="mb-3">
    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION['id_user'] ;?>" name="myid">
    
  </div>
  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">MON NOM:</label>
    <input type="text" placeholder="PRODUIT"  minlength="3" class="form-control" id="exampleInputPassword1" value="<?php echo $_SESSION['username']  ;?>" name="myname">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"   class="form-label">MON PRENOM:</label>
    <input type="text" class="form-control" minlength="3" id="exampleInputPassword1" value="<?php echo $_SESSION['prenom']  ;?>" name="mypn">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MON EMAIL:</label>
    <input type="email" class="form-control" id="exampleInputPassword1" value="<?php echo $_SESSION['user_mail'] ;?>" name="mymail">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">MON NUMERO DE TELEPHONE:</label>
    <input type="number" class="form-control" maxlength="8" minlength="8" id="exampleInputPassword1" value="<?php echo $_SESSION['telephone'] ;?>" name="mytel">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MON MOT DE PASSSE:</label>
    <input type="password" minlength="6" maxlength="8"  pattern="[A-Z][a-z 0-9]+" class="form-control" id="exampleInputPassword1"  name="mypwd">
  </div>
<div class="modal-footer">
      <button type="submit" class="btn btn-info">MODIFIER</button>
      </div>
</form>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="script.js"></script>
  </body>
  </html>