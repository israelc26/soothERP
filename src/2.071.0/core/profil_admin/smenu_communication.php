<?php
//  ******************************************************
// SOUS MENU site_smenu_communicationinternet
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_smenu_communication.inc.php");

?>