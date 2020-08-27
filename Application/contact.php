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
    <title>OPPORTUNITÉ | Contactez-nous</title>
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
        <div class="slogan">
        <center><h1 class="slogan">N'hésitez pas à nous contacter si vous avez besoin d'aide ! </h1></center>
        </div>


        <div class="container">
            <div class="row contact-row">
                <div class="col-4">
                    <h4>Adresse :</h4>
                    <hr class="line">
                    <p>
                    21, Rue Des Cretes <br>

                    Jnane Chekkouri <br>

                    Safi 46020 <br>

                    Email : contact@opportunite.ma <br>

                    Téléphone : 05 24 00 00 00
                    </p>

                </div>

                <div class="col-8">
                    <!--Section: Contact v.2-->
                    <section class="mb-4">

                    <!--Section heading-->
                    <h4>Contactez-nous</h4>
                    <hr class="line">
                

                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-9 mb-md-0 mb-5">
                            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="name" name="name" class="form-control">
                                            <label for="name" class="">Votre nom complet</label>
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="email" name="email" class="form-control">
                                            <label for="email" class="">Votre Email</label>
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <input type="text" id="subject" name="subject" class="form-control">
                                            <label for="subject" class="">Objet</label>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                            <label for="message">Ton message</label>
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->

                            </form>

                            <div class="text-center text-md-left">
                                <a class="btn btn-deep-orange" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
                            </div>
                            <div class="status"></div>
                        </div>
                        <!--Grid column-->

                        

                    </div>

                    </section>
                    <!--Section: Contact v.2-->

                </div>
            </div>
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




</body>
</html>







































<!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->
