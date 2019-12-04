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
$personneManager->ajoutPersonne($pernom, $perprenom, $pertel, $permail, $perlogin, $permdp);
$etudiantManager->ajoutEtudiant($_SESSION["perId"], $_POST["departement"], $_POST["division"]);
unset($_SESSION["perNom"], $_SESSION["perPrenom"], $_SESSION["perTel"], $_SESSION["perMail"], $_SESSION["perLogin"], $_SESSION["perMdp"], $_SESSION["perId"]);
echo "<h1>Ajouter un étudiant</h1>";
echo '<img src="./image/valid.png">';
echo "L'étudiant a été ajouté !";
echo "<br> <br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php?page=0");
?>