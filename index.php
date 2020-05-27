<?php

session_start();

//On inclue les fichiers pour les fonctions et la classe PDO

require_once("model/pdo.php");
require_once("fonction/fonction.php");

//On inclue l'entête

include 'View/hautPage.html';

//Création d'un objet de la classe PDO

$pdo = PdoSmashTracker::getPdoSmashTracker();

//Appel de la fonction estConencte pour vérifier si un utilisateur est connecté

$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) && !$estConnecte){
    $_REQUEST['uc'] = 'connexion';
}
$uc = $_REQUEST['uc'];
switch($uc){
    case 'connexion':
        include 'Controller/connexion.php';
    break;

    case 'gestionDuProfil':
        include 'Controller/gestionDuProfil.php';
    break;

    case 'deconnexion':
        $estConnecte = deconnecter();
        header('location: index.php');
    break;
}

//On inclue le pied de page

include 'View/piedPage.html';

?>