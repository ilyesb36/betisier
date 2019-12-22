<?php
$pdo = new Mypdo();
if (!empty($_POST["perNom"])) {
    $_SESSION["perNom"] = $_POST["perNom"];
} else {
    header("location:javascript://history.go(-1)");
}
if (!empty($_POST["perPrenom"])) {
    $_SESSION["perPrenom"] = $_POST["perPrenom"];
} else {
    header("location:javascript://history.go(-1)");
}
if (!empty($_POST["perTel"])) {
    $_SESSION["perTel"] = $_POST["perTel"];
} else {
    header("location:javascript://history.go(-1)");
}
if (!empty($_POST["perMail"])) {
    $_SESSION["perMail"] = $_POST["perMail"];
} else {
    header("location:javascript://history.go(-1)");
}
if (!empty($_POST["perLogin"])) {
    $_SESSION["perLogin"] = $_POST["perLogin"];
} else {
    header("location:javascript://history.go(-1)");
}
if (!empty($_POST["perMdp"])) {
    $_SESSION["perMdp"] = $_POST["perMdp"];
} else {
    header("location:javascript://history.go(-1)");
}
?>

<?php if ($_POST["etu"] == "etudiant" && empty($_POST["division"]) && empty($_POST["departement"])) {
    $divisionManager = new DivisionManager($pdo);
    $departementManager = new DepartementManager($pdo);
    $divisions = $divisionManager->getAllDivision();
    $departements = $departementManager->getAllDepart();
    ?>
    <h1>Ajouter un étudiant</h1>
    <form action="index.php?page=13" method="post">
        <label>Année : </label>
        <select name="division">
        <?php
        foreach ($divisions as $division) { ?>
            <option value="<?php echo $division->getDivNum() ?>">
            <?php echo $division->getDivNom() ?></option>
        <?php } ?>
        </select>
        <br> <br>
        <label>Département : </label>
        <select name="departement">
        <?php
        foreach ($departements as $departement) { ?>
            <option value="<?php echo $departement->getDepNum() ?>">
            <?php echo $departement->getDepNom() ?></option>
        <?php } ?>
        </select>
        <br> <br>
        <input class="btnForm" type="submit" value="Valider">
    </form>
<?php } else if ($_POST["etu"] == "salarie" && empty($_POST["fonction"])) {
    $fonctionManager = new FonctionManager($pdo);
    $fonctions = $fonctionManager->getAllFonction();
    ?>
    <h1>Ajouter un salarié</h1>
    <form action="index.php?page=14" method="post">
        <label>Téléphone professionel : </label>
        <input class="inputForm" type="tel" name="proTel" value="0000000000"/>
        <br> <br>
        <label>Fonction : </label>
        <select name="fonction">
        <?php
        foreach ($fonctions as $fonction) { ?>
            <option value="<?php echo $fonction->getFonNum() ?>">
            <?php echo $fonction->getFonLib() ?></option>
        <?php } ?>
        </select>
        <br> <br>
        <input class="btnForm" type="submit" value="Valider">
    </form>
<?php } ?>