<?php
session_start();
$_SESSION["estConnecte"] = empty($_SESSION["estConnecte"])?false:$_SESSION["estConnecte"];
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="cache-control" content="no-cache, must-revalidate">
  <?php

		$title = "Bienvenue sur le site du bétisier de l'IUT.";?>
		<title>
		<?php echo $title;
		echo "<img src=\"./image/smile.jpg\">"; ?>
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
 
</head>
	<body>
	<div id="header">
		<div id="connect">
			<?php if (!($_SESSION["estConnecte"])) {?>
			<button><a href="index.php?page=10">Connexion</button>
			<?php } else if (($_SESSION["estConnecte"])) {?>
			<label>Utilisateur : <?php echo $_SESSION["userLogin"] ?></label>
			<button><a href="index.php?page=11">Déconnexion</button>
			<?php } ?>
		</div>
		<div id="entete">
			<div id="logo">
                <?php if ($_SESSION["estConnecte"]) {
                echo "<img src=\"./image/smile.jpg\" height='200px' width='200px'>";
                } else {
                echo "<img src=\"./image/lebetisier.gif\" height='200px' width='150px'>";
                } ?>
			</div>
			<div id="titre">
				Le bétisier de l'IUT,<br />Partagez les meilleures perles !!!
			</div>
		</div>
	</div>
	