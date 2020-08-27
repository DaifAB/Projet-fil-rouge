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
    <title>OPPORTUNITÉ | Règlements</title>
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
        <center><h1 class="slogan">CONDITIONS GÉNÉRALES</h1>
        <hr class="rounded smallhr"></center>
        </div>


        <div class="container">
        <div class="accordion-menu">
      <div class="item" id="item1">
        <a href="#item1" class="title">
          <span>Règles de publication</span>
          <i class="icon"></i>
        </a>
        <p class="text">
        Lors de la publication d’une annonce, l’utilisateur ou l’annonceur sont tenus de se soumettre aux règles édictées par le site Opportunité ainsi qu’à la législation marocaine sous peine de voir leur annonce non conforme supprimée. Ces règles sont susceptibles de modification sans préavis de la part de Opportunité
        </p>
        <p class="text">
        Dans le cadre des contrôles effectués par le site web Opportunité et pour des raisons de lisibilité, de pertinence ou de respect des règles de publication, Opportunité se réserve le droit de modifier, actualiser, déplacer, repositionner une annonce.
        </p>
      </div>

      <div class="item" id="item2">
        <a href="#item2" class="title">
          <span>Répititions</span>
          <i class="icon"></i>
        </a>
        <p class="text">
        La politique de Opportunité interdit la publication de doublons d’annonces concernant un même produit ou service à louer, vendre ou publier plusieurs annonces pour un même article, service ou emploi. Opportunité suggère à ses utilisateurs de supprimer l’annonce la plus ancienne avant d’en publier la nouvelle. Les utilisateurs sont également tenus de publier leur annonce dans la bonne catégorie ou rubrique sous réserve de la voir supprimer. Les utilisateurs qui ne respecteraient pas cette règle pourraient voir toutes leurs annonces ou leur compte supprimés.
        </p>
        <p class="text">
        De même, un seul compte est autorisé par personne et les utilisateurs contrevenant à cette règle sont susceptibles de voir leurs comptes supprimés et leurs e-mails black-listés.
        </p>
      </div>

      <div class="item" id="item3">
        <a href="#item3" class="title">
          <span>Publicité</span>
          <i class="icon"></i>
        </a>
        <p class="text">
        Opportunité propose gratuitement la diffusion d’annonces par les particuliers. Les entreprises qui souhaitent effectuer des opérations de marketing ou de publicité sont tenues de contacter le service commercial du site web Opportunité pour ce faire ; toute publicité déguisée insérée comme annonce sur le site web expose les responsables à des sanctions allant de la suppression à d’autres recours légaux.
        </p>
      </div>

      <div class="item" id="item4">
        <a href="#item4" class="title">
          <span>Annonces</span>
          <i class="icon"></i>
        </a>
        <p class="text">
        Deux types d’annonces sont acceptés sur le site Opportunité : <br>

        Des annonces de particuliers dont l’affichage ne comprend pas de logo et qui se concentrent sur les informations du produit ou service à vendre, qui doit être clairement identifié. <br>

        Des annonces d’entreprises ou de professionnels, qui peuvent comprendre des logos et d’autres informations propres à la nature des organisations et dont la mise en page peut différer. Les professionnels qui publient ce type d’annonces sont tenus de respecter les règles de publication, et notamment les aspects liés à la publicité.
        </p>
      </div>

      <div class="item" id="item5">
        <a href="#item5" class="title">
          <span>Photos</span>
          <i class="icon"></i>
        </a>
        <p class="text">
        Les photos complètent l’annonce et doivent lui correspondre. Toute photo vantant un produit ou service autre que celui attendu entrainera la modification ou la suppression de l’annonce. L’utilisateur ou l’annonceur doivent respecter les lois sur la propriété intellectuelle et le copyright des photos. Il est aussi interdit de publier sur le site Opportunité des photos estampillées du logo d’un site concurrent ou de tout autre organisme ou personne. Pour illustrer les annonces, l’utilisateur devra proposer une photo et non un logo de marque. Toutes les photos publiées sur le site Opportunité sont réputées respecter la loi et les bonnes mœurs, c’est pourquoi l’utilisateur qui publierait des photos hors de ce cadre s’exposerait à des sanctions allant de la suppression de son compte et de son annonce à des poursuites légales.
        </p>
      </div>

      <div class="item" id="item6">
        <a href="#item6" class="title">
          <span>Copyright</span>
          <i class="icon"></i>
        </a>
        <p class="text">
        Les utilisateurs et les annonceurs accordent de fait à Opportunité et sa société éditrice, de façon perpétuelle et irrévocable bien que non exclusive, le droit d’utiliser, reproduire, modifier, adapter, publier, traduire et distribuer les contenus qu’ils publient sur le site Opportunité. L’incorporation de ces éléments à d’autres formes ou technologies présentes ou à venir entre dans le champ de ces droits.
        </p>
      </div>

      <div class="item" id="item7">
        <a href="#item7" class="title">
          <span>Prix</span>
          <i class="icon"></i>
        </a>
        <p class="text">
        Les prix indiqués dans les annonces et au niveau des formulaires doivent être corrects et correspondre à la fois à la réalité des biens vendus et au véritable prix auquel l’utilisateur est prêt à céder son bien. Il n’est ni utile ni conseillé de signaler le prix plusieurs fois : un champ spécial est prévu à cet effet et la lisibilité de l’annonce peut pâtir du non-respect de cette disposition.
        </p>
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
