<?php 

require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//  ******************************************************
// AFFICHAGE
//  ******************************************************
include ($DIR.$_SESSION['theme']->getDir_theme()."/page_import_commandes_csv.inc.php");

?>