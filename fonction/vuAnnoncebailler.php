<?php session_start ();
include_once 'connect-bd.php';
include_once 'display.class.php';

$affichage = new display();

/// bailler
if (isset($_POST['immo']) && !empty($_POST['immo'])){
    ///
    $immo = htmlspecialchars($_POST['immo']);
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

  while($donnee = $bailler->fetch()){
    //tout ce passe icii !
    $donneeImg = $affichage->getImageAnnonce($donnee['id']);
    ?>

    <!-- Annonce -->

              <div class="row">
                <div class="col-md-7">
                  <a href="voir-annonce.php?id_annonce=<?php echo $donnee['id']; ?>&amp;id_user=<?php echo $donnee['id_users'];?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $donneeImg['chemin']; ?>">
                  </a>
                </div>
                <div class="col-md-5">
                  <h4 class="text-muted"><?php echo $donnee['immobilier']; ?></h4>
                  <li class="d-flex justify-content-between align-items-center">
                    <h5 class="text-muted"><?php echo $donnee['adresse']; ?></h5>
                    <h5 class="text-muted"><?php echo $donnee['prix']."".$donnee['devise']; ?></h5>
                  </li>
                  <!-- // je dois limiter le nombre de caractere pour que chaque annonce sois de meme taille  -->
                  <p><?php echo $donnee['descrp']; ?></p>
                  <!-- // je dois limiter le nombre de caractere pour que chaque annonce sois de meme taille  -->
                  <a class="btn btn-primary" href="voir-annonce.php?id_annonce=<?php echo $donnee['id']; ?>&amp;id_user=<?php echo $donnee['id_users']; ?>">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                  <button class="btn btn-primary fav" value="<?php echo $donnee ['id'] ?>">favorie
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </button>
                  <p class="text-success msg"></p>
                </div>
              </div>
              <!-- /.row -->

              <hr>
    <?php
  }
?>

<script>
  $(document).ready(function(){
    //
    $('.fav').click(function(){
        //
        var fav = $(this).attr("value");
        favoris(fav);
    });
    //
    function favoris(fav){
      //debut de la function !
      $.post('fonction/favoris.php',{id_annonce:fav},function(data){
        //ici on returne quelque chose pour dire a l'utilisateur que c'est enregister :)
        $('.msg').html(data);
      });
      return false;
    }
  });
</script>