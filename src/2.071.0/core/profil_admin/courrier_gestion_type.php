<?php
//  ******************************************************
// GESTION DES COURRIERS
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$courrier_infos_types	= courrier_infos_types();
	
//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_courrier_gestion_type.inc.php");

?>