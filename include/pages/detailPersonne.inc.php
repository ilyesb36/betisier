<?php
$pernum = isset($_GET["num"])?$_GET["num"]:NULL;
$pdo = new Mypdo();
$etudiantManager = new EtudiantManager($pdo);
$salarieManager = new SalarieManager($pdo);

if ($etudiantManager->estEtudiant($pernum)) {
	$etudiants = $etudiantManager->getEtudiant($pernum);
	$etudiant = reset($etudiants);
	?>
	<h1>Détail sur l'étudiant <?php echo $etudiant->getPerNom(); ?></h1>
	<table>
		<tr><th>Prénom</th><th>Mail</th><th>Tel</th><th>Département</th><th>Ville</th></tr>
			<tr><td><?php echo $etudiant->getPerPrenom();?>
			</a></td><td><?php echo $etudiant->getMail();?>
			</td><td><?php echo $etudiant->getTel();?>
			</td><td><?php echo $etudiant->getDepNom();?>
			</td><td><?php echo $etudiant->getVilNom();?>
			</td></tr>
	</table>

<?php } else if ($salarieManager->estSalarie($pernum)) { 
	
	$salaries = $salarieManager->getSalarie($pernum);
	$salarie = reset($salaries);
	?>

	<h1>Détail sur le salarie <?php echo $salarie->getPerNom() ?></h1>

	<table>
		<tr><th>Prénom</th><th>Mail</th><th>Tel</th><th>Tel pro</th><th>Fonction</th></tr>
			<tr><td><?php echo $salarie->getPerPrenom();?>
			</a></td><td><?php echo $salarie->getMail();?>
			</td><td><?php echo $salarie->getTel();?>
			</td><td><?php echo $salarie->getTelPro();?>
			</td><td><?php echo $salarie->getFonction();?>
			</td></tr>
	</table>

<?php }

?>
