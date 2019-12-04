<?php
class DivisionManager {

    private $dbo;

    public function __construct($dbo) {
        $this->dbo = $dbo;
    }

    public function getAllDivision() {

        $listeDivision = array();

        $sql = "SELECT div_num, div_nom FROM DIVISION";

        $req = $this->dbo->prepare($sql);
        $req->execute();
        
        while ($division = $req->fetch(PDO::FETCH_OBJ)) {
            $listeDivision[] = new Division($division);
        }

        $req->closeCursor();
        return $listeDivision;
    }

}
?>