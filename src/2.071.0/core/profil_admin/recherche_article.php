<?php
//  ******************************************************
// CONFIG DE RECHERCHE ARTICLE
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

$liste_recherche=charge_recherche_type("2");
$parent='article';
$idtype='2';
$titre='d&acute;articles';

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_recherche.inc.php");

?>