<?php
//  ******************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


// Controle

	if (!isset($_REQUEST['ref_art_categ'])) {
		echo "La référence de la catégorie n'est pas précisée";
		exit;
	}

	$art_categ = new art_categ ($_REQUEST['ref_art_categ']);
	
	// on récupére la liste des tarifs
	$tarifs_liste	= array();
	$tarifs_liste = get_tarifs_listes_formules ($_REQUEST['ref_art_categ']);
	
	if (!$art_categ->getRef_art_categ()) {
		echo "La référence de la catégorie est inconnue";		exit;

	}
	
	
//liste des tvas du pays par defaut
$tvas = get_tvas ($DEFAUT_ID_PAYS);
	
//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_tarifs.inc.php");

?>