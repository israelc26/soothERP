<?php
//  ******************************************************
// CONFIG DES DONNEES activite
//  ******************************************************
require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");
//liste des pays pour affichage dans select
$listepays = getPays_select_list ();

// AFFICHAGE
include ($DIR.$_SESSION['theme']->getDir_theme()."page_configuration_activite.inc.php");

?>