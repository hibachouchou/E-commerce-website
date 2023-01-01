<section id="path">
    
 <p><u>
<a href="index.php"> ACCEUIL</a>/
<?php foreach($famille as $index=>$fam){?><?php
      if($fam['id']==$souscathg['family']){
 echo  "<a href='family.php?id=";?><?php echo $fam['id']  ;?><?php echo "'>"; ?><?php echo $fam['nom'] ;?><?php echo" </a>";?> 
 
<?php
} }
?>
 
 /
  <?php foreach($cathegorie as $index=>$cath){?><?php
    if($cath['id_cat']==$souscathg['catheg']){
        echo  "<a href='cathegory.php?id=";?><?php echo  $cath['id_cat'] ; ?><?php echo "'>"; ?><?php echo $cath['nom_cat'] ;?><?php echo" </a>  ";?>
 
<?php
    }

}
 ?>
/<?php echo  "<a href='#' style='color:green;'>";  ?>
<?php echo $souscathg['nomscathg'] ; ?><?php echo "</a>"; ?>
</u></p>
</section>