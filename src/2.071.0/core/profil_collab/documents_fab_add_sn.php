<?php
//  ******************************************************
// AJOUT D'UN NUMERO DE SERIE A UN ARTICLE FABRIQUE
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST['ref_doc'])) {
// ouverture des infos du document et mise à jour
	$document = open_doc ($_REQUEST['ref_doc']);
	$document->add_fab_sn ($_REQUEST['sn']);
	$id_type_doc = $document->getID_TYPE_DOC ();
	
//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_documents_fab_add_sn.inc.php");
}

?>