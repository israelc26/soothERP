<?php
//  ******************************************************
// MAJ TVA INTRA COMMUNAUTAIRE
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

if (isset($_REQUEST['ref_contact'])) {	
	
	// *************************************************
	// Création du contact
	$contact = new contact ($_REQUEST['ref_contact']);
	$contact->maj_tva_intra ($_REQUEST['tva_intra']);
}

//  ******************************************************
// AFFICHAGE
// - ******************************************************

?>maj_tva_intra