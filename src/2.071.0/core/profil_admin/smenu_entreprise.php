<?php
//  ******************************************************
// SOUS MENU ENTREPRISE
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//liste des groupes de documents
$docs_types_groupes = docs_type_groupes ();
//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_smenu_entreprise.inc.php");

?>