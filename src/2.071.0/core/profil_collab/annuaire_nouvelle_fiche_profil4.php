<?php
//  ******************************************************
// PROFIL client
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");
require ($DIR.$_SESSION['theme']->getDir_theme()."_theme.config.php" );


//chargement des infos de clients
if ($CLIENT_ID_PROFIL != 0) {
	include ($CONFIG_DIR."profil_".$_SESSION['profils'][$CLIENT_ID_PROFIL]->getCode_profil().".config.php");
	contact::load_profil_class($CLIENT_ID_PROFIL);
	$liste_categories_client = contact_client::charger_clients_categories ();
}

//liste des tarifs
$tarifs_liste	= array();
$tarifs_liste = get_full_tarifs_listes ();

//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_nouvelle_fiche_profil4.inc.php");

?>