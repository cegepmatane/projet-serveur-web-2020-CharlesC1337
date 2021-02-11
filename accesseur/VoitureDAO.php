<?php
class AccesBaseDeDonneesVoitures
{
    public static $basededonnees = null;

    public static function initialiser()
    {
        $usager = 'WikiRallye';
        $motdepasse = 'WikiRallye12!';
        $hote = 'localhost';
        $base = 'voiture';
        $dsn = 'mysql:dbname='.$base.';host=' . $hote;
        VoitureDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse);
        VoitureDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

class VoitureDAO extends AccesBaseDeDonneesVoitures{
  public static function lireVoiture($id){
      
    VoitureDAO::initialiser();
      
    $MESSAGE_SQL_VOITURE = "SELECT * FROM rallye WHERE id =:id;";

    $requeteListeVoitures = VoitureDAO::$basededonnees->prepare($MESSAGE_SQL_VOITURE);
    $requeteListeVoitures->bindParam(':id', $id, PDO::PARAM_INT);
    $requeteListeVoitures->execute();
    $voiture = $requeteListeVoitures->fetch();
    
    return $voiture;
  }

  public static function listerVoiture(){
      
    VoitureDAO::initialiser();
      
    $MESSAGE_SQL_LISTE_VOITURE = "SELECT id, marque, modele, annee, description, nombreProduit, image, miniature FROM rallye;";

    $requeteListeVoitures = VoitureDAO::$basededonnees->prepare($MESSAGE_SQL_LISTE_VOITURE);
    $requeteListeVoitures->execute();
    $listeVoitures = $requeteListeVoitures->fetchAll();

    return $listeVoitures;
  }

  public static function ajouterVoiture($voiture){
      
    VoitureDAO::initialiser();
      
    $marque = urldecode($voiture['marque']);
    $modele = urldecode($voiture['modele']);
    $description = urldecode($voiture['description']);

     $SQL_AJOUTER_VOITURE = "INSERT into rallye(marque, modele, annee, description, image) VALUES(".":marque,".":modele,".":annee,".":description,".":image".");";

    $requeteAjouterVoiture = VoitureDAO::$basededonnees->prepare($SQL_AJOUTER_VOITURE);

    $requeteAjouterVoiture->bindParam(':marque', $marque, PDO::PARAM_STR);
    $requeteAjouterVoiture->bindParam(':modele', $modele, PDO::PARAM_STR);
    $requeteAjouterVoiture->bindParam(':annee', $voiture['annee'], PDO::PARAM_STR);
    $requeteAjouterVoiture->bindParam(':description', $description, PDO::PARAM_STR);
    $requeteAjouterVoiture->bindParam(':image', $voiture['image'], PDO::PARAM_STR);

    $reussiteAjout = $requeteAjouterVoiture->execute();
    return $reussiteAjout;
  }

  public static function modifierVoiture($voiture){
      
    VoitureDAO::initialiser();

    $id = $voiture['id'];
      
    $marque = urldecode($voiture['marque']);
    $modele = urldecode($voiture['modele']);
    $description = urldecode($voiture['description']);
      
    if (!empty($voiture['image'])){
         $SQL_MODIFIER_VOITURE = "UPDATE rallye SET marque=".":marque".", modele=".":modele".", annee=".":annee".", description=".":description".", image=".":image"." WHERE id = " . $id;
    }else{
         $SQL_MODIFIER_VOITURE = "UPDATE rallye SET marque=".":marque".", modele=".":modele".", annee=".":annee".", description=".":description"." WHERE id = " . $id;
    }

    $requeteModifiervoiture = VoitureDAO::$basededonnees->prepare($SQL_MODIFIER_VOITURE);

    $requeteModifiervoiture->bindParam(':marque', $marque, PDO::PARAM_STR);
    $requeteModifiervoiture->bindParam(':modele', $modele, PDO::PARAM_STR);
    $requeteModifiervoiture->bindParam(':annee', $voiture['annee'], PDO::PARAM_STR);
    $requeteModifiervoiture->bindParam(':description', $description, PDO::PARAM_STR);
      
    if (!empty($voiture['image'])){
        $requeteModifiervoiture->bindParam(':image', $voiture['image'], PDO::PARAM_STR);
    }

    $reussiteModification = $requeteModifiervoiture->execute();
    return $reussiteModification;
  }

