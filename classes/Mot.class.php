<?php
class Mot {

    private $motInterdit;

    public function __construct($valeurs = array()) {
        if (!empty($valeurs)) {
			 $this->affecte($valeurs);
        }
    }

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur){
            switch ($attribut){
                    case 'mot_interdit': $this->setMotInterdit($valeur); break;
            }
        }
    }

    public function getMotInterdit() {
        return $this->motInterdit;
    }

    public function setMotInterdit($motInterdit) {
        $this->motInterdit = $motInterdit;
    }
}
?>