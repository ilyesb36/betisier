<?php
$pdo = new Mypdo();
$citationManager = new CitationManager($pdo);
$citations = $citationManager->getAllCitations();
?>

<h1>Supprimer une citation enregistrée</h1>

<?php
$citationManager->supprimerCitation($_GET["citnum"]);
echo "Citation supprimée !";
echo "<br> <br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php?page=2");
?>