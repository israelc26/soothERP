<?php
//  ******************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_communication_nouvelle_newsletter_profil2.inc.php");

?>