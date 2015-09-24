<?php
//  ******************************************************
// AJOUT D'UN PROFIL
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if ($COMMERCIAL_ID_PROFIL != 0) {	
	// *************************************************
	// Controle des données fournies par le formulaire

	$infos_profils = array();
	$id_profil	=	$COMMERCIAL_ID_PROFIL;
	if (!isset($_SESSION['profils'][$id_profil])) { continue; }

	$infos_profils[$id_profil]['id_profil'] = $id_profil;
	include_once ($CONFIG_DIR."profil_".$_SESSION['profils'][$id_profil]->getCode_profil().".config.php");
		

	
	// *************************************************
	// Modification du profil
	$contact= new contact ($_REQUEST['ref_contact']);
	$contact->create_profiled_infos ($infos_profils[$id_profil]);
	
	
	
}
//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_commission_commercial_add.inc.php");

?>