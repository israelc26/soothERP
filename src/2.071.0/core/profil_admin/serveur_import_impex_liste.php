<?php
//  ******************************************************
// LISTE DES SERVEURS D'IMPORT
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_serveur_import_impex_liste.inc.php");

?>