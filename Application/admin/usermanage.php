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

    
    $user_id = $_GET['del'];
    $sqlad = "DELETE FROM announcement WHERE user_id=$user_id";
    $resultad = $conn->query($sqlad);
    $sqluser = "DELETE FROM user WHERE id=$user_id";
    $resultuser = $conn->query($sqluser);
  
  }

  if(isset($_POST['set'])){

    $role = stripslashes($_REQUEST['role']);
    $role = mysqli_real_escape_string($conn, $role);
    $id = $_REQUEST['userid'];
    $update_query = mysqli_query($conn,"UPDATE user SET role = '" . $role . "'  WHERE id = '" . $id . "'");

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

            <div class="container">

            <div class="row mt-5 mb-5 justify-content-center text-center">
                <h1 class="font-weight-bold">
                    GESTION D'UTILISATEUR
                </h1>

            </div>

              <div class="ml-5 table-border">
              <table id="dtBasicExample" class="table  table-bordered table-sm table-responsive-xl table-hover" cellspacing="0" width="100%">
                    <thead class="black white-text">
                      <tr>
                        <th class="th-sm">Pseaudo
                        </th>
                        <th class="th-sm">E-mail
                        </th>
                        <th class="th-sm">Nom
                        </th>
                        <th class="th-sm">Prénom
                        </th>
                        <th class="th-sm">Téléphone
                        </th>
                        <th class="th-sm">Role
                        </th>
                        <th class="th-sm">Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      $sql = "SELECT * FROM user";
                      $result = $conn->query($sql);

                      while($user = $result->fetch_assoc() ) { ?>
                      <tr>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['lastname'] ?></td>
                        <td><?php echo $user['firstname'] ?></td>
                        <td>+212 <?php echo $user['phone'] ?></td>
                        <td>
                          <form action="" method="post" style="margin : 0;">
                            <select name="role" class="browser-default">
                              <option selected="true" value="<?php echo $user['role'] ?>" disabled><?php echo $user['role'] ?></option>
                              <option value="admin">Admin</option>
                              <option value="user">User</option>
                            </select>
                            <input type="hidden" name="userid" value="<?php echo $user['id'] ?>">
                            <button type="submit" class="btn btn-primary btn-sm" name="set" style="margin : 0;" >Set</button>
                          </form>
                        </td>
                        <td><a href="usermanage.php?del=<?php echo $user['id']?>" style="color : #007bff;">Supprimer</a></td>
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
