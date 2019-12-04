<?php
$pdo = new Mypdo();
$citationManager = new CitationManager($pdo);
$etudiantManager = new EtudiantManager($pdo);
$citations = $citationManager->getAllCitationsNonValide();
?>

<h1>Liste des citations non valide</h1>

<table>
    <tr><th>Nom de l'enseignant</th><th>Libellé</th><th>Date</th><th>Valider</th></tr>
    <?php
    foreach ($citations as $citation){ ?>
        <tr><td><?php echo $citation->getPerNom(); echo " "; echo $citation->getPerPrenom()?>
        </td><td><?php echo $citation->getLibelle();?>
        </td><td><?php echo $citation->getDate();?>
        </td><td><a href="index.php?page=22&citnum=<?php echo $citation->getCitNum() ?>"><img src="./image/valid.png"></a>
        </td></tr>
    <?php } ?>
</table>

<br> <br>

