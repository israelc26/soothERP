<?php
//  ******************************************************
// RECHERCHE POUR modification compte par défaut dans art_categ
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_categorie_compta_search.inc.php");

?>