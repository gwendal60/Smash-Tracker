<?php

/**
* Classe d'accès aux données
* 
* Utilise les services de la classe pdo
* 
*/

class Pdo
{
    private static $serveur='';
    private static $bdd='';
    private static $user='root';
    private static $mdp='';
    private static $monPdo;
    private static $monPdoSmashTracker=null;

    private function __construct()
    {
        Pdo::$monPdo = new PDO(Pdo::$serveur.';'.Pdo::$bdd, Pdo::$user, Pdo::$mdp);
        Pdo::$monPdo->query("SET CHARACTER SET utf8");
    }
    public function _destruct()
    {
        Pdo::$monPdo = nul;
    }

    public static function getPdoSmashTracker()
    {
        if(Pdo::$monPdoSmashTracker==nul) {
            Pdo::$monPdoSmashTracker = new Pdo();
        }
        return Pdo::$monPdoSmashTracker;
    }
}

?>