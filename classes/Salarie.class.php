<?php
class Salarie {

    private $pernum;
    private $pernom;
    private $perprenom;
    private $permail;
    private $pertel;
    private $pertelPro;
    private $fonction;

    public function __construct($valeurs = array()) {
        if (!empty($valeurs)) {
			 $this->affecte($valeurs);
        }
    }

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur){
            switch ($attribut){
                case 'per_num': $this->setPerNum($valeur); break;
                case 'per_nom': $this->setPerNom($valeur); break;
                case 'per_prenom': $this->setPerPrenom($valeur); break;
                case 'per_mail': $this->setMail($valeur); break;
                case 'per_tel': $this->setTel($valeur); break;
                case 'sal_telprof': $this->setTelPro($valeur); break;
                case 'fon_libelle': $this->setFonction($valeur); break;
            }
        }
    }

    public function getPerNum() {
        return $this->pernum;
    }

    public function setPerNum($pernum) {
        $this->pernum = $pernum;
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

    public function getTelPro() {
        return $this->pertelPro;
    }

    public function setTelPro($pertelPro) {
        $this->pertelPro = $pertelPro;
    }

    public function getFonction() {
        return $this->fonction;
    }

    public function setFonction($fonction) {
        $this->fonction = $fonction;
    }
}
?>