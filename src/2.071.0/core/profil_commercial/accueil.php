<?php
//  ******************************************************
// ACCUEIL DE L'UTILISATEUR COMMERCIAL
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");
require ($CONFIG_DIR."profil_".$_SESSION['profils'][$COMMERCIAL_ID_PROFIL]->getCode_profil().".config.php");




//  ******************************************************
// AFFICHAGE
//  ******************************************************


include ($DIR.$_SESSION['theme']->getDir_theme()."page_accueil.inc.php");

?>