<?php
//  ******************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


// Controle

	if (!isset($_REQUEST['ref_article'])) {
		echo "La référence de l'article n'est pas précisée";
		exit;
	}

	$article = new article ($_REQUEST['ref_article']);
	if (!$article->getRef_article()) {
		echo "La référence de l'article est inconnue";		exit;

	}

$article->add_code_barre ($_REQUEST['code_barre']);


$codes_barres	=	$article->getCodes_barres();

// ***************************************
// AFFICHAGE
// ***************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_edition_code_barre.inc.php");

?>