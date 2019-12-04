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
}
if (!empty($_POST["perMail"])) {
    $_SESSION["perMail"] = $_POST["perMail"];
}
if (!empty($_POST["perLogin"])) {
    $_SESSION["perLogin"] = $_POST["perLogin"];
}
if (!empty($_POST["perMdp"])) {
    $_SESSION["perMdp"] = $_POST["perMdp"];
}
$_SESSION["changerStatus"] = 0;
?>

<?php if ($_POST["etu"] == "etudiant" && empty($_POST["division"]) && empty($_POST["departement"])) {
    
    if ($_POST["etu"] == $_SESSION["status"]) {
        $etudiantManager = new EtudiantManager($pdo);
        $etudiants = $etudiantManager->getEtudiant($_SESSION["numPerModifier"]);
        $etudiant = reset($etudiants);
    } else {
        $_SESSION["changerStatus"] = 1;
    }
    $divisionManager = new DivisionManager($pdo);
    $departementManager = new DepartementManager($pdo);
    $divisions = $divisionManager->getAllDivision();
    $departements = $departementManager->getAllDepart();
?>
    <h1>Modifier un étudiant</h1>
    <form action="index.php?page=19" method="post">
        <label>Année : </label>
        <select name="division">
        <?php
        foreach ($divisions as $division) { ?>
            <option value="<?php echo $division->getDivNum()?>" 
            <?php if ($_SESSION["changerStatus"] == 0) {
                if ($etudiant->getDivNom() == $division->getDivNom()) {
                    echo "selected";
                }
            }?>>
            <?php echo $division->getDivNom() ?></option>
        <?php } ?>
        </select>
        <br> <br>
        <label>Département : </label>
        <select name="departement">
        <?php
        foreach ($departements as $departement) { ?>
            <option value="<?php echo $departement->getDepNum() ?>"
            <?php if ($_SESSION["changerStatus"] == 0) {
                if ($etudiant->getDepNom() == $departement->getDepNom()) {
                    echo "selected";
                }
            }?>>
            <?php echo $departement->getDepNom() ?></option>
        <?php } ?>
        </select>
        <br> <br>
        <input class="btnForm" type="submit" value="Valider">
    </form>
<?php } else if ($_POST["etu"] == "salarie" && empty($_POST["fonction"])) {
    if ($_POST["etu"] == $_SESSION["status"]) {
        $salarieManager = new SalarieManager($pdo);
        $salaries = $salarieManager->getSalarie($_SESSION["numPerModifier"]);
        $salarie = reset($salaries);
    } else {
        $_SESSION["changerStatus"] = 1;
    }
    $fonctionManager = new FonctionManager($pdo);
    $fonctions = $fonctionManager->getAllFonction();
    ?>
    <h1>Modifier un salarié</h1>
    <form action="index.php?page=20" method="post">
        <label>Téléphone professionel : </label>
        <input class="inputForm" type="tel" name="proTel" value="<?php if ($_SESSION["changerStatus"] == 0) {
            echo $salarie->getTelPro(); 
        }?>"/>
        <br> <br>
        <label>Fonction : </label>
        <select name="fonction">
        <?php
        foreach ($fonctions as $fonction) { ?>
            <option value="<?php echo $fonction->getFonNum() ?>"
            <?php if ($_SESSION["changerStatus"] == 0) { 
                if ($salarie->getFonction() == $fonction->getFonLib()) {
                    echo "selected";
                }            
            ;}?>>
            <?php echo $fonction->getFonLib() ?></option>
        <?php } ?>
        </select>
        <br> <br>
        <input class="btnForm" type="submit" value="Valider">
    </form>
<?php } ?>