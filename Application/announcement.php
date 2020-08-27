<?php


  // Initialiser la session
  session_start();
  require('config.php');
  require('class.php');

//   $resultview = $conn->query("UPDATE `announcement` SET `vuecounter` = `vuecounter` + 1 WHERE `id`={$_GET['ad_id']} ");

if (!isset($_SESSION['recent_post'][$_GET['ad_id']])) {
  $resultview = $conn->query("UPDATE `announcement` SET `vuecounter` = `vuecounter` + 1 WHERE `id`={$_GET['ad_id']}");
  $_SESSION['recent_post'][$_GET['ad_id']] = 1;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPPORTUNITÉ | Annonce</title>
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
    <!-- AJAX -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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

<div class="container">
        <div class="row mt-5 mb-5">
          <div class="col-12 ads">
          <img src="img/ads.jpg" alt="">
          </div>
        </div>

        <?php 
             $sqlad = "SELECT announcement.* , domain.name FROM announcement JOIN domain ON announcement.dom_id=domain.id WHERE announcement.id={$_GET['ad_id']}";
             $resultad = $conn->query($sqlad);

             $ad = $resultad->fetch_assoc(); ?>

        <div class="row mb-5">
            <div class="col-sm-8 col-12 shadow mr-4">
                <div>
                    <img src="upload/ad/<?php echo $ad['img'] ?>" alt="" width="100%">
                </div>

                <div class="ml-4 mt-3">
                    <div class="d-flex justify-content-between">
                        <h3><?php echo $ad['title'] ?></h3>
                        <p class="mr-5"><?php echo $ad['vuecounter'] ?> <i class="far fa-eye"></i></p>
                    </div>
                    <p><i class="far fa-folder-open"></i> <?php echo $ad['name'] ?></p>
                    <div class="loc-date d-flex">
                        <p class="mr-5"><i class="fas fa-map-marker-alt"></i> <?php echo $ad['localisation'] ?></p>
                        <p><i class="far fa-clock"></i>  <?php echo $ad['date'] ?></p>
                    </div>

                    <div class="divider"></div>


                    <h4>Description :</h4>

                    <p><?php echo $ad['content'] ?></p>

                </div>

                <?php 
                if(isset($_SESSION["id"])){
                  $votepost = "SELECT * FROM voted WHERE user_id='{$_SESSION['id']}' AND post_id='{$ad['id']}'";
                  $resultvote = $conn->query($votepost);
                  $vote =  $resultvote->fetch_assoc();
                    }
                
                ?>
                <div class="d-flex justify-content-between">
                    <p class="ml-3"   style="font-size : 25px;">
                     <button class="upup mr-4" aria-pressed="<?php if(isset($_SESSION["id"]))
                      {
                        if($vote==0)
                        {echo'false';} 
                      else if($vote['up'] == true){
                        echo'true';}
                      else if($vote['up'] == false)
                        {echo'false';}
                      }else
                        {echo'false';}  ?>"
                      <?php  if(isset($_SESSION["id"])){ ?> 
                        onclick="checkup('<?php echo $ad['id'] ?>','<?php echo $ad['interresting'] ?>','<?php echo $ad['ninterresting'] ?>', this,'<?php echo $_SESSION['id'] ?>')" <?php } ?> style="background-color: transparent; border: none; outline : none;"><i class="fas fa-heart"></i> </button> 
                        
                      <button style="background-color: transparent; border: none; outline : none;" class="downdown" aria-pressed="<?php if(isset($_SESSION["username"]))
                      {
                        if($vote==0)
                          {echo'false';}
                        else if($vote['down'] == true)
                          {echo'true';}
                        else if($vote['down'] == false)
                          {echo'false';}}
                        else{echo'false';}  ?>"
                        <?php  if(isset($_SESSION["username"])){ ?>
                          onclick="checkdown('<?php echo $ad['id'] ?>','<?php echo $ad['interresting'] ?>','<?php echo $ad['ninterresting'] ?>', this,'<?php echo $_SESSION['id'] ?>')" <?php } 
                          ?>><i class="fas fa-heart-broken"></i> </button></p>
                    <a type="button"  data-toggle="modal" data-target="#basicExampleModa2" class="mr-2" style="color : red;">
                      <i class="fas fa-flag"></i> Signaler cette annonce !
                    </a>

                </div>

                <!-- Modal -->
                    <?php
                      if(isset($_POST['report'])){
                        $resultreport = $conn->query("UPDATE `announcement` SET `report` = `report` + 1 WHERE `id`={$_GET['ad_id']}");
                      }

                    ?>

                    <div class="modal fade" id="basicExampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Signaler l'annonce</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST">
                            <label> Est-ce-que vous êtes sùr de signaler cette annonce ? </label>
                           
                          </div>
                          <div class="modal-footer">
                            <button type="submit"  name="report" class="btn btn-secondary btn-deep-orange" >Oui</button>
                            <button type="button" class="btn btn-secondary btn-deep-orange" data-dismiss="modal">Non</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                <!-- Modal -->



            </div>

            <?php 
             $sqluser = "SELECT announcement.id , user.* FROM announcement JOIN user ON announcement.user_id=user.id WHERE announcement.id={$_GET['ad_id']}";
             $resultuser = $conn->query($sqluser);

             $user = $resultuser->fetch_assoc(); ?>

            <div class="col">
                <div class="row shadow justify-content-center">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-circle mr-4" style="font-size : 60px"></i>
                        <div>
                            <h3 class="mt-3"> <?php echo $user['lastname'] ?> <?php echo $user['firstname'] ?>  </h3>
                            <h6 style="color : gray;">@<?php echo $user['username']; ?></h6>
                        </div>

                        
                    </div>

                    <div class="text-center">
                        <a href="" class="btn btn-default btn-rounded mb-1 btn-deep-orange mt-3" data-toggle="modal" data-target="#modalContactForm">Envoyer un message</a>
                    </div>

                    <!-- Modal FORM -->
                            <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Envoyer un message : </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" id="form34" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="form34">Votre Nom Complet</label>
                                    </div>

                                    <div class="md-form mb-5">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                    <input type="email" id="form29" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="form29">Ton email</label>
                                    </div>

                                    <div class="md-form mb-5">
                                    <i class="fas fa-tag prefix grey-text"></i>
                                    <input type="text" id="form32" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="form32">Sujet</label>
                                    </div>

                                    <div class="md-form">
                                    <i class="fas fa-pencil prefix grey-text"></i>
                                    <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                                    <label data-error="wrong" data-success="right" for="form8">Ton message</label>
                                    </div>

                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-unique btn-deep-orange">Envoyer <i class="fas fa-paper-plane-o ml-1"></i></button>
                                </div>
                                </div>
                            </div>
                            </div>

                    <!-- Modal FORM -->


                    <button type="button" class="btn btn-primary btn-deep-orange  mb-4" data-toggle="modal" data-target="#basicExampleModal">
                            Voir le numéro
                        </button>

                        <!-- Modal -->
                                <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Le Numéro de <?php echo $user['lastname'] ?> <?php echo $user['firstname'] ?> : </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                   (+212) <?php echo $user['phone'] ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-deep-orange" data-dismiss="modal">Fermer</button>

                                    </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Modal -->

                               



                </div>

            <div class="row shadow d-flex flex-column align-items-center mt-4">
                <h5 style="font-weight : bold;" class="mt-3">Bonnes pratiques</h5>
                <div class="divider"></div>
                <div class="w-75">
                    <p>Rencontrez le vendeur dans un endroit sûr. </p>

                    <p>Vérifiez le produit avant de l'acheter.</p> 

                    <p>Payez seulement après avoir récupéré le produit</p>
                </div>
    
            </div>
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


<script>
        let up = document.querySelector(".upup")
        let down = document.querySelector(".downdown")
        


       

        function checkup(id,upvotes,downvotes,test, user){

            let upval = up.getAttribute("aria-pressed")
            let downval = down.getAttribute("aria-pressed")

            if (upval == "false") {
                if(downval == "false"){


                    up.setAttribute("aria-pressed", true)
                up.style.color = "red"
                $.post( 'up.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes, user_id : user  }, 
                  function( response ) {
                    //  alert(response);
                    //  $( "#result" ).html( response );
                  }
                );
    
    

                } else  {
                    up.setAttribute("aria-pressed", true)
                up.style.color = "red"
                
                down.setAttribute("aria-pressed", false)
                down.style.color = "black"

               


                $.post( 'up-down.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes, user_id : user }, 
                  function( response ) {
                    //  alert(response);
                    //  $( "#result" ).html( response );
                  }
                );

                
                }
                return false;
            } else  if (upval == "true") {
                

                up.setAttribute("aria-pressed", false)
                up.style.color = "black"

               

                

                $.post( 'up-.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes, user_id : user }, 
       function( response ) {
        //  alert(response);
        //  $( "#result" ).html( response );
       }
    );

                

            }
        }

        
        function checkdown(id,upvotes,downvotes,test, user){

            let upval = up.getAttribute("aria-pressed")
        let downval = down.getAttribute("aria-pressed")

            if (downval == "false") {
                if(upval == "false"){
                    down.setAttribute("aria-pressed", true)
                down.style.color = "red"

               


                $.post( 'down.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes , user_id : user}, 
       function( response ) {
        //  alert(response);
        //  $( "#result" ).html( response );
       }
    );

                } else {
                    up.setAttribute("aria-pressed", false)
                up.style.color = "black"

                down.setAttribute("aria-pressed", true)
                down.style.color = "red"

                


                $.post( 'down-up.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes , user_id : user}, 
       function( response ) {
        //  alert(response);
        //  $( "#result" ).html( response );
       }
    );

                }
                
                
  

            }
            if (downval == "true") {
                

                down.setAttribute("aria-pressed", false)
                down.style.color = "black"



                $.post( 'down-.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes, user_id : user }, 
       function( response ) {
        //  alert(response);
        //  $( "#result" ).html( response );
       }
    );
   

                
            }

        }

       




    </script>

<script>
  let upp = $(".upup");
        let downn = $(".downdown");
        let votess = $(".votes");


for (let i = 0 ; i<upp.length ; i++){
    if (upp[i].getAttribute("aria-pressed") == "true") {

        upp[i].style.color = "red"


        }else{
        upp[i].style.color = "black"

        }

      }

      for (let i = 0 ; i<downn.length ; i++){
    if (downn[i].getAttribute("aria-pressed") == "true") {
        downn[i].style.color = "red"


        }else{
        downn[i].style.color = "black"

        }

      }



</script>






</body>
</html>










































<!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->
