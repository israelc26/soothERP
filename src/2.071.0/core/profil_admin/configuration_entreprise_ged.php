<?php
//  ******************************************************
// CONFIG DES DONNEES options divers 
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$types_pj = charger_types_ged();

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_configuration_entreprise_ged.inc.php");

?>