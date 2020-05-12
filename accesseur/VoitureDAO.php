<?php
require "BaseDeDonnees.php";

class VoitureDAO{
  public static function lireVoiture($id){
    $MESSAGE_SQL_VOITURE = "SELECT * FROM rallye WHERE id =:id;";

    $requeteListeVoitures = BaseDeDonnees::GetConnexion()->prepare($MESSAGE_SQL_VOITURE);
    $requeteListeVoitures->bindParam(':id', $id, PDO::PARAM_INT);
    $requeteListeVoitures->execute();
    $voiture = $requeteListeVoitures->fetch();
    
    return $voiture;
  }

  public static function listerVoiture(){
    $MESSAGE_SQL_LISTE_VOITURE = "SELECT id, marque, modele, annee FROM rallye;";

    $requeteListeVoitures = BaseDeDonnees::GetConnexion()->prepare($MESSAGE_SQL_LISTE_VOITURE);
    $requeteListeVoitures->execute();
    $listeVoitures = $requeteListeVoitures->fetchAll();

    return $listeVoitures;
  }

  public static function ajouterVoiture($voiture){

    $SQL_AJOUTER_VOITURE = "INSERT into rallye(marque, modele, annee, description, image) VALUES(".":marque,".":modele,".":annee,".":description,".":image".");";

    $requeteAjouterVoiture = BaseDeDonnees::GetConnexion()->prepare($SQL_AJOUTER_VOITURE);

    $requeteAjouterVoiture->bindParam(':marque', $voiture['marque'], PDO::PARAM_STR);
    $requeteAjouterVoiture->bindParam(':modele', $voiture['modele'], PDO::PARAM_STR);
    $requeteAjouterVoiture->bindParam(':annee', $voiture['annee'], PDO::PARAM_STR);
    $requeteAjouterVoiture->bindParam(':description', $voiture['description'], PDO::PARAM_STR);
    $requeteAjouterVoiture->bindParam(':image', $voiture['image'], PDO::PARAM_STR);

    $reussiteAjout = $requeteAjouterVoiture->execute();
    return $reussiteAjout;
  }

  public static function modifierVoiture($voiture){

    $id = $voiture['id'];
    
    $SQL_MODIFIER_VOITURE = "UPDATE rallye SET marque=".":marque"." modele=".":modele"." annee=".":annee"." description=".":description"." image=".":image"." WHERE id = " . $id;

    $requeteModifiervoiture = BaseDeDonnees::GetConnexion()->prepare($SQL_MODIFIER_VOITURE);

    $requeteModifiervoiture->bindParam(':marque', $voiture['marque'], PDO::PARAM_STR);
    $requeteModifiervoiture->bindParam(':modele', $voiture['modele'], PDO::PARAM_STR);
    $requeteModifiervoiture->bindParam(':annee', $voiture['annee'], PDO::PARAM_STR);
    $requeteModifiervoiture->bindParam(':description', $voiture['description'], PDO::PARAM_STR);
    $requeteModifiervoiture->bindParam(':image', $voiture['image'], PDO::PARAM_STR);

    $reussiteModification = $requeteModifiervoiture->execute();
    return $reussiteModification;
  }

  public static function supprimerVoiture($id){
    $SQL_SUPPRIMER_VOITURE = "DELETE FROM rallye WHERE id = " . $id;

    $requeteSupprimerVoiture = BaseDeDonnees::GetConnexion()->prepare($SQL_SUPPRIMER_VOITURE);
    $requeteSupprimerVoiture->execute();

    $reussiteSupprimer = $requeteSupprimerVoiture->execute();

    return $reussiteSupprimer;
  }

  public static function lireRecherche($textRecherche){
    $MESSAGE_SQL_LISTE_RESULTAT_RECHERCHE = "SELECT id, marque, modele, annee, description FROM rallye WHERE marque LIKE '%$textRecherche%' OR modele LIKE '%$textRecherche%' OR annee LIKE '%$textRecherche%' OR description LIKE '%$textRecherche%';";

    $requeteResultatRecherche = BaseDeDonnees::GetConnexion()->prepare($MESSAGE_SQL_LISTE_RESULTAT_RECHERCHE);
    $requeteResultatRecherche->execute();
    $listResultatRecherche = $requeteResultatRecherche->fetchAll();

    return $listResultatRecherche;
  }
}
?>