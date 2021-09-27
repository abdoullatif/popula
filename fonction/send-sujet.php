<?php
include_once 'posterSujet.class.php';

if (isset($_POST['titre'],$_POST['sujet']) && !empty($_POST['titre']) && !empty($_POST['sujet'])){
    //on commence    
    $titre = htmlspecialchars(trim($_POST['titre']));
    $sujet = htmlspecialchars(trim($_POST['sujet']));
    $forum = new forumClass ($titre,$sujet);
    $forum->postSujet();

    echo '<span class="text-success">Sujet Poster avec succes !</span>';
}else {
    echo '<span class="text-danger">Champs vides, veuiller renseigner les champs svp !</span>';
}
