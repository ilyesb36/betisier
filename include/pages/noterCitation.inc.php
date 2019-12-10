<?php

?>

<h1>Noter la citation numéro <?php echo $_GET["citnum"] ?> </h1>

<?php if (empty($_POST["noteCitation"])) { ?>
        <form action="#" method="post" id="formVoteCitation">
                <label>Note : </label>
                <input class="inputForm" type="number" name="noteCitation" />
                <br> <br>
                <input class="btnForm" type="submit" value="Valider">
        </form>
<?php } else {
        if ($_POST["noteCitation"] < 0 || $_POST["noteCitation"] > 20) {
                echo "La note doit compris entre 0 et 20";
                echo "Redirection automatique dans 2 secondes";
                header("Refresh:2;url=index.php?page=6");
        } else {
                $pdo = new Mypdo();
                $citationManager = new CitationManager($pdo);
                $citationManager->ajouterNoteCitation($_GET["citnum"], $_SESSION["userNum"], $_POST["noteCitation"]);
                echo "Note ajoutée";
                echo "<br> <br>";
                echo "Redirection automatique dans 2 secondes";
                header("Refresh:2;url=index.php?page=6");
        }
}
?>