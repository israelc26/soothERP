<?php
//  ******************************************************
// RECHERCHE POUR MODIFICATION DANS NUMERO DE COMPTE PAR DEFAUT
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compte_defaut_search.inc.php");

?>