<?php
//  ******************************************************
// CONFIRMATION DE SUPPRESSION D'UN SERVEUR D'IMPORT
//  ******************************************************

$_PAGE['MUST_BE_LOGIN'] = 0;
require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_serveur_import_sup_confirm.inc.php");

?>