<?php
//  ******************************************************
// CONFIG DES DONNEES tarifaires
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


	$tarifs_liste	= array();
	$tarifs_liste = get_full_tarifs_listes ();
	

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_configuration_tarifs.inc.php");

?>