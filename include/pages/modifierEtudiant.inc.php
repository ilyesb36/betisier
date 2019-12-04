<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
$etudiantManager = new EtudiantManager($pdo);
$pernom = isset($_SESSION["perNom"])?$_SESSION["perNom"]:NULL;
$perprenom = isset($_SESSION["perPrenom"])?$_SESSION["perPrenom"]:NULL;
$pertel = isset($_SESSION["perTel"])?$_SESSION["perTel"]:NULL;
$permail = isset($_SESSION["perMail"])?$_SESSION["perMail"]:NULL;
$perlogin = isset($_SESSION["perLogin"])?$_SESSION["perLogin"]:NULL;
$permdp = isset($_SESSION["perMdp"])?$_SESSION["perMdp"]:NULL;
$personneManager->modifierPersonne($_SESSION["numPerModifier"], $pernom, $perprenom, $pertel, $permail, $perlogin, $permdp);
if ($_SESSION["changerStatus"]) {
    $salarieManager = new SalarieManager($pdo);
    $salarieManager->supprimerSalarie($_SESSION["numPerModifier"]);
    $etudiantManager->ajoutEtudiant($_SESSION["numPerModifier"], $_POST["departement"], $_POST["division"]);
} else {
    $etudiantManager->modifierEtudiant($_SESSION["numPerModifier"], $_POST["departement"], $_POST["division"]);
}
unset($_SESSION["status"], $_SESSION["changerStatus"], $_SESSION["numPerModifier"], $_SESSION["perNom"], $_SESSION["perPrenom"], $_SESSION["perTel"], $_SESSION["perMail"], $_SESSION["perLogin"], $_SESSION["perMdp"]);
echo "<h1>Modifier un étudiant</h1>";
echo '<img src="./image/valid.png">';
echo "L'étudiant a été modifié !";
echo "<br> <br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php?page=0");
?>