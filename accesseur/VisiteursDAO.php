<?php
class AccesBaseDeDonneesVisiteurs
{
    public static $basededonnees = null;

    public static function initialiser()
    {
        $usager = 'WikiRallye';
        $motdepasse = 'WikiRallye12!';
        $hote = 'localhost';
        $base = 'voiture';
        $dsn = 'mysql:dbname='.$base.';host=' . $hote;
        VisiteursDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse);
        VisiteursDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

class VisiteursDAO extends AccesBaseDeDonneesVisiteurs{
  public static function ajouterVisiteurs($user_ip, $page, $browser, $langue){
      
    VisiteursDAO::initialiser();

    $SQL_AJOUTER_VISITEUR = "INSERT into visiteurs(user_ip, page, parametre, langue, date) VALUES('$user_ip', '$page', '$browser', '$langue', NOW());";

    $requeteAjouterVisiteur = VisiteursDAO::$basededonnees->prepare($SQL_AJOUTER_VISITEUR);

    $requeteAjouterVisiteur->execute();
  }

  public static function voirStatistiqueVisiteursParJour(){
      
    VisiteursDAO::initialiser();
      
    date_default_timezone_set("America/New_York");
    $semaineDerniere = date("Y-m-d H:i:s", strtotime("-7 days"));

    $SQL_VOIR_STATISTIQUE_VISITEUR_PAR_JOUR = "SELECT DAYOFWEEK(date) as Journee, EXTRACT(DAY FROM date) as Jour, EXTRACT(MONTH FROM date) as Mois, EXTRACT(YEAR FROM date) as Annee, COUNT(id) as Clics, user_ip as User_ip FROM visiteurs WHERE date > '$semaineDerniere' GROUP BY Annee, Mois, Jour, User_ip ORDER BY Annee, Mois, Jour, Clics DESC;";

    $requeteStatistiquesVisiteurParJour = VisiteursDAO::$basededonnees->prepare($SQL_VOIR_STATISTIQUE_VISITEUR_PAR_JOUR);

    $requeteStatistiquesVisiteurParJour->execute();
    $statistiquesVisiteurParJour = $requeteStatistiquesVisiteurParJour->fetchAll();

    return $statistiquesVisiteurParJour;
  }

  public static function voirStatistiqueVisiteursParLangue(){
      
    VisiteursDAO::initialiser();
      
    date_default_timezone_set("America/New_York");
    $semaineDerniere = date("Y-m-d H:i:s", strtotime("-7 days"));

    $SQL_VOIR_STATISTIQUE_VISITEUR_PAR_LANGUE = "SELECT langue as Langue, COUNT(id) as Clics, user_ip as User_ip FROM visiteurs WHERE date > '$semaineDerniere' GROUP BY User_ip ORDER BY Clics DESC;";

    $requeteStatistiquesVisiteurParLangue = VisiteursDAO::$basededonnees->prepare($SQL_VOIR_STATISTIQUE_VISITEUR_PAR_LANGUE);

    $requeteStatistiquesVisiteurParLangue->execute();
    $statistiquesVisiteurParLangue = $requeteStatistiquesVisiteurParLangue->fetchAll();

    return $statistiquesVisiteurParLangue;
  }
}
?>