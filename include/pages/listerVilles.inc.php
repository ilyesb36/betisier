<?php
$pdo = new Mypdo();
$villeManager = new VilleManager($pdo);
$villes = $villeManager->getVilles();
$nbVilles = $villeManager->getNbVilles();
?>

<h1>Liste des villes</h1>

<p>Actuellement <?php echo $nbVilles ?> de villes sont enregistrées</p>

<table>
	<tr><th>Numéro</th><th>Nom</th></tr>
	<?php
	foreach ($villes as $ville){ ?>
		<tr><td><?php echo $ville->getVilNum();?>
		</td><td><?php echo $ville->getVilNom();?>
		</td></tr>
	<?php } ?>
</table>

<br> <br>