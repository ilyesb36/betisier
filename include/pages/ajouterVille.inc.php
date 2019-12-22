<?php
$ajout = false;
if (empty($_POST["vilNom"])) {
    echo "";
} else {
    $pdo = new Mypdo();
    $villeManager = new VilleManager($pdo);
    $villeManager->ajoutVille($_POST["vilNom"]);
    $ajout = true;
}
?>

<h1>Ajouter une ville</h1>

<?php
if (!$ajout) {?>
<form action="#" method="post" id="formVille">
        <label>Nom : </label>
        <input class="inputForm" type="name" name="vilNom" />
        <br> <br>
        <input class="btnForm" type="submit" name="ajoutVille" value="Valider">
</form>
<br> <br>
<?php
} else if ($ajout) {
echo '<img src="./image/valid.png"> La ville "';
echo $_POST["vilNom"];
echo '" a été ajoutée';
echo "<br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php?page=8");
}?>