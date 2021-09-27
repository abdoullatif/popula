<?php session_start();
include_once 'fonction/connect-bd.php';
include_once 'fonction/display.class.php';
//function
$affichage = new display();
//var
// verification de temps de connection !
/*
if (isset($_SESSION['last_action']) and $_SESSION['last_action']+600 > time()){
  // si la desrnier action date de moins 5min alors il est dans les regles :)
  // mis a jour de last_action
  $_SESSION['last_action'] = time();
} else {
  // il n'est pas dans les regle, on le deconnecte :(
  header('Location: log-out.php');
}
*/
/*
/// louer 
if (isset($immo) && !empty($immo)){
  echo $immo;
  ///
  //$immo = htmlspecialchars($_GET['immobilier']);
  if ($immo == "all"){
    $louer = $affichage->getAnnonceTransact("louer");
  }else{
    $louer = $affichage->getAnnonceTransactandCat("louer",$immo);
  }

}else {
  // on recupere les annonces
  $louer = $affichage->getAnnonceTransact("louer");
  // ici on recupere les annonce specifique en fonction de categories immobilier !
}

/// vendre 
if (isset($immo) && !empty($immo)){
  ///
  //$immo = htmlspecialchars($_GET['immobilier']);
  if ($immo == "all"){
    $vendre = $affichage->getAnnonceTransact("vendre");
  }else{
    $vendre = $affichage->getAnnonceTransactandCat("vendre",$immo);
  }

}else {
  // on recupere les annonces
  $vendre = $affichage->getAnnonceTransact("vendre");
  // ici on recupere les annonce specifique en fonction de categories immobilier !
}

/// bailler
if (isset($_GET['immobilier']) && !empty($_GET['immobilier'])){
  ///
  $immo = htmlspecialchars($_GET['immobilier']);
  if ($immo == "all"){
    $bailler = $affichage->getAnnonceTransact("bailler");
  }else{
    $bailler = $affichage->getAnnonceTransactandCat("bailler",$immo);
  }

}else {
  // on recupere les annonces
  $bailler = $affichage->getAnnonceTransact("bailler");
  // ici on recupere les annonce specifique en fonction de categories immobilier !
}

/// colocation
if (isset($_GET['immobilier']) && !empty($_GET['immobilier'])){
  ///
  $immo = htmlspecialchars($_GET['immobilier']);
  if ($immo == "all"){
    $colocation = $affichage->getAnnonceTransact("colocation");
  }else{
    $colocation = $affichage->getAnnonceTransactandCat("colocation",$immo);
  }

}else {
  // on recupere les annonces
  $colocation = $affichage->getAnnonceTransact("colocation");
  // ici on recupere les annonce specifique en fonction de categories immobilier !
}
*/

