<?php include "entete.php"?>
	
<header><h2>Inscription</h2></header>

<section id="inscription">
	<form action="traitement-inscription.php" method="post" enctype="multipart/form-data">

		<div class="champs">
			<label for="pseudonyme">Pseudonyme *</label>
			<input type="text" name="pseudonyme" id="pseudonyme" required/>			
		</div>
        
        <div class="champs">
			<label for="email">Addesse courriel *</label>
			<input type="email" name="email" id="email" required/>			
		</div>
        
        <div class="champs">
			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom"/>			
		</div>
        
        <div class="champs">
			<label for="prenom">Prenom</label>
			<input type="text" name="prenom" id="prenom"/>			
		</div>

		<div class="champs">
			<label for="motDePasse">Mot de passe *</label>
			<input type="password" name="motDePasse" id="motDePasse" required/>			
		</div>
		
		<input type="submit" value="Inscription">
	</form>
</section>
	
<?php include "pied-page.php"?>