<?php
class SalarieManager {

    private $dbo;

    public function __construct($dbo) {
        $this->dbo = $dbo;
    }

    public function getAllSalaries() {
        $listeSalaries = array();
    
        $sql = "SELECT p.per_num, per_nom FROM PERSONNE p, SALARIE s WHERE p.per_num = s.per_num";

        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($salarie = $req->fetch(PDO::FETCH_OBJ)) {
            $listeSalaries[] = new Salarie($salarie);
        }

        $req->closeCursor();
        return $listeSalaries;
    }

    public function getSalarie($pernum) {
        
        $listeSalarie = array();

        $sql = "SELECT per_nom, per_prenom, per_mail, per_tel, sal_telprof, fon_libelle FROM PERSONNE p, SALARIE s, FONCTION f 
        WHERE p.per_num = s.per_num and s.fon_num = f.fon_num and p.per_num = $pernum";

        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($salarie = $req->fetch(PDO::FETCH_OBJ)) {
            $listeSalarie[] = new Salarie($salarie);
        }

        $req->closeCursor();
        return $listeSalarie;
    }

    public function estSalarie($pernum) {

        $sql = "SELECT per_num FROM SALARIE WHERE per_num = $pernum";

        $req = $this->dbo->prepare($sql);
        $req->execute();

        if ($req->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function ajoutSalarie($pernum, $saltel, $fonnum) {

        $sql = "INSERT INTO SALARIE(per_num, sal_telprof, fon_num) VALUES($pernum, '$saltel', $fonnum)";

        $req = $this->dbo->prepare($sql);
        $req->execute();
    }

    public function modifierSalarie($pernum, $saltel, $fonnum) {

        $sql = "UPDATE SALARIE SET sal_telprof = $saltel, fon_num = $fonnum WHERE per_num = $pernum";

        $req = $this->dbo->prepare($sql);
        $req->execute();
    }

    public function supprimerSalarie($pernum) {

        $this->supprimerCitation($pernum);

        $sql = "DELETE FROM SALARIE WHERE per_num = :pernum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->execute();
    }

    private function supprimerCitation($pernum) {

        $sql = "DELETE FROM CITATION WHERE per_num = :pernum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->execute();
    }

}
?>