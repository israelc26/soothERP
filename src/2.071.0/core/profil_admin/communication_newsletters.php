<?php
//  ******************************************************
// GESTION DES NEWSLETTERS
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//variable nécessaires aux newsletter
$newsletters = charger_newsletters();


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_communication_newsletters.inc.php");

?>