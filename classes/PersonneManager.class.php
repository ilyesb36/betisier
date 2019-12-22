<?php
class PersonneManager {

    private $dbo;

    public function __construct($dbo) {
        $this->dbo = $dbo;
    }

    public function getPersonnes() {

        $listePers = array();

        $sql = "SELECT per_num, per_nom, per_prenom FROM PERSONNE";

        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($personne = $req->fetch(PDO::FETCH_OBJ)) {
            $listePers[] = new Personne($personne);
        }

        $req->closeCursor();
        return $listePers;
    }

    public function getPersonneAllInfo($pernum) {
        $listePers = array();

        $sql = "SELECT per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd FROM PERSONNE WHERE per_num = :pernum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->execute();

        while ($personne = $req->fetch(PDO::FETCH_OBJ)) {
            $listePers[] = new Personne($personne);
        }

        $req->closeCursor();
        return $listePers;
    }

    public function getNumPersonne($login, $mdp) {
        
        $salt = "48@!alsd";
        $mdp_cpt = sha1(sha1($mdp).$salt);

        $sql = "SELECT per_num FROM PERSONNE WHERE per_login = :login AND per_pwd = :mdp_cpt";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':mdp_cpt', $mdp_cpt, PDO::PARAM_STR);
        $req->execute();

        while ($personne = $req->fetch(PDO::FETCH_OBJ)) {
            $num = new Personne($personne);
        }

        return $num->getPerNum();
    }

    public function utilisateurExiste($login, $mdp) {
        
        $salt = "48@!alsd";
        $mdp_cpt = sha1(sha1($mdp).$salt);

        $sql = "SELECT per_num FROM PERSONNE WHERE per_login = :login AND per_pwd = :mdp_cpt";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':mdp_cpt', $mdp_cpt, PDO::PARAM_STR);
        $req->execute();
        
        if ($req->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function estAdmin($login, $mdp) {

        $salt = "48@!alsd";
        $mdp_cpt = sha1(sha1($mdp).$salt);

        $sql = "SELECT per_num FROM PERSONNE WHERE per_login = :login AND per_pwd = :mdp_cpt AND per_admin = 1";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':mdp_cpt', $mdp_cpt, PDO::PARAM_STR);
        $req->execute();

        if ($req->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getNbPersonnes() {
        return count($this->getPersonnes());
    }

    public function ajoutPersonne($perNom, $perPrenom, $perTel, $perMail, $perLogin, $perMdp) {

        $salt = "48@!alsd";
        $mdp_cpt = sha1(sha1($perMdp).$salt);

        $sql = "INSERT INTO PERSONNE(per_nom, per_prenom, per_tel, per_mail, per_admin, per_login, per_pwd)
        VALUES(:perNom, :perPrenom, :perTel, :perMail, 0, :perLogin, :mdp_cpt)";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':perNom', $perNom, PDO::PARAM_STR);
        $req->bindValue(':perPrenom', $perPrenom, PDO::PARAM_STR);
        $req->bindValue(':perTel', $perTel, PDO::PARAM_STR);
        $req->bindValue(':perMail', $perMail, PDO::PARAM_STR);
        $req->bindValue(':perLogin', $perLogin, PDO::PARAM_STR);
        $req->bindValue(':mdp_cpt', $mdp_cpt, PDO::PARAM_STR);
        $req->execute();
        $_SESSION["perId"] = $this->dbo->lastInsertId();
    }

    public function modifierPersonne($pernum, $perNom, $perPrenom, $perTel, $perMail, $perLogin, $perMdp) {
        
        $salt = "48@!alsd";
        $mdp_cpt = sha1(sha1($perMdp).$salt);

        $sql = "UPDATE PERSONNE SET per_nom = :perNom, per_prenom = :perPrenom, per_tel = :perTel, per_mail = :perMail,
        per_login = :perLogin, per_pwd = :mdp_cpt WHERE per_num = :pernum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->bindValue(':perNom', $perNom, PDO::PARAM_STR);
        $req->bindValue(':perPrenom', $perPrenom, PDO::PARAM_STR);
        $req->bindValue(':perTel', $perTel, PDO::PARAM_STR);
        $req->bindValue(':perMail', $perMail, PDO::PARAM_STR);
        $req->bindValue(':perLogin', $perLogin, PDO::PARAM_STR);
        $req->bindValue(':mdp_cpt', $mdp_cpt, PDO::PARAM_STR);
        $req->execute();
    }

    public function supprimerPersonne($pernum) {

        $sql = "DELETE FROM PERSONNE WHERE per_num = :pernum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }

}
?>