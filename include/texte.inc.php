<div id="texte">
<?php
if (empty($_SERVER["HTTP_REFERER"])) {
    echo "<br> <br> Vous ne pouvez pas changer la page avec l'url";
    exit;
} else if (!empty($_GET["page"])){
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
	include("pages/ajouterPersonne.inc.php");
    break;

case 2:
	// inclure ici la page liste des personnes
	include_once('pages/listerPersonnes.inc.php');
    break;
case 3:
	// inclure ici la page modification des personnes
	include("pages/ModifierPersonne.inc.php");
    break;
case 4:
	// inclure ici la page suppression personnes
	include_once('pages/supprimerPersonne.inc.php');
    break;
//
// Citations
//
case 5:
	// inclure ici la page ajouter citations
    include("pages/ajouterCitation.inc.php");
    break;

case 6:
	// inclure ici la page liste des citations
	include("pages/listerCitation.inc.php");
    break;
//
// Villes
//

case 7:
	// inclure ici la page ajouter ville
	include("pages/ajouterVille.inc.php");
    break;

case 8:
// inclure ici la page lister ville
	include("pages/listerVilles.inc.php");
    break;

//

//
case 9:
	// inclure ici la page détail sur étudiant
	include("pages/detailPersonne.inc.php");
    break;
case 10:
	// inclure ici la page de connection
	include("pages/connection.inc.php");
    break;
    
case 11:
	// inclure ici la page de déconnection
	include("pages/deconnection.inc.php");
    break;

case 12:
	// inclure ici la page de l'ajout d'un étudiant ou salarié
	include("pages/ajoutEtudiantSalarie.inc.php");
	break;    
	
case 13:
	// inclure ici la page d'ajout d'un étudiant
	include("pages/ajoutEtudiant.inc.php");
	break;

case 14:
	// inclure ici la page d'ajout d'un salarié
	include("pages/ajoutSalarie.inc.php");
	break;

case 15:
	// inclure ici la page où on vote les citations
	include("pages/noterCitation.inc.php");
	break;

case 16:
	// inclure ici la page de recherche de citation
	include("pages/rechercherCitation.inc.php");
	break;

case 17:
	// inclure ici la page de modification d'une personne
	include("pages/modifierUnePersonne.inc.php");
	break;

case 18:
	// inclure ici la page de modification d'une personne
	include("pages/modifierEtudiantSalarie.inc.php");
	break;

case 19:
	// inclure ici la page de modification d'une personne
	include("pages/modifierEtudiant.inc.php");
	break;

case 20:
	// inclure ici la page de modification d'une personne
	include("pages/modifierSalarie.inc.php");
	break;

case 21:
	// inclure ici la page pour valider les citations
	include("pages/validerCitations.inc.php");
	break;
	
case 22:
	// inclure ici la page pour valider les citations
	include("pages/validerLaCitation.inc.php");
	break;

case 23:
	// inclure ici la page pour supprimer une personne
	include("pages/supprimerUnePersonne.inc.php");
	break;

case 24:
	// inclure ici la page pour supprimer des citations
	include("pages/supprimerCitations.inc.php");
	break;

case 25:
	// inclure ici la page pour supprimer une citation
	include("pages/supprimerUneCitation.inc.php");
	break;

case 26:
    // inclure ici la page pour supprimer des villes
    include("pages/supprimerVilles.inc.php");
    break;

case 27:
    // inclure ici la page pour supprimer une ville
    include("pages/supprimerUneVille.inc.php");
    break;

default : 	include_once('pages/accueil.inc.php');
}
	
?>
</div>
