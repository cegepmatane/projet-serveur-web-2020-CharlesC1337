<?php include "entete.php"?>
	
<header><h2>Inscription</h2></header>

<section id="inscription">
	<form action="traitement-inscription.php" method="post" enctype="multipart/form-data">

		<div class="champs">
			<label for="pseudonyme">Pseudonyme</label>
			<input type="text" name="pseudonyme" id="pseudonyme"/>			
		</div>

		<div class="champs">
			<label for="motDePasse">Mot De Passe</label>
			<input type="password" name="motDePasse" id="motDePasse"/>			
		</div>
		
		<input type="submit" value="Inscription">
	</form>
</section>
	
<?php include "pied-page.php"?>