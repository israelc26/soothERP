<?php
//  ******************************************************
// DEL D'UN MODELE DE LIGNE D'INFORMATION DE DOCUMENTS
//  ******************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


del_doc_info_line ($_REQUEST["id_doc_info_line"]);

//  ******************************************************
// AFFICHAGE
//  ******************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_configuration_docs_infos_lines_del.inc.php");

?>