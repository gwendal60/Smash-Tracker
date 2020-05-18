<?php

/**
* Classe d'accès aux données
* 
* Utilise les services de la classe pdo
* 
*/

class PdoSmashTracker
{
    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=smashtracker';
    private static $user='root';
    private static $mdp='';
    private static $monPdo;
    private static $monPdoSmashTracker=null;

    private function __construct()
    {
        PdoSmashTracker::$monPdo = new PDO(PdoSmashTracker::$serveur.';'.PdoSmashTracker::$bdd, PdoSmashTracker::$user, PdoSmashTracker::$mdp);
        PdoSmashTracker::$monPdo->query("SET CHARACTER SET utf8");
    }
    public function _destruct()
    {
        PdoSmashTracker::$monPdo = null;
    }

    public static function getPdoSmashTracker()
    {
        if(PdoSmashTracker::$monPdoSmashTracker==null) {
            PdoSmashTracker::$monPdoSmashTracker = new PdoSmashTracker();
        }
        return PdoSmashTracker::$monPdoSmashTracker;
    }

    /**
     * Retourne les informations d'un utilisateur
     * 
     * @param $pseudo
     * @param $mdp
     */
    public function getInfoUtilisateur($pseudo, $mdp)
    {
        $mdp_crypte = sha1($mdp);
        $req = PdoSmashTracker::$monPdo->prepare(
        "SELECT id FROM Utilisateur
        WHERE pseudo = :par_pseudo
        AND motDePasse = :par_mdp"
        );
        $req->bindValue(':par_pseudo',$pseudo, PDO::PARAM_STR);
        $req->bindValue(':par_mdp',$mdp_crypte, PDO::PARAM_STR);
        $res = $req->execute();
        return $req->fetch();
    }
}

?>