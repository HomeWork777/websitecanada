
<?php $page='home'; ?>
<?php include("config.php");?>
<?php include("header.php");?>

 <!-------------------Start slider ------------------>
     <!--Carousel Wrapper-->
     <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
	<li data-target="#carousel-example-2" data-slide-to="3"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="images/slider1.jpg"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/slider2.jpg"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/slider3.jpg"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      
    </div>
	 <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/slider4.jpg">
        <div class="mask rgba-black-slight"></div>
      </div>
      
    </div>
  </div>
  
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

     <!-------------------End slider ------------------>
     <!------------------Start Message------------------>
     <section class="message">
      
          
		  <marquee with="800" scrollamount="10"  behavior="scroll"><h2-responsive>     Nous travaillons pendant le covid-19</h2-responsive> </marquee>
          
      </section>
    
<!------------------End Message------------------>


 <!-- start section Features -->
 <section class="features text-center">
    <div class="container">
      <h1><?php echo $lang['titre_nosvaleurs'];?></h1>
        <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="feat">
              <i class="far fa-check-circle"></i>
                 <h4><?php echo $lang['titre_valeur1'];?> </h4>
                 <p> <?php echo $lang['para_valeur1'];?></p>
              </div>
          </div>

          <div class="col-lg-3 col-md-6">
                <div class="feat">
                <i class="far fa-check-circle"></i>
                <h4><?php echo $lang['titre_valeur2'];?> </h4>
                 <p> <?php echo $lang['para_valeur2'];?></p>
                </div>
          </div>

        <div class="col-lg-3 col-md-6">
            <div class="feat">
            <i class="far fa-check-circle"></i>
            <h4><?php echo $lang['titre_valeur3'];?> </h4>
                 <p> <?php echo $lang['para_valeur3'];?></p>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="feat">
            <i class="far fa-check-circle"></i>
            <h4><?php echo $lang['titre_valeur4'];?> </h4>
                 <p> <?php echo $lang['para_valeur4'];?></p>
            </div>
        
        </div>

      </div>
    </div>

</section>

  <!-- End section Features -->
  <!--------Start our engagement--------------->
<section class="engagement">
<div class="container">
  <h1 class="text-center"><i class="fas fa-edit"></i> <?php echo $lang['titre_engagement'];?></h1>
  <p class="text-eng text-justify"> <span class="poli"><?php echo $lang['soustitre_engagement'];?></span> 
  <?php echo $lang['para_enga'];?>
</p>
</div>

</section>


  <!--------End Our engagement----------------->

<?php include("footer.php")  ?>