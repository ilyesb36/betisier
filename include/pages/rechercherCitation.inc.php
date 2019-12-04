<?php
$pdo = new Mypdo();
$citationManager = new CitationManager($pdo);
$citations = $citationManager->getAllCitationsValide();
$nomEnseignant = isset($_POST["nomEnseignant"])?$_POST["nomEnseignant"]:NULL;
$dateCitation = isset($_POST["dateCitation"])?$_POST["dateCitation"]:NULL;
$noteCitation = isset($_POST["noteCitation"])?$_POST["noteCitation"]:NULL;
?>

<h1>Rechercher une citation</h1>

<form action="#" method="post" id="formCitation">
    <label>Nom enseignant : </label>
    <input class="inputForm" type="text" name="nomEnseignant" />
    <label>Date Citation : </label>
    <input class="inputForm" type="date" name="dateCitation" />
    <label>Note : </label>
    <input class="inputForm" type="number" name="noteCitation" step="0.1"/>
    <br> <br>
    <input class="btnForm" type="submit" value="Valider">
</form>

<br> <br>

<?php if (!empty($nomEnseignant) || !empty($dateCitation) || !empty($noteCitation)) {
    $listeCitations = $citationManager->rechercherCitation($nomEnseignant, $dateCitation, $noteCitation);
    if (count($listeCitations) > 0) { ?>
        <table>
            <tr><th>Nom de l'enseignant</th><th>Libellé</th><th>Date</th><th>Moyenne des notes</th></tr>
            <?php
            foreach ($listeCitations as $citation){ ?>
                <tr><td><?php echo $citation->getPerNom(); echo $citation->getPerPrenom()?>
                </td><td><?php echo $citation->getLibelle();?>
                </td><td><?php echo $citation->getDate();?>
                </td><td><?php echo $citation->getValeur();?>
                </td></tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>Aucun resultat</p>
    <?php }
} ?>