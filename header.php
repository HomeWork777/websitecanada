<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <script src="https://kit.fontawesome.com/171f8b7ad3.js" crossorigin="anonymous"></script>
    <title>Au Coeur D'Ange </title>
  </head>
  <body>
     <!-------------------Start upper Bar ------------------->
    <div class="upper-bar">

      <div class="container">
        <div class="row">
          <div class="col-sm adress">
            <i class="fa fa-phone"></i> 514-415-4554 &nbsp;&nbsp;&nbsp; <i class="fa fa-envelope o"></i> denisedecelles@aucoeurdange.ca
          </div>
          <div class="col-sm text-right">
            <?php  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $url = "https"; 
  else
    $url = "http"; 
    
  // Ajoutez // à l'URL.
  $url .= "://"; 
    
  // Ajoutez l'hôte (nom de domaine, ip) à l'URL.
  $url .= $_SERVER['HTTP_HOST']; 
    
  // Ajouter l'emplacement de la ressource demandée à l'URL
  $url .= $_SERVER['REQUEST_URI']; 
    ?>
           <a class="lang <?php if($_GET['lang']=="fr"|| $_SESSION['lang']=="fr") echo("isactive") ;  ?> " href="<?php $url ?>?lang=fr">fr</a>  |  <a class="lang <?php if($_GET['lang']=="en"|| $_SESSION['lang']=="en" ) echo("isactive") ;  ?>" href="<?php $url ?>?lang=en">en</a>
          </div>

        </div>
      </div>


    </div>

      <!-------------------End upper Bar ------------------->
    <!-------------------Start Navbar ------------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container">
           <a class="navbar-brand" href="./index.php"><img class ="d-none d-md-block" id="logo" src="images/logo1.png" alt=""></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon">   
    <i class="fa fa-navicon"></i>
</span>
           </button>
         
           <div class="collapse navbar-collapse" id="main-nav">
             <ul class="navbar-nav ml-auto">
               <li class="nav-item  <?php if($page=='home') {echo " active";}?>">
                 <a class="nav-link" href="./index.php"><?php echo $lang['home'];?> <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item  <?php if($page=='aboutus') {echo " active";}?>">
                 <a class="nav-link" href="./aboutus.php"><?php echo $lang['about'];?></a>
               </li>
               <li class="nav-item   <?php if($page=='ourservices') {echo " active";}?>">
                 <a class="nav-link" href="./ourservices.php"><?php echo $lang['ourservices'];?></a>
               </li>
               <li class="nav-item   <?php if($page=='joinus') {echo " active";}?>">
                 <a class="nav-link" href="./joinus.php"><?php echo $lang['joinus'];?></a>
               </li>
               <li class="nav-item   <?php if($page=='career') {echo " active";}?>">
                 <a class="nav-link" href="./career.php"><?php echo $lang['career'];?></a>
               </li>
             </ul>
            
           </div>
    </div>
    </nav>
     <!-------------------End Navbar ------------------->