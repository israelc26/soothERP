<?php
//  ******************************************************
// RECHERCHE POUR AJOUT DANS GESTION PLAN COMPTABLE ENTREPRISE
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compta_plan_entreprise_search.inc.php");

?>