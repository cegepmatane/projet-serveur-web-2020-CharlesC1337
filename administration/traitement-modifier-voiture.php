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

$id = $_POST['id'];
$marque = addslashes($_POST['marque']);
$modele = $_POST['modele'];
$annee = $_POST['annee'];
$description = $_POST['description'];

$SQL_MODIFIER_VOITURE = "UPDATE rallye SET marque = '$marque', modele='$modele', annee='$annee', description='$description', image='$image' WHERE id = " . $id;

$requeteModifierVoiture = $basededonnees->prepare($SQL_MODIFIER_VOITURE);
$reussiteModification = $requeteModifierVoiture->execute();
?>


<?php
if($reussiteModification) 
{
?>
	La Voiture a été modifié dans la base de données
<?php	
}
?>