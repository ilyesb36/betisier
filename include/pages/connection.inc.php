<?php
$nb1 = mt_rand(1, 9);
$nb2 = mt_rand(1, 9);
$nb3 = $nb1 + $nb2;
$_SESSION["estConnecte"] = false;
?>

<h1>Pour vous connecter</h1>

<?php if (empty($_POST["perLogin"]) && empty($_POST["perMdp"]) && empty($_POST["nbValide"])) { 
    $_SESSION["nb1"] = mt_rand(1, 9);
    $_SESSION["nb2"] = mt_rand(1, 9);
    $_SESSION["nb3"] = $_SESSION["nb1"] + $_SESSION["nb2"];
    ?>
    <form action="#" method="post" id="formVille">
        <label>Nom d'utilisateur : </label>
        <input class="inputForm" type="text" name="userLogin" />
        <br> <br>
        <label>Mot de passe : </label>
        <input class="inputForm" type="password" name="userMdp" />
        <br> <br>
        <img src="./image/nb/<?php echo $_SESSION["nb1"]?>.jpg">
        <label class="operation">+</label>
        <img src="./image/nb/<?php echo $_SESSION["nb2"]?>.jpg">
        <label class="operation">=</label>
        <input class="inputForm" type="number" name="nbValide" />
        <br> <br>
        <input class="btnForm" type="submit" name="login" value="Valider">
</form>
<?php } else {
    if ($_POST["nbValide"] == $_SESSION["nb3"]) {
        $pdo = new Mypdo();
        $personneManager = new PersonneManager($pdo);
        if ($personneManager->utilisateurExiste($_POST["userLogin"], $_POST["userMdp"])) {
            $_SESSION["userNum"] = $personneManager->getNumPersonne($_POST["userLogin"], $_POST["userMdp"]); 
            $_SESSION["estConnecte"] = true;
            $_SESSION["estAdmin"] = $personneManager->estAdmin($_POST["userLogin"], $_POST["userMdp"]);
            $_SESSION["userLogin"] = $_POST["userLogin"]; ?>
            <img src="./image/valid.png"> Vous avez bien été connecté !
            <br> <br>
            <p>Redirection automatique dans 2 secondes<p>
            <?php unset($_SESSION["nb1"], $_SESSION["nb2"], $_SESSION["nb3"]); header("Refresh:2;url=index.php?page=0")?>
<?php       } else {
            echo "Le nom d'utilisateur ou le mot de passe est incorrect, la page va rafraichir";
            header("Refresh:3;url=index.php?page=10");
        }
    } else {
        echo "Le résultat n'est pas bon, la page va rafraichir";
        header("Refresh:3;url=index.php?page=10");
    }
    ?>
<?php } ?>
