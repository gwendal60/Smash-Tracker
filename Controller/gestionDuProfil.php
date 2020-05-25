<?php
if (!isset($_REQUEST['action'])) {
  $_REQUEST['action'] = 'CreerSonProfil';
}
$action = $_REQUEST['action'];
switch ($action){
    case 'CreerSonProfil':
        include 'View/formProfil.html';
        if (isset($_POST['btn_valider'])) {
            $mdp_crypte = sha1($_POST['txt_mdp']);
            $pseudo = $_POST['txt_login'];
            $pdo->ajouteUnUtilisateur($pseudo, $mdp_crypte);
            echo"Compte Crée avec succés";
        }
        
    break;
}
?>