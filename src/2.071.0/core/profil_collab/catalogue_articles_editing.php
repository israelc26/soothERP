<?php
//  ******************************************************
// AFFICHAGE DE L'EDITION (IMPRESSION ET ENVOIS) D'UN DOCUMENT
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$ref_article= $_REQUEST["ref_article"];

//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_editing.inc.php");

?>