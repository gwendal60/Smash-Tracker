<?php
include "View/menu.html";
if (!isset($_REQUEST['action'])) {
  $_REQUEST['action'] = 'CreerSonProfil';
}
$action = $_REQUEST['action'];
switch ($action){
    case 'CreerSonProfil':
        include 'View/formProfil.php';
        if (isset($_POST['btn_valider'])) {
            $mdp_crypte = sha1($_POST['txt_mdp']);
            $pseudo = $_POST['txt_login'];
            $pdo->ajouteUnUtilisateur($pseudo, $mdp_crypte);
            echo"Compte Crée avec succés";
        }
        
    break;

    case 'Modifier':
        $idUtilisateur = $_SESSION['idUtilisateur'];
        $utilisateur = $pdo->getInfoUtilisateurId($idUtilisateur);
        include 'View/formProfil.php';
        if (isset($_POST['btn_valider'])) {
            $pdo->modifierUnUtilisateur($idUtilisateur,$_POST['txt_login']);
            echo"Modification réussite";
        }
    break;
}
?>