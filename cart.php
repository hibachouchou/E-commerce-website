<?php
session_start();
include "functions.php";
$total=0;
$commande=array();
if(isset($_SESSION['panier'])){
  if(count($_SESSION['panier'][3])>0){
    $commande =$_SESSION['panier'][3];
  }
}

if($_SESSION['panier']){
  $total=$_SESSION['panier'][1];
}
$panier=$_SESSION['panier'];


//$produit=getAllProduits();


//test user connectee

if(!$_SESSION['username']){//user non connectee

    header('location:inscrit.php'); //redirection vers page login
}

?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PANIER MHD PARA</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width" initial-scale=1.0>
        <link rel="stylesheet" type="text/css" href="css/style.css">

       <style>
         input:invalid{
  border: red 1px solid;
}
input:valid{
  border: green 1px solid;
}
#tb{
  width:  100%;
}
   
@media screen and (max-width:920px) {
  #tb{
  width:  300px;
}






/*Carte*/
#carte-container table{
  border-collapse: collapse;
  width: 380px;
  table-layout: fixed;
  }
  #carte-container table thead{
      font-weight: 300;
    
   }
  
   #carte-container table thead td{ 
      background-color: rgb(79, 126, 8);
      color: #fff;
      border: none;
      padding: 2px 0;
   }
   #carte-container table td{
       border: 1px solid #b6b3b3;
       text-align: center;
   }
   #carte-container table td:nth-child(1){
       width: 100px;
   }
   #carte-container table td:nth-child(2){
      width: 70px;
  }
  #carte-container table td:nth-child(3){
      width: 200px;
  }
  #carte-container table td:nth-child(4){
      width: 200px;
  }
  #carte-container table td:nth-child(5){
      width: 100px;
  }
  #carte-container table td:nth-child(6){
      width: 100px;
  }
  #carte-container table tbody img{
      width: 50px;
      height: 80px;
  }
  #carte-container table tbody i{
      color: #606063;
  }
  #cate-bottom .coupon>div,
  #cate-bottom .total>div{
      border: 1px solid #b6b3b3;
  }
  #cate-bottom .coupon h5,
  #cate-bottom .total h5
  {
      background-color: rgb(79, 126, 8);
      color: #fff;
      border: none;
      padding: 6px 12px;
      font-weight: 700;
  }
  #cate-bottom .coupon p,
  #cate-bottom .coupon input{
      padding: 0 12px;
  }
  #cate-bottom .coupon input{
      height: 44px;
  }
  #cate-bottom .coupon input{
     margin: 0 0 20px 12px;
  }
  #cate-bottom .total div>div{
      padding: 0 12px;
  }
  #cate-bottom .total h6{
      color: #2a2a2a;
  }
  .second-hr{
      background-color: rgb(79, 126, 8);
      width: 350px;
      height: 1px;
  }
  
  #cate-bottom .form{
      display: flex;
      width: 40%;
  }
  
  #cate-bottom .bbttnn{
      background-color:rgb(240, 172, 46);
      color: #fff;
      height:75px ;
      margin-left: 5px;
      margin-top: 10px;
      margin-right: 10px;
      font-size: 13px;
      font-weight: 600;
      padding: 11px 30px;
      border-radius:4px ;
      cursor: pointer;
      border: none;
      outline: none;
      transition: 0.3s ;
  }
  .title-box2 h2{
      color: black;
      width: 250px;
      padding: 4px 10px;
      height: 80px;
      margin-bottom: 30px;
      display: flex;
      margin-left: 120px;
      margin-top: 50px;
      font-size: 30px;
      font-weight: bold;
      text-align: center;
      
     
  }
  .title-box2 i{
  font-size: 100px;
  }

}
   </style> 
	</head>
	<body>
        <!--Nav section-->
        <?php

include "header.php";

        ?>


<section id="produit1" class="section-p1">
    <div class="title-box2">
        <hr>
    <h2>PANIER</h2><!--<i class="fas fa-shopping-cart"></i>-->
    <hr>
</div>
<section id="carte-container" class="container my-5">
        <table id="tb">
<thead>
    <tr>
        <td>SUPPRIMER</td>
        <td>IMAGE</td>
        <td>PRODUIT</td>
        <td>PRIX</td>
        <td>QUANTITE</td>
        <td>TOTAL</td>
    </tr>
</thead>
<tbody>
<?php

