<?php

session_start();
include "functions.php";
$cordsite=AfficherCordSite();


?>

<!Doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>INFOS SITES</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
      width: 700px;
        margin-top: 20px;
        margin-left: 350px;
      
    }    #B i{
      margin-top:0px;
      margin-left:20px;
      font-size:60px;
      color:black;
    }
    #bt{
    margin-left:600px;
    margin-top:0px;
}
   
</style>

	</head>
	<body>

          <!-- Modal Modif -->
 
      <section id="mine">
          <h3 style="color: blue; padding-left:150px;" >MODIFIER INFOS SITE </h3>

<form id="f1" action="modifinfosite.php" method="POST">
  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label"> TELEPHONE:</label>
    <input type="number"   minlength="8" class="form-control" id="exampleInputPassword1" value="<?php echo $cordsite['telephone']  ;?>" name="tel">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> EMAIL:</label>
    <input type="email" class="form-control" id="exampleInputPassword1" value="<?php echo $cordsite['email'] ;?>" name="mail">
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> FACEBOOK:</label>
    <input type="text"  required class="form-control" id="exampleInputPassword1" value="<?php echo $cordsite['facebook'] ;?>" name="fb">
  </div>
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> INSTAGRAM:</label>
    <input type="text"  required class="form-control" id="exampleInputPassword1" value="<?php echo $cordsite['insta'] ;?>" name="insta">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> ADRESSE:</label>
    <input type="text"  required class="form-control" id="exampleInputPassword1" value="<?php echo $cordsite['adrss'] ;?>" name="adr">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> A PROPOS:</label>
  <textarea name="propos" id=""  class="form-control" cols="30" rows="30"><?php echo $cordsite['propos'] ;?></textarea>
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