<?php
//  ******************************************************
// GESTION des consommations
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$liste_consommations =	charger_liste_articles_consommation();
//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_gestion_consommations.inc.php");

?>