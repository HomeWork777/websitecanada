<?php $page='aboutus' ; ?>
<?php include("config.php");?>
<?php include("header.php");?>

<!-------------------Start About Us ------------------>

    <div class="container aboutus">
        <div class="row">
             <div class="col-xs-6 col-sm-12">
                 <h2 class="titre"> <?php echo $lang['about_titre1'];?> </h2>
                 
                 <p class="about-para text-justify"><img class="float-left fondatrice" src="images/decelles.jpg" alt=""> <span class="starttexte"> Mme Denise Decelles </span> <?php echo $lang['about_para1'];?> 
                 </p>
        </div> 
              </div>      
        <div class="row">
        <div class="col-xs-6 col-sm-12">
                 <h2 class="titre"> <?php echo $lang['about_titre2'];?> </h2>
                 <p class="about-para text-justify"><span class="starttexte"> <?php echo $lang['about_titre21'];?></span> <?php echo $lang['about_para2'];?>
                 
                 </p>
        </div>
        </div>
    </div>




<!-------------------End About Us ------------------>
<?php include("footer.php")  ?>