foreach($commande as $index=>$cmd){  
$prod=getProduitByID($cmd[0]);  
echo"
          <tr>
        <td><a href='suppprod.php?id=".$index."'><i class='fas fa-trash-alt'></i></a></td>";
   
    
       echo" <td><img src="."img/produits/".$prod['image_p']." alt=''></td>"; 

         echo" <td><h5>".$prod['nom_p']."</h5></td>"; 
         if($prod['promo']==1){
          echo"<td><h5>".$prod['new_price']."</h5></td>";
         }else{
          echo"<td><h5>".$prod['prix']."</h5></td>";
         }
     echo"
      <td><h5>".$cmd[1]."</h5></td>
        <td>".$cmd[2]."</td> </tr>";}
    //    <td><button style='background-color: rgb(240, 172, 46);' class='normal' data-bs-toggle='modal' data-bs-target='#editmodal".$panier[3].">MODIFIER COMMANDE</button></td>
        
 
 
 ?>
   
</tbody>
        </table>
    </section>

    <section id="cate-bottom" class="container">
        <!--div class="row">
            <div class="coupon col-lg-6 col-md-6 col-12 mb-4">
                <div>
                    <h5>PASSER COMMANDE</h5>
                    <p>ENTRER VOTRE ADRESSE MAIL</p>
                    <div class="form">
                    <input type="email" placeholder="Votre Email">
                    <button class="normal">PASSER COMMANDE</button>
                    </div>
                </div>
            </div-->
            <div class="total col-lg-6 col-md-6 col-12 ">
                <h5>TOTAL PANIER</h5>
                <div class="d-flex justify-content-between">
                  <div><h6>FRAIS DE LIVRAISON</h6>
                  <ul>
                  <li> 7 DT TTC</li>
                    <li> Gratuit  Des 99DT d'achat</li>
</ul>
                </div>
                </div>
                <form >
                <div class="d-flex justify-content-between">
                  <div><h6>TOTAL COMMANDES</h6>
                    <p><?php echo $panier[1] ; ?>DT TTC</p>
                    <input type="hidden" value="<?php echo $total ; ?>" name="tot">
                </div><form >
                <input type="button"  name="button" onclick="history.go(-1)" value="Suivre mes achats "
                style="text-decoration:none;" class="bbttnn" >
  </form>
                </div>
                <hr class="second-hr">
                <div class="d-flex justify-content-between">
                  <div><h6>TOTAL PANIER</h6>
                    <p><?php  
             if(!empty($_SESSION['panier'][3])) { if($total<=99){
               $resultat=$total+7;
            }else{
              $resultat=$total;
            } echo $resultat ;
              }else{
 $_SESSION['panier'][1] =0; 
                    }?> DT TTC </p>
                </div>
                <button type="button" style="text-decoration:none;" class="bbttnn" data-bs-toggle="modal" data-bs-target="#exampleModal">
  VALIDER PANIER  <i class="fas fa-shopping-bag"></i>
</button>
  
                    </div></form>
                </div>
            </div>
        </div>
    </section>
    </section>







<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
    <h3>  VOS COORDONNEES</h3>
      </div>
      <div class="modal-body">
      <form action="validationpanier.php" method="POST">

  <section>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NUM CIN: </label>
    <input type="number" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="idnum">
  </div>
  <div class="mb-3" >
  <label for="exampleInputEmail1"  class="form-label">PROVINCE: </label>
<select name="sel"  required class="form-control" >
<option value="NABEUL">NABEUL</option>
<option value="ARIANA">ARIANA</option>
<option value="BEJA">BEJA</option>
<option value="BEN AROUS">BEN AROUS</option>
<option value="BENZART">BENZART</option>
<option value="TATAWIN">TATAWIN</option>
<option value="TOUZER">TOUZER</option>
<option value="JANDOUBA">JANDOUBA</option>
<option value="ZAGHOUEN">ZAGHOUEN</option>
<option value="TUNIS">TUNIS</option>
<option value="SOUSSE">SOUSSE</option>
<option value="SIDI BOUSAID">SIDI BOUSAID</option>
<option value="SELIANA">SELIANA</option>
<option value="SFAX">SFAX</option>
<option value="GABES">GABES</option>
<option value="GEBELI">GEBELI</option>
<option value="KEF">KEF</option>
<option value="MEDNINE">MEDNINE</option>
<option value="MANOUBA">MANOUBA</option>
<option value="MONASTIR">MONASTIR</option>
<option value="KAIRAWEN">KAIRAWEN</option>
<option value="MAHDIA">MAHDIA</option>
</select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">DELEGATION: </label>
    <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="del">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ADRESSE: </label>
    <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="adrss">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">CODE POSTALE: </label>
    <input type="number" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="post">
  </div>
  

      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-success" >ENVOYER</button>
      </div></form>
    </div>
  </div>
</div>


 













<!--footer section-->
<?php

include "footer.php";

        ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="script.js"></script>
        </body>
        </html>