<?php $page='career' ; ?>
<?php include("config.php");?>
<?php include("header.php");?>

<!-------------------Start Career ------------------>
<div class="container career">
<h3 class="text-center"><?php echo $lang['career_titre'];?></h3>
<div class="row">
  <div class="col-sm-4">
    <div class="card">
    <img class="card-img-top" src="<?php echo $lang['career_img'];?>" alt="the image alt text here">
      <div class="card-body text-center">
        <h1 class="card-title"><?php echo $lang['career_poste1'];?></h1>
        <p class="card-text text-left"><h3> <?php echo $lang['career_nbr'];?> </h3> 01</p>
        <p class="card-text text-left"><h3>Description : </h3><?php echo $lang['career_desc1'];?> </p>
        
        <a href="condidature.php" class="btn btn-warning"><?php echo $lang['career_envoi'];?></a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
    <img class="card-img-top" src="<?php echo $lang['career_img'];?>" alt="the image alt text here">
      <div class="card-body text-center">
        <h1 class="card-title"><?php echo $lang['career_poste2'];?></h1>
        <p class="card-text text-left"><h3> <?php echo $lang['career_nbr'];?> </h3> 01</p>
        <p class="card-text text-left"><h3>Description : </h3><?php echo $lang['career_desc2'];?> </p>
        
        <a href="condidature.php" class="btn btn-warning"><?php echo $lang['career_envoi'];?></a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
    <img class="card-img-top" src="<?php echo $lang['career_img'];?>" alt="the image alt text here">
      <div class="card-body text-center">
        <h1 class="card-title"><?php echo $lang['career_poste3'];?></h1>
        <p class="card-text text-left"><h3> <?php echo $lang['career_nbr'];?> </h3> 01</p>
        <p class="card-text text-left"><h3>Description : </h3><?php echo $lang['career_desc3'];?> </p>
        
        <a href="condidature.php" class="btn btn-warning"><?php echo $lang['career_envoi'];?></a>
      </div>
    </div>
  </div>
</div>
</div>


<!-------------------End Career ------------------>
<?php include("footer.php")  ?>
