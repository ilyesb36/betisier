<h1>Ajouter une personne</h1>
<h2>Tous les champs doivent être renseignés</h2>
<form action="index.php?page=12" method="post" id="formPers">
		<label>Nom : </label>
		<input class="inputForm" type="text" name="perNom" />
		<br> <br>
		<label>Prénom : </label>
		<input class="inputForm" type="text" name="perPrenom" />
		<br> <br>
		<label>Téléphone : </label>
		<input class="inputForm" type="tel" name="perTel" />
		<br> <br>
		<label>Mail : </label>
		<input class="inputForm" type="email" name="perMail" />
		<br> <br>
		<label>Login : </label>
		<input class="inputForm" type="text" name="perLogin" />
		<br> <br>
		<label>Mot de passe : </label>
		<input class="inputForm" type="password" name="perMdp" />
		<br> <br>
		<label>Catégorie : </label>
		<input type="radio" name="etu" value="etudiant" checked/> Etudiant
		<input type="radio" name="etu" value="salarie"/> Personnel
		<br> <br>
		<input class="btnForm" type="submit" value="Valider">
</form>

<br> <br>
