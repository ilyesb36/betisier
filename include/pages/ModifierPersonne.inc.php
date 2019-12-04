<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
$personnes = $personneManager->getPersonnes();
$nbPers = $personneManager->getNbPersonnes();
?>

<h1>Modifier une personne enregistrées</h1>

<p>Actuellement <?php echo $nbPers ?> de personnes sont enregistrées</p>

<table>
	<tr><th>Nom</th><th>Prenom</th><th>Modifier</th></tr>
	<?php
	foreach ($personnes as $personne){ ?>
		</a></td><td><?php echo $personne->getPerNom();?>
		</td><td><?php echo $personne->getPerPrenom();?>
		</td><td><a href="index.php?page=17&num=<?php echo $personne->getPerNum() ?>"><img src="./image/modifier.png">
		</td></tr>
	<?php } ?>
</table>
<br> <br>