<?php
//  ******************************************************
// CONFIG DES INTERFACES
//  ******************************************************
require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$interfaces = array();
$liste_interfaces = charger_all_interfaces();
//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_site_interfaces_config.inc.php");

?>