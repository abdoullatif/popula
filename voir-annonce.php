<?php session_start();
include_once'fonction/connect-bd.php';
$bdd=bdd();
include_once 'fonction/display.class.php';
$affichage = new display();
// on recupere les annonces
$idAnnonce = (int) htmlspecialchars($_GET['id_annonce']);
$idUser = (isset($_GET['id_user'])) ? (int) htmlspecialchars($_GET['id_user']) : 0;
$user = $affichage->getUser($idUser);
$userInfo = $affichage->getUserInfo($idUser);
//les nombre annonce et projet
$nbrAnn = $affichage->getNbrAnnonce($idUser);
$nbrPro = $affichage->getNbrProjet($idUser);
//
$annonce = $affichage->getAnnonce($idAnnonce);
$nbrImg = $affichage->getNbrImg($annonce['id']);
$annonceImg = $affichage->getAllImageAnnonce($annonce['id']);
$byImage = array();
?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="abdoulatif souleymane sooba" content="">

    <title>Popula</title>

    <!-- logo favicon icon -->
    <link rel="shortcut icon" href="image/popula-favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="vendor/bootstrap/css/ui.css" rel="stylesheet">
    <!-- font awesome -->
	  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- JQuery -->
    <script src="vendor/jquery/jquery.js"></script>
    <!-- Mes script JS -->
    <script src="fonction/script-annonceComent.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar <!--fixed-top--> navbar-expand-lg navbar-light bg-light <!--fixed-top-->">
      <div class="container">
        <a class="navbar-brand" href="Acceuil.php"><img src="image/logo/popula.png" alt="popula" title="popula"/></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="Acceuil.php"><strong>Acceuil</strong><i class="fa fa-home"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><strong>Explorer</strong><i class="fa fa-rocket"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="projet.php"><strong>Projet</strong><i class="fa fa-building"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forum.php"><strong>Forum</strong><i class="fa fa-comments-o"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="a propos.php"><strong>A propos</strong><i class="fa fa-quote-right"></i></a>
            </li>
            <!--code php-->
            <?php
            if (isset($_SESSION['id'])){
              ?>
            <!--plug in log out, Notification, profil ... -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong><?php echo $_SESSION['nom']?></strong>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notification <span class="badge badge-pill badge-primary">3</span></a>
                <div class="dropleft">
                  <div class="dropdown-menu">
                    <!-- Dropdown menu left links -->
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre annonce de #type</a>
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre projet de #theme</a>
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre annonce de #lieux</a>
                  </div>
                </div>
                <a class="dropdown-item" href="profile.php">profile</a>
                <a class="dropdown-item" href="log-out.php">Deconnection</a>
              </div>
            </li>
            <!--end-->
            <?php
             } else {
               ?>
            <!--sinscrit-->
            <li class="nav-item">
              <a class="nav-link" href="login.php"><strong>S'identifier</strong><i class="fa fa-user-circle"></i></a>
            </li>
            <?php
             }
             ?>
            <!--end-->
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h3 class="titre">Detail</h3>

      <!-- carousellllllllllll----->
      <?php
        while ($Image = $annonceImg->fetch()){
          // tout ici !!!!!!!!
          //echo $nbrImg;
          $byImage[] = $Image['chemin'];
        }
      ?>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php
          /*
            for ($i=0;$i<$nbrImg;$i++){
              if ($i == 0){
                echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"$i\" class=\"active\"></li>";
              } else {
                echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"$i\"></li>";
              }
              
            }
            */
          ?>
          <!-----
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
          ------>
        </ol>
        <div class="carousel-inner" role="listbox">
          <?php
          $f = 0;
            foreach ($byImage as $chemin){
              if ($f == 0){
                // si on est sur active !!!!
          ?>
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?php echo $chemin; ?>')" data-toggle="modal" data-target="#modal<?php echo $f; ?>">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!--modale-->
          <div class="modal fade" id="modal<?php echo $f; ?>">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-body mb-0 p-0">
                          <img src="<?php echo $chemin; ?>" style="width:100%">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end modal-->
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <?php
              } else {
              // on continue !!!!!!!!
          ?>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo $chemin; ?>')" data-toggle="modal" data-target="#modal<?php echo $f; ?>">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!--modale-->
          <div class="modal fade" id="modal<?php echo $f; ?>">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-body mb-0 p-0">
                          <img src="<?php echo $chemin; ?>" style="width:100%">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end modal-->
          <?php
            }
          $f++;
          }
          ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!--eof---->
      <span class="espace"></span>
      <!---- les photo en carreau --------->
      <article class="gallery-wrap"> 
      <div class="img-small-wrap">
      <?php
          $n = 0;
            foreach ($byImage as $chemin){
              if ($n == 0){
                // si on est sur active !!!!
          ?>
        <div class="item-gallery" style="background-image: url('<?php echo $chemin; ?>'); background-size: cover;" data-target="#carouselExampleIndicators" data-slide-to="<?php echo $n; ?>" class="active"></div>
        <?php
              } else {
              // on continue !!!!!!!!
          ?>
        <div class="item-gallery" style="background-image: url('<?php echo $chemin; ?>'); background-size: cover;" data-target="#carouselExampleIndicators" data-slide-to="<?php echo $n; ?>"></div>
        <?php
            }
          $n++;
          }
          /////////////////////////////////////////////////////////////////////////////
          ?>

      </div>
      </article> <!-- gallery-wrap .end// -->
      <!--eof---->
      <?php
        //// end
      ?>
      <!--eof   while                 zof               !!!!!!!!!!---->


      <span class="espace"></span>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Description Post -->
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="card-title"><?php echo "Montant: ".$annonce['prix']." ".$annonce['devise']; ?></h3>
              <h5 class="card-title">Description :</h5>
              <p class="card-text"><?php echo $annonce['descrp'] ?></p>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <p>Pays : <?php echo $annonce['pays'] ?> </p>
                </div>
                <div class="form-group col-md-3">
                  <p>Ville : <?php echo $annonce['ville'] ?></p>
                </div>
                <div class="form-group col-md-3">
                  <p>Commune : <?php echo $annonce['commune'] ?></p>
                </div>
                <div class="form-group col-md-3">
                  <p>Quartier : <?php echo $annonce['quartier'] ?></p>
                </div>
              </div>
              <p>Caracteristique</p>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <p><?php echo $annonce['chambre'] ?> chambre</p>
                </div>
                <div class="form-group col-md-2">
                  <p><?php echo $annonce['salon'] ?> Salon</p>
                </div>
                <div class="form-group col-md-2">
                  <p><?php echo $annonce['cuisine'] ?> Cuisine</p>
                </div>
                <div class="form-group col-md-2">
                  <p><?php echo $annonce['toilette'] ?> Toilette</p>
                </div>
              </div>
              <p>promoteur : Mr <?php echo strtoupper($user['nom']) ?></p>
              <p>telephone : <?php echo $user['telephone']; ?> </p>
              <p>Email : <?php echo $user['email']; ?> </p>
            </div>
          </div>

          <!--boutton explorer-->
      <div class="col-lg-4" style="margin: auto;">
        <a href="publicite.php" style="text-decoration: none;">
          <button type="button" class="btn btn-success btn-block">Je m'installe</button>
        </a>
        
      </div>
      
      <!--end-->

          <h5 class="titre">commentaire</h5>

          <!--formulaire poster un commentaire-->
          <form method="post" class="coment">
            <div class="form-group">
              <div class="form-row">
                <div class="form-group col-md-10">
                  <input type="text" class="form-control form-control-sm commentaire" placeholder="Entrer votre Commentaire">
                  <input type="hidden" class="form-control form-control-sm id_annonce" value="<?php echo $annonce['id'] ?>">
                </div>
                <div class="form-group col-md-2">
                  <input value="commenter" type="submit" class="form-control form-control-sm submit">
                </div>
              </div>
              <div class="error"></div>
            </div>            
          </form>
          <!--end-->


          <div class="commentaireAnnonce"></div>

          <!-- end commentaire Post -->

          <!-- Pagination -->
          
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- user profile Widget -->

          <!--right col - http://ssl.gstatic.com/accounts/ui/avatar_2x.png   -->
          <div class="text-center">

            <?php if (isset($userInfo['avatar'])){?>
              <img style="background-image: url('<?php echo $userInfo['avatar'] ?>');" id="photo-profil"><br><br>
            <?php } else { ?>
              <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="photo-profil">
            <?php } ?>

            <h4><?php echo strtoupper($user['nom'])." ".strtoupper($user['prenom']); ?></h4>
          </div><br>


              <div class="panel panel-default">
                <div class="panel-heading">A propos du proprietaire <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">
                  <!--<p>Description</p>-->
                  <?php if (isset($userInfo['apropos'])){?>
                    <p><?php echo $userInfo['apropos'] ?></p>
                  <?php } else { ?>
                    <p>Descriptions non renseigner</p>
                  <?php } ?>

                </div>
              </div>


              <ul class="list-group">
                <li class="list-group-item text-muted">Activite <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Annonces</strong></span> <?php echo $nbrAnn; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Projets</strong></span><?php echo $nbrPro; ?></li></li>
                <!--
                <li class="list-group-item text-right"><span class="pull-left"><strong>Investissements</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Affaire Conclus</strong></span> 78</li>
                -->
              </ul>

              <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                </div>
              </div>

          <!-- search component
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
        -->

          <!-- Categories Widget --><!--
          <div class="card my-4">
            <h5 class="card-header">Categories de bien</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">maison</a>
                    </li>
                    <li>
                      <a href="#">Hotel</a>
                    </li>
                    <li>
                      <a href="#">Immeuble</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">motel</a>
                    </li>
                    <li>
                      <a href="#">chambre</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>-->

          <!-- Side Widget -->
          <!--
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>
        -->

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Popula <?php echo date("Y"); ?></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
