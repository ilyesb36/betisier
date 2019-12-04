<?php
class Personne {

    private $pernum;
    private $pernom;
    private $perprenom;
    private $pertel;
    private $permail;
    private $perLog;
    private $perPwd;

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
                    case 'per_tel': $this->setPerTel($valeur); break;
                    case 'per_mail': $this->setPerMail($valeur); break;
                    case 'per_login': $this->setPerLog($valeur); break;
                    case 'per_pwd': $this->setPerPwd($valeur); break;
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

    public function getPerTel() {
        return $this->pertel;
    }

    public function setPerTel($pertel) {
        $this->pertel = $pertel;
    }

    public function getPerMail() {
        return $this->permail;
    }

    public function setPerMail($permail) {
        $this->permail = $permail;
    }

    public function getPerLog() {
        return $this->perLog;
    }

    public function setPerLog($perLog) {
        $this->perLog = $perLog;
    }

    public function getPerPwd() {
        return $this->perPwd;
    }

    public function setPerPwd($perPwd) {
        $this->perPwd = $perPwd;
    }


}
?>