<?php

// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["username"])){
  header("Location: login.php");
  exit();
}
 
  require('config.php');
  require('class.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPPORTUNITÉ | Publier</title>
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
        <center><h1 class="slogan">Publier une annonce !</h1></center>
        </div>

        <hr class="rounded smallhr">

            <?php 
                    if (isset($_POST['add'])){


                        $file_name = $_FILES['photo']['name'];
                        $file_type = $_FILES['photo']['type'];
                        $file_size = $_FILES['photo']['size'];
                        $file_tem_loc = $_FILES['photo']['tmp_name'];
                        $file_store = "upload/ad/".$file_name;


                        $ad = new ANNOUNCEMENT();



                        $ad->title = stripslashes($_REQUEST['title']);
                        $ad->title = mysqli_real_escape_string($conn, $ad->title); 

                        $ad->content = stripslashes($_REQUEST['desc']);
                        $ad->content = mysqli_real_escape_string($conn, $ad->content);

                        $ad->date = date("Y.m.d");

                        $ad->dom_id = stripslashes($_REQUEST['domain']);
                        $ad->dom_id = mysqli_real_escape_string($conn, $ad->dom_id);

                        $ad->loc = stripslashes($_REQUEST['loc']);
                        $ad->loc = mysqli_real_escape_string($conn, $ad->loc);


                        $ad->interr = '0';
                        $ad->ninterr = '0';
                        $ad->report ='0';
                        $ad->vuecounter ='0';

                        $ad->user_id = $_SESSION['id'];



                        $ad->img = $file_name;


                        $query = "INSERT into announcement (title, content, img, interresting, ninterresting , date, localisation , report , vuecounter , user_id, dom_id)
                                VALUES ('$ad->title', '$ad->content', '$ad->img', '$ad->interr' , '$ad->ninterr' , '$ad->date','$ad->loc','$ad->report','$ad->vuecounter', '$ad->user_id','$ad->dom_id')";

                        $res = mysqli_query($conn, $query);
                        if($res){


                            move_uploaded_file($file_tem_loc, $file_store);
                            header("Location: profile.php");

                        }else {
                            echo '<script type="text/javascript">';
                            echo ' alert("incorrect. ")';
                            echo '</script>';
                        }







                    }




            ?>
        
        <div class="container">
            <div class="row row-addad">
                <div class="col">
                 <!-- Default form contact -->
                        <form class="text-center border border-light p-5" method="POST" enctype='multipart/form-data'>

                        <label>Domaine :</label>
                        <select class="browser-default custom-select mb-4" name="domain">
                            <option value="" disabled>Choisissez un domaine</option>
                            <?php 
                                $sqldom = "SELECT * FROM domain";
                                $resultdom = $conn->query($sqldom);
                                while($domain = $resultdom->fetch_assoc() ) {?>
                                <option value="<?php echo $domain['id'] ?>"><?php echo $domain['name'] ?></option>
                            <?php }?>
                            
                        </select>
                        <label>Ville :</label>
                        <select class="browser-default custom-select mb-4" name="loc">
                            <option value="Agadir">Agadir</option>
                            <option value="Al Hoceïma">Al Hoceïma</option>
                            <option value="Beni Mellal">Beni Mellal</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="El Jadida">El Jadida</option>
                            <option value="Essaouira">Essaouira</option>
                            <option value="Essmara">Essmara</option>
                            <option value="Fès">Fès</option>
                            <option value="Khénifra">Khénifra</option>
                            <option value="khmissat">khmissat</option>
                            <option value="khouribga">khouribga</option>
                            <option value="Larache">Larache</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Meknès">Meknès</option>
                            <option value="Mohammedia">Mohammedia</option>
                            <option value="Nador">Nador</option>
                            <option value="Ouarzazate">Ouarzazate</option>
                            <option value="Oujda">Oujda</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Safi">Safi</option>
                            <option value="Salé">Salé</option>
                            <option value="Settat">Settat</option>
                            <option value="Tanger">Tanger</option>
                            <option value="Temara">Temara</option>
                            <option value="Tétouan">Tétouan</option>
                        </select>  

                        <label>Titre:</label>
                        <!-- title -->
                        <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Titre*" name="title">

                        <label>Description :</label>
                        <!-- desciption -->
                        <div class="form-group">
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Description" name="desc"></textarea>
                        </div>

                        <label>Image :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="photo" aria-describedby="inputGroupFileAddon01" />
                                <label class="custom-file-label" for="inputGroupFile01">Image</label>
                            </div>
                            </div>

                        <!-- add button -->
                        <button class="btn btn-info btn-deep-orange" type="submit" name="add">Publier</button>

                        </form>
                        <!-- Default form contact -->
                            
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
