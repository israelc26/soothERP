<?php
//  ******************************************************
// CONSULTER/AJOUTER ARTICLES FAVORIS
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$liste_articles_fav = array();
$liste_articles_fav = article::_getArticles_fav();
//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_fav.inc.php");

?>