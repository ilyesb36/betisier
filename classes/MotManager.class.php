<?php
class MotManager {

    private $dbo;

    public function __construct($dbo) {
        $this->dbo = $dbo;
    }

    public function getAllMotInterdit($citation) {

        $listeMotInterdit = array();
        $id = $citation;

        $sql = "SELECT mot_interdit FROM MOT WHERE MATCH(mot_interdit) AGAINST(:id)";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();

        while ($motInterdit = $req->fetch(PDO::FETCH_OBJ)) {
            $listeMotInterdit[] = new Mot($motInterdit);
        }

        $req->closeCursor();
        return $listeMotInterdit;
    }

}
?>