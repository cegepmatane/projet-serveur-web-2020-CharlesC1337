<?php 
session_start();

if (!empty($_SESSION)) {
    if ($_SESSION['admin']){
        
    }else{
        echo '<script type="text/javascript">';  
        echo 'window.location.href = "../index.php";';
        echo '</script>';
    }
}else{
    echo '<script type="text/javascript">';  
    echo 'window.location.href = "../index.php";';
    echo '</script>';
}
?>

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<meta charset="utf-8">
	<title>Panneau d'administration de Wiki Voiture Rallye Groupe B</title>
</head>
<body>

	<header>
		<h1>Panneau d'administration de Wiki Voiture Rallye Groupe B</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>Ajouter une voiture</h2></header>
		
		<form action="traitement-ajouter-voiture.php" method="post" enctype="multipart/form-data">
		
			<div class="champs">
				<label for="marque">Marque</label>
				<input type="text" name="marque" id="marque"/>			
			</div>
		
			<div class="champs">
				<label for="modele">Modèle</label>
				<input type="text" name="modele" id="modele"/>			
			</div>
			
			<div class="champs">
				<label for="annee">Année de sortie</label>
				<input type="text" name="annee" id="annee"/>			
			</div>	
			
			<div class="champs">
				<label for="description">Description</label>
				<textarea name="description" id="description"></textarea>			
			</div>		
			
			<div class="champs">
				<label for="image">Image</label>
				<input type="file" name="image" id="image"/>			
			</div>
			
			<input type="submit" value="Enregistrer">
		</form>
	
	</section>
	
	<footer><span id="signature">Par Charles</span></footer>
</body>
</html>