<?php
//  ******************************************************
// MAJ D'UN NUMERO DE LOT A UN ARTICLE DESASSEMBLÉ
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST['ref_doc'])) {

// ouverture des infos du document et mise à jour
	$document = open_doc ($_REQUEST['ref_doc']);
	$document->maj_des_nl ($_REQUEST['nl'],  $_REQUEST['new_nl'], $_REQUEST['qte'],  $_REQUEST['new_qte']);
	$id_type_doc = $document->getID_TYPE_DOC ();
	
	
}

?>