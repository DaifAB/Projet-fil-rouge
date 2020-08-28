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

    
    $dom_id = $_GET['del'];
    $sqlad = "DELETE FROM announcement WHERE dom_id=$dom_id";
    $resultad = $conn->query($sqlad);
    $sqldom = "DELETE FROM domain WHERE id=$dom_id";
    $resultdom = $conn->query($sqldom);
  
  }

  if(isset($_POST['editdomain'])){

                $file_name = $_FILES['image']['name'];
                $file_type = $_FILES['image']['type'];
                $file_size = $_FILES['image']['size'];
                $file_tem_loc = $_FILES['image']['tmp_name'];
                $file_store = "../upload/domaine/".$file_name;
                move_uploaded_file($file_tem_loc, $file_store);
                

                $domain = new DOMAIN();

                $domain->name = stripslashes($_REQUEST['name']);
                $domain->name = mysqli_real_escape_string($conn, $domain->name);

                $domain->img = $file_name;

                $domain->id = $_POST['id'];

                $domain->updateDomain($conn);

                

  }

        if(isset($_POST['add'])){

            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $file_tem_loc = $_FILES['image']['tmp_name'];
            $file_store = "../upload/domaine/".$file_name;
            move_uploaded_file($file_tem_loc, $file_store);
            

            $domain = new DOMAIN();

            $domain->name = stripslashes($_REQUEST['name']);
            $domain->name = mysqli_real_escape_string($conn, $domain->name);

            $domain->img = $file_name;

            $query = "INSERT into domain (name, img) VALUES ('$domain->name', '$domain->img')";

            $res = mysqli_query($conn, $query);
            if($res){


                move_uploaded_file($file_tem_loc, $file_store);
                header("Location: domanage.php");

            }else {
                echo '<script type="text/javascript">';
                echo ' alert("Erreur. ")';
                echo '</script>';
            }

            

            

            

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
  

    <header class="top-menu">
        <span class="nav-text">

       <a href="../index.php"> OPPORTUNITÉ</a> | Back Office

        </span>
    </header>

    <p class="mobile mt-2">Le back Office n'est pas disponible pour la version mobile !</p>

        <div class="container area">
            
            <div class="row mt-5 mb-5 justify-content-center text-center">
                <h1 class="font-weight-bold">
                    GESTION DES DOMAINES
                </h1>

            </div>

            <div class="row">
                <div class="col-sm-8 mt-3">
                        <div class="ml-5 table-border">
                        <table id="dtBasicExample" class="table  table-bordered table-sm table-responsive-xl table-hover" cellspacing="0" width="100%">
                            <thead class="black white-text">
                            <tr>
                                <th class="th-sm">#id
                                </th>
                                <th class="th-sm">Nom
                                </th>
                                <th class="th-sm">Image
                                </th>
                                <th class="th-sm">Modifier
                                </th>
                                <th class="th-sm">Supprimer
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM domain";
                            $result = $conn->query($sql);

                            while($dom = $result->fetch_assoc() ) { ?>
                            <tr>
                                <td><?php echo $dom['id'] ?></td>
                                <td><?php echo $dom['name'] ?></td>
                                <td><?php echo $dom['img'] ?></td>
                                <td class="text-center"><a href="domanage.php?update=<?php echo $dom['id']?>" style="color : green;"><i class="fas fa-edit"></i></a></td>
                                <td class="text-center"><a href="domanage.php?del=<?php echo $dom['id']?>" style="color : red;"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">


                

                    <?php 
                        if(isset($_GET['update'])){

                            $idupd = $_GET['update'];

                            $sqlupd = "SELECT * FROM domain WHERE id = '$idupd'";
                            $resultupd = $conn->query($sqlupd);

                            $upd = $resultupd->fetch_assoc();

                        
                    ?>
                    <form class="border border-dark p-5" method='post' enctype='multipart/form-data'>
                        <p class="h4 mb-4 text-center">Modifier un domaine :</p>
                        <label for="">Nom :</label>
                        <input type="text" id="defaultSaveFormFirstName" class="form-control mb-3" placeholder="Nom" name="name" value="<?php echo $upd["name"] ?>">
                        <input type="hidden" name="id" class="input" value="<?php echo $idupd; ?>" >
                        <label for="">Image :</label>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileInput" name="image">
                                <label class="custom-file-label" for="fileInput">Image</label>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit" name="editdomain">Modifier</button>
                    </form>

                        <?php } else { ?>

                    <form class="border border-dark p-5" method="post" enctype='multipart/form-data'>
                    <p class="h4 mb-4 text-center">Ajouter un domaine :</p>
                    <label for="">Nom :</label>
                    <input type="text" id="defaultSaveFormFirstName" class="form-control mb-3" placeholder="Nom" name="name">
                    <label for="">Image :</label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileInput" name="image">
                            <label class="custom-file-label" for="fileInput">Image</label>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit" name="add">Ajouter</button>
                </form>
                <?php }?>

                </div>
            
            </div>
        
        </div>


  
  
  
  







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
