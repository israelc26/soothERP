<?php
//  ******************************************************
// OUVERTURE D'UN DOCUMENT SPECIFIQUE POUR INVENTAIRE (insertion des art_categ selectionnées)
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


//_vardump($_REQUEST);
//exit;
		
if (isset($_REQUEST["Submit"])) {

	$ref_doc= $_REQUEST["Submit"];
	$document = open_doc ($ref_doc);
	$id_type_doc = $document->getID_TYPE_DOC ();
	$ref_contact = $document->getRef_contact ();
	//on envois en param la liste des art_categ séléctionnées
	$art_categs = array();
	foreach ($_REQUEST as $variable => $valeur) {
		if (substr ($variable, 0, 8) != "ins_art_") { continue; }
		$i = count($art_categs);
		$art_categs[$i] =	$valeur;
		if (isset($_REQUEST["ref_constructeur_".substr ($variable, 8)]) && $_REQUEST["ref_constructeur_".substr ($variable, 8)] != "") {
			$art_categs[$i] .=	":".$_REQUEST["ref_constructeur_".substr ($variable, 8)];
		}
	}
	
	if (isset($_REQUEST["pre_remplir"])) {
		$GLOBALS['_OPTIONS']['CREATE_DOC']['pre_remplir'] = 1;
	}
	
	$document->define_art_categ($art_categs);
	
	//si un montant est négatif
	$montant_negatif = false;
	$montant_positif = 1;
	if (isset($_REQUEST["montant_neg"])) { $montant_negatif = true; $montant_positif = -1;}
			
	if ($document->getACCEPT_REGMT() != 0) {

		//liste des reglements_modes
		$reglements_modes	= array();

		if (($document->getACCEPT_REGMT() == 1 && !$montant_negatif) || ($document->getACCEPT_REGMT() == -1 && $montant_negatif)) {
			$reglements_modes = getReglements_modes ("entrant");
		}
		if (($document->getACCEPT_REGMT() == -1 && !$montant_negatif) || ($document->getACCEPT_REGMT() == 1 && $montant_negatif)) {
			$reglements_modes = getReglements_modes ("sortant");
		}
	
		$liste_reglements = $document->getReglements ();
	}
	
}

//liste des types de documents
$types_liste	= array();
$types_liste = $_SESSION['types_docs'];

//liste des constructeurs
$constructeurs_liste = array();
$constructeurs_liste = get_constructeurs ();
	
//liste des lieux de stockage
$stocks_liste	= array();
$stocks_liste = $_SESSION['stocks'];

//liste des tarifs
get_tarifs_listes ();
$tarifs_liste	= array();
$tarifs_liste = $_SESSION['tarifs_listes'];	

//infos pour mini moteur de recherche contact
$profils_mini = array();
foreach ($_SESSION['profils'] as $profil) {
	if ($profil->getActif() != 1) { continue; }
	$profils_mini[] = $profil;
}
unset ($profil);
foreach ($_SESSION['profils'] as $profil) {
	if ($profil->getActif() != 2 ) { continue; }
	$profils_mini[] = $profil;
}
unset ($profil);


$ANNUAIRE_CATEGORIES	=	get_categories();

//liaisons du document
$doc_liaisons_possibles = $document->getLiaisons_possibles ();
$doc_liaisons = $document->getLiaisons ();


//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_documents_edition.inc.php");

?>