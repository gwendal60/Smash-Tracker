<?php

//Si la variable $_REQUEST['action'] n'existe pas alors on la crée avec demandeConnexion comme contenu

if(!isset($_REQUEST['action'])){
    $_REQUEST['action'] = 'demandeConnexion';
}

//On crée la variable $action avec le contenu de $_REQUEST['action']

$action = $_REQUEST['action'];

switch($action){
    case 'demandeConnexion':
        include 'View/formConnexion.html';
        break;

    case 'valideConnexion':
        //Appel de la fonction permettant de recup les info de l'utilisateur
        $utilisateur = $pdo->getInfoUtilisateur($_REQUEST['login'],$_REQUEST['mdp']);
        //Si l'utilisateur est dans la BD
        if(is_array($utilisateur)){
            
            //On récupère les données retourné par la fonction

            $id = $utilisateur['id'];
            
            //On appel la fonction qui va crée des variables de session

            creerVarSession($id);

            include 'View/acceuil.html';
        }else{
            ajouteErreur("utilisateur inéxistant");
            include 'View/erreurs.php';
            include 'View/formConnexion.html';
        }
        break;
}
?>