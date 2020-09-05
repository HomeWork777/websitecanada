<form action="mail.php" method="post" enctype="multipart/form-data">
	<label for="nom">Votre nom</label>
	<input type="text" name="nom" required/>
	<label for="email">Votre E-mail</label>
	<input type="email" name="email" required/>
	<label for="message">Votre demande</label>
	<textarea name="message" rows="2" cols="50" required></textarea>
	<label for='fichier'>Ajouter une pièce jointe <span>(jpeg ou pdf, max 2Mo)</span></label>
        <input type="file" name="fichier" id="fichier">
	<input type="submit" value="Envoyer">
</form>
