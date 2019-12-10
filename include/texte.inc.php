<div id="texte">
<?php
if (!empty($_GET["page"])){
	$page=$_GET["page"];
} else {
    $page=0;
}
switch ($page) {
//
// Personnes
//

case 0:
	// inclure ici la page accueil photo
	include_once('pages/accueil.inc.php');
	break;
case 1:
	// inclure ici la page insertion nouvelle personne
    require_once("include/check.inc.php");
	include("pages/ajouterPersonne.inc.php");
    break;

case 2:
	// inclure ici la page liste des personnes
    require_once("include/check.inc.php");
	include_once('pages/listerPersonnes.inc.php');
    break;
case 3:
	// inclure ici la page modification des personnes
    require_once("include/check.inc.php");
	include("pages/ModifierPersonne.inc.php");
    break;
case 4:
	// inclure ici la page suppression personnes
    require_once("include/check.inc.php");
	include_once('pages/supprimerPersonne.inc.php');
    break;
//
// Citations
//
case 5:
	// inclure ici la page ajouter citations
    require_once("include/check.inc.php");
    include("pages/ajouterCitation.inc.php");
    break;

case 6:
	// inclure ici la page liste des citations
    require_once("include/check.inc.php");
	include("pages/listerCitation.inc.php");
    break;
//
// Villes
//

case 7:
	// inclure ici la page ajouter ville
    require_once("include/check.inc.php");
	include("pages/ajouterVille.inc.php");
    break;

case 8:
// inclure ici la page lister ville
        require_once("include/check.inc.php");
	include("pages/listerVilles.inc.php");
    break;

//
// Étudiants
//
case 9:
	// inclure ici la page détail sur étudiant
    require_once("include/check.inc.php");
	include("pages/detailPersonne.inc.php");
    break;
case 10:
	// inclure ici la page de connection
    require_once("include/check.inc.php");
	include("pages/connection.inc.php");
    break;
    
case 11:
	// inclure ici la page de déconnection
    require_once("include/check.inc.php");
	include("pages/deconnection.inc.php");
    break;

case 12:
	// inclure ici la page de l'ajout d'un étudiant ou salarié
    require_once("include/check.inc.php");
	include("pages/ajoutEtudiantSalarie.inc.php");
	break;    
	
case 13:
	// inclure ici la page d'ajout d'un étudiant
    require_once("include/check.inc.php");
	include("pages/ajoutEtudiant.inc.php");
	break;

case 14:
	// inclure ici la page d'ajout d'un salarié
    require_once("include/check.inc.php");
	include("pages/ajoutSalarie.inc.php");
	break;

case 15:
	// inclure ici la page où on vote les citations
    require_once("include/check.inc.php");
	include("pages/noterCitation.inc.php");
	break;

case 16:
	// inclure ici la page de recherche de citation
    require_once("include/check.inc.php");
	include("pages/rechercherCitation.inc.php");
	break;

case 17:
	// inclure ici la page de modification d'une personne
    require_once("include/check.inc.php");
	include("pages/modifierUnePersonne.inc.php");
	break;

case 18:
	// inclure ici la page de modification d'une personne
    require_once("include/check.inc.php");
	include("pages/modifierEtudiantSalarie.inc.php");
	break;

case 19:
	// inclure ici la page de modification d'une personne
    require_once("include/check.inc.php");
	include("pages/modifierEtudiant.inc.php");
	break;

case 20:
	// inclure ici la page de modification d'une personne
    require_once("include/check.inc.php");
	include("pages/modifierSalarie.inc.php");
	break;

case 21:
	// inclure ici la page pour valider les citations
    require_once("include/check.inc.php");
	include("pages/validerCitations.inc.php");
	break;
	
case 22:
	// inclure ici la page pour valider les citations
    require_once("include/check.inc.php");
	include("pages/validerLaCitation.inc.php");
	break;

case 23:
	// inclure ici la page pour supprimer une personne
    require_once("include/check.inc.php");
	include("pages/supprimerUnePersonne.inc.php");
	break;

case 24:
	// inclure ici la page pour supprimer des citations
    require_once("include/check.inc.php");
	include("pages/supprimerCitations.inc.php");
	break;

case 25:
	// inclure ici la page pour supprimer une citation
    require_once("include/check.inc.php");
	include("pages/supprimerUneCitation.inc.php");
	break;

case 26:
    // inclure ici la page pour supprimer des villes
    require_once("include/check.inc.php");
    include("pages/supprimerVilles.inc.php");
    break;

case 27:
    // inclure ici la page pour supprimer une ville
    require_once("include/check.inc.php");
    include("pages/supprimerUneVille.inc.php");
    break;

case 28:
    // inclure ici la page pour modifier les villes
    require_once("include/check.inc.php");
    include("pages/modifierVilles.inc.php");
    break;

case 29:
    // inclure ici la page pour modifier une ville
    require_once("include/check.inc.php");
    include("pages/modifierUneVille.inc.php");
    break;

case 30:
    // inclure ici la page du message pour la fin de la modification de la ville
    require_once("include/check.inc.php");
    include("pages/finirModifierVille.inc.php");
    break;

default : 	include_once('pages/accueil.inc.php');
}
	
?>
</div>
