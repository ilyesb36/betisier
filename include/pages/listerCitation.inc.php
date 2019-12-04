<?php
$pdo = new Mypdo();
$citationManager = new CitationManager($pdo);
$etudiantManager = new EtudiantManager($pdo);
$citations = $citationManager->getAllCitationsValide();
$nbCitation = $citationManager->getNbCitationValide();
?>

<h1>Liste des citations déposées</h1>
	
<p>Actuellement <?php echo $nbCitation ?> de citations sont enregistrées</p>

<table>
	<tr><th>Nom de l'enseignant</th><th>Libellé</th><th>Date</th><th>Moyenne des notes</th><?php if ($etudiantManager->estEtudiant($_SESSION["userNum"])){
		echo "<th>Noter</th>";
	} ?></tr>
	<?php
	foreach ($citations as $citation){ ?>
		<tr><td><?php echo $citation->getPerNom(); echo $citation->getPerPrenom()?>
		</td><td><?php echo $citation->getLibelle();?>
		</td><td><?php echo $citation->getDate();?>
		</td><td><?php echo $citation->getValeur();?>
		</td> <?php if ($etudiantManager->estEtudiant($_SESSION["userNum"])) { ?> <td><?php if ($citationManager->estDejaNote($citation->getCitNum(), $_SESSION["userNum"])) { ?>
			<img src="./image/erreur.png">
		<?php } else { ?>
			<a href="index.php?page=15&citnum=<?php echo $citation->getCitNum() ?>"><img src="./image/modifier.png"></a>
		<?php } ?>
		</td> <?php } ?></tr>
	<?php } ?>
</table>

