<?php
//  ******************************************************
// Mouvement des caisses
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$compte_caisse	= new compte_caisse($_REQUEST["id_caisse"]);


//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compta_mouvement_caisse.inc.php");

?>