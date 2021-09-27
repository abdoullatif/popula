<?php session_start();
include_once'fonction/connect-bd.php';
$bdd=bdd();


?>
<script type="text/javascript">
  setInterval()

</script>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>popula</title>

    <!-- logo favicon icon -->
    <link rel="shortcut icon" href="image/popula-favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->
	  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Mon script JS -->
    <script src="fonction/script-voirProjet.js"></script>
    <!--<script src="fonction/script-displayProjet.js"></script>-->
    <script src="fonction/script-notificationPro.js"></script>
    <script src="fonction/script-notifiBadgePro.js"></script>
    <!--<script src="fonction/auto-logout.js"></script>-->

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
                <a class="dropdown-item" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notification <span class="badge badge-pill badge-primary">0</span></a>
                <div class="dropleft">
                  <div class="dropdown-menu">
                    <!-- Dropdown menu left links 
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre annonce de #type</a>
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre projet de #theme</a>
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre annonce de #lieux</a>
                    -->
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

      <!-- Page Heading Explor -->

        <h3 class="titre text-muted">Investissement</h3>

      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4">
          <!-- moteur de recherche petit simple rapide -->
          <div class="card mb-4">
            <h6 class="card-header">Recherche</h6>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Titre du projet">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
          <!--end-->

          <!-- Sidebar content -->



            <div class="container">

              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                                <i class="fa fa-bars"></i>
                                <span>Type de Projet</span>
                                 
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <div class="list-group">
                            <button value="all" class="list-group-item text-primary immo" style="text-align: left;">Tous</button>
                            <button value="logement" class="list-group-item text-primary immo" style="text-align: left;">Logement</button>
                            <button value="bureaux" class="list-group-item text-primary immo" style="text-align: left;">Bureaux</button>
                            <button value="locale industriel" class="list-group-item text-primary immo" style="text-align: left;">Locale industriel</button>
                            <button value="locale commerciale" class="list-group-item text-primary immo" style="text-align: left;">Locale commerciale</button>
                            <button value="loisir" class="list-group-item text-primary immo" style="text-align: left;">Loisir</button>
                            <button value="education" class="list-group-item text-primary immo" style="text-align: left;">Education</button>
                          </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                Collapsible Group Item #2
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                Collapsible Group Item #3
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                -->

            </div><!-- panel-group -->
            
          </div><!-- container -->


          <!--
          <div class="list-group">
            <button value="all" class="list-group-item immo" style="text-align: left;">Tous</button>
            <button value="logement" class="list-group-item immo" style="text-align: left;">Logement</button>
            <button value="bureaux" class="list-group-item immo" style="text-align: left;">Bureaux</button>
            <button value="locale industriel" class="list-group-item immo" style="text-align: left;">Locale industriel</button>
            <button value="locale commerciale" class="list-group-item immo" style="text-align: left;">Locale commerciale</button>
            <button value="loisir" class="list-group-item immo" style="text-align: left;">Loisir</button>
            <button value="education" class="list-group-item immo" style="text-align: left;">Education</button>
          </div>
            -->
          <hr>
          <a href="poster-projet.php"><button type="button" class="btn btn-outline-primary">Poster votre projet</button></a>
        </div>


        <!----en sidebar----->

        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active show" data-toggle="tab" href="#investir">Investir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#pret">Pret</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#dons">Dons</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active show" id="investir">

              <span class="espace"></span>

              <!-- Project One http://placehold.it/700x300-->

              <!--Projet Investir java script-->
              <div class="postProjetInvestir"></div>
              <!--Projet end -->
              
              <!-- /.row -->
            </div>
            <div class="tab-pane fade" id="pret">
              <span class="espace"></span>

              <!-- Project One http://placehold.it/700x300-->


              <!--Projet Investir java script-->
              <div class="postProjetPres"></div>
              <!--Projet end -->

              <!--
              <div class="row">
                <div class="col-md-7">
                  <a href="voir-projet.php">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="image/icon/popula-projet.png" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                  <h3>Nom</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                  <a class="btn btn-primary" href="voir-projet.php">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                  <a class="btn btn-primary" href="#">favorie
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                  <a class="btn btn-primary" href="#">Voter
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
              </div>

              <hr>
              
               /.row -->


            </div>
            <div class="tab-pane fade" id="dons">
              <span class="espace"></span>

              <!-- Project One http://placehold.it/700x300-->

              <!--Projet Dons java script-->
              <div class="postProjetDons"></div>
              <!--Projet end -->

            </div>
          </div>

          <!-- page -->
          <span class="espace"></span>

        </div>
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
