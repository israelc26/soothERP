<?php
//  ******************************************************
// RECHERCHE CLIENTS PAR CONSO
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//  ******************************************************
// TRAITEMENTS
//  ******************************************************

	if (!isset($_REQUEST['ref_article'])) {
		echo "La référence de l'article n'est pas précisée";
		exit;
	}

	$article = new article ($_REQUEST['ref_article']);
	if (!$article->getRef_article()) {
		echo "La référence de l'article est inconnue";		exit;

	}

// *************************************************
// Profils à afficher
	if ($CLIENT_ID_PROFIL != 0) {
		include ($CONFIG_DIR."profil_".$_SESSION['profils'][$CLIENT_ID_PROFIL]->getCode_profil().".config.php");
		contact::load_profil_class($CLIENT_ID_PROFIL);
		$liste_categories_client = contact_client::charger_clients_categories ();
	}
//liste des articles 
$liste_consommations =	charger_liste_articles_consommation();
//profil affichés pour la recherche simple
$profils = array();
foreach ($_SESSION['profils'] as $profil) {
	if ($profil->getActif() != 1) { continue; }
	$profils[] = $profil;
}
unset ($profil);
$ANNUAIRE_CATEGORIES	=	get_categories();

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_service_conso_recherche.inc.php");

?>