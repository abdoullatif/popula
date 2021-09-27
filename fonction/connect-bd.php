<?php
function bdd () {
    try {
        $bdd = new PDO ('mysql:host=localhost;dbname=populabd','root','');
    }catch (Exception $e) {
        die ('Erreur : '.$e->getmessage());
    }
    return $bdd;
}