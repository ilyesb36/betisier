<?php
class VilleManager {

    private $dbo;

    public function __construct($dbo) {
        $this->dbo = $dbo;
    }

    public function getVilles() {
        
        $listeVilles = array();

        $sql = "SELECT vil_num, vil_nom FROM VILLE";

        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($ville = $req->fetch(PDO::FETCH_OBJ)) {
            $listeVilles[] = new Ville($ville);
        }

        $req->closeCursor();
        return $listeVilles;
    }

    public function getNbVilles() {
        return count($this->getVilles());
    }

    public function ajoutVille($vilNom) {
        $sql = "INSERT INTO VILLE(vil_nom) VALUES('$vilNom')";
        $req = $this->dbo->prepare($sql);
        $req->execute();
    }

    public function estDepartement($vilnum) {

        $sql = "SELECT vil_num FROM DEPARTEMENT WHERE vil_num = :vilnum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':vilnum', $vilnum, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();

        if ($req->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function supprimerVille($vilnum) {

        $sql = "DELETE FROM VILLE WHERE vil_num = :vilnum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':vilnum', $vilnum, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }

}

?>