  public static function supprimerVoiture($id){
      
    VoitureDAO::initialiser();
      
    $SQL_SUPPRIMER_VOITURE = "DELETE FROM rallye WHERE id = " . $id;

    $requeteSupprimerVoiture = VoitureDAO::$basededonnees->prepare($SQL_SUPPRIMER_VOITURE);
    $requeteSupprimerVoiture->execute();

    $reussiteSupprimer = $requeteSupprimerVoiture->execute();

    return $reussiteSupprimer;
  }

  public static function lireRechercheRapide($textRecherche){
      
    VoitureDAO::initialiser();
      
    if (empty($textRecherche))
      $MESSAGE_SQL_LISTE_RESULTAT_RECHERCHE = "SELECT id, marque, modele, annee, description, image FROM rallye WHERE marque LIKE '%null%' OR modele LIKE '%null%' OR annee LIKE '%null%' OR description LIKE '%null%';";
    else
      $MESSAGE_SQL_LISTE_RESULTAT_RECHERCHE = "SELECT id, marque, modele, annee, description, image FROM rallye WHERE marque LIKE '%$textRecherche%' OR modele LIKE '%$textRecherche%' OR annee LIKE '%$textRecherche%' OR description LIKE '%$textRecherche%';";

    $requeteResultatRecherche = VoitureDAO::$basededonnees->prepare($MESSAGE_SQL_LISTE_RESULTAT_RECHERCHE);
    $requeteResultatRecherche->execute();
    $listResultatRecherche = $requeteResultatRecherche->fetchAll();

    return $listResultatRecherche;
  }

  public static function lireRechercheAvance($marque, $modele, $anneeMin, $anneeMax, $conditionGroupe){
      
    VoitureDAO::initialiser();

    $conditions = array();
    if(!empty($marque))
    {
        $conditions[ ] =  " marque LIKE '%$marque%' ";
    }
    if(!empty($modele))
    {
        $conditions[ ]  = " modele LIKE '%$modele%' ";
    }
    if(!empty($anneeMin) && !empty($anneeMax))
    {
        $conditions[ ]  = " annee BETWEEN '$anneeMin' AND '$anneeMax'";
    }
    if(!empty($conditionGroupe))
    {
        $conditions[ ]  = "$conditionGroupe";
    }
    if(!empty($conditions))
    {
      $sql = "SELECT id, marque, modele, annee, description, image FROM rallye WHERE ";
      $sql = $sql . implode(' AND ', $conditions);
    }
    
    $MESSAGE_SQL_LISTE_RESULTAT_RECHERCHE_AVANCE = $sql;

    $requeteResultatRecherche = VoitureDAO::$basededonnees->prepare($MESSAGE_SQL_LISTE_RESULTAT_RECHERCHE_AVANCE);
    $requeteResultatRecherche->execute();
    $listResultatRecherche = $requeteResultatRecherche->fetchAll();

    return $listResultatRecherche;
  }

  public static function voirStatistiqueContenuParGroupe(){
      
    VoitureDAO::initialiser();
      
    $MESSAGE_SQL_STATISTIQUE_CONTENU_PAR_GROUPE = "SELECT Groupe as groupe, count(*) as voiture, AVG(nombreProduit) as moyenneProduit, STDDEV_POP(nombreProduit) as ecartTypeNombreProduit, SUM(nombreProduit) as nombreProduitTotal, MIN(nombreProduit) as minNombreProduit, MAX(nombreProduit) as maxNombreProduit FROM rallye GROUP BY Groupe;";

    $requeteStatistiquesContenuParGroupe = VoitureDAO::$basededonnees->prepare($MESSAGE_SQL_STATISTIQUE_CONTENU_PAR_GROUPE);
    $requeteStatistiquesContenuParGroupe->execute();
    $statistiquesContenuParGroupe = $requeteStatistiquesContenuParGroupe->fetchAll();

    return $statistiquesContenuParGroupe;
  }

  public static function voirStatistiqueContenu(){
      
    VoitureDAO::initialiser();
      
    $MESSAGE_SQL_STATISTIQUE_CONTENU = "SELECT count(*) as voiture, AVG(nombreProduit) as moyenneProduit, STDDEV_POP(nombreProduit) as ecartTypeNombreProduit, SUM(nombreProduit) as nombreProduitTotal, MIN(nombreProduit) as minNombreProduit, MAX(nombreProduit) as maxNombreProduit FROM rallye;";

    $requeteStatistiquesContenu = VoitureDAO::$basededonnees->prepare($MESSAGE_SQL_STATISTIQUE_CONTENU);
    $requeteStatistiquesContenu->execute();
    $statistiquesContenu = $requeteStatistiquesContenu->fetchAll();

    return $statistiquesContenu;
  }
}
?>