<?php
$pdo = new Mypdo();
$citationManager = new CitationManager($pdo);
$citations = $citationManager->getAllCitations();
?>

<h1>Liste des citations déposées</h1>
	
<table>
	<tr><th>Nom de l'enseignant</th><th>Libellé</th><th>Date</th><th>Supprimer</th></tr>
	<?php
	foreach ($citations as $citation){ ?>
		<tr><td><?php echo $citation->getPerNom(); echo $citation->getPerPrenom()?>
		</td><td><?php echo $citation->getLibelle();?>
		</td><td><?php echo $citation->getDate();?>
		</td><td><a href="index.php?page=25&citnum=<?php echo $citation->getCitNum() ?>"><img src="./image/erreur.png"></a>
		</td></tr>
	<?php } ?>
</table>

<br> <br>