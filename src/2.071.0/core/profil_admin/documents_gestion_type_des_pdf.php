<?php
//  ******************************************************
// GESTION DES DOCUMENTS (Désactivation d'un modele pdf)
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

if (isset($_REQUEST["id_type_doc"]) && isset ($_REQUEST["id_pdf_modele"])) {
	desactive_doc_modele_pdf ($_REQUEST["id_type_doc"], $_REQUEST["id_pdf_modele"]);
}
//  ******************************************************
// AFFICHAGE
// - ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_documents_gestion_type_mod.inc.php");

?>