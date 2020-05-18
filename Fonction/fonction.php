<?php
/**
*Fonctions sur l'applcation Smash Tracker
*/

/**
*Teste si un utilisateur est connecté

*@return vrai ou faux
*/
function estConnecte()
{
  return isset($_SESSION['idUtilisateur']);
}

/**
*Enregistre dans une variable de session les infos d'un utilisateur
*
*@param $id
*/
function creerVarSession($id)
{
  $_SESSION['idUtilisateur'] = $id;
}

/**
*Ajoute le libellé d'une erreur au tableau des erreurs
* 
*@param $msg : le libellé de l'erreur
*/
function ajouteErreur($msg)
{
  if(!isset($_REQUEST['erreurs'])){
    $_REQUEST['erreurs']=array();
  }
  $_REQUEST['erreurs'][]=$msg;
}

?>