<?php
class CitationManager {

    private $dbo;

    public function __construct($dbo) {
        $this->dbo = $dbo;
    }

    public function getAllCitationsValide() {

        $listeCit = array();

        $sql = "SELECT c.cit_num, per_nom, per_prenom, cit_libelle, cit_date, COALESCE(avg(vot_valeur), 0) as valeur 
        FROM CITATION c JOIN PERSONNE p ON c.per_num = p.per_num LEFT JOIN VOTE v ON c.cit_num = v.cit_num
        WHERE cit_valide = 1 AND cit_date_valide IS NOT NULL GROUP BY c.cit_num, per_nom, per_prenom, cit_libelle, cit_date";

        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($citation = $req->fetch(PDO::FETCH_OBJ)) {
            $listeCit[] = new Citation($citation);
        }

        $req->closeCursor();
        return $listeCit;
    }

    public function getAllCitationsNonValide() {

        $listeCit = array();

        $sql = "SELECT c.cit_num, per_nom, per_prenom, cit_libelle, cit_date FROM CITATION c, PERSONNE p 
        WHERE c.per_num = p.per_num AND cit_valide = 0";

        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($citation = $req->fetch(PDO::FETCH_OBJ)) {
            $listeCit[] = new Citation($citation);
        }

        $req->closeCursor();
        return $listeCit;
    }

    public function getAllCitations() {
        
        $listeCit = array();

        $sql = "SELECT c.cit_num, per_nom, per_prenom, cit_libelle, cit_date FROM CITATION c, PERSONNE p 
        WHERE c.per_num = p.per_num";

        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($citation = $req->fetch(PDO::FETCH_OBJ)) {
            $listeCit[] = new Citation($citation);
        }

        $req->closeCursor();
        return $listeCit;
    }

    public function ajouterCitation($pernum, $pernumEtu, $citLibelle, $citDate) {

        $citation = $citLibelle;
        $dateDepo = date("Y-m-d H:i:s");

        $sql = "INSERT INTO CITATION(per_num, per_num_etu, cit_libelle, cit_date, cit_date_depo)
         VALUES($pernum, $pernumEtu, :citation, '$citDate', '$dateDepo')";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':citation', $citation, PDO::PARAM_STR);

        $req->execute();
    }

    public function estDejaNote($citnum, $pernum) {
        
        $sql = "SELECT per_num FROM VOTE WHERE cit_num = $citnum AND per_num = $pernum";

        $req = $this->dbo->prepare($sql);
        $req->execute();
        
        if ($req->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function ajouterNoteCitation($citnum, $pernum, $note) {

        $sql = "INSERT INTO VOTE(cit_num, per_num, vot_valeur) VALUES($citnum, $pernum, $note)";

        $req = $this->dbo->prepare($sql);
        $req->execute();
    }

    public function getNbCitationValide() {
        return count($this->getAllCitationsValide());
    }

    public function rechercherCitation($pernom, $date, $note) {

        $listeCit = array();

        $sql = "SELECT c.cit_num, per_nom, per_prenom, cit_libelle, cit_date, avg(vot_valeur) as valeur 
        FROM CITATION c JOIN VOTE v ON c.cit_num = v.cit_num JOIN PERSONNE p ON c.per_num = p.per_num
        WHERE cit_valide = 1 AND cit_date_valide IS NOT NULL ";
        if ($pernom != NULL) {
            $sql = $sql."AND per_nom = '$pernom' ";
        }
        if ($date != NULL) {
            $sql = $sql."AND cit_date = '$date' ";
        }
        $sql = $sql."GROUP BY c.cit_num, per_nom, per_prenom, cit_libelle, cit_date";
        if ($note != NULL) {
            $sql = "SELECT cit_num, per_nom, per_prenom, cit_libelle, cit_date, valeur FROM(".$sql;
            $sql = $sql.") s WHERE valeur = $note";
        }
        
        $req = $this->dbo->prepare($sql);
        $req->execute();

        while ($citation = $req->fetch(PDO::FETCH_OBJ)) {
            $listeCit[] = new Citation($citation);
        }

        $req->closeCursor();
        return $listeCit;
    }

    public function validerCitation($citnum) {

        $dateValider = date("Y-m-d");

        $sql = "UPDATE CITATION SET cit_valide = 1, cit_date_valide = '$dateValider', per_num_valide = :pernum
        WHERE cit_num = :citnum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':pernum', $_SESSION["userNum"]);
        $req->bindValue(':citnum', $citnum, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }

    private function supprimerVoteDeLaCitation($citnum) {
        
        $sql = "DELETE FROM VOTE WHERE cit_num = :citnum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':citnum', $citnum, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }

    public function supprimerCitation($citnum) {

        $this->supprimerVoteDeLaCitation($citnum);
        
        $sql = "DELETE FROM CITATION WHERE cit_num = :citnum";

        $req = $this->dbo->prepare($sql);
        $req->bindValue(':citnum', $citnum, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
?>