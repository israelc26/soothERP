<?php
//  ******************************************************
// Tableau de bord des ventes analyse ca
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_tableau_bord_ventes_tb2_contener.inc.php");

?>