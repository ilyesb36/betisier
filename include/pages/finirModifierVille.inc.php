<?php
$pdo = new Mypdo();
$villeManager = new VilleManager($pdo);
$villeManager->modifierVille($_SESSION["vilnumModif"], $_POST["vilNom"]);
echo "<h1>Modifier une ville</h1>";
echo '<img src="./image/valid.png">';
echo "La ville a été modifié !";
echo "<br> <br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php?page=8");
?>