<?php
//  ******************************************************
// SOUS MENU site_internet
//  ******************************************************
require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

// AFFICHAGE
include ($DIR.$_SESSION['theme']->getDir_theme()."page_smenu_site_internet.inc.php");
?>