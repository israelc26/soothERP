<?php
//  ******************************************************
// AJOUT D'UN PROFIL
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST['id_profil'])) {	
	// *************************************************
	// Controle des données fournies par le formulaire


	$infos_profils = array();
	$id_profil	=	$_REQUEST['id_profil'];
	if (!isset($_SESSION['profils'][$id_profil])) { continue; }
	include_once ($CONFIG_DIR."profil_".$_SESSION['profils'][$id_profil]->getCode_profil().".config.php");
	$infos_profils[$id_profil]['id_profil'] = $id_profil;
	include_once ("./profil_create_".$_SESSION['profils'][$id_profil]->getCode_profil().".inc.php");
		

	
	// *************************************************
	// Modification du profil
	$contact= new contact ($_REQUEST['ref_contact']);
	$contact->create_profiled_infos ($infos_profils[$id_profil]);
	
	
	
	$profils 	= $contact->getProfils();
	//chargement de la class contact_collab
	if(isset($profils[$COLLAB_ID_PROFIL]) ) {
		//fonctions de collaborateurs
		$liste_fonctions_collab = charger_fonctions ($COLLAB_ID_PROFIL);
		//on parcoure les fonction pour retrouver les categories de collaborateurs cochées
		foreach ($liste_fonctions_collab as $liste_fonction_collab) {
			if (isset($_REQUEST['id_fonction_'.$liste_fonction_collab->id_fonction])) {
			$profils[$COLLAB_ID_PROFIL]->add_fonction ($liste_fonction_collab->id_fonction);
			}
		}
		fonctions::maj_user_permissions ($contact->getRef_contact()); 
	}
}
//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_edition_valid_profil".$id_profil."_nouvelle.inc.php");

?>