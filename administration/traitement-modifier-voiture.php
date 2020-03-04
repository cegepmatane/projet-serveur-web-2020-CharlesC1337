<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

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

$noVoiture = $_GET['voiture'];

$voiture = VoitureDAO::lireVoiture($noVoiture);

$reussiteModification = VoitureDAO::modifierVoiture($voiture);
?>


<?php
if($reussiteModification) 
{
?>
	La Voiture a été modifié dans la base de données
<?php	
}
?>