<?php
$pdo = new Mypdo();
$villeManager = new VilleManager($pdo);
$villes = $villeManager->getVilles();
?>

<h1>Supprimer des villes enregistrées</h1>

<table>
    <tr><th>Numéro</th><th>Nom</th><th>Supprimer</th></tr>
    <?php
    foreach ($villes as $ville){ ?>
        <tr><td><?php echo $ville->getVilNum();?>
            </td><td><?php echo $ville->getVilNom();?>
            </td><td><?php if ($villeManager->estDepartement($ville->getVilNum())) { ?>
                    <div class="tooltip"><img src="./image/erreur.png">
                        <span class="tooltiptext">La ville contient un département</span>
                    </div>
                <?php } else { ?>
                    <a href="index.php?page=27&vilnum=<?php echo $ville->getVilNum() ?>"><img src="./image/erreur.png"></a>
                <?php } ?>
            </td></tr>
    <?php } ?>
</table>

<br> <br>