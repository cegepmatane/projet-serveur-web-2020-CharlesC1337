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

$filtresVoiture = [];

$filtresVoiture['marque'] = FILTER_SANITIZE_ENCODED;
$filtresVoiture['modele'] = FILTER_SANITIZE_ENCODED;
$filtresVoiture['annee'] = FILTER_SANITIZE_ENCODED;
$filtresVoiture['description'] = FILTER_SANITIZE_ENCODED;
  
$voiture = filter_input_array(INPUT_POST, $filtresVoiture);

$voiture['image'] = $image;

$reussiteAjout = VoitureDAO::ajouterVoiture($voiture);
?>

<?php
if($reussiteAjout) 
{
?>
	La Voiture a été ajouté à la base de données
<?php	
}
?>
