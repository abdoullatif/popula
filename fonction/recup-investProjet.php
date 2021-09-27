<?php session_start();
include_once 'connect-bd.php';
include_once 'displayProjet.class.php';
$bdd = bdd ();

$donnees = array();

$recupP = new displayProjet ();

$id = (int) htmlspecialchars($_POST['id_projet']);
$rep = $recupP->getlistinvestP($id);

while ($info = $rep->fetch()){
    $donnees[] = $info;
}
?>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Profession</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Investissement</th>
                  </tr>
                </thead>
                <tbody>
<?php
foreach ($donnees as $donnee){
    //   
?>
                <tr class="table-active">
                    <th scope="row"><?php echo $donnee['profession']; ?></th>
                    <td><?php echo $donnee['nom']; ?></td>
                    <td><?php echo $donnee['prenom']; ?></td>
                    <td><?php echo $donnee['montant']; ?></td>
                </tr>

<?php
}
?>
                </tbody>
              </table>