<!doctype html> 
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<meta charset="utf-8">
  <title>Wiki Rallye Groupe B</title>
</head>
<body>
	<header>
        
    <?php session_start();?>
        
    <form action="resultatRechercheRapide.php" class="formRechercheRapide" method="post" enctype="multipart/form-data">
        <input type="text" name="recherche" id="recherche"/>			
        <input type="submit" value="Rechercher">
    </form>
    
    <h1 class="titrePrincipale">Les meilleurs voitures de Rallye de Groupe B</h1>

    <nav>
      <a class="menuPrincipale" href="index.php">Acceuil</a>
      <a class="menuPrincipale" href="liste-voiture.php">Voiture</a>
      <a style="float:right" class="menuPrincipale" href="membre.php">Membre</a>
      <a style="float:right" class="menuPrincipale" href="recherche-avance.php">Recherche Avancée</a>
      <?php if (!empty($_SESSION)) if ($_SESSION['admin']){echo '<a style="float:right" class="menuPrincipale" href="administration/index.php">Panneau Admin</a>';}?>
    </nav> 

  </header>
  <section id="contenu">