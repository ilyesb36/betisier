<?php
$pdo = new Mypdo();
$salarieManager = new SalarieManager($pdo);
$motManager = new MotManager($pdo);
$salaries = $salarieManager->getAllSalaries();
?>

<h1>Ajouter une citation</h1>
<?php if (empty($_POST["salarie"]) && empty($_POST["dateCitation"]) && empty($_POST["citation"])) { ?>
	<form action="#" method="post" id="formCitation">
			<label>Enseignant : </label>
			<select name="salarie">
			<?php
			foreach ($salaries as $salarie) { ?>
				<option value="<?php echo $salarie->getPerNum() ?>">
				<?php echo $salarie->getPerNom() ?></option>
			<?php } ?>
			</select>
			<br> <br>
			<label>Date Citation : </label>
			<input class="inputForm" type="date" name="dateCitation" value="<?php echo date("Y-m-d"); ?>"/>
			<br> <br>
			<label>Citation : </label>
			<textarea rows="4" cols="30" class="inputForm" name="citation"></textarea>
			<br> <br>
			<input class="btnForm" type="submit" value="Valider">
	</form>
<?php } else { 
	$listeMotInterdit = $motManager->getAllMotInterdit($_POST["citation"]);
	$mots = array();
	foreach ($listeMotInterdit as $motInterdit) {
		$mot[] = $motInterdit->getMotInterdit();
	}
	if (count($listeMotInterdit) > 0) { 
		$newCitation = str_ireplace($mot, "---", $_POST["citation"]);?>
	<form action="#" method="post" id="formCitation">
			<label>Enseignant : </label>
			<select name="salarie">
			<?php
			foreach ($salaries as $salarie) { ?>
				<option value="<?php echo $salarie->getPerNum(); ?>" <?php if ($salarie->getPerNum() == $_POST["salarie"]){ echo "selected";}  ?>>
				<?php echo $salarie->getPerNom() ?></option>
			<?php } ?>
			</select>
			<br> <br>
			<label>Date Citation : </label>
			<input class="inputForm" type="date" name="dateCitation" value="<?php echo $_POST["dateCitation"]; ?>"/>
			<br> <br>
			<label>Citation : </label>
			<textarea rows="4" cols="30" class="inputForm" name="citation"><?php echo $newCitation; ?></textarea>
			<br> <br>
			<input class="btnForm" type="submit" value="Valider">
			<br> <br>
			<?php
			foreach ($listeMotInterdit as $motInterdit) { ?>
				<img src="./image/erreur.png"> le mot 
				<?php echo '<span style="color:red">'; echo $motInterdit->getMotInterdit(); echo "</span>"?> 
				n'est pas autorisé
				<br> <br>
			<?php }
			?>
	</form>
			<?php } else {
				$etudiantManager = new EtudiantManager($pdo);
				if ($etudiantManager->estEtudiant($_SESSION["userNum"])) {
					$citationManager = new CitationManager($pdo);
					$citationManager->ajouterCitation($_POST["salarie"], $_SESSION["userNum"], $_POST["citation"], $_POST["dateCitation"]);
					echo '<img src="./image/valid.png"> La citation est ajoutée !';
					echo "<br> <br>";
					echo "Redirection automatique dans 2 secondes";
    				header("Refresh:2;url=index.php?page=0");
				} else {
					echo "Vous devez être étudiant pour ajouter une citation, la page va rafraichir";
            		header("Refresh:3;url=index.php?page=5");
				}
			} ?>
<?php } ?>