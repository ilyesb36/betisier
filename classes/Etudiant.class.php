<?php
class Etudiant {

    private $pernom;
    private $perprenom;
    private $permail;
    private $pertel;
    private $depnom;
    private $vilnom;
    private $divnom;

    public function __construct($valeurs = array()) {
        if (!empty($valeurs)) {
			 $this->affecte($valeurs);
        }
    }

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur){
            switch ($attribut){
                case 'per_nom': $this->setPerNom($valeur); break;
                case 'per_prenom': $this->setPerPrenom($valeur); break;
                case 'per_mail': $this->setMail($valeur); break;
                case 'per_tel': $this->setTel($valeur); break;
                case 'dep_nom': $this->setDepNom($valeur); break;
                case 'vil_nom': $this->setVilNom($valeur); break;
                case 'div_nom': $this->setDivNom($valeur); break;
            }
        }
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

    public function getMail() {
        return $this->permail;
    }

    public function setMail($permail) {
        $this->permail = $permail;
    }

    public function getTel() {
        return $this->pertel;
    }

    public function setTel($pertel) {
        $this->pertel = $pertel;
    }

    public function getDepNom() {
        return $this->depnom;
    }

    public function setDepNom($depnom) {
        $this->depnom = $depnom;
    }

    public function getVilNom() {
        return $this->vilnom;
    }

    public function setVilNom($vilnom) {
        $this->vilnom = $vilnom;
    }

    public function getDivNom() {
        return $this->divnom;
    }

    public function setDivNom($divnom) {
        $this->divnom = $divnom;
    }
}
?>