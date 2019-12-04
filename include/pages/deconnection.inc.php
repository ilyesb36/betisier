<?php
unset($_SESSION["nb1"], $_SESSION["nb2"], $_SESSION["nb3"], $_SESSION["userLogin"], $_SESSION["userNum"]);
$_SESSION["estConnecte"] = false;
echo "<br> <br>";
echo "Vous avez bien été déconnecté.";
echo "<br> <br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php?page=0");
?>