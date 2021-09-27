<?php session_start();
include_once 'connect-bd.php';
include_once 'displayProjet.class.php';
$bdd = bdd ();

$donnees = array();

$recupP = new displayProjet ();

$id = (int) htmlspecialchars($_POST['id_projet']);
$rep = $recupP->getComentP($id);

while ($info = $rep->fetch()){
    $donnees[] = $info;
}

foreach ($donnees as $donnee){
    //   
?>
          <!-- commentaire Post -->
          <div class="card mb-4">
            <div class="card-body">
              <p class="card-text"><?php echo $donnee['commentaire']; ?></p>
            </div>
            <div class="card-footer text-muted">
              Poster en <?php echo $donnee['date_creation']; ?> par
              <a href="voir-profile-user.php?id_user=<?php echo $donnee['id_users']; ?>"><?php echo $donnee['auteur']; ?></a>
            </div>
          </div>

<?php
}
?>