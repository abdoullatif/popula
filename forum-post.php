<?php session_start();
include_once 'fonction/connect-bd.php';
include_once 'fonction/forumPost.class.php';
$bdd=bdd();
//
$post = new forumPostClass();
if (isset($_GET['id'])){
  //
  $id = (int) $_GET['id'];
  $rep = $post->getsujet($id);
}
if (isset($_GET['comment_status']) and isset($_GET['id_comment'])){
  //on marque le commentaire vu.
  $statComment = (int) $_GET['comment_status'];
  $id_comment = (int) $_GET['id_comment'];
  $post->setCommentStat($id_comment);
}
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
    <!-- font awesome -->
	  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="vendor/jquery/jquery.js"></script>
    <!-- Mes script JS -->
    <script src="fonction/script-forumpost.js"></script>
    <script src="fonction/script-notification.js"></script>
    <script src="fonction/script-notifiBadge.js"></script>

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
                <a class="dropdown-item" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notification <span class="badge badge-pill badge-primary nmbreNotifi"></span></a>
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

      <!-- Page Heading forum -->
      <h3 class="titre text-muted">Forum</h3>
      <!-- end --->

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Popula</a>
        </li>
        <li class="breadcrumb-item active">Forum</li>
        <li class="breadcrumb-item active">Discusions</li>
      </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
          <?php
          //
          if($rep){
          ?>
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="card-title"><?php echo $rep['titre'] ?></h3>
              <p class="card-text"><?php echo $rep['sujet'] ?></p>
            </div>
            <div class="card-footer text-muted">
              <?php echo $rep['date_post'] ?> par
              <a href="voir-profile-user.php?id_user=<?php echo $rep['id_user'] ?>"><?php echo $rep['auteur'] ?></a>
            </div>
          </div>
          <?php
          //
          }
          ?>
          <!-- Discusion -->

          <h5 class="titre">Discusions</h5>

          <!--formulaire poster un commentaire-->
          <form method="post" class="discusions">
            <div class="form-group">
              <div class="form-row">
                <div class="form-group col-md-10">
                  <input type="text" class="form-control form-control-sm commentaire" placeholder="Commenter ...">
                  <input type="hidden" class="id_post" value="<?php echo $rep['id'] ?>">
                </div>
                <div class="form-group col-md-2">
                  <button type="submit" class="form-control form-control-sm submit">Commenter</button>
                </div>
              </div>
              <div class="error"></div>
            </div>
          </form>
          
          <!--end-->

          <!-- commentaire Post -->
          <div class="commentairePost"></div>

          <!-- end commentaire Post -->

          <!-- Pagination -->


          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
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

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Derniere tendance</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">#Construction</a>
                    </li>
                    <li>
                      <a href="#">#Renauvation</a>
                    </li>
                    <li>
                      <a href="#">#Entretient</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">#securite</a>
                    </li>
                    <li>
                      <a href="#">#Mobilier</a>
                    </li>
                    <li>
                      <a href="#">#Demenagements</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Publicité</h5>
            <div class="card-body">
              L'afrique c'est la solidarite ensemble participons au developpement du continent
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
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

    