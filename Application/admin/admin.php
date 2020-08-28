<?php

// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(isset($_SESSION["username"])){
    if($_SESSION['role'] == 'user'){
        header("Location: permission.php");
        exit();
    }

} else{
    header("Location: ../login.php");
    exit();
}

  require('../config.php');
  require('../class.php');

  $sqluser = "SELECT * FROM user";
  $resultuser = $conn->query($sqluser);
  $usernum = mysqli_num_rows($resultuser);

  $sqlad = "SELECT * FROM announcement";
  $resultad = $conn->query($sqlad);
  $adnum = mysqli_num_rows($resultad);

  $sqldom = "SELECT * FROM domain";
  $resultdom = $conn->query($sqldom);
  $domnum = mysqli_num_rows($resultdom);

  

?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPPORTUNITÉ | Back Office</title>
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
    <link rel="stylesheet" href="css.css">
  </head>
  <body>
     
  

    <header class="top-menu">
        <span class="nav-text">

       <a href="../index.php"> OPPORTUNITÉ</a> | Back Office

        </span>
    </header>


    <p class="mobile mt-2">Le back Office n'est pas disponible pour la version mobile !</p>

    <div class="container area">
        <div class="row mt-5 mb-5 justify-content-center text-center">
            <h1 style="font-size : 70px;" class="font-weight-bold">STATISTIQUES</h1>
        </div>

        <div class="row justify-content-around">
            <div class="col-sm-4 stats d-flex justify-content-center align-items-center text-center flex-column">
                <i class="fas fa-users mb-4" style="font-size : 50px;"></i>
                <p>Il y'a</p>
                <p class="font-weight-bold"><?php echo $usernum ?></p>
                <p>Utilisateurs Inscris</p>
            </div>

            <div class="col-sm-4 stats d-flex justify-content-center align-items-center text-center flex-column">
                <i class="fas fa-bullhorn mb-4" style="font-size : 50px;"></i>
                <p>Il y'a</p>
                <p class="font-weight-bold"><?php echo $adnum ?></p>
                <p>Annonces Publiées</p>
            </div>
        </div>

    

        <div class="row justify-content-center mt-5">
            <div class="col-sm-4 stats d-flex justify-content-center align-items-center text-center flex-column">
                <i class="fa fa-list-alt mb-4" style="font-size : 50px;"></i>
                <p>Il y'a</p>
                <p class="font-weight-bold"><?php echo $domnum ?></p>
                <p>Domaines disponibles</p>
            </div>

        </div>

    </div>
    



  
  
  
  
  <nav class="main-menu">
            <ul>
            <li>
                    <a href="admin.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            OPPORTUNITÉ | Back Office
                        </span>
                    </a>
                  
                </li>

                

                <li class="has-subnav">
                    <a href="usermanage.php">
                        <i class="fas fa-users-cog fa-2x"></i>
                        <span class="nav-text">
                            Géstion d'utilisateurs
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="admanage.php">
                         <i class="fas fa-bullhorn fa-2x"></i>
                        <span class="nav-text">
                            Géstion des annonces
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="domanage.php">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Géstion des domaines
                        </span>
                    </a>

                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="../logout.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
  </body>
    </html>

























    <!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->
