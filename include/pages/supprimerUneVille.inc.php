<h1>Supprimer une ville enregistrée</h1>

<?php
$pdo = new Mypdo();
$villeManager = new VilleManager($pdo);
$villeManager->supprimerVille($_GET["vilnum"]);
echo "Ville supprimée !";
echo "<br> <br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php?page=8");
?>
