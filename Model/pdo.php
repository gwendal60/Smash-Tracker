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
     * Retourne les informations d'un utilisateur en fonction de son pseudo et mdp
     * 
     * @param $pseudo
     * @param $mdp
     * @return les infos sur l'utilisateur
     */
    public function getInfoUtilisateur($pseudo, $mdp)
    {
        $mdp_crypte = sha1($mdp);
        $req = PdoSmashTracker::$monPdo->prepare(
        "SELECT id 
        FROM Utilisateur
        WHERE pseudo = :par_pseudo
        AND motDePasse = :par_mdp"
        );
        $req->bindValue(':par_pseudo',$pseudo, PDO::PARAM_STR);
        $req->bindValue(':par_mdp',$mdp_crypte, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch();
    }

    /**
     * Ajoute dans la base de données un utilisateur
     * 
     * @param $pseudo
     * @param $mdp
     */
    public function ajouteUnUtilisateur($pseudo, $mdp)
    {
        $req = PdoSmashTracker::$monPdo->prepare(
            "INSERT INTO utilisateur
            (pseudo, motDePasse)
            VALUES (:par_pseudo, :par_mdp)"
        );
        $req->bindValue(':par_pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':par_mdp',$mdp, PDO::PARAM_STR);
        $res = $req->execute();
    }

    /**
     * Retourne les informations d'un utilisateur en fonction de son id
     * 
     * @param $id
     * @return les infos sur l'utilisateur
     */
    public function getInfoUtilisateurId($id)
    {
        $req = PdoSmashTracker::$monPdo->prepare(
            "SELECT pseudo
            FROM Utilisateur
            WHERE id = :par_id"
        );
        $req->bindValue(':par_id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch();
    }

    /**
     * Modifie dans la base de données les données d'un utilisateur
     * 
     * @param $id
     * @param $pseudo
     */
    public function modifierUnUtilisateur($id, $pseudo)
    {
        $req = PdoSmashTracker::$monPdo->prepare(
            "UPDATE Utilisateur
            SET pseudo = :par_pseudo
            WHERE id = :par_id"
        );
        $req->bindValue(':par_id',$id, PDO::PARAM_INT);
        $req->bindValue(':par_pseudo',$pseudo, PDO::PARAM_STR);
        $req->execute();
    }
}

?>