<?php
include 'View/menu.html';
include 'View/menuTournoi.html';
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'Ajouter':
            include 'View/formTournoi.html';
            if (isset($_POST['btn_valider'])) {
                $pdo->AjouterUnTournoi($_REQUEST['txt_nom'],$_SESSION['idUtilisateur']);
                echo "Tournoi crée";
            }
        break;
    }
  }
?>