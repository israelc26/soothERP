<?php
//  ******************************************************
// SOUS MENU transfert de données
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_smenu_transfert_donnnees.inc.php");

?>