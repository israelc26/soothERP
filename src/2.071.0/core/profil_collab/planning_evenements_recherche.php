<?php
//  ******************************************************
//  RECHERCHE DES EVENEMENTS DES CONTACTS
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//  ******************************************************
// TRAITEMENTS
//  ******************************************************

$liste_types_evenements = contact::charger_types_evenements_liste();

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_planning_evenements_recherche.inc.php");

?>