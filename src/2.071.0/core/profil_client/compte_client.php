<?php
//  ******************************************************
// ACCUEIL DE L'UTILISATEUR CLIENT
//  ******************************************************

$_PAGE['MUST_BE_LOGIN'] = 1;
require("_dir.inc.php");
require ("_profil.inc.php");
require ("_session.inc.php");




//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compte_client.inc.php");

?>