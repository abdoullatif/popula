<?php session_start();
include_once 'fonction/connect-bd.php';
include_once 'fonction/display.class.php';
// var
$user = new display();
$donneesA = array();
$donneesProjet = array();
$imgA = array();
//  fonction
$id = (int) htmlspecialchars($_GET['id_user']);
$donnee = $user->getUser($id);
$rep = $user->getAnnonceUser($id);
$rep2 = $user->getProjetUser($id);
//les nombre annonce et projet
$nbrAnn = $user->getNbrAnnonce($id);
$nbrPro = $user->getNbrProjet($id);
$userInfo = $user->getUserInfo($id);
// traitement
while ($info = $rep->fetch()){
  //recup donnee
  $donneesA[] = $info;
}
//
while ($infoProjet = $rep2->fetch()){
  //recup donnee
  $donneesProjet[] = $infoProjet;
}
?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Popula</title>

    <!-- logo favicon icon -->
    <link rel="shortcut icon" href="image/popula-favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

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
              <a class="nav-link" href="Acceuil.php"><strong>Acceuil</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><strong>Explorer</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="projet.php"><strong>Projet</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forum.php"><strong>Forum</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="a propos.php"><strong>A propos</strong></a>
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
              <a class="nav-link" href="login.php"><strong>S'identifier</a></strong>
            </li>
            <?php
             }
             ?>
            <!--end-->
          </ul>
        </div>
      </div>
    </nav>



    <!--- mdifier profile ----->
    <div class="container">

      <h3 class="titre text-muted">Profile</h3>

      <div class="row">


        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- user profile Widget -->

          <!--right col-->
          <div class="text-center">
            <?php if (isset($userInfo['avatar'])){?>
              <img style="background-image: url('<?php echo $userInfo['avatar'];?>');" id="photo-profil">
            <?php } else { ?>
              <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="photo-profil">
            <?php } ?>
            <h5 class="titre"><?php echo strtoupper($donnee['nom']).' '.strtoupper($donnee['prenom']);?></h5>
          </div><br>

              <div class="panel panel-default">
                <div class="panel-heading">A propos du propietaire <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">
                  
                  <?php if (isset($userInfo['avatar'])){?>
                    <p class="text-muted"><?php echo $userInfo['apropos'];?></p>
                  <?php } else { ?>
                    <p class="text-muted">Pas de description</p>
                  <?php } ?>

                </div>
              </div>


              <ul class="list-group">
                <li class="list-group-item text-muted">Activite <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Annonces</strong></span> <?php echo $nbrAnn; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Projets</strong></span> <?php echo $nbrPro; ?></li>
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

          <!-- Side Widget --><!--
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>-->

        </div>


        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- onglet ... -->

          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active show" data-toggle="tab" href="#annonce">Annonces</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#projet">Projets</a>
            </li>
            <!--
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#conclus">Conclus</a>
            </li>
            -->
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active show" id="annonce">



              <h3 class="titre text-muted lead">Annonces</h3>

              <?php
              foreach ($donneesA as $donneeA){
                //
                $imgA = $user->getImageAnnonce ($donneeA['id']);
                ?>

                <!-- Project One -->

              <div class="row">
                <div class="col-md-7">
                  <a href="voir-annonce.php?id_annonce=<?php echo $donneeA['id'] ?>&amp;id_user=<?php echo $id ?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $imgA['chemin'] ?>" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                  <!--nom-->
                  <li class="d-flex justify-content-between align-items-center">
                  <h5 class="text-muted"><?php echo $donneeA['adresse']; ?></h5>
                    <h5 class="text-muted"><?php echo $donneeA['prix']."".$donneeA['devise']; ?></h5>
                  </li>
                  <!--end-->
                  <p><?php echo $donneeA['descrp']; ?></p>
                  <a class="btn btn-primary" href="voir-annonce.php?id_annonce=<?php echo $donneeA['id'] ?>&amp;id_user=<?php echo $id ?>">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
              </div>
              <!-- /.row -->

              <hr>

                <?php
              }
              ?>

              <!-- --------------//////////////////////////////////////////////////////////// --------------------->
              
            </div>
            <div class="tab-pane fade" id="projet">
              <h3 class="titre text-muted lead">Projets</h3>

              <?php
              foreach ($donneesProjet as $donneeP){
                //
                $imgP = $user->getImageProjet ($donneeP['id']);
              ?>

              <!-- Project One -->
              
              <div class="row">
                <div class="col-md-7">
                  <a href="voir-projet.php?id_projet=<?php echo $donneeP['id']; ?>&amp;id_user=<?php echo $donneeP['id_users'];?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $imgP['chemin'] ?>" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                  <h3><?php echo $donneeP["nom"] ?></h3>
                  <?php
                    $descrPro = substr($donneeP['descrp'],0,100);
                    $descrPro .= " ...";
                  ?>
                  <p><?php echo $descrPro ?></p>
              
                </div>
              </div>
              <!-- /.row -->

              <hr>

              <?php
              }
              ?>

            </div>




            <div class="tab-pane fade" id="conclus">
              <h3 class="titre text-muted lead">Annonces et projets conclus</h3>
            </div>



          </div>

          <!-- page -->
          <span class="espace"></span>

        </div>

      </div>
      <!-- /.row -->

    </div>

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
