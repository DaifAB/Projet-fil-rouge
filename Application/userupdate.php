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
    <title>OPPORTUNITÉ | Changer mes Informations </title>
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




<div class="container form-container">
    <div class="row">

    
<!-- Default form register -->
<form class="text-center border border-light p-5" action="" method="post">

<?php



if(isset($_POST["edit"])){
    
    $user = new USER();

  $user->firstname = stripslashes($_REQUEST['firstname']);
  $user->firstname = mysqli_real_escape_string($conn, $user->firstname); 

  $user->lastname = stripslashes($_REQUEST['lastname']);
  $user->lastname = mysqli_real_escape_string($conn, $user->lastname);

  $user->username = stripslashes($_REQUEST['username']);
  $user->username = mysqli_real_escape_string($conn, $user->username);


  $user->email = stripslashes($_REQUEST['email']);
  $user->email = mysqli_real_escape_string($conn, $user->email);

  $user->phone = stripslashes($_REQUEST['phone']);
  $user->phone = mysqli_real_escape_string($conn, $user->phone);

  $user->id = $_GET['id'];



  $user->password = stripslashes($_REQUEST['password']);
  $user->password = mysqli_real_escape_string($conn, $user->password);
  $hashedpassword = password_hash($user->password, PASSWORD_DEFAULT);


  $confirmpassword = stripslashes($_REQUEST['confirmpassword']);
  $confirmpassword = mysqli_real_escape_string($conn, $confirmpassword);
  
  
   if ($user->password === $confirmpassword) {

                       $user->UpdateInfromation($conn);
                       $user->ChangePassword($conn,$hashedpassword);

  }else {
    
    echo ' <p style="color : red;">Les mots de passe ne sont pas identiques. </p>';  
}

}
?>


    <p class="h4 mb-4">Changer vos information !</p>

                                <?php 
                                         $sqluser = "SELECT * FROM user where id={$_GET['id']}";
                                         $resultuser = $conn->query($sqluser);
                                         $dispuser = $resultuser->fetch_assoc();
                               ?>
                                
                    

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" name="firstname" class="form-control" placeholder="Prénom*" value="<?php echo $dispuser['firstname'] ?>" required>
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" name="lastname" class="form-control" placeholder="Nom*"  value="<?php echo $dispuser['lastname'] ?>" required>
        </div>
    </div>

    <input type="text" name="username" class="form-control" placeholder="Pseaudo*" aria-describedby="defaultRegisterFormPhoneHelpBlock" value="<?php echo $dispuser['username'] ?>" required><br>
    <!-- E-mail -->
    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail*" value="<?php echo $dispuser['email'] ?>"> <br>

    <!-- Password -->
    <input type="password" name="password" class="form-control" placeholder="Mot de passe*" aria-describedby="defaultRegisterFormPasswordHelpBlock" required><br>
    
    <!-- Confirm Password -->
    <input type="password" name="confirmpassword" class="form-control" placeholder="Retapez Votre Mot de passe*" aria-describedby="defaultRegisterFormPasswordHelpBlock" required><br>
  

    <!-- Phone number -->
    <input type="text" name="phone" class="form-control" placeholder="Téléphone*" aria-describedby="defaultRegisterFormPhoneHelpBlock" value="<?php echo $dispuser['phone'] ?>" required><br>
   

    

    <!-- Sign up button -->
    <button class="btn btn-deep-orange" type="submit" name="edit">Changer !</button>

   

    

</form>
<!-- Default form register -->


    </div>
</div>




<!-- Footer -->
<footer class="page-footer font-small deep-orange darken-3">

  <!-- Footer Elements -->
  <div class="container">

     <!-- Grid row-->
     <div class="row footer-row">

<!-- Grid column -->
<div class="col-md-12 py-5 ">
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
