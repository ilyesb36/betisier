<?php
class DepartementManager {

    private $dbo;

    public function __construct($dbo) {
        $this->dbo = $dbo;
    }

    public function getAllDepart() {

        $listeDepart = array();

        $sql = "SELECT dep_num, dep_nom FROM DEPARTEMENT";
        
        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($departement = $req->fetch(PDO::FETCH_OBJ)) {
            $listeDepart[] = new Departement($departement);
        }

        $req->closeCursor();
        return $listeDepart;
    }
}
?>