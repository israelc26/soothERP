<?php
//  ******************************************************
// CONFIG DES PARAMETRES DE TAXES
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



	$taxes_liste	= taxes_pays($DEFAUT_ID_PAYS);
	

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_configuration_taxes.inc.php");

?>
