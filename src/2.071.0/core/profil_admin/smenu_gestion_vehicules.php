<?php
//  ******************************************************
// SOUS MENU gestion_modules
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

$liste_vehicules = charger_liste_vehicules();

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_smenu_gestion_vehicules.inc.php");

?>