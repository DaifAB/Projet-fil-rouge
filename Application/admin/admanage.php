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

  if (isset($_GET['del'])) {

    
    $ad_id = $_GET['del'];
    $sqlad = "DELETE FROM announcement WHERE id=$ad_id";
    $resultad = $conn->query($sqlad);
    
  
  }



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
                <h1 class="font-weight-bold">
                    GESTION D'ANNONCE
                </h1>

            </div>

              <div class="ml-5 table-border">
              <table id="dtBasicExample" class="table  table-bordered table-sm table-responsive-xl table-hover" cellspacing="0" width="100%">
                    <thead class="black white-text">
                      <tr>
                        <th class="th-sm">Titre
                        </th>
                        <th class="th-sm">Description
                        </th>
                        <th class="th-sm">Domaine
                        </th>
                        <th class="th-sm">Utilisateur
                        </th>
                        <th class="th-sm">Reports
                        </th>
                        <th class="th-sm">Localisation
                        </th>
                        <th class="th-sm">Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      $sql = "SELECT announcement.*, domain.name , user.username FROM announcement JOIN domain ON announcement.dom_id = domain.id JOIN user ON announcement.user_id = user.id";
                      $result = $conn->query($sql);

                      while($ad = $result->fetch_assoc() ) { ?>
                      <tr>
                        <td><?php echo $ad['title'] ?></td>
                        <td class="d-inline-block text-truncate" style="max-width: 400px;"><?php echo $ad['content'] ?></td>
                        <td><?php echo $ad['name'] ?></td>
                        <td>@<?php echo $ad['username'] ?></td>
                        <td><?php echo $ad['report'] ?></td>
                        <td><?php echo $ad['localisation'] ?></td>
                        <td><a href="admanage.php?del=<?php echo $ad['id']?>" style="color : #007bff;">Supprimer</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
              </table>
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

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script>
        $(document).ready(function () {
        $('#dtBasicExample').DataTable({
        "lengthMenu": [ 10 ],
        "language": {
            "lengthMenu": "Affiche _MENU_ colonnes par page",
            "zeroRecords": "0 résultat - Désolé",
            "info": "Montrant page _PAGE_ de _PAGES_",
            "infoEmpty": "Aucun enregistrement disponible",
            "infoFiltered": "(filtrés d'un totale de _MAX_  entregistrements)"
        }
        });
        $('.dataTables_length').addClass('bs-select');
        });
        </script>
  </body>
    </html>






































    <!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->
