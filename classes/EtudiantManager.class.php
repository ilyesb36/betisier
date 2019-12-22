<?php
class EtudiantManager {

    private $dbo;

    public function __construct($dbo) {
        $this->dbo = $dbo;
    }

    public function getEtudiant($pernum) {
        
        $listeEtu = array();

        $sql = "SELECT per_nom, per_prenom, per_mail, per_tel, dep_nom, vil_nom, div_nom 
        FROM PERSONNE p, ETUDIANT e, DEPARTEMENT d, VILLE v, DIVISION di
        WHERE p.per_num = e.per_num and e.dep_num = d.dep_num and d.vil_num = v.vil_num and e.div_num = di.div_num
        and p.per_num = :pernum";
        
        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->execute();

        while ($etudiant = $req->fetch(PDO::FETCH_OBJ)) {
            $listeEtu[] = new Etudiant($etudiant);
        }

        $req->closeCursor();
        return $listeEtu;
    }

    public function estEtudiant($pernum) {
        
        $sql = "SELECT per_num FROM ETUDIANT WHERE per_num = :pernum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->execute();

        if ($req->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function ajoutEtudiant($pernum, $depnum, $divnum) {

        $sql = "INSERT INTO ETUDIANT(per_num, dep_num, div_num) VALUES(:pernum, :depnum, :divnum)";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->bindValue(':depnum', $depnum, PDO::PARAM_INT);
        $req->bindValue(':divnum', $divnum, PDO::PARAM_INT);
        $req->execute();
    }

    public function modifierEtudiant($pernum, $depnum, $divnum) {
        
        $sql = "UPDATE ETUDIANT SET dep_num = :depnum, div_num = :divnum WHERE per_num = :pernum";
        
        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->bindValue(':depnum', $depnum, PDO::PARAM_INT);
        $req->bindValue(':divnum', $divnum, PDO::PARAM_INT);
        $req->execute();
    }

    public function supprimerEtudiant($pernum) {
        
        $this->supprimerCitationDEtudiant($pernum);
        
        $sql = "DELETE FROM ETUDIANT WHERE per_num = :pernum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->execute();
    }

    private function supprimerCitationDEtudiant($pernum) {

        $sql = "DELETE FROM CITATION WHERE per_num_etu = :pernum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $pernum, PDO::PARAM_INT);
        $req->execute();
    }

}
?>