////////////////////////////////////////////////////////////////////////////////////////////////
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
    <meta name="Abdoulatif souleymane sooba" content="">

    <title>Popula</title>

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
    <script src="fonction/script-displayAnnonce.js"></script>
    <script src="fonction/script-notification.js"></script>
    <script src="fonction/script-notifiBadge.js"></script>
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
                <a class="dropdown-item" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notification <span class="badge badge-pill badge-danger nmbreNotifi"></span></a>
                <div class="dropleft">
                  <div class="dropdown-menu notification">
                    <!-- Dropdown menu left links -->
                    
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

      <h3 class="titre text-muted">Explorer</h3>

      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4">


          <div class="container demo">

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                                <i class="fa fa-bars"></i>
                                <span>Type de Bien</span>
                                 
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <div class="list-group">
                            <button value="all" class="list-group-item text-primary immo" style="text-align: left;">Toutes les categories</button>
                            <button value="villa" class="list-group-item text-primary immo" style="text-align: left;">Villa</button>
                            <button value="appartement" class="list-group-item text-primary immo" style="text-align: left;">Appartement</button>
                            <button value="immeuble" class="list-group-item text-primary immo" style="text-align: left;">Immeuble</button>
                            <button value="studio" class="list-group-item text-primary immo" style="text-align: left;">Studio</button>
                            <button value="hotel" class="list-group-item text-primary immo" style="text-align: left;">Hotel</button>
                            <button value="terrain" class="list-group-item text-primary immo" style="text-align: left;">Terrain</button>
                            <button value="bureaux" class="list-group-item text-primary immo" style="text-align: left;">Bureaux</button>
                            <button value="commerciale" class="list-group-item text-primary immo" style="text-align: left;">Locale Commerciale</button>
                            <button value="industriel" class="list-group-item text-primary immo" style="text-align: left;">Locale industriel</button>
                            <button value="entrepot" class="list-group-item text-primary immo" style="text-align: left;">Entrepot</button>
                            <button value="parking" class="list-group-item text-primary immo" style="text-align: left;">Parking</button>
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
          <div id="accordion">

            <div class="card">
              <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                  All categories
                </a>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                <div class="card-body">
                  <div class="list-group">
                    <button value="all" class="list-group-item text-primary immo" style="text-align: left;">Toutes les categories</button>
                    <button value="villa" class="list-group-item text-primary immo" style="text-align: left;">Villa</button>
                    <button value="appartement" class="list-group-item text-primary immo" style="text-align: left;">Appartement</button>
                    <button value="immeuble" class="list-group-item text-primary immo" style="text-align: left;">Immeuble</button>
                    <button value="studio" class="list-group-item text-primary immo" style="text-align: left;">Studio</button>
                    <button value="hotel" class="list-group-item text-primary immo" style="text-align: left;">Hotel</button>
                    <button value="terrain" class="list-group-item text-primary immo" style="text-align: left;">Terrain</button>
                    <button value="bureaux" class="list-group-item text-primary immo" style="text-align: left;">Bureaux</button>
                    <button value="commerciale" class="list-group-item text-primary immo" style="text-align: left;">Locale Commerciale</button>
                    <button value="industriel" class="list-group-item text-primary immo" style="text-align: left;">Locale industriel</button>
                    <button value="entrepot" class="list-group-item text-primary immo" style="text-align: left;">Entrepot</button>
                    <button value="parking" class="list-group-item text-primary immo" style="text-align: left;">Parking</button>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="card">
              <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                  Collapsible Group Item #2
                </a>
              </div>
              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  Lorem ipsum..
                </div>
              </div>
            </div>
            

          </div>-->

          <!--
          <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bars"></i>
              <span>Categories</span>
            </button>
            <div class="dropdown-menu">
              <div class="list-group">
                <button value="all" class="list-group-item text-primary immo" style="text-align: left;">Toutes les categories</button>
                <button value="villa" class="list-group-item text-primary immo" style="text-align: left;">Villa</button>
                <button value="appartement" class="list-group-item text-primary immo" style="text-align: left;">Appartement</button>
                <button value="immeuble" class="list-group-item text-primary immo" style="text-align: left;">Immeuble</button>
                <button value="studio" class="list-group-item text-primary immo" style="text-align: left;">Studio</button>
                <button value="hotel" class="list-group-item text-primary immo" style="text-align: left;">Hotel</button>
                <button value="terrain" class="list-group-item text-primary immo" style="text-align: left;">Terrain</button>
                <button value="bureaux" class="list-group-item text-primary immo" style="text-align: left;">Bureaux</button>
                <button value="commerciale" class="list-group-item text-primary immo" style="text-align: left;">Locale Commerciale</button>
                <button value="industriel" class="list-group-item text-primary immo" style="text-align: left;">Locale industriel</button>
                <button value="entrepot" class="list-group-item text-primary immo" style="text-align: left;">Entrepot</button>
                <button value="parking" class="list-group-item text-primary immo" style="text-align: left;">Parking</button>
              </div>
            </div>
          </div>
            -->

          <!--
          <div class="list-group">
            <button value="all" class="list-group-item text-primary immo" style="text-align: left;">Toutes les categories</button>
            <button value="villa" class="list-group-item text-primary immo" style="text-align: left;">Villa</button>
            <button value="appartement" class="list-group-item text-primary immo" style="text-align: left;">Appartement</button>
            <button value="immeuble" class="list-group-item text-primary immo" style="text-align: left;">Immeuble</button>
            <button value="studio" class="list-group-item text-primary immo" style="text-align: left;">Studio</button>
            <button value="hotel" class="list-group-item text-primary immo" style="text-align: left;">Hotel</button>
            <button value="terrain" class="list-group-item text-primary immo" style="text-align: left;">Terrain</button>
            <button value="bureaux" class="list-group-item text-primary immo" style="text-align: left;">Bureaux</button>
            <button value="commerciale" class="list-group-item text-primary immo" style="text-align: left;">Locale Commerciale</button>
            <button value="industriel" class="list-group-item text-primary immo" style="text-align: left;">Locale industriel</button>
            <button value="entrepot" class="list-group-item text-primary immo" style="text-align: left;">Entrepot</button>
            <button value="parking" class="list-group-item text-primary immo" style="text-align: left;">Parking</button>
          </div>
            -->
          
        </div>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active show" data-toggle="tab" href="#louer">Louer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#acheter">Acheter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#bail">Bail</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#colocation">Colocation</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active show" id="louer">

              <span class="espace"></span>
              <!--search bar louer-->

              <div class="list-group">
                <div class="list-group-item">
                  <h6 class="centrer text-muted"><strong>Rechercher</strong></h6>
                  <form method="post" class="search-louer">
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm adresseL" placeholder="Adresse">
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm chambreL">
                        <option selected>chambre</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm salonL">
                        <option selected>salon</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm cuisineL">
                        <option selected>cuisine</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm toiletteL">
                        <option selected>Toilette</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm budgetL" placeholder="Budget max">
                    </div>

                  </div>

                    <!--tableau interieur search bar commodite checkbox -->
                    <div class="form-row">
                      <div class="col-md-2">
                        <p class="text-muted">Commodite :</p>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Garage</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck2">
                          <label class="custom-control-label" for="customCheck2">Annex</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck3">
                          <label class="custom-control-label" for="customCheck3">piscine</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck4">
                          <label class="custom-control-label" for="customCheck4">magasin</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck5">
                          <label class="custom-control-label" for="customCheck5">case</label>
                        </div>
                      </div>
                    </div>
                    <!--etat-->
                    <div class="form-row">
                      <div class="col-md-1">
                        <p class="text-muted">Etat :</p>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                            <label class="custom-control-label" for="customRadio1">Neuf</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Ancien</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- boutton pour poster annonce --->
                    <a href="poster-annonce.php"><button type="button" class="btn btn-outline-primary" style="float: right; line-height: 20px;">Poster votre annonce</button></a>
                    <!-- end -->
                    <!--bouton rechecher-->
                    <div class="form-row">
                      <div class="col-md-3">
                        <button type="submit" class="form-control form-control-sm submit">chercher</button>
                      </div>
                      <!--
                      <div class="col-md-3">
                        <small id="" class="form-text text-muted"><a href="search-advancer.php">recherche avancer</a></small>
                      </div>
                      -->
                    </div>
                    <!--end-->
                  </form>
                  </div>

                </div>
              
              <!--fin //////////////////////////////////////////////////////////////////////////////////////////////-->

                
              <!-- /.aaaaaaaaaaaaaannnnnnnnnnnoonceeeeeeeeeeeeeeeeeee -->
              <div class="postAnnoncelouer"></div>


              <!-- end !!!!!! -->

              <!--Pagination-->
              <span class="espace"></span>
              <!-- Pagination 
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>-->
              <!--end-->
              <!-- /.row -->
            </div>


            
            <div class="tab-pane fade" id="acheter">
              <span class="espace"></span>

              <div class="list-group">
                <div class="list-group-item">
                  <h6 class="centrer text-muted"><strong>Rechercher</strong></h6>
                  <form method="post" class="search-vendre">
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm adresseV" placeholder="Adresse">
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm chambreV">
                        <option selected>chambre</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm salonV">
                        <option selected>salon</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm cuisineV">
                        <option selected>cuisine</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm toiletteV">
                        <option selected>Toilette</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm budgetV" placeholder="Budget max">
                    </div>

                  </div>

                  <!--tableau interieur search bar commodite checkbox -->
                  <div class="form-row">
                      <div class="col-md-2">
                        <p class="text-muted">Commodite :</p>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck6">
                          <label class="custom-control-label" for="customCheck6">Garage</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck7">
                          <label class="custom-control-label" for="customCheck7">Annex</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck8">
                          <label class="custom-control-label" for="customCheck8">piscine</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck9">
                          <label class="custom-control-label" for="customCheck9">magasin</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck10">
                          <label class="custom-control-label" for="customCheck10">case</label>
                        </div>
                      </div>
                    </div>
                    <!--etat-->
                    <div class="form-row">
                      <div class="col-md-1">
                        <p class="text-muted">Etat :</p>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" checked="">
                            <label class="custom-control-label" for="customRadio3">Neuf</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio4">Ancien</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- boutton pour poster annonce --->
                    <a href="poster-annonce.php"><button type="button" class="btn btn-outline-primary" style="float: right; line-height: 20px;">Poster votre annonce</button></a>
                    <!-- end -->
                    <!--bouton rechecher-->
                    <div class="form-row">
                      <div class="col-md-3">
                        <button type="submit" class="form-control form-control-sm submit">chercher</button>
                      </div>
                      <!--
                      <div class="col-md-3">
                        <small id="" class="form-text text-muted"><a href="search-advancer.php">recherche avancer</a></small>
                      </div>
                      -->
                    </div>
                    <!--end-->
                    </form>
                  </div>
                
               </div>

                <!--fin -->

              <!--fin //////////////////////////////////////////////////////////////////////////////////////////////-->

              <!-- Annonce -->

              <!-- /.aaaaaaaaaaaaaannnnnnnnnnnoonceeeeeeeeeeeeeeeeeee -->
              <div class="postAnnoncevendre"></div>


            <!---------   end      onget    ---------->
            </div>
            <div class="tab-pane fade" id="bail">
              <span class="espace"></span>

              <div class="list-group">
                <div class="list-group-item">
                  <h6 class="centrer text-muted"><strong>Rechercher</strong></h6>
                  <form method="post" class="search-bailler">
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm adresseB" placeholder="Adresse">
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm chambreB">
                        <option selected>chambre</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm salonB">
                        <option selected>salon</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm cuisineB">
                        <option selected>cuisine</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm toiletteB">
                        <option selected>Toilette</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm budgetB" placeholder="Budget max">
                    </div>

                  </div>

                  <!--tableau interieur search bar commodite checkbox -->
                  <div class="form-row">
                      <div class="col-md-2">
                        <p class="text-muted">Commodite :</p>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck11">
                          <label class="custom-control-label" for="customCheck11">Garage</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck12">
                          <label class="custom-control-label" for="customCheck12">Annex</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck13">
                          <label class="custom-control-label" for="customCheck13">piscine</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck14">
                          <label class="custom-control-label" for="customCheck14">magasin</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck15">
                          <label class="custom-control-label" for="customCheck15">case</label>
                        </div>
                      </div>
                    </div>
                    <!--etat du bien-->
                    <div class="form-row">
                      <div class="col-md-1">
                        <p class="text-muted">Etat :</p>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input" checked="">
                            <label class="custom-control-label" for="customRadio5">Neuf</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio6" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio6">Ancien</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- boutton pour poster annonce --->
                    <a href="poster-annonce.php"><button type="button" class="btn btn-outline-primary" style="float: right; line-height: 20px;">Poster votre annonce</button></a>
                    <!-- end -->
                    <!--bouton rechecher-->
                    <div class="form-row">
                      <div class="col-md-3">
                        <button type="submit" class="form-control form-control-sm submit">chercher</button>
                      </div>
                      <!--
                      <div class="col-md-3">
                        <small id="" class="form-text text-muted"><a href="search-advancer.php">recherche avancer</a></small>
                      </div>
                      -->
                    </div>
                    <!--end-->
                    </form>
                  </div>

               </div>

                <!--fin -->

              <!--fin //////////////////////////////////////////////////////////////////////////////////////////////-->

              
              <!-- /.aaaaaaaaaaaaaannnnnnnnnnnoonceeeeeeeeeeeeeeeeeee -->
              <div class="postAnnoncebailler"></div>

            </div>



            <div class="tab-pane fade" id="colocation">
              <span class="espace"></span>

              <div class="list-group">
                <div class="list-group-item">
                  <h6 class="centrer text-muted"><strong>Rechercher</strong></h6>
                  <form method="post" class="search-colocation">
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm adresseC" placeholder="Adresse">
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm chambreC">
                        <option selected>chambre</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm salonC">
                        <option selected>salon</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm cuisineC">
                        <option selected>cuisine</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <select id="inputState" class="form-control form-control-sm toiletteC">
                        <option selected>Toilette</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm budgetC" placeholder="Budget max">
                    </div>

                  </div>

                  <!--tableau interieur search bar commodite checkbox -->
                  <div class="form-row">
                      <div class="col-md-2">
                        <p class="text-muted">Commodite :</p>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck16">
                          <label class="custom-control-label" for="customCheck16">Garage</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck17">
                          <label class="custom-control-label" for="customCheck17">Annex</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck18">
                          <label class="custom-control-label" for="customCheck18">piscine</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck19">
                          <label class="custom-control-label" for="customCheck19">magasin</label>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck20">
                          <label class="custom-control-label" for="customCheck20">case</label>
                        </div>
                      </div>
                    </div>
                    <!--etat-->
                    <div class="form-row">
                      <div class="col-md-1">
                        <p class="text-muted">Etat :</p>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio7" name="customRadio" class="custom-control-input" checked="">
                            <label class="custom-control-label" for="customRadio7">Neuf</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio8" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio8">Ancien</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- boutton pour poster annonce --->
                    <a href="poster-annonce.php"><button type="button" class="btn btn-outline-primary" style="float: right; line-height: 20px;">Poster votre annonce</button></a>
                    <!-- end -->
                    <!--bouton rechecher-->
                    <div class="form-row">
                      <div class="col-md-3">
                        <button type="submit" class="form-control form-control-sm submit">chercher</button>
                      </div>
                      <!--
                      <div class="col-md-3">
                        <small id="" class="form-text text-muted"><a href="search-advancer.php">recherche avancer</a></small>
                      </div>
                      -->
                    </div>
                    <!--end-->
                    </form>
                  </div>

               </div>

                <!--fin -->

              <!-- Project One -->

              <!--fin //////////////////////////////////////////////////////////////////////////////////////////////-->

              <!-- Annonce -->
              <!-- /.aaaaaaaaaaaaaannnnnnnnnnnoonceeeeeeeeeeeeeeeeeee -->
              <div class="postAnnoncecolocation"></div>

            </div>
          </div>

          <!-- page -->

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; popula <?php echo date("Y"); ?></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Js Plugins -->
    <script src="vendor/js/main.js"></script>


  </body>

</html>
