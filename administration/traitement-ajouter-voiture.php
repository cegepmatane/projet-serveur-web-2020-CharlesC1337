<?php

$repertoireImage = $_SERVER['DOCUMENT_ROOT'] . "/ProjetListPhp/projet-serveur-web-2020-CharlesC1337/images/";

$fichierDestination = $repertoireImage . $_FILES['image']['name'];

$fichierSource = $_FILES['image']['tmp_name'];

$image =  $_FILES['image']['name'];

if(move_uploaded_file($fichierSource,$fichierDestination))
{?>
	Votre envoi de fichier a bien fonctionné
	<img src="../images/<?=$_FILES['image']['name']?>" alt=""/>
	<?php
}

include "connexion.php"; 

$marque = addslashes($_POST['marque']);
$modele = $_POST['modele'];
$annee = $_POST['annee'];
$description = $_POST['description'];

$SQL_AJOUTER_VOITURE = "INSERT into rallye(marque, modele, annee, description, image) VALUES('".$marque."','" . $modele . "','" . $annee . "','" . $description . "', '" . $image . "');";

$requeteAjouterVoiture = $basededonnees->prepare($SQL_AJOUTER_VOITURE);
$reussiteAjout = $requeteAjouterVoiture->execute();
?>

<?php
if($reussiteAjout) 
{
?>
	La Voiture a été ajouté à la base de données
<?php	
}
?>