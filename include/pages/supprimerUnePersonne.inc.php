<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
$personnes = $personneManager->getPersonnes();
$pernum = $_GET["pernum"];
?>

<h1>Supprimer une personne enregistrée</h1>

<?php
$etudiantManager = new EtudiantManager($pdo);
if ($etudiantManager->estEtudiant($pernum)) {
    $etudiantManager->supprimerEtudiant($pernum);
} else {
    $salarieManager = new SalarieManager($pdo);
    $salarieManager->supprimerSalarie($pernum);
}
$personneManager->supprimerPersonne($pernum);
echo "Personne supprimée !";
echo "<br> <br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php?page=2");

?>