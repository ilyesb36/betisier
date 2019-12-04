<?php
class FonctionManager {

    private $dbo;

    public function __construct($dbo) {
        $this->dbo = $dbo;
    }

    public function getAllFonction() {

        $listeFon = array();

        $sql = "SELECT fon_num, fon_libelle FROM FONCTION";
        
        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($fonction = $req->fetch(PDO::FETCH_OBJ)) {
            $listeFon[] = new Fonction($fonction);
        }

        $req->closeCursor();
        return $listeFon;
    }
}
?>