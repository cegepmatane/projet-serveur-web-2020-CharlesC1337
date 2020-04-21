<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

/*$repertoireImage = $_SERVER['DOCUMENT_ROOT'] . "/ProjetListPhp/projet-serveur-web-2020-CharlesC1337/images/";

$fichierDestination = $repertoireImage . $_FILES['image']['name'];

$fichierSource = $_FILES['image']['tmp_name'];

$image =  $_FILES['image']['name'];

if(move_uploaded_file($fichierSource,$fichierDestination))
{?>
	Votre envoi de fichier a bien fonctionné
	<img src="../images/<?=$_FILES['image']['name']?>" alt=""/>
	<?php
}*/

$filtresMembre = [];

$filtresMembre['pseudonyme'] = FILTER_SANITIZE_ENCODED;
$filtresMembre['motDePasse'] = FILTER_SANITIZE_ENCODED;
  
$membre = filter_input_array(INPUT_POST, $filtresMembre);

//$membre['image'] = $image;

$reussiteAjout = MembreDAO::ajouterMembre($membre);
?>

<?php
if($reussiteAjout) 
{
?>
	Inscription Réussi!
<?php	
}
?>
