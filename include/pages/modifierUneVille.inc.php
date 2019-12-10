<?php
$_SESSION["vilnumModif"] = $_GET["vilnum"];
$pdo = new Mypdo();
$villeManager = new VilleManager($pdo);
$ville = $villeManager->getUneVille($_SESSION["vilnumModif"]);
?>

<h1>Modifier une ville</h1>

<form action="index.php?page=30" method="post" id="formVille">
    <label>Nom : </label>
    <input class="inputForm" type="name" name="vilNom" value="<?php echo $ville->getVilNom(); ?>"/>
    <br> <br>
    <input class="btnForm" type="submit" name="modifVille" value="Valider">
</form>
