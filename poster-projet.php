<?php
include_once 'fonction/connect-bd.php';
include_once 'fonction/posterProjet.class.php';

//echo "teste"; 
//echo $_FILES['businessPlan'];
if (isset($_POST['pays']) AND isset($_POST['ville']) AND isset($_POST['immobilier']) AND isset($_POST['cout']) AND isset($_POST['devise']) AND isset($_POST['financement']) AND isset($_POST['nom']) AND isset($_POST['descrp']) AND isset($_POST['delai']) AND isset($_FILES['businessPlan']) AND isset($_FILES['image']) AND isset($_POST['porteur'])){
  //
  $projet = new posterProjet($_POST['pays'],$_POST['ville'],$_POST['immobilier'],$_POST['cout'],$_POST['devise'],$_POST['financement'],$_POST['nom'],$_POST['descrp'],$_POST['delai'],$_FILES['businessPlan'],$_FILES['image'],$_POST['porteur']);
  $verif = $projet->verif_Files ();
  if ($verif == 'ok'){
    $verifImg = $projet->verifImages();
    if ($verifImg == 'ok'){
      $save = $projet->saveProjet();
      //die('identifiant est : '.$save);
      if ($save == 'ok'){
        $projet->saveFiles();
        $projet->saveImages();
        $msgErreur = 'Enregistrement effectuer avec succes !';
      }else {
        $msgErreur = 'Un probleme est survenue lors de votre inscription';
      }
    }else {
      $msgErreur = $verifImg;
    }
  }else {
    $msgErreur = $verif;
  }
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
    <!-- font awesome -->
	  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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

    <!--login-->
    <!-- Page Content -->
    <div class="container">

      <div class="poste">

        <!-- Blog Entries Column -->

        <?php
          if (!isset($_SESSION['id'])){
           ?>
           <!-- phrase d'alerte -->
            <span style="margin: 10em"></span>
            <h5 class="titre text-muted">Veuillez vous <a href="login.php">connecter</a> pour poster un projet</h5>
            <span style="margin: 10em"></span>
            <!-- formulaire d'inscription -->
            <span style="margin: 10em"></span>
            <?php
          }else {
          ?>

        <!-- Sidebar Widgets Column -->
        <div class="">

          <!-- formulaire d'inscription -->

          <span class="espace"></span>
          <!-- zone d'erreur -->
          <?php if (isset($msgErreur)){ ?>
          <div class="form-group">
            <p class="text-danger"><?php echo $msgErreur; ?></p>
          </div>
          <?php } ?>
          <p><a href="demande-logement.php">Faire une demande de logement sociale au ministere ou au porteur de projet present sur popula</a></p>
          <form method="POST" enctype="multipart/form-data" action="poster-projet.php">
            <fieldset>
              <legend></legend>
              <h3 class="titre text-muted">Projet</h3>
              <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" name="pays" class="form-control" id="pays" aria-describedby="pays" placeholder="Guinée">
                <small id="pays" class="form-text text-muted">Dans quel pays souhaiter vous realiser votre projet immobilier</small>
              </div>
              <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" class="form-control" id="ville" aria-describedby="ville" placeholder="Conakry">
                <small id="ville" class="form-text text-muted">Dans quel ville souhaiter vous realiser votre projet immobilier</small>
              </div>
              <!--
              <div class="form-group">
                <label for="commune">Commune</label>
                <input type="text" name="commune" class="form-control" id="ville" aria-describedby="commune" placeholder="Commune">
                <small id="commune" class="form-text text-muted">Dans quel commune ?</small>
              </div>
              <div class="form-group">
                <label for="quartier">Quartier</label>
                <input type="text" name="quartier" class="form-control" id="tel" aria-describedby="quartier" placeholder="Enter le nom du quartier">
              </div>
              <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" id="adresse" aria-describedby="adresse" placeholder="Avez-vous une adresse precis ?">
                <small id="adresse" class="form-text text-muted">exemple : kiroti, petit simbaya.</small>
              </div>
              -->
              <div class="form-group">
                <div class="form-row">
                    <div class="col-md-2">
                      <p class="text-muted">Projet immobilier:</p>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="immobilier" id="optionsRadios1" value="logement" checked="">
                          Logement
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="immobilier" id="optionsRadios1" value="locale industriel">
                          Locale industriel
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="immobilier" id="optionsRadios1" value="education">
                          Education
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="immobilier" id="optionsRadios1" value="locale commercciale">
                          Locale commerciale
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="immobilier" id="optionsRadios1" value="loisir">
                          Loisir
                        </label>
                      </div>
                    </div>
              </div>
              <small id="emailHelp" class="form-text text-muted">Les categorie d'investissement sur popula</small>
            </div>
              <div class="form-group">
                <label for="cout">Cout de financement</label>
                <input type="tel" name="cout" class="form-control" id="cout" aria-describedby="cout" placeholder="Enter le cout">
              </div>
              <div class="form-group">
                <label for="devise">Devise</label>
                <select name="devise" class="form-control" id="devise">
                  <option value="gnf" selected>Gnf</option>
                  <option value="fcfa">Fcfa</option>
                  <option value="euro">Euro</option>
                  <option value="dollar">Dollar</option>
                  <option value="live">live</option>
                </select>
                <small id="devise" class="form-text text-muted">Choisisser une devise</small>
              </div>
              <div class="form-group">
                <div class="form-row">
                    <div class="col-md-2">
                      <p class="text-muted">financement :</p>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="financement" id="optionsRadios1" value="investissement" checked="">
                          Investissement
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="financement" id="optionsRadios1" value="pret">
                          Pret
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="financement" id="optionsRadios1" value="dons">
                          Dons
                        </label>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="nom">Nom du projet</label>
                <input type="text" name="nom" class="form-control" id="nom" aria-describedby="nom" placeholder="Ex : projet de construction d'un hotel, universite, centre commerciale, park, residence universitaire">
                <small id="nom" class="form-text text-muted">Donner un nom a votre projet pour faciliter sa recherche.</small>
              </div>
              <div class="form-group">
                <label for="descrp">Description</label>
                <textarea name="descrp" class="form-control" id="descrp" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="delai">Delai de financement :</label>
                <input type="number" name="delai" class="form-control" id="delai" aria-describedby="delai" placeholder="Entrer le delai de financement">
              </div>
              <div class="form-group">
                <label for="mini">Minimum d'investissement :</label>
                <input type="text" name="minimum" class="form-control" id="mini" aria-describedby="delai" placeholder="Entrer le minimum d'investissement pour votre projet">
              </div>
              <div class="form-group">
                <label for="fichier">Telecharger le business plan de votre projet :</label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" name="businessPlan[]" class="custom-file-input" id="fichier" multiple>
                    <label class="custom-file-label" for="customFile">choississez un fichier pdf</label>
                  </div>
                </div>
                <small id="fileHelp" class="form-text text-muted">Veuiller convertir ou telecharger votre fichier en format pdf s'il vous plait </small>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Avez-vous des modeles d'images pour votre projet ?</label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" name="image[]" class="custom-file-input" id="image" multiple>
                    <label class="custom-file-label" for="image">selectionner des photos</label>
                  </div>
                </div>
                <small id="fileHelp" class="form-text text-muted">Afin de permettre aux investisseur potentiel d'avoir la meme vision que vous, realiser des maquettes photo de votre projet et poster le ! </small>
              </div>
              <fieldset class="form-group">
                <legend></legend>
                <label for="">Etes-vous le porteur de projet :</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="porteur" id="optionsRadios1" value="oui" checked="">
                    Oui
                  </label>
                </div>
                <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="porteur" id="optionsRadios2" value="non">
                    non
                  </label>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <legend></legend>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" required>
                    En cliquant sur Poster vous siigner et accepter nos <a href="#">condition</a> de publication de projet
                  </label>
                </div>
              </fieldset>
              <button type="submit" class="btn btn-primary">Poster le projet</button>
            </fieldset>
          </form>
          <span class="espace"></span>


        </div>
        <?php
          }
          ?>

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
