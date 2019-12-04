<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
$personnes = $personneManager->getPersonnes();
$nbPers = $personneManager->getNbPersonnes();
?>

<h1>Liste des personnes enregistrées</h1>

<p>Actuellement <?php echo $nbPers ?> de personnes sont enregistrées</p>

<table>
	<tr><th>Numéro</th><th>Nom</th><th>Prenom</th></tr>
	<?php
	foreach ($personnes as $personne){ ?>
		<tr><td><a href="index.php?page=9&num=<?php echo $personne->getPerNum() ?>"><?php echo $personne->getPerNum();?>
		</a></td><td><?php echo $personne->getPerNom();?>
		</td><td><?php echo $personne->getPerPrenom();?>
		</td></tr>
	<?php } ?>
</table>

<p>Cliquez sur le numéro de la personne pour obtenir plus d'informations.</p>

	