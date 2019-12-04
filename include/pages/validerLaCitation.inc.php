<h1>Valider une citation</h1>

<?php 
$pdo = new Mypdo();
$citationManager = new CitationManager($pdo);
$citationManager->validerCitation($_GET["citnum"]);
echo "Citation validée !";
echo "<br> <br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php?page=21");
?>