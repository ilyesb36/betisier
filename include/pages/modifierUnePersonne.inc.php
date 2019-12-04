<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
$_SESSION["numPerModifier"] = $_GET["num"];
$personnes = $personneManager->getPersonneAllInfo($_SESSION["numPerModifier"]);
$personne = reset($personnes);
$etudiantManager = new EtudiantManager($pdo);
$estEtudiant = $etudiantManager->estEtudiant($_SESSION["numPerModifier"]);
if ($estEtudiant) {
	$_SESSION["status"] = "etudiant";
} else {
	$_SESSION["status"] = "salarie";	
}
?>

<h1>Modifier une personne enregistrées</h1>

<form action="index.php?page=18" method="post" id="formPers">
		<label>Nom : </label>
		<input class="inputForm" type="text" name="perNom" value="<?php echo $personne->getPerNom(); ?>"/>
		<br> <br>
		<label>Prénom : </label>
		<input class="inputForm" type="text" name="perPrenom" value="<?php echo $personne->getPerPrenom(); ?>"/>
		<br> <br>
		<label>Téléphone : </label>
		<input class="inputForm" type="tel" name="perTel" value="<?php echo $personne->getPerTel(); ?>"/>
		<br> <br>
		<label>Mail : </label>
		<input class="inputForm" type="email" name="perMail" value="<?php echo $personne->getPerMail(); ?>"/>
		<br> <br>
		<label>Login : </label>
		<input class="inputForm" type="text" name="perLogin" value="<?php echo $personne->getPerLog(); ?>"/>
		<br> <br>
		<label>Mot de passe : </label>
		<input class="inputForm" type="password" name="perMdp" value="<?php echo $personne->getPerPwd(); ?>"/>
		<br> <br>
		<label>Catégorie : </label>
		<input type="radio" name="etu" value="etudiant" <?php if ($estEtudiant) {echo "checked";} ?>/> Etudiant
		<input type="radio" name="etu" value="salarie" <?php if (! $estEtudiant) {echo "checked";} ?>/> Personnel
		<br> <br>
		<input class="btnForm" type="submit" value="Valider">
</form>

<br> <br>