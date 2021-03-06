<?php
class Ville {
    
    private $vilnum;
    private $vilnom;

    public function __construct($valeurs = array()) {
        if (!empty($valeurs)) {
			 $this->affecte($valeurs);
        }
    }

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur){
            switch ($attribut){
                    case 'vil_num': $this->setVilNum($valeur); break;
                    case 'vil_nom': $this->setVilNom($valeur); break;
            }
        }
    }

    public function getVilNum() {
        return $this->vilnum;
    }

    public function setVilNum($vilnum) {
        $this->vilnum = $vilnum;
    }

    public function getVilNom() {
        return $this->vilnom;
    }

    public function setVilNom($vilnom) {
        $this->vilnom = $vilnom;
    }

}


?>