<?php
require "AccesBaseDeDonnees.php";

class VisiteursDAO{
  public static function ajouterVisiteurs($user_ip, $page, $browser, $langue){

    $SQL_AJOUTER_VISITEUR = "INSERT into visiteurs(user_ip, page, parametre, langue, date) VALUES('$user_ip', '$page', '$browser', '$langue', NOW());";

    $requeteAjouterVisiteur = AccesBaseDeDonnees::GetConnexion()->prepare($SQL_AJOUTER_VISITEUR);

    $requeteAjouterVisiteur->execute();
  }

  public static function voirStatistiqueVisiteursParJour(){

    $SQL_VOIR_STATISTIQUE_VISITEUR_PAR_JOUR = "SELECT DAYOFWEEK(date) as Journee, EXTRACT(DAY FROM date) as Jour, EXTRACT(MONTH FROM date) as Mois, EXTRACT(YEAR FROM date) as Annee, COUNT(id) as Clics, user_ip as User_ip FROM visiteurs GROUP BY Annee, Mois, Jour, User_ip ORDER BY Annee, Mois, Jour, Clics DESC;";

    $requeteStatistiquesVisiteurParJour = AccesBaseDeDonnees::GetConnexion()->prepare($SQL_VOIR_STATISTIQUE_VISITEUR_PAR_JOUR);

    $requeteStatistiquesVisiteurParJour->execute();
    $statistiquesVisiteurParJour = $requeteStatistiquesVisiteurParJour->fetchAll();

    return $statistiquesVisiteurParJour;
  }

  public static function voirStatistiqueVisiteursParLangue(){

    $SQL_VOIR_STATISTIQUE_VISITEUR_PAR_LANGUE = "SELECT langue as Langue, COUNT(id) as Clics, user_ip as User_ip FROM visiteurs GROUP BY User_ip ORDER BY Clics DESC;";

    $requeteStatistiquesVisiteurParLangue = AccesBaseDeDonnees::GetConnexion()->prepare($SQL_VOIR_STATISTIQUE_VISITEUR_PAR_LANGUE);

    $requeteStatistiquesVisiteurParLangue->execute();
    $statistiquesVisiteurParLangue = $requeteStatistiquesVisiteurParLangue->fetchAll();

    return $statistiquesVisiteurParLangue;
  }
}
?>