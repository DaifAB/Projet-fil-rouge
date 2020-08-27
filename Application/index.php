<?php


  // Initialiser la session
  session_start();
  require('config.php');
  require('class.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPPORTUNITÉ | Accueil</title>
    <link rel="icon" type="image/png" href="img/icon.png" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-light white-color">
  <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
    
      <form class="form-inline" action="search.php" method="POST" >
        <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
        </div>
        <button class="btn btn-outline-deep-orange btn-md my-2 my-sm-0 ml-3" type="submit" name="search-submit">Search</button>
      </form>
    

    <li class="nav-item">
    <a href="addad.php">
    <button type="button" class="btn btn-deep-orange"> <i class="fas fa-plus-square"></i>  Déposer une annonce</button>
    </a>
    </li>

    
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
    <?php
        if(!isset($_SESSION["username"])){
            echo '
            <li class="nav-item">
                <a class="nav-link" 
                 href="login.php">
                 <button class="btn btn-deep-orange">Se connecter</button>
                 
                
                
                </a>
            </li>
            
            ';


        }else {

            echo'
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default"
                aria-labelledby="navbarDropdownMenuLink-333">
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="logout.php">Se deconnecter !</a>
                </div>
            </li>
            
            ';
        }


    ?>
     
    </ul>
  </div>
</nav>
<!--/.Navbar -->



<div class="container-fluid home">


  <div class="row">
    <div class="col home-header">
      <h2>BIENVENUE SUR <span>LE PREMIER</span>  SITE D'ANNONCE <span>GRATUIT</span>  AU MAROC « <span>OPPORTUNITÉ</span> »</h2>
      <h4>Trouvez la bonne affaire parmi <span> plusieurs </span> annonces sur <span>Opportunité</span></h4>
    </div>
  </div>


</div>

<div class="container">
        <div class="row">
          <div class="col-12 ads">
          <img src="img/ads.jpg" alt="">
          </div>
        </div>

        

        <div class="row cat-row">
        <h3>Choisissez un domaine :</h3>
          <div class="col-12 cat">
          <?php 
                  $sqldom = "SELECT * FROM domain";
                  $resultdom = $conn->query($sqldom);
                  while($domain = $resultdom->fetch_assoc() ) {?>
                  <a href="domain.php?idom=<?php echo $domain['id']; ?>"><img src="upload/domaine/<?php echo $domain['img'] ?>" alt="" height="136px" width="143px" class="mt-2"></a>
          <?php }?>

           
          </div>
        </div>
          
        <div class="row why mt-5">
                <div class="col">
                <h2>Pourquoi déposer une annonce sur <span> OPPORTUNITÉ ? </span></h2>
                <hr class="rounded">
                </div>
            </div>

          

          

            <div class="row">
                <div class="col-sm">
                    <div class="icon-why">
                        <img src="img/goods.svg" alt="">
                    </div>
                    <h4>C'est gratuit</h4>
                    <p>Chez nous, la gratuité c'est un état d'esprit.<br>Déposer une petite annonce</p>
                </div>
                <div class="col-sm">
                    <div class="icon-why">
                            <img src="img/feedback.svg" alt="">
                        </div>
                        <h4>Service clients</h4>
                        <p>Le service client est le coeur de notre organisation, pour nous c'est le pilier</p>
                    </div>
                <div class="col-sm">
                <div class="icon-why">
                        <img src="img/offres.svg" alt="">
                    </div>
                    <h4>Meilleures offres</h4>
                    <p>Chez nous on vous garantit une diversité d'offres pour vous aider</p>
                </div>
            </div>

           
</div>


<div class="container">
<div class="row why mt-5">
                <div class="col">
                <h2>Annonces récentes :</h2>
                <hr class="rounded">
                </div>
            </div>

          <div class="row">

          <?php 
             $sqlad = "SELECT announcement.*, domain.name FROM announcement JOIN domain ON announcement.dom_id=domain.id ORDER BY date DESC LIMIT 3";
             $resultad = $conn->query($sqlad);
             
             
             while ($ad = $resultad->fetch_assoc()) { ?>
            <div class="col-sm col-12">
             <div class="card mb-2">
               <div style="width : 100%; height : 240px;">
                 <img class="card-img-top"  src="upload/ad/<?php echo $ad['img'] ?> "   alt="Card image cap" style="width : 100%; height : 100%; object-fit : cover;">
                </div>
                 <div class="card-body">
                 <div style="height : 60px;">
                   <h4 class="card-title text-center"><?php echo $ad['title']; ?></h4>
                 </div>
                 <div style="color : gray">
                    <div class="text-left "><p><i class="far fa-folder-open"></i> <?php echo $ad['name'] ?></p></div>
                    <div class="text-left "><p><i class="fas fa-map-marker-alt"></i> <?php echo $ad['localisation'] ?></p></div> 
                    <div class="text-left "><p><i class="far fa-clock"></i> <?php echo $ad['date'] ?></p></div>
                  </div>
                  <center><a class="btn btn-primary btn-deep-orange rounded-pill" href="announcement.php?ad_id=<?php echo $ad['id'] ?>">Voir l'annonce</a> </center>
                 </div>
              </div>
            </div>
             <?php }?>
          </div>

        <div class="row mt-5">
          <div class="col-12 ads">
          <img src="img/ads.jpg" alt="">
          </div>
        </div>


        <div class="row why mt-5">
                <div class="col">
                <h2>Annonces recommendées :</h2>
                <hr class="rounded">
                </div>
            </div>

          <div class="row">

          <?php 
             $sqlad1 = "SELECT announcement.*, domain.name FROM announcement JOIN domain ON announcement.dom_id=domain.id ORDER BY vuecounter DESC LIMIT 3";
             $resultad1 = $conn->query($sqlad1);
             
             
             while ($ad1 = $resultad1->fetch_assoc()) { ?>
            <div class="col-sm col-12">
             <div class="card mb-2">
               <div style="width : 100%; height : 240px;">
                 <img class="card-img-top"  src="upload/ad/<?php echo $ad1['img'] ?> "   alt="Card image cap" style="width : 100%; height : 100%; object-fit : cover;">
                </div>
                 <div class="card-body">
                 <div style="height : 60px;">
                   <h4 class="card-title text-center"><?php echo $ad1['title']; ?></h4>
                 </div>
                 <div style="color : gray">
                    <div class="text-left "><p><i class="far fa-folder-open"></i> <?php echo $ad1['name'] ?></p></div>
                    <div class="text-left "><p><i class="fas fa-map-marker-alt"></i> <?php echo $ad1['localisation'] ?></p></div> 
                    <div class="text-left "><p><i class="far fa-clock"></i> <?php echo $ad1['date'] ?></p></div>
                  </div>
                  <center><a class="btn btn-primary btn-deep-orange rounded-pill" href="announcement.php?ad_id=<?php echo $ad1['id'] ?>">Voir l'annonce</a> </center>
                 </div>
              </div>
            </div>
             <?php }?>
          </div>
          
          <center> <a href="addad.php">
    <button type="button" class="btn btn-deep-orange mrg-bot"> <i class="fas fa-plus-square"></i>  Déposer une annonce</button>
    </a> </center>

</div>



                            




<!-- Footer -->
<footer class="page-footer font-small deep-orange darken-3">

  <!-- Footer Elements -->
  <div class="container">

     <!-- Grid row-->
     <div class="row footer-row">

<!-- Grid column -->
<div class="col-md-12 py-5">
  <div class="footer-wrap">

    <!-- Facebook -->
    <a class="about" href="about.php">
    À propos
    </a>
    <!-- Twitter -->
    <a class="condition"  href="condition.php">
      Règlements
    </a>

    <!--Instagram-->
    <a class="contact"  href="contact.php">
     Aide
    </a>
    <a class="contact"  href="contact.php">
     Contactez-nous
    </a>
    
    
  </div>
</div>
<!-- Grid column -->

</div>
<!-- Grid row-->



    <!-- Grid row-->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12 py-5">
        <div class="mb-5 flex-center">

          <!-- Facebook -->
          <a class="fb-ic"  href="https://facebook.com">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic"  href="https://twitter.com">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>

          <!--Instagram-->
          <a class="ins-ic"  href="https://www.instagram.com/">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          
          
        </div>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 OPPORTUNITÉ | Tous droits réservés.
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


<script>

$('#myCarousel').carousel({
    interval: 1000
})

$('.carousel .carousel-item').each(function() {
    var minPerSlide = 4;
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});

</script>

</body>
</html>













































<!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->
