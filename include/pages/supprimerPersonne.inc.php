<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
$personnes = $personneManager->getPersonnes();
?>

<h1>Supprimer des personnes enregistrées</h1>

<table>
	<tr><th>Numéro</th><th>Nom</th><th>Prenom</th><th>Supprimer</th></tr>
	<?php
	foreach ($personnes as $personne){ ?>
		<tr><td><a href="index.php?page=9&num=<?php echo $personne->getPerNum() ?>"><?php echo $personne->getPerNum();?>
		</a></td><td><?php echo $personne->getPerNom();?>
		</td><td><?php echo $personne->getPerPrenom();?>
		</td><td><a href="index.php?page=23&pernum=<?php echo $personne->getPerNum() ?>"><img src="./image/erreur.png"></a>
	</td></tr>
	<?php } ?>
</table>

<br> <br>