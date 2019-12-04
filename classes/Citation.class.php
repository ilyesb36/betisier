<?php
class Citation {

    private $citnum;
    private $pernom;
    private $perprenom;
    private $libelle;
    private $date;
    private $valeur;

    public function __construct($valeurs = array()) {
        if (!empty($valeurs)) {
			 $this->affecte($valeurs);
        }
    }

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur){
            switch ($attribut){
                    case 'cit_num': $this->setCitNum($valeur); break;
                    case 'per_nom': $this->setPerNom($valeur); break;
                    case 'per_prenom': $this->setPerPrenom($valeur); break;
                    case 'cit_libelle': $this->setLibelle($valeur); break;
                    case 'cit_date': $this->setDate($valeur); break;
                    case 'valeur': $this->setValeur($valeur); break;
            }
        }
    }

    public function getCitNum() {
        return $this->citnum;
    }

    public function setCitNum($citnum) {
        $this->citnum = $citnum;
    }

    public function getPerNom() {
        return $this->pernom;
    }

    public function setPerNom($pernom) {
        $this->pernom = $pernom;
    }

    public function getPerPrenom() {
        return $this->perprenom;
    }

    public function setPerPrenom($perprenom) {
        $this->perprenom = $perprenom;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getValeur() {
        return $this->valeur;
    }

    public function setValeur($valeur) {
        $this->valeur = $valeur;
    }

}
?>